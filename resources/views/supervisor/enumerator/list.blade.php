@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Enumerators</h1>
        <a href="/generate-report" class="btn btn-link btn-sm">Generate Report</a>
    </div>
    <div class="col-md-12 p-0 mb-2">
        <form action="/enumerator-report" method="get">
            <div class="input-group">
                <input name="enumerator_email" type="text" class="form-control" placeholder="Enumerator email"
                    aria-label="Enumerator email" aria-describedby="basic-addon2"
                    value="{{ old('searchEnumeratorEmail') ?? $searchEnumeratorEmail }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Search Enumerator</button>
                </div>
            </div>
        </form>
    </div>
    @if(count($enumerators) > 0)
    @foreach($enumerators as $enumerator)
    <div class="card my-1">
        <div class="card-body d-flex align-items-center">
            <div class="col-md-12 flex-column">
                <p class="h5 font-weight-bold">Name: {{ $enumerator->name }}</p>
                <div class="d-flex">
                    <div class="col-md-4 d-flex flex-column">
                        <small class="text-muted">Email: {{ $enumerator->email }}</small>
                        <small class="text-muted">Region: {{ $enumerator->region->name }}</small>
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <small class="text-muted">Total house: {{ $enumerator->houses->count() }}</small>
                        {{-- <small class="text-muted">Total Mmemebers: {{ $enumerator->members->count() }}</small> --}}
                    </div>
                    <div class="col-md-4 d-flex flex-column">
                        <small>Created at {{$enumerator->created_at}} ({{$enumerator->created_at->diffForHumans()}})<br>
                    </div>
                </div>
            </div>
            {{-- <div class="flex-column">
                <a href="/enumerator-report/{{ $enumerator->id }}" class="btn btn-link btn-md w-100 my-1">Show All
            Persons</a>
        </div> --}}
    </div>
</div>

@endforeach
{{$enumerators->links()}}
@else
<p>No enumerators found</p>
@endif
</div>
@endsection
