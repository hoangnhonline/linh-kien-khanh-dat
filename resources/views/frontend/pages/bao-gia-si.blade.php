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
		<div class="products" >
			<div class="desc-si" style="text-align:center">
				<h1>BẢNG GIÁ BÁN SỈ <span style="color:#A4228E">KHÁNH ĐẠT</span></h1>
				<p>Địa chỉ: 54 Lũy Bán Bích, Phường Tân Thới Hoà, Quận Tân Phú, HCM</p>

				<p>[Xem bản đồ <a href="https://www.google.com/maps/place/54+L%C5%A9y+B%C3%A1n+B%C3%ADch,+T%C3%A2n+Th%E1%BB%9Bi+Ho%C3%A0,+T%C3%A2n+Ph%C3%BA,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.7636612,106.630384,17z/data=!3m1!4b1!4m5!3m4!1s0x31752e9c4e3a2189:0x36b565d46cc9e77!8m2!3d10.7636559!4d106.632578" target="_blank" style="color:#A4228E">Google Map</a>]</p>

				<p>Hotline: 0907227659 Zalo 0907227659 (9:00 - 19:00)</p>			

				<p>Thời gian làm việc: từ 9:00 - 19:00</p>

				<p>Nhận và trả bảo hành từ 14:00 - 19:00</p>

				<p style="color:#A4228E">* QUÝ ĐẠI LÝ XIN GỌI TRỰC TIẾP ĐỂ BÁO GIÁ</p>
				<br>
			</div>
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