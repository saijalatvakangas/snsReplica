@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-baseline pb-3">
                    <h1 class="pr-3">{{ $user->username }}</h1>
                    <button class="btn btn-primary">Follow</button>
                    @can('update', $user->profile)
                        <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                    @endcan
                </div>
                @can('update', $user->profile)
                    <a href="/post/create">Add New Post</a>
                @endcan
            </div>

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>10k</strong> followers</div>
                <div class="pr-5"><strong>100</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/post/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection
