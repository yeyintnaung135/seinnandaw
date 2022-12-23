{{-- <div class="sn-home-products d-flex flex-wrap mt-5" id="product_space"> --}}
@foreach($products as $product)
<a href="{{url('/product/detail/'.$product->id)}}" class="mb-4 position-relative">
  @if (isset($product->discount->discount_price))
    <div class="sn-sale-badge">Sale!</div>
  @endif
    <img src="{{$product->photo}}" alt="">
    @php
    $cat = \App\Categories::where('id', $product->category_id)->first();
    @endphp
        @if (!empty($cat))
        <span class="sn-category my-2">
            {{strtoupper($cat->name)}}
        </span>
        @else
        <span class="sn-category my-2">
          Uncategorized
        </span>
        @endif
    <h3 class="sn-product-title">{{$product->name}}</h3>
    <span class="sn-price">{{$product->price}} Ks</span>
</a>
@endforeach
{!! $products->links() !!}
{{-- </div> --}}

