	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đặt hàng</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đặt hàng</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
                <input type="text" name="_token" style="display:none" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-6">
						<h4>Thông tin khách hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_first_name">Họ Và Tên*</label>
							<input type="text" id="name" name="name" placeholder="Họ và tên" required>
						</div>

						<div class="form-block">
							<label for="adress">Giới tính*</label>
							<input id="gender" class="input-radio" type="radio"   name="gender" checked="checked" style="width:10% !important"  value="nam" required><span style="margin-right:10px;">Nam</span>
							<input id="gender" class="input-radio" type="radio"   name="gender" checked="checked" style="width:10% !important" value="nữ" required><span>Nữ</span>
                        </div>    
						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" id="adress" name="address"  placeholder="Địa chỉ" required>
						</div>
						<div class="form-block">
							<label for="adress">Email*</label>
							<input type="text" id="email" name="email"  placeholder="Email" required>
						</div>

						<div class="form-block">
							<label for="town_city">Số điện thoại*</label>
							<input type="text" id="town_city" name="phone" required value="" placeholder="Số điện thoại">
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="note" placeholder="Nội dung ghi chú"></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của khách hàng</h5></div>
							<div class="your-order-body">
                                @if(Session::has('cart'))
								<div class="your-order-item">
									<div>
                                @foreach($product_cart as $product)
									<!--  one item	 -->
										<div class="media">
											<img width="35%" style="height:100px" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p class="font-large">{{$product['item']['name']}}</p><br>
												<span class="color-gray your-order-info">Số lượng: {{ $product['qty']}}</span>
											</div>
										</div>
                                    <!-- end one item -->
                                     @endforeach
									</div>
									<div class="clearfix"></div>
                                </div>
                                
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">
                                        {{Session('cart')->totalPrice}} VND
                                    </h5></div>
									<div class="clearfix"></div>
                                </div>
                                	@endif

							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán trực tiếp</label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											giao hàng tận nhà rồi thanh toán.
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: block;">
                                            Chủ tài khoản: name <br>
                                            Số tài khoản :123423<br>
                                            Chi nhánh : Hà nội
										</div>						
									</li>
								</ul>
							</div>

							<div class="text-center"> <i class="fa fa-chevron-left"></i><button type="submit" class="beta-btn primary">Thanh toán</button> <i class="fa fa-chevron-right"></i></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection    