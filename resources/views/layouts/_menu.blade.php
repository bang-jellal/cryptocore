<li class="{{ $class_mobile ?? '' }} {{ active(['home'], 'sale-noti') }}">
    <a href="{{ route('home') }}">Home</a>
</li>
<li class="{{ $class_mobile ?? '' }} {{ active(['category'], 'sale-noti') }}">
    <a href="{{ route('category') }}">Category</a>
</li>
<li class="{{ $class_mobile ?? '' }} {{ active(['product'], 'sale-noti') }}">
    <a href="{{ route('product') }}">Product</a>
</li>
<li class="{{ $class_mobile ?? '' }} {{ active(['brand'], 'sale-noti') }}">
    <a href="{{ route('brand') }}">Brand</a>
</li>