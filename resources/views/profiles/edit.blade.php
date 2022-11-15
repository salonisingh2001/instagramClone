@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    <form method="POST" action="/profile/{{$user->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title

                            </label>

                            <div class="col-md-6">
                                <input id="title" type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                name="title" value="{{ old('title')  ?? $user->profile->title}}" 
                                required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end" style="padding-top:15px;padding-right:10px;">Description

                            </label>

                            <div class="col-md-6" style="padding-top:15px;padding-right:10px;" >
                                <input id="description" type="text" style="margin-left: 7px;"
                                class="form-control @error('description') is-invalid @enderror" 
                                name="description" value="{{ old('description')?? $user->profile->description}}" 
                                required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><div class="row mb-3" style="padding-top:15px;padding-right:10px;">
                            <label for="url" class="col-md-4 col-form-label text-md-end">url

                            </label>

                            <div class="col-md-6" >
                                <input id="url" type="text" style="margin-left: 14px;"
                                class="form-control @error('url') is-invalid @enderror" 
                                name="url" value="{{ old('url') ?? $user->profile->url}}" 
                                required autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="row mb-3 d-flex align-items-center" style="padding-top:15px;">
                            <label for="image" class="col-md-4 col-form-label text-md-end " style="margin-left:10px;">Profile Image</label>
        
                                <input type="file" class="form-control-file col-md-6" id="image" style="margin-left:22px"
                                class="form-control " 
                                name="image" value="{{ old('image') }}" 
                                 autocomplete="image" autofocus>
                                
                            
                                </div class="">

                                <button class="btn btn-primary col-sm-4 offset-4">Save</button>
                                </div>
                               
                            
                            </div>
                        </div>

</div>

@endsection
