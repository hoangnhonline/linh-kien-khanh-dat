@section('slider')
<?php
	$bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();

?>
@section('slider')
<section class="block block-slider">
	<?php 
    $bannerArr = DB::table('banner')->where(['object_id' => 1, 'object_type' => 3])->orderBy('display_order', 'asc')->get();
    ?>
    @if($bannerArr)
        <ul class="owl-carousel owl-style2" data-nav="true" data-margin="0" data-items='1' data-autoplayTimeout="1000" data-autoplay="false" data-loop="true">
        @foreach($bannerArr as $banner)
        
          <li class="item">
          @if($banner->ads_url !='')
          <a href="{{ $banner->ads_url }}" title="">
          @endif
          <img alt="banner" src="{{ Helper::showImage($banner->image_url) }}">
          @if($banner->ads_url !='')
          </a>
          @endif
          </li>
          @endforeach             
        </ul>
        @endif
</section><!-- /slider -->
@endsection