<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\posts;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $sugg_users = User::all()->reject(function ($user) {
            $users = auth()->user()->following()->pluck('profiles.user_id')->toArray();
            return $user->id == Auth::id() || in_array($user->id, $users);
        });

        // Add Auth user id to users id array
        $users_id = $users->push(auth()->user()->id);

        // $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        $posts = posts::whereIn('user_id', $users_id)->with('user')->latest()->paginate(10)->getCollection();

        // dd($posts);

        return view('posts.index', compact('posts', 'sugg_users'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(posts $post)
    {
         
        return view('posts.show', compact('post'));
    }
    
    function delete($id)
    {

        $result= posts::where('id',$id)->delete();
        if($result)
        {
            return redirect('/profile/' . auth()->user()->id);
        }
        
    }
    
    public function explore()
    {
        $posts = posts::all()->shuffle();

        return view('posts.explore', compact('posts'));
    }
}