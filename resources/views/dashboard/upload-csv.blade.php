@extends('dashboard.master-dashboard')

@section('title')
    Upload CSV
@stop

@section('dashboard-title')
    Upload CSV
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@stop
