@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create house</h1>
    <form action="/houses" method="POST">
        @csrf
        <div class="form-group row">
            <label for="house_number" class="col-12 col-form-label">House Number</label>
            <div class="col-12">
                <input value="{{ old('house_number') }}" id="house_number" name="house_number"
                    placeholder="Enter house_number" class="form-control  @error('house_number') is-invalid @enderror"
                    type="number">
                @error('house_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="number_of_room" class="col-12 col-form-label">Number rooms</label>
            <div class="col-12">
                <input value="{{ old('number_of_room') }}" id="number_of_room" name="number_of_room"
                    placeholder="Enter number_of_room"
                    class="form-control  @error('number_of_room') is-invalid @enderror" type="number">
                @error('number_of_room')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="house_level" class="col-12 col-form-label">House level</label>
            <div class="col-12">
                <select id="house_level" name="house_level"
                    class="form-control @error('house_level') is-invalid @enderror" name="house_level">
                    <option value="low">Low level</option>
                    <option value="medium">Medium level</option>
                    <option value="high">High level</option>
                </select>
                @error('house_level')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="number_of_son" class="col-12 col-form-label">Number of sons</label>
            <div class="col-12">
                <input value="{{ old('number_of_son') }}" id="number_of_son" name="number_of_son"
                    placeholder="Enter number_of_son" class="form-control  @error('number_of_son') is-invalid @enderror"
                    type="number">
                @error('number_of_son')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="number_of_daughter" class="col-12 col-form-label">Number of daughters</label>
            <div class="col-12">
                <input value="{{ old('number_of_daughter') }}" id="number_of_daughter" name="number_of_daughter"
                    placeholder="Enter number_of_daughter"
                    class="form-control  @error('number_of_daughter') is-invalid @enderror" type="number">
                @error('number_of_daughter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        {{-- <div class="form-group row">
            <label for="region_id" class="col-12 col-form-label">{{ __('Region') }}</label>

        <div class="col-12">
            <select id="region_id" name="region_id" class="form-control @error('region_id') is-invalid @enderror"
                name="region_id">
                <option value="">*** SELECT ***</option>
                @foreach (App\Models\Region::all() as $region)
                <option value="{{ $region->id }}">{{ $region->name }}</option>

                @endforeach
            </select>

            @error('region_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
</div> --}}
<div class="form-group row">
    <label for="zone" class="col-12 col-form-label">Zone</label>
    <div class="col-12">
        <input value="{{ old('zone') }}" id="zone" name="zone" placeholder="Enter zone"
            class="form-control  @error('zone') is-invalid @enderror" type="text">
        @error('zone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="wereda" class="col-12 col-form-label">Wereda</label>
    <div class="col-12">
        <input value="{{ old('wereda') }}" id="wereda" name="wereda" placeholder="Enter wereda"
            class="form-control  @error('wereda') is-invalid @enderror" type="text">
        @error('wereda')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="town" class="col-12 col-form-label">Town</label>
    <div class="col-12">
        <input value="{{ old('town') }}" id="town" name="town" placeholder="Enter town"
            class="form-control  @error('town') is-invalid @enderror" type="text">
        @error('town')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="kebele" class="col-12 col-form-label">Kebele</label>
    <div class="col-12">
        <input value="{{ old('kebele') }}" id="kebele" name="kebele" placeholder="Enter kebele"
            class="form-control  @error('kebele') is-invalid @enderror" type="text">
        @error('kebele')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-12">
        <button name="submit" type="submit" class="btn btn-primary">Create House</button>
    </div>
</div>
</form>
</div>
@endsection
