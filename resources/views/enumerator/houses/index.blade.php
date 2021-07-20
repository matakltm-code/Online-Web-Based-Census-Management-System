@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Houses</h1>
        <a href="/houses/create" class="btn btn-link btn-sm">Create new house</a>
    </div>
    @if(count($houses) > 0)
    <div class="col-md-12 p-0 mb-2">
        <form action="/houses" method="get">
            <div class="input-group">
                <input name="house_number" type="text" class="form-control" placeholder="House number"
                    aria-label="House number" aria-describedby="basic-addon2"
                    value="{{ old('searchHouseNumber') ?? $searchHouseNumber }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Search House</button>
                </div>
            </div>
        </form>
    </div>
    @foreach($houses as $house)
    <div class="card my-1">
        <div class="card-body d-flex align-items-center">
            <div class="col-md-9 flex-column">
                <p class="h5 font-weight-bold">House Number {{ $house->house_number }}</p>
                <div class="d-flex">
                    <div class="col-md-4 d-flex flex-column">
                        <small class="text-muted">House number: {{ $house->house_number }}</small>
                        <small class="text-muted">Number of rooms: {{ $house->number_of_room }}</small>
                        <small class="text-muted">House level: {{ $house->house_level }}</small>
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <small class="text-muted">Number of sons: {{ $house->number_of_son }}</small>
                        <small class="text-muted">Number of doughters: {{ $house->number_of_daughter }}</small>
                        <small class="text-muted">Region: {{ $house->region->name }}</small>
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <small class="text-muted">Zone: {{ $house->zone }}</small>
                        <small class="text-muted">Wereda: {{ $house->wereda }}</small>
                        <small class="text-muted">Kebele: {{ $house->kebele }}</small>
                    </div>
                </div>
                <small>Created at {{$house->created_at}} ({{$house->created_at->diffForHumans()}}) by
                    {{$house->user->name}}</small><br>
                <small>Total alive memebers: {{$house->members->count()}}</small>
                <br>
                <small>Total deceased memebers: {{$house->deceased->count()}}</small>
            </div>
            <div class="flex-column">
                <a href="/houses/{{$house->id}}/add-memeber/alive" class="btn btn-link btn-md w-100 my-1">Add Alive
                    Memeber</a>
                <a href="/houses/{{$house->id}}/add-memeber/deceased" class="btn btn-link btn-md w-100 my-1">Add
                    Deceased Memeber</a>
                <a href="/houses/{{ $house->id }}" class="btn btn-link btn-md w-100 my-1">Show Detail</a>
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
