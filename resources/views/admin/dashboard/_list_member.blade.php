<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Latest Members</h3>

        <div class="box-tools pull-right">
            <span class="label label-danger">8 New Members</span>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
            </button>
        </div>
    </div>
    <div class="box-body no-padding">
        <ul class="users-list clearfix">
            @foreach ($users as $key => $user)
                <li>
                    <img src="{{ asset('/template/adminlte/dist/img/user'.rand(1,8).'-128x128.jpg') }}" alt="User Image">
                    <a class="users-list-name" href="{{ route('admin.user.show', $user) }}">{{ $user->name }}</a>
                    <span class="users-list-date">{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="box-footer text-center">
        <a href="{{ route('admin.user.index') }}" class="uppercase">View All Users</a>
    </div>
</div>