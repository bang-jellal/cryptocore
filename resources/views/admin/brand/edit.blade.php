
@extends('layouts.admin.app')

@section('content')

    <section class="content-header">
        <h1>Management Brand</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.brand.index') }}">Management Brand</a></li>
            <li class="active">Update Data Brand</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-primary color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title">Update Data Brand</h3>
            </div>
            <form role="form" class="form-horizontal" method="POST" action="{{ route('admin.brand.update', $brand) }}"
                  enctype="multipart/form-data">
                <div class="box-body">
                    <div class="col-md-12">
                        {{ method_field('PUT') }}
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

