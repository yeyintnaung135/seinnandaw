<div class="sn-home-products d-flex flex-wrap mt-5" id="product_space">
@foreach($data as $d)
  <a href="{{url('/product/detail/'.$d->id)}}" class="mb-4 position-relative">
    @if (isset($d->discount->discount_price))
      <div class="sn-sale-badge">Sale!</div>
    @endif
    <img src="{{ url($d->photo) }}" alt="">
    @php
    $cat = \App\Categories::where('id', $d->category_id)->first();
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
    <span class="sn-category my-2"></span>
    <h3 class="sn-product-title">{{$d->name}}</h3>
    <span class="sn-price">{{$d->price}} Ks</span>
  </a>
@endforeach
{!! $data->links() !!}
</div>
