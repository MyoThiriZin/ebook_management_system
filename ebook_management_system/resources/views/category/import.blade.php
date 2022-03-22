@extends('layouts.master')
@section('content')
<div class="form-sec">
    <h2 class="form-title">Import Category Data</h2>
    <form action="{{ url('/category/import') }}" method="POST" enctype="multipart/form-data" class="clearfix form">
      @csrf
        <div class="clearfix">
            <label for="" class="form-label">Choose csv file</label>
            <input type="file" name="file" class="name" accept=".csv">
            @if ($errors->has('file'))
            <small class="text-danger">*{{ $errors->first('file') }}</small>
            @endif
        </div>
        <input type="submit" value="Import CSV" class="create-btn">
        <input type="button" value="Cancel" class="back-btn" onclick="window.location='{{ URL::to('categories') }}'"/>
    </form>
</div>
@endsection
