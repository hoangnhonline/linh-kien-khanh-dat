@include('frontend.partials.meta')
@section('content')
<section class="block block-products products">
  <div class="block-title">
    <h2 class="title">Sản phẩm mới</h2>   
  </div>
  <div class="block-content">
    <ul class="owl-carousel owl-theme owl-style2" data-autoplay="true" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":6}}'>
      
      @foreach($newList as $product)
      <li class="item">
        <div class="pro-thumb">
          <a href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}" title="{!! $product->name !!}">
            <img src="{{ Helper::showImageThumb($product->image_url) }}" alt="{!! $product->name !!}" data-image-tooltip="{{ Helper::showImage($product->image_url) }}">
          </a>
        </div>
        <div class="pro-info">
          <h2 class="pro-title"><a href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}" title="{!! $product->name !!}">{!! $product->name !!}</a></h2>
          <div class="price-products">
            <p class="pro-price">
              @if(is_numeric($product->price))
                {!! number_format($product->price) !!}
              @else
                {!! $product->price !!}
              @endif
            </p>            
          </div>
        </div>
      </li><!-- /item -->           
      @endforeach
      
    </ul>
  </div>
</section><!-- /block-products products -->
@foreach($loaiSpList as $loaiSp)
@if($productArr[$loaiSp->id]->count() > 0)
<section class="block block-products products">
  <div class="block-title">
    <h2 class="title">{!! $loaiSp->name !!}</h2>
    <a href="{{ route('danh-muc', $loaiSp->slug) }}" title="{!! $loaiSp->name !!}" class="viewmore">Xem {!! $totalArr[$loaiSp->id] !!} sản phẩm <i class="fa fa-angle-right"></i></a>
  </div>
  <div class="block-content">
    <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":6}}'>
      
      @foreach($productArr[$loaiSp->id] as $product)
      <li class="item">
        <div class="pro-thumb">
          <a href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}" title="{!! $product->name !!}">
            <img src="{{ Helper::showImageThumb($product->image_url) }}" alt="{!! $product->name !!}" data-image-tooltip="{{ Helper::showImage($product->image_url) }}">
          </a>
        </div>
        <div class="pro-info">
          <h2 class="pro-title"><a href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id]) }}" title="{!! $product->name !!}">{!! $product->name !!}</a></h2>
          <div class="price-products">
            <p class="pro-price">
              @if(is_numeric($product->price))
                {!! number_format($product->price) !!}
              @else
                {!! $product->price !!}
              @endif
            </p>            
          </div>
        </div>
      </li><!-- /item -->           
      @endforeach
      
    </ul>
  </div>
</section><!-- /block-products products -->
@endif
@endforeach
@endsection