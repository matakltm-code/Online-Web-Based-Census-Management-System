@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Houses</h1>
        <a href="/houses/create" class="btn btn-link btn-sm">Create new house</a>
    </div>
    @if(count($houses) > 0)
    @foreach($houses as $post)
    <div class="well mb-2">
        <div class="row">
            @if ($post->image_path != null)
            <div class="col-md-4 col-sm-4">
                <img style="width:100%" src="/{{$post->image_path}}">
            </div>
            @else
            <div class="col-md-4 col-sm-4">
                <img style="width:100%" src="/images/noimage.jpg">
            </div>
            @endif
            <div class="col-md-8 col-sm-8">
                <h3><a href="/houses/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on {{$post->created_at}} ({{$post->created_at->diffForHumans()}}) by
                    {{$post->user->name}}</small> <br>
                <small class="text-muted">User type:
                    {{ $post->user->account_type_text($post->user->user_type) }}</small>
            </div>
        </div>
    </div>
    @endforeach
    {{$houses->links()}}
    @else
    <p>No houses found</p>
    @endif
</div>
@endsection
