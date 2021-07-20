@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h1>Add New Deceased Mmemeber</h1>
        <a href="/houses">Back</a>
    </div>
    {{-- @if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif --}}
<form action="/houses/add-deceased-memeber" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <input type="hidden" name="house_id" value="{{ $house->id }}">
    <input type="hidden" name="region_id" value="{{ auth()->user()->region_id }}">

    <div class="form-group row">
        <label for="name" class="col-12 col-form-label">Full Name</label>
        <div class="col-12">
            <input value="{{ old('name') }}" id="name" name="name" placeholder="Enter name"
                class="form-control  @error('name') is-invalid @enderror" type="text">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="sex" class="col-12 col-form-label">Sex</label>
        <div class="col-12">
            <select id="sex" name="sex" class="form-control @error('sex') is-invalid @enderror" name="sex">
                <option value="F">Female</option>
                <option value="M">Male</option>
            </select>
            @error('sex')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="date_of_birth" class="col-12 col-form-label">Date of Birth</label>
        <div class="col-12">
            <input value="{{ old('date_of_birth') }}" id="date_of_birth" name="date_of_birth"
                placeholder="Enter date_of_birth" class="form-control  @error('date_of_birth') is-invalid @enderror"
                type="date">
            @error('date_of_birth')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="date_of_death" class="col-12 col-form-label">Date of Death</label>
        <div class="col-12">
            <input value="{{ old('date_of_death') }}" id="date_of_death" name="date_of_death"
                placeholder="Enter date_of_death" class="form-control  @error('date_of_death') is-invalid @enderror"
                type="date">
            @error('date_of_death')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <div class="col-12">
            <button name="submit" type="submit" class="btn btn-primary">Add Familly Memeber</button>
        </div>
    </div>
</form>
</div>
@endsection
