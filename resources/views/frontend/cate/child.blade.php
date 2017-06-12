@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<section class="block-content">
	<div class="block-common block-sale-products">
		<p class="block-page-name">{!! $rs->name !!} / {!! $rsCate->name !!}</p>
		<div class="products">
			<ul class="row">
				@foreach( $productList as $product )
				<li class="col-md-2 col-sm-4 col-xs-4">
					<div class="item">
						<!--<p class="trapezoid">-18%</p>-->
						<div class="pro-thumb">
							<a href="{{ route('chi-tiet', [ $product->slug_loai, $product->slug, $product->id] ) }}" title="{!! $product->name !!}">
								<img src="{{ Helper::showImage($product->image_url) }}" alt="{!! $product->name !!}">
							</a>
						</div>
						<div class="pro-info">
							<h2 class="pro-title" style="max-height:144px; overflow-y:hidden"><a href="{{ route('chi-tiet', [$product->slug_loai, $product->slug, $product->id] ) }}" title="{!! $product->name !!}">{!! $product->name !!}</a></h2>
							<div class="price-products">
								<p class="pro-price">
									@if(is_numeric($product->price))
					                	{!! number_format($product->price) !!}
					              	@else
					                	{!! $product->price !!}
					              	@endif
								</p>
								<!-- <p class="pro-sale"><del>7,940,000đ</del></p> -->
							</div>							
						</div>
					</div><!-- /item -->
				</li><!-- /col-sm-2 col-xs-6 -->	
				@endforeach			
			</ul>
		</div><!-- /products -->
		<!---<div class="sortPagiBar">
            <div class="bottom-pagination">
                <nav>
                  
                </nav>
            </div>                    
        </div>-->
	</div><!-- /block-common -->
</section>
@endsection