<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
    <div class="leftbar p-r-20 p-r-0-sm">
        <h4 class="m-text14 p-b-7">Categories</h4>
        <ul class="p-b-54">
            @foreach ($categories as $category)
            <li class="p-t-4">
                <a href="{{ route('category.show', $category) }}"
                   class="s-text13 @if (!empty(request()->route('category')))
                   {{ request()->route('category')->id === $category->id ? 'active1' : '' }} @endif ">
                    {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>
        <h4 class="m-text14 p-b-7">Brand</h4>
        <ul class="p-b-54">
            @foreach ($brands as $brand)
                <li class="p-t-4">
                    <a href="{{ route('brand.show', $brand) }}"
                       class="s-text13 @if (!empty(request()->route('brand')))
                       {{ request()->route('brand')->id === $brand->id ? 'active1' : '' }} @endif ">
                        {{ $brand->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>