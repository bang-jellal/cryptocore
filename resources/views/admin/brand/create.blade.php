
@extends('layouts.admin.app')

@section('content')

    <section class="content-header">
        <h1>Management Brand</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.brand.index') }}">Management Brand</a></li>
            <li class="active">Create Data Brand</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title">Add Data Brand</h3>
            </div>
            <form role="form" class="form-horizontal" method="POST" action="{{ route('admin.brand.store') }}">
                <div class="box-body">
                <div class="col-md-12">
                   @include('admin.brand._form')
                    </div>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.brand.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

