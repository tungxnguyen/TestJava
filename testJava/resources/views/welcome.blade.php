<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        div.menubar {
            background-color: #5f5f5f;
            overflow: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        div.menubar a {
            color: white;
            display: inline-block;
            padding-top: 10px !important;
            padding-right: 15px !important;
            padding-bottom: 9px !important;
            padding-left: 15px !important;
            font-size: 17px;
            text-decoration: none;
            border: none;
            outline: 0;

        }

      
        div.nix-left {
            float: left !important;
        }

        div.nix-right {
            float: right !important;
        }


    </style>

</head>

<body>
	<div class="col-xs-12 col-sm-12 col-md-12"  style="padding:0px">
			<div class="col-xs-12 col-sm-12 col-md-12"  style="padding:0px">
				<div class="hidden-xs hidden-sm col-md-12 menubar"  style="padding:0px">
					<div class="nix-left">
						<a><i class="fas fa-home"></i></a>
					</div>
					<div class="nix-right">
						@if(Auth::check())
							<a href="">Xin chào :{{Auth::user() ->name}}</a>
							<a href="{{route('logout')}}">Đăng xuất</a>
							
						@else
							<a href="{{route('getRegister')}}">Đăng ký</a>
							<a href="{{route('getLogin')}}">Đăng nhập</a>
						@endif
					</div>
				</div>
					</div>
					

				</div>


			</div>
	
    
	</body>

</html>