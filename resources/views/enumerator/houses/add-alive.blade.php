@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <h1>Add New Alive Mmemeber</h1>
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
<form action="/houses/add-alive-memeber" method="POST">
    @csrf

    <input type="hidden" name="house_id" value="{{ $house->id }}">

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
        <label for="kebele_id_number" class="col-12 col-form-label">Kebele Id Number</label>
        <div class="col-12">
            <input value="{{ old('kebele_id_number') }}" id="kebele_id_number" name="kebele_id_number"
                placeholder="Enter kebele_id_number"
                class="form-control  @error('kebele_id_number') is-invalid @enderror" type="number">
            @error('kebele_id_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="birth_date" class="col-12 col-form-label">Birth date</label>
        <div class="col-12">
            <input value="{{ old('birth_date') }}" id="birth_date" name="birth_date" placeholder="Enter birth_date"
                class="form-control  @error('birth_date') is-invalid @enderror" type="date">
            @error('birth_date')
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
        <label for="religion_id" class="col-12 col-form-label">{{ __('Religion') }}</label>

        <div class="col-12">
            <select id="religion_id" name="religion_id" class="form-control @error('religion_id') is-invalid @enderror"
                name="religion_id">
                {{-- <option value="">*** SELECT ***</option> --}}
                @foreach (App\Models\Religion::all() as $religion)
                <option value="{{ $religion->id }}">{{ $religion->name }}</option>

                @endforeach
            </select>

            @error('religion_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="mother_tongue_language_id" class="col-12 col-form-label">{{ __('Mother Tongue') }}</label>

        <div class="col-12">
            <select id="mother_tongue_language_id" name="mother_tongue_language_id"
                class="form-control @error('mother_tongue_language_id') is-invalid @enderror"
                name="mother_tongue_language_id">
                {{-- <option value="">*** SELECT ***</option> --}}
                @foreach (App\Models\MotherTongueLanguage::all() as $language)
                <option value="{{ $language->id }}">{{ $language->name }}</option>

                @endforeach
            </select>

            @error('mother_tongue_language_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="is_disable" class="col-12 col-form-label">User is</label>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_disable" id="is_not_disable" value="0"
                    onclick="isDisableFunction()">
                <label class="form-check-label" for="is_not_disable" onclick="isDisableFunction()">
                    Not disabled
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_disable" id="is_disable" value="1"
                    onclick="isDisableFunction()">
                <label class="form-check-label" for="is_disable" onclick="isDisableFunction()">
                    Disabled
                </label>
            </div>
            @error('is_disable')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="form-group row" id="why_is_disable_form" style="display: none;">
        <label for="disability_cause" class="col-12 col-form-label">Disability Cause</label>
        <div class="col-12">
            <input value="{{ old('disability_cause') }}" id="disability_cause" name="disability_cause"
                placeholder="Enter disability_cause"
                class="form-control  @error('disability_cause') is-invalid @enderror" type="text">
            @error('disability_cause')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="is_migrant" class="col-12 col-form-label">User is Migrant</label>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_migrant" id="is_not_migrant" value="0"
                    onclick="isMigrantFunction()">
                <label class="form-check-label" for="is_not_migrant" onclick="isMigrantFunction()">
                    Not Migrant
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_migrant" id="is_migrant" value="1"
                    onclick="isMigrantFunction()">
                <label class="form-check-label" for="is_migrant" onclick="isMigrantFunction()">
                    Migrant
                </label>
            </div>

            @error('is_migrant')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- Aditional migrant form --}}
    <div id="migrant_additional_form" style="display: none;">
        <div class="form-group row">
            <label for="p_region_id" class="col-12 col-form-label">{{ __('Previous Region') }}</label>

            <div class="col-12">
                <select id="p_region_id" name="p_region_id"
                    class="form-control @error('p_region_id') is-invalid @enderror" name="p_region_id">
                    <option value="">*** SELECT ***</option>
                    @foreach (App\Models\Region::all() as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>

                    @endforeach
                </select>

                @error('p_region_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="p_zone" class="col-12 col-form-label">Previous Zone</label>
            <div class="col-12">
                <input value="{{ old('p_zone') }}" id="p_zone" name="p_zone" placeholder="Enter p_zone"
                    class="form-control  @error('p_zone') is-invalid @enderror" type="text">
                @error('p_zone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="p_wereda" class="col-12 col-form-label">Previous Wereda</label>
            <div class="col-12">
                <input value="{{ old('p_wereda') }}" id="p_wereda" name="p_wereda" placeholder="Enter p_wereda"
                    class="form-control  @error('p_wereda') is-invalid @enderror" type="text">
                @error('p_wereda')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="p_town" class="col-12 col-form-label">Previous Town</label>
            <div class="col-12">
                <input value="{{ old('p_town') }}" id="p_town" name="p_town" placeholder="Enter p_town"
                    class="form-control  @error('p_town') is-invalid @enderror" type="text">
                @error('p_town')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="p_kebele" class="col-12 col-form-label">Previous Kebele</label>
            <div class="col-12">
                <input value="{{ old('p_kebele') }}" id="p_kebele" name="p_kebele" placeholder="Enter p_kebele"
                    class="form-control  @error('p_kebele') is-invalid @enderror" type="text">
                @error('p_kebele')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>{{-- ./end of Aditional migrant form --}}

    <div class="form-group row">
        <label for="is_orphan" class="col-12 col-form-label">Is Orphan</label>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_orphan" id="is_not_orphan" value="0">
                <label class="form-check-label" for="is_not_orphan">
                    No
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_orphan" id="is_orphan" value="1">
                <label class="form-check-label" for="is_orphan">
                    Yes
                </label>
            </div>

            @error('is_orphan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="is_literate" class="col-12 col-form-label">User can read and write - Literate</label>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_literate" id="is_not_literate" value="0">
                <label class="form-check-label" for="is_not_literate">
                    No
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="is_literate" id="is_literate" value="1">
                <label class="form-check-label" for="is_literate">
                    Yes
                </label>
            </div>

            @error('is_literate')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="education_level_id" class="col-12 col-form-label">{{ __('Education Level') }}</label>

        <div class="col-12">
            <select id="education_level_id" name="education_level_id"
                class="form-control @error('education_level_id') is-invalid @enderror" name="education_level_id">
                {{-- <option value="">*** SELECT ***</option> --}}
                @foreach (App\Models\EducationLevel::all() as $education)
                <option value="{{ $education->id }}">{{ $education->name }}</option>

                @endforeach
            </select>

            @error('education_level_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="marital_status" class="col-12 col-form-label">{{ __('Marital Status') }}</label>

        <div class="col-12">
            <select id="marital_status" name="marital_status"
                class="form-control @error('marital_status') is-invalid @enderror" name="marital_status">
                <option value="">*** SELECT ***</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="separated">Separated</option>
                <option value="divorced">Divorced</option>
                <option value="widowed">Widowed</option>
            </select>

            @error('marital_status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="have_income" class="col-12 col-form-label">Have an income</label>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="have_income" id="not_have_income" value="0">
                <label class="form-check-label" for="not_have_income">
                    No
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="have_income" id="have_income" value="1">
                <label class="form-check-label" for="have_income">
                    Yes
                </label>
            </div>

            @error('have_income')
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
