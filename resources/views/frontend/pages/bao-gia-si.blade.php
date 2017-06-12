@extends('frontend.layout') 
@include('frontend.partials.meta')
@section('content')
<article class="block block-breadcrumb">
  <ul class="breadcrumb">
    <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>
    <li class="active">Báo giá bán sỉ</li>
  </ul>
</article><!-- /block-breadcrumb -->
<section class="block-content">
	<div class="block-common block-sale-products">
		<p class="block-page-name">Báo giá bán sỉ</p>
		<div class="products" >
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
					    <tr>
					        <th>HÀNG MỚI VỀ - SẢN PHẨM MỚI</th>
					        <th style="text-align:right">SỐ LƯỢNG TRÊN 5</th>
					        <th style="text-align:right">BẢO HÀNH</th>					        
					    </tr>
					</thead>
					<tbody>
						@foreach($productList as $product)
					    <tr>
					        <th>
					        {!! $product->name !!}<br>
					        <img src="{{ Helper::showImage($product->image_url) }}" alt="{!! $product->name !!}" style="max-width:150px">					        
					        </th>
					        <td style="text-align:right">
					        <strong>
					        	@if(is_numeric($product->price_5))
				                	{!! number_format($product->price_5) !!}
				              	@else
				                	{!! $product->price_5 !!}
				              	@endif
				              	</strong>
					        </td>
					        <td>
					        <strong style="text-align:right">{!! $product->guarantee !!}</strong></td>
					    </tr>
					    @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection