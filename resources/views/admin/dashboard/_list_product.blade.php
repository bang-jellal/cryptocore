<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Recently Added Products</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <ul class="products-list product-list-in-box">
            @foreach ($products as $key => $product)
                <li class="item">
                    <div class="product-img">
                        <img src="{{ $product->imageUrl }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-info">
                        <a href="{{ route('admin.product.show', $product) }}" class="product-title">{{ $product->name }}
                            <span class="label label-success pull-right">{{ $product->price }}</span>
                        </a>
                        <span class="product-description">{{ $product->description }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="box-footer text-center">
        <a href="{{ route('admin.product.index') }}" class="uppercase">View All Products</a>
    </div>
</div>