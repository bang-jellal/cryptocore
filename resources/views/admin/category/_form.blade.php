{{ csrf_field() }}

<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('name'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Category Name
        </label>
        <input type="text" class="form-control" id="name" placeholder="Enter Category Name" name="name"
               value="{{ old('name', $category->name ?? '') }}">
        @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('image'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Main Image
        </label>

        <img src="{{ !empty($category) ? $category->image ? $category->imageUrl : '' : '' }}"
             class="img-responsive" id="profile-img-tag" alt="Photo" width="200px"
             style="display: {{ !empty($category) ? $category->image ? 'block': 'none' : 'none' }}"><br>

        <input type="hidden" name="old_image" id="old_image" value="1">
        <button type="button" class="btn btn-default" id="btn_remove"
                style="display: {{ !empty($category) ?$category->image ? 'block': 'none' : 'none'}}"
                onclick="removeImage()">
            Remove Image
        </button><br>

        <input type="file" class="form-control" id="image" placeholder="Enter Image"
               name="image" {{ !empty($category) ? empty($category->image) ? '' : 'disabled' : '' }}>

        @if ($errors->has('image'))
            <span class="help-block">{{ $errors->first('image') }}</span>
        @endif

    </div>
    <div class="col-md-2"></div>
</div>

@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage() {
            $('#profile-img-tag').attr('src','').hide();
            $('#old_image').val(0);
            $('#btn_remove').hide();
            $('#image').removeAttr('disabled');
        }

        $("#image").change(function () {
            var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '');
            if (file_name)
                readURL(this);
            else
                removeImage()
        });
    </script>
@endpush