@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng ký</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangki')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name=_token value="{{csrf_token()}}">
				<div class="row">
                    <div class="col-sm-3"></div>
                    @if(count($errors)>0)
                        <div class="alert alert-success">
                            @foreach($errors->all() as $err )
                            {{$err}}
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
					<div class="col-sm-6">
						<h4>Đăng ký</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="your_last_name">Họ và tên*</label>
							<input type="text" class="form-control" id="name" name="full_name" placeholder="Nhập Họ và tên" required>
                        </div>
                        <div class="form-block">
							<label for="email">Email*</label>
							<input type="email" class="form-control" name="email" placeholder="Nhập email" id="email" required>
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" class="form-control" id="adress" name="address" placeholder="Nhập địa chỉ" required>
						</div>


						<div class="form-block">
							<label for="phone">Số điện thoại*</label>
							<input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu*</label>
							<input type="password" class="form-control"  id="password" name="password" placeholder="Nhập mật khẩu" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập lại mật khẩu*</label>
							<input type="password" class="form-control"  id="re_password" name="re_password" placeholder="Nhập lại mật khẩu" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng ký</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection