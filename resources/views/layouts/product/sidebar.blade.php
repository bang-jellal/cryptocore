<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
    <div class="leftbar p-r-20 p-r-0-sm">
        <h4 class="m-text14 p-b-7">Categories</h4>
        <ul class="p-b-54">
            <li class="p-t-4">
                <a href="#" class="s-text13 active1">
                    All
                </a>
            </li>
            @foreach ($categories as $category)
            <li class="p-t-4">
                <a href="#" class="s-text13">
                   {{ $category->name }}
                </a>
            </li>
            @endforeach
        </ul>

        <h4 class="m-text14 p-b-32">Search</h4>
        <div class="search-product pos-relative bo4 of-hidden">
            <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>