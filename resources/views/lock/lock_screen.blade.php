@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Blue Ocean Shipping</title>
  <link rel="icon" href="{{ asset('images/blueocean.png') }}" type="image/x-icon">

</head>
<style>
	*{
		padding: 0;
		margin: 0;
		box-sizing: border-box;
	}
	.container-fluid{
		width: 100vw!important;
		height: 100vh!important;
		position: relative!important;

	}
	#first_img{
        background: url({{'../public/images/lock_backgroundimage.png'}}) !important;
        background-repeat: no-repeat !important;
        background-size:cover !important;
        background-position:center !important;
		height: 100vh!important;
        max-width: 100%!important;
        height: auto!important;

	}
	#second_img{
	    background: url({{'../public/images/login_page.png'}}) !important;
        background-repeat: no-repeat;
        background-size:cover;
        background-position:center;
        width: inherit;
        height: 100vh!important;

	}
	.login{
		position: absolute!important;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		width: 350px;
		height: auto;
		background: white;
        /* box-shadow: 2px 2px 2px rgba(255,255,255,.1);
         */
         border-radius: 10px;
	}
	.login h2{
		text-align: center;
	}
    .remember_text{

        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 19px;

        color: #787878;
    }
    .lock_heading{

        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 40px;
        color: #4883B0;
        text-shadow: 8px 4px 8px rgba(0, 0, 0, 0.25);
    }
    .form_control{
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        /* background-color: #fff; */
        background-clip: padding-box;
        border-bottom: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
	.login form{
		padding: 15px 22px;
	}
	.login_text{
		position: absolute;
		top: 80%;
		left: 5%;

	}
    .forget_text{

        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 19px;
        color: #807E7E;
        text-decoration: none !important;
    }
  .login_text:after{
    content: ' ';
    position: absolute;
    top:30px;
    left:2px;
    width: 100px;
    height: 2px;
    background:white;
    z-index: 999999999;
  }
  .btn_text{
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 22px;
  }
	.login_text b{
		font-size: 22px;
        color: white;
	}
    .copyright{
        position: absolute;
        top:88%;
        right:10%;
    }
    .copyright p{
        text-transform: capitalize;
        font-size:10px;
        color: #1F689E;

    }
    .logo{
        position: absolute;
        / width:35px; /
        z-index: 111;
        top:8%;
        left:6%;
    }
    input.password{
        box-shadow: none!important;
        outline:none!important;
        margin-top:10%;
    }
    input.password:focus{
        box-shadow: none!important;
        outline:none!important;
    }
    .login_logo{
      position: absolute;
      left:20%;
      top:5%;
    }
    .login_logo img{
      width:150px;
    }
    .password{
        background:transparent;
        border:none;
        border-bottom: 1px solid #1890ff;
        padding: 5px 10px;outline: none;
    }
    .password:focus{
        background:transparent;
        border:none;
        border-bottom: 1px solid #1890ff;
        padding: 5px 10px;outline: none;
    }
@media screen and (max-width: 768px) {
  .login_text b{
    color: #1F689E;
    /* padding-top:10px!important; */
  }

}
</style>
<body>

	<div class="container-fluid" >

		<div class="row">

			<div class="col-md-6 col-lg-6" id="first_img">

			</div>
			<div class=" col-12 col-sm-12 col-md-6 col-lg-6" id="second_img">

        {{-- <div class="login_logo">
          <img src="{{asset('images/login_logo.png')}}" alt="">
        </div> --}}

                <div class="copyright">
                    <p>copyright@ 2022 all right reserved <br>
                        Developed by <a href="https://therevolutiontechnologies.com/" target="__blank">The Revolution Technologies</a></p>
                </div>
            </div>
		</div>
		<div class="login shadow" style="background: linear-gradient(180deg, rgba(171, 213, 245, 0.89) 0%, rgba(255, 255, 255, 0.64) 100%);
        box-shadow: 3px 4px 49px rgba(123, 123, 123, 0.25);
        border-radius: 18px;">
           <form action="{{ route('unlock') }}" method="POST">
            @csrf
                <h2><img src="{{asset('images/login_logo.png')}}" alt="" style="width: 178px!important;"></h2>
			<h5 style="text-align: center;margin-top:7.5%">
                <svg width="20" height="30" viewBox="0 0 38 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.5556 18.6364H27.4444V13.0455C27.4444 10.9877 26.6198 9.23082 24.9705 7.77486C23.3212 6.31889 21.331 5.59091 19 5.59091C16.669 5.59091 14.6788 6.31889 13.0295 7.77486C11.3802 9.23082 10.5556 10.9877 10.5556 13.0455V18.6364ZM38 21.4318V38.2045C38 38.9811 37.6921 39.6411 37.0764 40.1847C36.4606 40.7282 35.713 41 34.8333 41H3.16667C2.28704 41 1.53935 40.7282 0.923611 40.1847C0.30787 39.6411 0 38.9811 0 38.2045V21.4318C0 20.6553 0.30787 19.9953 0.923611 19.4517C1.53935 18.9081 2.28704 18.6364 3.16667 18.6364H4.22222V13.0455C4.22222 9.47348 5.67361 6.40625 8.57639 3.84375C11.4792 1.28125 14.9537 0 19 0C23.0463 0 26.5208 1.28125 29.4236 3.84375C32.3264 6.40625 33.7778 9.47348 33.7778 13.0455V18.6364H34.8333C35.713 18.6364 36.4606 18.9081 37.0764 19.4517C37.6921 19.9953 38 20.6553 38 21.4318Z" fill="#4883B0"/>
                    </svg>

                {{-- <img src="{{asset('images/login_logo.png')}}" alt="" style="width: 178px!important;"> --}}
                <p class="lock_heading">Lock Screen</p>
            </h5>
            {{-- <h2 class="lock_heading">
                Lock Screen
            </h2> --}}
  <div class="form-group">
    {{-- <label for="exampleInputPassword1">Password</label> --}}
    <input style="border:none;
    border-bottom: 1px solid #9D9D9D;
    padding: 5px 10px;outline: none; background:transparent;" type="password" class="password form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Enter Password" name="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong></span>
    @enderror
  </div>
  <div class="w-100 d-flex justify-content-center" style="color:red">
    <span>{{ @$error }}</span>
</div>
  <div class="form-group form-check text-right">
    <a class="forget_text" href="">Forgot Password</a>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="remember"
    id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="remember_text form-check-label" for="remember">
        {{ __('Remember Me') }}
    </label>
  </div>
  <div class="form-group">
  <button type="submit" class="btn_text btn btn-primary form-control" style="background: rgba(33, 73, 134, 0.85);
  box-shadow: 2px 10px 10px rgba(0, 0, 0, 0.25);
  border-radius: 118px;background:#1F689E;outline:none;border:none; width:80%;margin-left:10%;"><svg width="12" height="16" viewBox="0 0 12 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M8 7V4C8 2.9 7.1 2 6 2C4.9 2 4 2.9 4 4H2C2 1.79 3.79 0 6 0C8.21 0 10 1.79 10 4V7H11C11.55 7 12 7.45 12 8V15C12 15.55 11.55 16 11 16H1C0.45 16 0 15.55 0 15V8C0 7.45 0.45 7 1 7H8ZM7 14L6.64 11.85C7.15 11.61 7.5 11.1 7.5 10.5C7.5 9.67 6.83 9 6 9C5.17 9 4.5 9.67 4.5 10.5C4.5 11.1 4.85 11.61 5.36 11.85L5 14H7Z" fill="white"/>
    </svg>
    Unlock</button>
  </div>
</form>
		</div>

		<div class="login_text">
		<b>Enter Your Password To Unlock Screen</b>
		</div>




	</div>
</body>
<script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
 </script>
</html>
