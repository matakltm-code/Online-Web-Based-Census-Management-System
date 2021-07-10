@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            @include('profile.shared.side-nav')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="font-weight-bold">
                                {{ $user->account_type_text($user->user_type) }}
                                User Profile
                            </h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="h5 pb-1">
                                Name: {{ $user->name }}
                            </p>
                            <p class="h5 pb-1">
                                Region: {{ $user->region->name }}
                            </p>

                            <p class="h5 pb-1">
                                Email: {{ $user->email }}
                            </p>
                            <p class="h5 pb-1">
                                User Type: {{ $user->account_type_text($user->user_type) }}
                            </p>
                            <p class="h5 pb-1">
                                Account Status: {{ $user->active_account == true ? 'Active' : 'Deactivated' }}
                            </p>
                            <p class="h5 pb-1">
                                Account created at: {{ $user->created_at->diffForHumans() }}
                            </p>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
