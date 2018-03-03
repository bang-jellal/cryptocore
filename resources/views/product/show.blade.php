@extends('layouts.app')

@section('content')
    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(/template/fashe/images/slide-1.jpg);">
        <h3 class="m-text9 t-center">
            Product Detail
        </h3>
        <p class="m-text13 t-center">
            {{ $product->name }}
        </p>
    </section>

    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
        <a href="index.html" class="s-text16">
            Home
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <a href="{{ route('brand.show', $product->brand) }}" class="s-text16">
            {{ $product->brand->name }}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <a href="{{ route('category.show', $product->subCategory->category) }}" class="s-text16">
            {{ $product->subCategory->category->name }}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>
        <span class="s-text17">
			{{ $product->subCategory->name }}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</span>
        <span class="s-text17">
			{{ $product->name }}
		</span>
    </div>

    <div class="container bgwhite p-t-35">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>
                    <div class="slick3">
                        <div class="item-slick3" data-thumb="{{ $product->imageUrl }}">
                            <div class="wrap-pic-w">
                                <img src="{{ $product->imageUrl }}" alt="IMG-PRODUCT">
                            </div>
                        </div>

                        <div class="item-slick3" data-thumb="{{ asset('template/fashe/images/product-detail-01.jpg') }}">
                            <div class="wrap-pic-w">
                                <img src="{{ asset('template/fashe/images/product-detail-01.jpg') }}" alt="IMG-PRODUCT">
                            </div>
                        </div>

                        <div class="item-slick3" data-thumb="{{ asset('template/fashe/images/product-detail-02.jpg') }}">
                            <div class="wrap-pic-w">
                                <img src="{{ asset('template/fashe/images/product-detail-02.jpg') }}" alt="IMG-PRODUCT">
                            </div>
                        </div>

                        <div class="item-slick3" data-thumb="{{ asset('template/fashe/images/product-detail-03.jpg') }}">
                            <div class="wrap-pic-w">
                                <img src="{{ asset('template/fashe/images/product-detail-03.jpg') }}" alt="IMG-PRODUCT">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-text16 p-b-13">
                    {{ $product->name }}
                </h4>

                <span class="m-text17">
                    {{ $product->price }}
				</span>

                <div class="p-t-33 p-b-60">
                    <div class="flex-r-m flex-w p-t-10">
                        <div class="w-size16 flex-m flex-w">
                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="num-product" value="1">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                <!-- Button -->
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Description
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.product.featured')
@endsection