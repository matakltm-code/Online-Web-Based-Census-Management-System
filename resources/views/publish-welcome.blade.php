@extends('layouts.app')

@section('content')
<div class="container-fluid bg-white py-4" style="margin-top: -30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                @auth
                @if(auth()->user()->is_admin)
                <a href="/publish" class="btn btn-success btn-md">Create New Publish Report</a>
                @endif
                @endauth
                {!! $published_reoprt->note !!}

            </div>
        </div>
    </div>
</div>
@endsection
