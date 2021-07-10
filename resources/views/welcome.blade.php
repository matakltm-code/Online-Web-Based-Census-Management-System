@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Published report</div>

                <div class="card-body">
                    This is no any published report yet!
                    <br>
                    <br>
                    @if(auth()->user()->is_admin)
                    <a href="/publish" class="btn btn-success btn-lg">Create New Publish Report</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
