@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h1>Enumerators</h1>
        <a href="/enumerator-report" class="btn btn-link btn-sm">Back</a>
    </div>
    <div class="col-md-12">
        <div class="row">
            {{-- Card 1 - Age --}}
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        Sex Type
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Male {{$total_male}}</li>
                        <li class="list-group-item">Female {{$total_female}}</li>
                        {{-- <li class="list-group-item">Youth</li> --}}
                    </ul>
                </div>
            </div>
            {{-- Card 6 - Orphan --}}
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        Orphan
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Orphan {{ $total_orphan }}</li>
                        <li class="list-group-item">Not Orphan {{ $total_not_orphan }}</li>
                    </ul>
                </div>
            </div>
            {{-- Card 6 - Literacy --}}
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        Literacy
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Literate {{ $total_literate }}</li>
                        <li class="list-group-item">Ilitrate {{ $total_ilitrate }}</li>
                    </ul>
                </div>
            </div>
            {{-- Card 2 - House Level --}}
            <div class="col-md-6 mb-2 d-flex flex-column">
                <div class="card mb-3">
                    <div class="card-header">
                        House Level - ({{$total_house}} Total houses)
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Low {{$low_level}}</li>
                        <li class="list-group-item">Medium {{$medium_level}}</li>
                        <li class="list-group-item">High {{$high_level}}</li>
                    </ul>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Disability
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Disabled {{ $total_disabled }}</li>
                        <li class="list-group-item">Not Disabled {{ $total_not_disabled }}</li>
                    </ul>
                </div>

                <div class="card mb-2">
                    <div class="card-header">
                        Have Income
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Have income {{ $have_income }}</li>
                        <li class="list-group-item">Have not income {{ $have_not_income }}</li>
                    </ul>
                </div>
            </div>

            {{-- Card 3 - Religion --}}
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        Religion
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach (\App\Models\Religion::all() as $religion)
                        <li class="list-group-item">{{ $religion->name }} {{ $religion->members->count() }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Card 4 - Language --}}
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        Language
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach (\App\Models\MotherTongueLanguage::all() as $language)
                        <li class="list-group-item">{{ $language->name }} {{ $language->members->count() }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>


            {{-- Card 7 - Martial Status --}}
            <div class="col-md-6 mb-2 d-flex flex-column">
                <div class="card mb-3">
                    <div class="card-header">
                        Martial Status
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Single {{ $total_single }}</li>
                        <li class="list-group-item">Maried {{ $total_married }}</li>
                        <li class="list-group-item">Separted {{ $total_separated }}</li>
                        <li class="list-group-item">Divorced {{ $total_divorced }}</li>
                        <li class="list-group-item">Windowd {{ $total_widowed }}</li>
                    </ul>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        Education Level
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach (\App\Models\EducationLevel::all() as $education)
                        <li class="list-group-item">{{ $education->name }} {{ $education->members->count() }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="col-md-12 mb-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" colspan="4" class="text-center">With In This</th>
                        </tr>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">2 year</th>
                            <th scope="col">5 year</th>
                            <th scope="col">8 year</th>
                            <th scope="col">10 year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Birth</td>
                            <td>{{ $two_year_birth }}</td>
                            <td>{{ $five_year_birth }}</td>
                            <td>{{ $eight_year_birth }}</td>
                            <td>{{ $ten_year_birth }}</td>
                        </tr>
                        <tr>
                            <td>Death</td>
                            <td>{{ $two_year_death }}</td>
                            <td>{{ $five_year_death }}</td>
                            <td>{{ $eight_year_death }}</td>
                            <td>{{ $ten_year_death }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>




        </div>
    </div>


</div>
@endsection
