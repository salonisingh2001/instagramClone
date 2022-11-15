<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\Like;

class LikeController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::User();
        $like = Like::where('user_id', $user)->where('post_id', $id)->get();
    }

    public function update2($id)
    {

        $user = Auth::User();
       

        $like = Like::where('user_id', $user->id)->where('post_id', $id)->first();

        if ($like) {
            $like->State = !$like->State;
            $like->save();
        } else {
            $like = Like::create([
                "user_id" => $user->id,
                "post_id" => $id,
                "State" => true

            ]);
        }
    

        return Redirect::to('/');
    }

}
