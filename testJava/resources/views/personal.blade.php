<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

		<div class="container">
			<div class="row justify-content-center" style = "justify-content: center!important;display: flex;
				flex-wrap: wrap;">
				<div class="col-md-8" style = "position: relative;
					display: flex;
					flex-direction: column;
					min-width: 0;
					word-wrap: break-word;
					background-color: #fff;
					background-clip: border-box;
				  ">
				
					<div class = "card">
						<div class="card-header" style = "margin-top:22px;font-weight: bold;font-size:22px;color: #eeb10a;">{{ __('Đăng ký') }}</div>
						<div class = "card-body">
							<form action="{{route('getRegister')}}" method="POST" >
								<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
									
								<div class="form-group">
									<label>Tên họ</label>
									<input class="form-control input" id = "name" type = "text" name = "fistname"  placeholder = "Nhập tên đầu" value = "{{old('name')}}"></input>
								</div>
								<div class="form-group">
									<label>Tên gọi</label>
									<input class="form-control input" id = "name" type = "text" name = "lastname"  placeholder = "Nhập tên cuối" value = "{{old('name')}}"></input>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input class="form-control input" id = "email" type = "email" name = "email" placeholder = "Email" value = "{{old('email')}}"></input>
								</div>	
								<div class="form-group">
									<label>Số điện thoại</label>
									<input class="form-control input" id = "name" type = "number" name = "phone"  placeholder = "phone" value = "{{old('name')}}"></input>
								</div>
								<div class="form-group">
									<label>Date/time</label>
									<input class="form-control input" id = "name" type = "text" name = "name"  placeholder = "Nhập ngày sinh" value = "{{old('name')}}"></input>
								</div>
								<div class="form-group">
									<label style="display: inherit;">Ảnh đại diện</label>
									<img id="avar" name = "avar" width="100px" height="30%" alt="avatar" src="/uploads/a.png" accept="image/*"/>
									<input style = "margin-top:5px" type= "file" name = "avatar" value = "/uploads/a.png" onchange="readURL(this);"></input>
									<script>
										function readURL(input) {
												
												if (input.files && input.files[0]) {
													
													var reader = new FileReader();

													reader.onload = function (e) {
														$('#avar')
															.attr('src', e.target.result)
															.width(150)
															.height(150)
													};
													reader.readAsDataURL(input.files[0]);
												}
										}
										
									</script>
								</div>
								 <div class="form-group row mb-0">
				
									<div class="save" style = "padding:15px">
										<button type="submit" class="btn btn-primary" style = "margin-right: 20px;">
											{{ __('Đăng ký') }}
										</button>
										<button type="button" class="btn btn-default" style = "margin-right: 20px;" onclick = "click_cancel()">
											{{ __('Thoát') }}
										</button>
									</div>
									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<script>
				function click_cancel(){
					window.location.href = "{{URL::route('postLogin')}}";
				}
			</script>
		</div>
		
	</body>
</html>