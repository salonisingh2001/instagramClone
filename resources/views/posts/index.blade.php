@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container-fluid justify-content-center">
{{-- Aside Section --}}

        <aside class=" container-fluid col-sm-4" style="float:right;">
            <div class=" p-2 ">
                <div>
                    <!-- User Info -->
                    <div class="d-flex align-items-center mb-3 p-2">
                        <a href="/profile/{{Auth::user()->id}}" style="width: 56px; height: 56px;">
                            <img src="{{ asset(Auth::user()->profile->ProfileImage()) }}" class="rounded-circle w-100">
                        </a>
                        <div class='d-flex flex-column pl-3 p-2'>
                            <a href="/profile/{{Auth::user()->id}}" class='h6 m-0 text-dark text-decoration-none'>
                                <strong>{{ auth()->user()->username }}</strong>
                            </a>
                            <small class="text-muted ">{{ auth()->user()->name }}</small>
                        </div>
                    </div>

                    <!-- Suggestions -->
                    <div class='mb-4 p-2' style="width: 300px">
                        <h6 class='text-secondary'>Suggestions For You</h5>

                            <!-- Suggestion Profiles-->
                            @foreach ($sugg_users as $sugg_user)
                            @if ($loop->iteration == 6)
                            @break
                            @endif
                            <div class='suggestions py-2'>
                                <div class="d-flex align-items-center ">
                                    <a href="/profile/{{$sugg_user->id}}" style="width: 32px; height: 32px;">
                                        <img src="{{ asset($sugg_user->profile->ProfileImage()) }}" class="rounded-circle w-100">
                                    </a>
                                    <div class='d-flex flex-column pl-3 p-2'>
                                        <a href="/profile/{{$sugg_user->id}}" class='h6 m-0 text-dark text-decoration-none'>
                                            <strong>{{ $sugg_user->name}}</strong>
                                        </a>
                                        <small class="text-muted">New to Instagram </small>
                                    </div>
                                    <a href="#" class='ml-auto text-info text-decoration-none'>
                                    <follow-button user-id="{{ $sugg_user->id }}" follows="{{ $sugg_user->follows }}"></follow-button>
               </a>
                                </div>
                            </div>
                            @endforeach

                    </div>

                    <!-- CopyRight -->
                    <div>
                        <span style='color: #a6b3be;'>© 2022 Instagram from Batch B</span>
                    </div>

                </div>
        </aside>


    <main class="row">

        @foreach($posts as $post)
        <div class="py-5 ">
            <div class="col-sm-8 py-2 card shadow-sm">
                <a href="/profile/{{ $post->user->id }}" style="padding-left:10px ;"> <img src="{{ asset($post->user->profile->ProfileImage()) }}" class="rounded-circle" width="35">
                    <strong class="text-dark card-text p-2">{{ $post->user->username }}</strong></a><br>
                <a href="/profile/{{ $post->user->id }}">
                    <img src="/storage/{{ $post->image }}" class="card-img" height="400">
                </a>
                <div style="padding-left:10px ;">
                    <img style="padding-right:10px ;" src="https://www.bing.com/th?id=OIP.2hod4Lwb9wDrzSTLFVcpOgHaHa&w=150&h=150&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" alt="like" height="30">
                    <img style="padding-right:10px ;" src="https://th.bing.com/th/id/R.d398a2e0d6d36ace87869a3f786c6979?rik=K8zpST5cjAejww&riu=http%3a%2f%2fcdn.onlinewebfonts.com%2fsvg%2fimg_322817.png&ehk=oW9Pr%2fAMVWdSPoyXmhAG8%2bvVqTYgD8Yt%2bneO2UjKTk4%3d&risl=&pid=ImgRaw&r=0" alt="comment" height="25">
                    <img style="padding-right:10px ;" src="https://cdn.onlinewebfonts.com/svg/img_54997.png" alt="share" height="25">
                    <br>
                    <span class="text-dark card-text p-2 py-1"><strong>{{ $post->user->username }} -</strong> {{ $post->caption }}</span>

                    <!-- Created At  -->
                    <p class="card-text text-muted p-2">{{ $post->created_at->diffForHumans() }}</p>
                </div>
                <!-- Card Footer -->
                <div class="card-footer p-0">
                    <!-- Add Comment -->
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group mb-0  text-muted">
                            <div class="input-group is-invalid">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <textarea class="form-control" id="body" name='body' rows="1" cols="1" placeholder="Add a comment..."></textarea>
                                <div class="input-group-append">
                                    <button class="btn btn-md btn-outline-info" type="submit">Post</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        
 @endforeach
 
</div>

</main>

        </div>
        


@endsection