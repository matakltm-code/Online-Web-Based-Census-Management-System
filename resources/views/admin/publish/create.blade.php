@extends('layouts.app')

@section('content')
<div class="container">

    <h1>New 10 yrs Report</h1>
    <form action="/publish" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="editor" class="col-12 col-form-label">Note</label>
            <div class="col-12">
                <textarea name="note" class="editor" rows="10" value="{!! old('note') !!}"></textarea>
            </div>
            @error('note')
            <span class="text-danger pl-3" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>



        <div class="form-group row">
            <div class="col-12">
                <button name="submit" type="submit" class="btn btn-primary">Publish</button>
            </div>
        </div>
    </form>
</div>
@endsection
