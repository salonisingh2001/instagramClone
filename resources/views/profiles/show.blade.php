@extends('layouts.app')

@section('content')

<div class="container" style="padding-top:30px;" >
    <div class="row">
        <div class="col-8">
        <div class="d-flex align-items-center">
            <div style="padding-right:10px;" >
                <img src="{{$user->profile->profileImage}}" style="max-width: 40px;" class="w-100 rounded-circle">
            </div>
            <div>
                <h4><strong> <a href="/profile/{{$post->user->id}}">
                    <span class="text-dark">{{$post->user->username}}</span>
                </a></strong>
            <a href="" style="padding-left:10px;">Follow</a>
                </h4>
                
            </div>
            
        </div>
        </div>
    </div>
</div>

          

@endsection