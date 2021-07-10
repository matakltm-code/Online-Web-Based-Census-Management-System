@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if ($messages->count() > 0)
            @foreach ($messages as $message)

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <span class="text-capitalize h5 font-weight-bold">{{ $message->user->name }}</span> <br>
                        <small>Account created: {{ $message->created_at->diffForHumans() }}</small>
                    </div>
                    <div>
                        <small>
                            <span>Email: {{ $message->user->email }}</span> <br>
                            <span>Region: {{ $message->user->region->name }}</span>
                        </small>
                    </div>
                </div>

                <div class="card-body">
                    <p><small><strong>Title:</strong></small> <br> {{ $message->title }}</p>
                    <p><small><strong>Detail</strong></small></p>
                    {!! $message->detail !!}

                </div>
            </div>

            @endforeach

            @else
            <p class="text-center bg-danger p-4 text-white font-weight-bold">There is no any report added yet!</p>

            @endif

            {{-- {{ $messages->links() }} --}}
        </div>
    </div>
</div>
@endsection
