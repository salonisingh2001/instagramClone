@extends('layouts.app')

@section('content')

<div class="container" style="padding-top:30px;" >
    <div class="row">
        <div class="col-8">
    
    <img src="/storage/{{ $post->image}}" class="w-100" height="500px">
</div>
<div class="col-4">
    <div class="">

        <div class="d-flex align-items-center">
            <div style="padding-right:10px;" >
                
            </div>
            <div>
                <h4><strong> <a href="/profile/{{$post->user->id}}">
                    <span class="text-dark">{{$post->user->username}}</span>
                </a>
                
                
               @if($post->user->id == auth()->user()->id)
                <form action="{{ url('/delete/posts',$post->id) }}" method="POST">
                <input name="_method" type="hidden" value="DELETE">
                {{@csrf_field()}}
               {{ @method_field("DELETE")}}
                
                <button type="submit" class="btn btn-outline-danger">delete post</button>
                </form>
                @endif
                </h4>
                
                
            </div>
            
        </div>
        
        <hr>
        <p> <strong>
            <a href="/profile/{{$post->user->id}}">
                <span class="text-dark">{{$post->user->username}}</span></a>
</strong> {{$post->caption}}
</p>
        
    </div>
    
</div>
</div>
</div>

@endsection