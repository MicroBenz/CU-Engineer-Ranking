@extends('dashboard.master-dashboard')

@section('title')
    Upload Subject Info CSV
@stop

@section('dashboard-title')
    Upload Subject Info CSV
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="{{url().'/admin/upload-csv'}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile" name="file">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@stop
