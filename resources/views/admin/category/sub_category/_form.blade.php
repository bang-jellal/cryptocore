{{ csrf_field() }}

<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('name'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Sub Category Name
        </label>
        <input type="text" class="form-control" id="name" placeholder="Enter Sub Category Name" name="name"
               value="{{ old('name', $sub_category->name ?? '') }}">
        @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>