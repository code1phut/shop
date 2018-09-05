@extends('master')
@section('content')
<div class="fullwidthbanner-container">
	<div class="fullwidthbanner">
		<div class="bannercontainer" >
	    <div class="banner" >
				<ul>
					@foreach ($slide as $value)
						<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
		            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
					<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/slide/{{$value->image}}" data-src="source/image/slide/{{$value->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{$value->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
					</div>
					</div>
		        </li>
					@endforeach
					<!-- THE FIRST SLIDE -->
				</ul>
			</div>
		</div>

		<div class="tp-bannertimer"></div>
	</div>
</div>

<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($new_product as $prodcut_new)
								<div class="col-sm-3" style="margin-buttom:10px;">
									<div class="single-item">
									@if($prodcut_new->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$prodcut_new->id)}}"><img src="source/image/product/{{$prodcut_new->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$prodcut_new->name}}</p>
											<p class="single-item-price">
											@if($prodcut_new->promotion_price == 0)
												<span class="flash-sale">{{number_format($prodcut_new->unit_price,0)}} VNĐ</span>
												@else
												<span class="flash-del">{{number_format($prodcut_new->unit_price,0)}} VNĐ</span>
												<span class="flash-sale">{{number_format($prodcut_new->promotion_price,0)}} VNĐ</span>
											</p>
											@endif
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$prodcut_new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$prodcut_new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="row pull-right">{{$new_product->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm bán chạy</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product_sale)}} Sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($product_sale as $product_top)
								<div class="col-sm-3">
									<div class="single-item">
									@if($product_top->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$product_top->id)}}"><img src="source/image/product/{{$product_top->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$product_top->name}}</p>
											<p class="single-item-price">
											@if($product_top->promotion_price == 0)
												<span class="flash-sale">{{number_format($product_top->unit_price,0)}} VNĐ</span>
												@else
												<span class="flash-del">{{number_format($product_top->unit_price,0)}} VNĐ</span>
												<span class="flash-sale">{{number_format($product_top->promotion_price,0)}} VNĐ</span>
											</p>
											@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$product_top->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$product_top->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
									<div class="row pull-right">{{$product_sale->links()}}</div>
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection