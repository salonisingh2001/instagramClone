@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-3 p-4">
                <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
            </div>
            <div class="col-9 p-4">
                <div class="d-flex justify-content-between " > <h1> {{ $user -> username }}</h1>
                
                @can('update', $user->profile)
                @else
            <div>
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

            
            @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{ $user->id}}/edit">Edit Profile</a>
           
            @endcan
                    <div class="d-flex ">
                        <div style="padding-right: 10px;"><strong>{{ $postCount }} </strong>Posts</div>
                        <div style="padding-right: 10px;"><strong>{{ $followersCount }}</strong>  followers</a></div>
                        <div style="padding-right: 10px;"><strong>{{ $followingCount }}</strong> following</a></div>
                    </div>
                    <div style="padding-top: 15px; font-weight: bold;"> {{ $user->profile->title }}
                    </div>
                    <div style="padding-top: 5px; font-weight: bold;"> {{ $user->profile->description }}
                    </div>
                    <div><a href="#" > {{ $user->profile->url }} </a>
                    </div>
                
                </div>
                
            
            
        </div>
        <div class="row" style="padding-top:15px;">
            @foreach($user -> posts as $posts)
            <div class="col-4 " style="padding-bottom:40px;">
              <a href="/posts/{{$posts->id}}">  <img src="/storage/{{$posts->image}}" class="w-100" ></a>
              
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
