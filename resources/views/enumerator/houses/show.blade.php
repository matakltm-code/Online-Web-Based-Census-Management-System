@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1>House Number - {{ $house->house_number }}</h1>
        <a href="/houses" class="btn btn-link btn-sm">Back</a>
    </div>

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
                    {{$house->user->name}}</small>

            </div>
            <div class="flex-column">
                <div><small>Total alive memebers: {{$house->members->count()}}</small></div>
                <div><small>Total deceased memebers: {{$house->deceased->count()}}</small></div>
            </div>
        </div>
    </div>

    @if ($house->members->count() > 0)
    <div class="col-md-12 p-0 mt-2">
        <p class="h6 font-weight-bold">Alive Persons</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Kebele Id Number</th>

                    <th scope="col">Detail 1</th>
                    <th scope="col">Detail 2</th>

                    <th scope="col">Previous</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($house->members as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->kebele_id_number }}</td>
                    <td>
                        Birth Date: {{ $person->birth_date }} ({{ $person->getAge($person->birth_date) }} Year) <br>
                        Sex: {{ $person->sex }} <br>
                        Orphan: {{ $person->is_orphan }} <br>
                        Religion: {{ $person->religion->name }}
                    </td>

                    <td>
                        Language: {{ $person->mother_tongue_language_id }} <br>
                        Disable: {{ $person->is_disable }} <br>
                        Literate: {{ $person->is_literate }} <br>
                        Education: {{ $person->education_level_id }} <br>
                        Have Income: {{ $person->have_income }} <br>
                        Martial: {{ $person->marital_status }}
                    </td>
                    <td>
                        Migrant: {{ $person->is_migrant }} <br>
                        {{-- Check using keyword 'Yes' because true changed in memeber model to Yes using laravel Accessor Method --}}
                        @if ($person->is_migrant == 'Yes')
                        Previous region: {{ $person->p_region->name }} <br>
                        Previous Zone: {{ $person->p_zone }} <br>
                        Previous Wereda: {{ $person->p_wereda }} <br>
                        Previous Town: {{ $person->p_town }} <br>
                        Previous Kebele: {{ $person->p_kebele }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if ($house->deceased->count() > 0)
    <div class="col-md-12 p-0 mt-2">
        <p class="h6 font-weight-bold">Deceased Persons</p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Sex</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Date of Death</th>
                    <th scope="col">Alive Age Year</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($house->deceased as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->sex }}</td>
                    <td>{{ $person->date_of_birth }}</td>
                    <td>{{ $person->date_of_death }}</td>
                    <td>{{ $person->getAliveAge($person->date_of_death, $person->date_of_birth) }} Years</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

</div>
@endsection
