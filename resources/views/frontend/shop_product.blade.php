<div class="sn-home-products d-flex flex-wrap mt-5" id="product_space">
@foreach($products as $product)
<a href="{{url('/product/1')}}" class="mb-4">
    <img src="{{$product->photo}}" alt="">
    <span class="sn-category my-2"></span>
    <h3 class="sn-product-title">{{$product->name}}</h3>
    <span class="sn-price">{{$product->price}} Ks</span>
</a>
@endforeach
{!! $products->links() !!}
</div>

