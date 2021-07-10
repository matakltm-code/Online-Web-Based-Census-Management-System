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
                            <h4>Edit Your Profile</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="/profile/{{ $user->id }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="name" class="col-4 col-form-label">Name</label>
                                    <div class="col-8">
                                        <input value="{{ old('name') ?? $user->name }}" id="name" name="name"
                                            placeholder="Name" class="form-control  @error('name') is-invalid @enderror"
                                            type="text">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="region"
                                        class="col-4 col-form-label">{{ __('Select Your Region') }}</label>

                                    <div class="col-8">
                                        <select id="region" name="region"
                                            class="form-control @error('region') is-invalid @enderror" name="region">
                                            <option value="">*** SELECT ***</option>
                                            @foreach (App\Models\Region::all() as $region)
                                            <option value="{{$region->id}}" @if ( $user->region_id == $region->id)
                                                selected="selected"
                                                @endif >{{$region->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('region')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="email" class="col-4 col-form-label">Email</label>
                                    <div class="col-8">
                                        <input value="{{ old('email') ?? $user->email }}" id="email" name="email"
                                            placeholder="Email"
                                            class="form-control  @error('email') is-invalid @enderror"
                                            required="required" type="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Update My
                                            Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
