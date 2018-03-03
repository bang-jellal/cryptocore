@extends('layouts.app')

@section('content')
    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(/template/fashe/images/slide-1.jpg);">
    <h3 class="m-text9 t-center">
        List of Brand
    </h3>
    <p class="m-text13 t-center">
        All Brand
    </p>
    </section>
  
    <!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
                @include('layouts.product.sidebar')
                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
                            <div class="search-product pos-relative bo4 of-hidden">
                                <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">
                                <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                                    <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
						<span class="s-text8 p-t-5 p-b-5">
							Showing {{ $brands->firstItem() }}–{{ $brands->lastItem() }} of {{ $brands->total() }} results
						</span>
					</div>

					<!-- Product -->
					<div class="row">
                        @foreach ($brands as $brand)
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                        <img src="{{ $brand->imageUrl }}" alt="{{ $brand->name }}"
                                             style="height: 339px;">
                                        <div class="block2-overlay trans-0-4">
                                            <div class="block2-btn-addcart w-size1 trans-0-4"></div>
                                        </div>
                                    </div>
                                    <div class="block2-txt p-t-20">
                                        <a href="{{ route('brand.show', $brand) }}"
                                           class="block2-name dis-block s-text3 p-b-5"
                                           style="text-align: center">
                                            {{ $brand->name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
					</div>
				{{ $brands->links('layouts.pagination') }}
				</div>
			</div>
		</div>
	</section>
@endsection