@extends('layouts.login')

@section('content')

<div class="form-container">

<h1>Follower List</h1>
@foreach ($followers as $followed_id)
<img src="{{ asset('storage/'.$followed_id->images)}}" class="profile-image">
@endforeach
</div>

<div class="b-color"></div>
@endsection
