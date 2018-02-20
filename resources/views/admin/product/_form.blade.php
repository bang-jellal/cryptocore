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

<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <label>
            @if ($errors->has('price'))
                <i class="fa fa-times-circle-o"></i>
            @endif
            Price
        </label>
        <input type="number" class="form-control" id="name" placeholder="Enter Price" name="price"
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
                  name="description">{{ old('description', $product->price ?? '') }}</textarea>

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
            <option value="0" {{ old('published', $product->published ?? false) === false ? 'selected' : '' }}>Draft</option>
            <option value="1" {{ old('published', $product->published ?? false) === true ? 'selected' : '' }}>Published</option>
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
        <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image">
        @if ($errors->has('image'))
            <span class="help-block">{{ $errors->first('image') }}</span>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>

