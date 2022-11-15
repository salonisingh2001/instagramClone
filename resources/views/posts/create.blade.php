@extends('layouts.app')

@section('content')
<div class="container">

<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Image</div>

                <div class="card-body">
                    <form method="POST" action="/posts" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="caption" class="col-md-4 col-form-label text-md-end">caption

                            </label>

                            <div class="col-md-6">
                                <input id="caption" type="text" 
                                class="form-control @error('caption') is-invalid @enderror" 
                                name="caption" value="{{ old('caption') }}" 
                                required autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3 d-flex align-items-center" style="padding-top:15px;padding-right:10px;">
                            <label for="image" class="col-md-4 col-form-label text-md-end " >Image</label>
        
                                <input type="file" class="form-control-file col-md-6" id="image" style="margin-left:7px"
                                class="form-control @error('image') is-invalid @enderror" 
                                name="image" value="{{ old('image') }}" 
                                required autocomplete="image" autofocus>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div class="">
                                <button class="btn btn-primary col-sm-4 offset-4">Post</button>
                                </div>
                               
                            
                            </div>
                        </div>

                       
    
</div>

@endsection
