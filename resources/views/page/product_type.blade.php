	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title"><a href="{{route('trang-chu')}}">Home</a>|Loại sản phẩm|{{$cate_name->name}}</h6>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($cate as $key => $value2)
							<li class="is-active"><a href="{{route('loaisanpham',$value2->id)}}">{{$value2->name}}</a></li>
						@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{count($type)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($type as $value)
								<div class="col-sm-4">
									<div class="single-item">
									@if($value->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$value->id)}}"><img src="source/image/product/{{$value->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$value->name}}</p>
											<p class="single-item-price">
												@if($value->promotion_price == 0)
												<span class="flash-del">{{number_format($value->unit_price,0)}} VNĐ</span>
												@else
												<span class="flash-del">{{number_format($value->unit_price,0)}} VNĐ</span>
												<span class="flash-sale">{{number_format($value->unit_price,0)}} VNĐ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$value->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm bán chạy</h4>
							<div class="beta-products-details">
								<p class="pull-left">Có {{count($other_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($other_product as $value1)
								<div class="col-sm-4">
									<div class="single-item">
									@if($value1->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$value1->id)}}"><img src="source/image/product/{{$value1->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$value1->name}}</p>
											<p class="single-item-price">
												@if($value1->promotion_price == 0)
												<span class="flash-del">{{number_format($value1->unit_price,0)}} VNĐ</span>
												@else
												<span class="flash-del">{{number_format($value1->unit_price,0)}} VNĐ</span>
												<span class="flash-sale">{{number_format($value1->unit_price,0)}} VNĐ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="route('chitietsanpham',$value1->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							<div class="pull-right">{{$other_product->links()}}</div>
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection