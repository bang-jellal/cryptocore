@extends('layouts.app')

@section('content')
    <!-- Title Page -->
    <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(/template/fashe/images/slide-1.jpg);">
    <h2 class="l-text2 t-center">
        Product
    </h2>
    <p class="m-text13 t-center">
        All Product 2018
    </p>
    </section>
  
    <!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
                @include('product.sidebar_product')
                
                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>
								</select>
							</div>

							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Price</option>
									<option>$0.00 - $50.00</option>
									<option>$50.00 - $100.00</option>
									<option>$100.00 - $150.00</option>
									<option>$150.00 - $200.00</option>
									<option>$200.00+</option>

								</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–12 of 16 results
						</span>
					</div>

					<!-- Product -->
					<div class="row">
                        @foreach ($products as $product)
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                        <img src="{{ $product->imageUrl }}" alt="{{ $product->name }}">
                                        <div class="block2-overlay trans-0-4">
                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                            </a>
                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
                                                <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block2-txt p-t-20">
                                        <a href="{{ route('product.show', $product) }}" class="block2-name dis-block s-text3 p-b-5">
                                            {{ $product->name }}
                                        </a>
                                        <span class="block2-price m-text6 p-r-5">
                                            {{ $product->price }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection