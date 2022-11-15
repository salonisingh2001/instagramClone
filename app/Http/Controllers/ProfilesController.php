<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PostsController;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\profile;

use Illuminate\Http\Request;



class ProfilesController extends Controller
{
    
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(5),
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(5),
            function () use ($user) {
                return $user->profile->followers->count();
            });
            

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(5),
            function () use ($user) {
                return $user->following->count();
            });

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }
    

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }
    public function show(User $user)
    {
        $users = auth()->user()->followers->user_id;

        

        return $user->profile->followers();
    }
    

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
    public function search(Request $request)
    {
        $q = $request->input('q');
        $user = User::where('username', 'LIKE', '%' . $q . '%')->orWhere('email', 'LIKE', '%' . $q . '%')->get();
        if (count($user) > 0)
            return view('profiles.search')->withDetails($user)->withQuery($q);
        return view('profiles.search')->withMessage('No results found.');
    }
}

