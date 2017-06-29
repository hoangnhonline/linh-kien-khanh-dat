@extends('frontend.layout') 
@include('frontend.partials.meta')
@section('content')
<article class="block block-breadcrumb">
  <ul class="breadcrumb">
    <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>
    <li class="active">Liên hệ</li>
  </ul>
</article><!-- /block-breadcrumb -->
<section class="block-content">
    <div class="block-common block-sale-products">      
        <div class="products" >
            <div class="desc-si" style="text-align:left; font-size:18px">
                <h1  style="color:#A4228E">CTY TNHH TM XNK KHÁNH ĐẠT</span></h1>
                <p><span class="fa fa-map-marker"></span> 54 Lũy Bán Bích, Phường Tân Thới Hoà, Quận Tân Phú, HCM</p>

                <p><span class="fa fa-phone"></span> 0909.900.862 Zalo 0907.227.659 (9:00 - 19:00)</p>           

                <p><span class="fa fa-clock-o"></span> Thời gian làm việc: từ 9:00 - 19:00</p>

                <p><span class="fa fa-clock-o"></span> Nhận và trả bảo hành từ 14:00 - 19:00</p>
                
                <br>
            </div>
            <div class="table-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6211122133586!2d106.63038931480061!3d10.763655892330197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e9c4e3a2189%3A0x36b565d46cc9e77!2zNTQgTMWpeSBCw6FuIELDrWNoLCBUw6JuIFRo4bubaSBIb8OgLCBUw6JuIFBow7osIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1498721798944" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
@endsection