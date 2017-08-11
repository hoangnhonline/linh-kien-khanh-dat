@section('content')
@include('frontend.partials.meta')
<article class="block block-breadcrumb">
	<ul class="breadcrumb">	
		<li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>
		
		<li><a href="{{ route('danh-muc', $rsLoai->slug) }}" title="{{ $rsLoai->name }}">{{ $rsLoai->name }}</a></li>
		
		@if(!empty((array) $rsCate))
		<li> <a href="{{ route('danh-muc-con', [$rsLoai->slug, $rsCate->slug]) }}" title="{{ $rsCate->name }}">{{ $rsCate->name }}</a>    </li>
		@endif
		<li class="active">{{ $detail->name }}</li>
	</ul>
</article><!-- /block-breadcrumb -->

<section class="block-content">
	<div class="row">
		<div class="col-md-9 col-sm-8 col-xs-12 page-pl0">
			<div class="block-left">
				<div class="product">
					<div class="primary-box row">
						<div class="pb-left-column col-sm-6">
							<div class="product-image">
	                            <div class="bxslider product-img-gallery">
	                            	@foreach( $hinhArr as $hinh )
	                                <div class="item">
	                                    <img src="{{ Helper::showImage($hinh['image_url']) }}" alt="#" />
	                                </div>
	                                @endforeach	                                
	                            </div>
	                            <div class="product-img-thumb">
	                                <div id="gallery_01" class="pro-thumb-img">
	                                	<?php $i = -1; ?>
		                                @foreach( $hinhArr as $hinh )
		                                <?php $i++; ?>
	                                    <div class="item">
	                                        <a href="#" data-slide-index="{{ $i }}">
	                                            <img src="{{ Helper::showImage($hinh['image_url']) }}" alt="#" />
	                                        </a>
	                                    </div>	    
	                                    @endforeach                                
	                                </div>
	                            </div>
							</div>
						</div>
						<div class="pb-right-column col-sm-6">
							<h1 class="product-name">{{ $detail->name }}</h1>
							<div class="rowprice">
								
                                  <strong>
                                  	@if(is_numeric($detail->price))
					                	{!! number_format($detail->price) !!}
					              	@else
					                	{!! $detail->price !!}
					              	@endif
                                  </strong>
                                                             
							</div>						
								            
						</div>
					</div>
				</div><!-- /block-page-news -->
			</div><!-- /block-left -->
			@if($detail->content)
			<div class="block-left">
				<div class="block-details-info">
					<p class="block-page-name">Thông tin chi tiết</p>
					<?php echo ($detail->content); ?>					
					
				</div>
			</div>
			@endif
		</div><!-- /col-md-9 col-sm-8 col-xs-12 page-pl0 -->

		<div class="col-md-3 col-sm-4 col-xs-12">
			@if( $otherList->count() > 0)
			<div class="block-right">
				<div class="block-cate">
					<p class="block-cate-title text-center">Sản phẩm liên quan</p>
					<div class="block-productrelate">
						<div class="products">
							@foreach( $otherList as $product)						
							<div class="item">
								<div class="pro-thumb">
									<a href="{{ route('chi-tiet', [ $product->slug_loai, $product->slug, $product->id] ) }}" title="{!! $product->name !!}">
										<img src="{{ Helper::showImage( $product->image_url) }}" alt="{{ $product->name }}">
									</a>
								</div>
								<div class="pro-info">
									<h2 class="pro-title"><a href="{{ route('chi-tiet', [ $product->slug_loai, $product->slug, $product->id] ) }}" title="{!! $product->name !!}">{!! $product->name !!}</a></h2>
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
							</div><!-- /item -->				
							@endforeach		
						</div>
					</div>
				</div>
			</div><!-- /block-right -->
			@endif
		</div><!-- /col-md-3 col-sm-4 col-xs-12 -->
	</div>
</section><!-- /block-content -->
@endsection
@section('javascript_page')
<script src="{{ URL::asset('assets/vendor/zoom/jquery.zoom.min.js') }}"></script>
<!-- Js bxslider -->
<script src="{{ URL::asset('assets/vendor/bx-slider/jquery.bxslider.min.js') }}"></script>
<!-- Countdown -->
<script src="{{ URL::asset('assets/vendor/countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/updown.js') }}"></script>
<script type="text/javascript">
 $(document).ready(function () {
    $('.bxslider .item').each(function () {
        $(this).zoom();
    });

    $(".bxslider").bxSlider({
    	controls: false,
        pagerCustom: '.pro-thumb-img',
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });

    $(".pro-thumb-img").bxSlider({
        slideMargin: 20,
        maxSlides: 4,
        pager: false,
        controls: true,
        slideWidth: 80,
        infiniteLoop: false,
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });    
});

</script>
@endsection