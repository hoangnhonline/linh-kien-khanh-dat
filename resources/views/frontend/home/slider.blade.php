@section('slider')
<?php
	$bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();

?>
@section('slider')
<section class="block block-slider">
	<ul class="owl-carousel owl-style2" data-nav="true" data-margin="0" data-items='1' data-autoplayTimeout="1000" data-autoplay="false" data-loop="true">
		<li class="item"><a href="#" title=""><img src="{{ URL::asset('assets/images/banner/banner1.jpg') }}" alt=""></a></li>
		<li class="item"><a href="#" title=""><img src="{{ URL::asset('assets/images/banner/banner2.jpg') }}" alt=""></a></li>
		<li class="item"><a href="#" title=""><img src="{{ URL::asset('assets/images/banner/banner1.jpg') }}" alt=""></a></li>
	</ul>
</section><!-- /slider -->
@endsection