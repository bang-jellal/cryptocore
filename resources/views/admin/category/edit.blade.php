
@extends('layouts.admin.app')

@section('content')

    <section class="content-header">
        <h1>Management Category</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.category.index') }}">Management Category</a></li>
            <li class="active">Update Data Category</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-primary color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title">Update Data Category</h3>
            </div>
            <form role="form" class="form-horizontal" method="POST" action="{{ route('admin.category.update', $category) }}">
                <div class="box-body">
                    <div class="col-md-12">
                        {{ method_field('PUT') }}
                        @include('admin.category._form')
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

