{{ csrf_field() }}

<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('name'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Product Name
        </label>
        <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name"
               value="{{ old('name', $product->name ?? '') }}">
        @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <label>
            @if ($errors->has('brand_id'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Brand Name
        </label>

        <select name="brand_id" class="form-control {{ $errors->has('brand_id') ? ' has-error' : '' }}">
            <option> -- Select Brand -- </option>
            @foreach($brands as $key => $brand)
                <option value="{{ $key }}" @if (!empty($product)) {{ $product->brand_id === $key ? 'selected' : '' }} @endif
                        {{ (old('brand_id') == $key ? 'selected' : '') }}>{{ $brand }}</option>
            @endforeach
        </select>


        @if ($errors->has('brand_id'))
            <span class="help-block">{{ $errors->first('brand_id') }}</span>
        @endif

    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group {{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <label>
            @if ($errors->has('sub_category_id'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Sub Category
        </label>

        <select name="sub_category_id" class="form-control {{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
            <option> -- Select Sub Category -- </option>
            @foreach($sub_categories as $key => $sub_category)
                <option value="{{ $key }}" @if (!empty($product)) {{ $product->sub_category_id === $key ? 'selected' : '' }} @endif
                        {{ (old('sub_category_id') == $key ? 'selected' : '') }}>{{ $sub_category }}</option>
            @endforeach
        </select>


        @if ($errors->has('sub_category_id'))
            <span class="help-block">{{ $errors->first('sub_category_id') }}</span>
        @endif

    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('price'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Price
        </label>
        <input class="form-control" id="price" placeholder="Enter Price" name="price"
               value="{{ old('price', $product->price ?? '') }}">
        @if ($errors->has('price'))
            <span class="help-block">{{ $errors->first('price') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('description'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Description
        </label>

        <textarea type="text" class="form-control" id="description" placeholder="Enter Description" rows="4"
                  name="description">{{ old('description',$product->description ?? '') }}</textarea>

        @if ($errors->has('description'))
            <span class="help-block">{{ $errors->first('description') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>


<div class="form-group" {{ $errors->has('published') ? ' has-error' : '' }}>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('published'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Published
        </label>
        <select name="published" class="form-control">
            <option value="0" @if (!empty($product)) {{ $product->published === false ? 'selected' : '' }} @endif
                    {{ (old('published') == false ? 'selected' : '') }}>Draft</option>
            <option value="1" @if (!empty($product)) {{ $product->published === true ? 'selected' : '' }} @endif
                    {{ (old('published') == true ? 'selected' : '') }}>Published</option>
        </select>

        @if ($errors->has('published'))
            <span class="help-block">{{ $errors->first('published') }}</span>
        @endif
    </div>
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

        <img src="{{ asset('product_image/'.$product->image) ?? ''}}" class="img-responsive" id="profile-img-tag" alt="Photo" width="200px"
             style="display: {{ $product->image ? 'block': 'none' ?? 'none'}}"><br>
        <input type="file" class="form-control" id="image" placeholder="Enter Image"
               name="image" {{ !empty($product) ? empty($product->image) ? '' : 'disabled' : '' }}>

        @if ($errors->has('image'))
            <span class="help-block">{{ $errors->first('image') }}</span>
        @endif

    </div>
    <div class="col-md-2"></div>
</div>

@push('scripts')
    <script>
        $('#price').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 2,
            autoGroup: true,
            prefix: '$ ',
            rightAlign: false,
            oncleared: function () { self.Value(''); }
        });

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
            var e = $('#profile-img-tag');
            e.attr('src','').hide()
        }

        $("#image").change(function (event, files, label) {
            var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '');
            if (file_name) {
                readURL(this);
            } else {
                removeImage()
            }
        });
    </script>
@endpush

