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
                <div>
                    @foreach($user -> follows as $follows)
                    <div>
                    <div class="col-4 " style="padding-bottom:40px;">
              <a href="/profile/{{$user->id}}"> ></a>
              
            </div>
            @endforeach