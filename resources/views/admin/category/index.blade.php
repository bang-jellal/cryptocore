
@extends('layouts.admin.app')

@section('content')

    <section class="content-header">
        <h1>Management Category</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.category.index') }}">Management Category</a></li>
            <li class="active">List Data Category</li>
        </ol>
    </section>

    @if (session('alert'))
        <div class="pad margin no-print">
            <div class="callout callout-{{ session('alert')['alert'] }}" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-{{ session('alert')['alert'] }}"></i> Note:</h4>
                {{ session('alert')['message'] }}
            </div>
        </div>
    @endif

    <section class="content">
        <div class="box box-primary color-palette-box">
            <div class="box-header with-border">
                <h1 class="box-title"><i class="fa fa-list-ul"></i> List Data Category</h1>
            </div>

            <div class="box-body">
                <div class="row">
                   <div class="col-md-12">
                       <table id="category_table" class="table table-bordered table-hover">
                           <thead>
                           <tr>
                               <th>Category Name</th>
                               <th width="20%">Action</th>
                           </tr>
                           </thead>
                       </table>
                   </div>
                </div>
            </div>
            <div class="box-footer">
                <a href="{{ route('admin.category.create') }}" type="button" class="btn btn-primary btn-flat">Add Data Category</a>
                <a href="{{ route('admin.dashboard.index') }}" type="button" class="btn btn-default btn-flat pull-right ">Home</a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('/template/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/template/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function() {
            $('#category_table').DataTable({
                paging      : true,
                lengthChange: true,
                ordering    : true,
                info        : true,
                autoWidth   : false,
                processing  : true,
                serverSide  : false,
                search      : true,
                ajax: '{!! route('admin.data_table.category') !!}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush
