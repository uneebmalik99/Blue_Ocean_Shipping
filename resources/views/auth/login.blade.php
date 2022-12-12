@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>SignIn</title>
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
        background: url({{'public/images/login_l.png'}});
        background-repeat: no-repeat;
        background-size:center;
        background-position:center;
		    width: inherit;
		    height: 100vh!important;

	}
	#second_img{
		    background: url({{'public/images/login_page.png'}});
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
	.login form{
		padding: 15px 22px;
	}
	.login_text{
		position: absolute;
		top: 80%;
		left: 5%;
		
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
    input{
        box-shadow: none!important;
        outline:none!important;
    }
    input:focus{
        outline: none!important;
        box-shadow: none!important;
    }
    .login_logo{
      position: absolute;
      left:20%;
      top:5%;
    }
    .login_logo img{
      width:150px;
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
			
			<div class="d-none d-sm-none d-md-block col-md-6 col-lg-6" id="first_img">
				
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
		<div class="login shadow" style="box-shadow:
        inset 0 -3em 3em rgba(0,0,0,0.1),
              0 0  0 2px rgb(255,255,255),
              0.3em 0.3em 1em rgba(0,0,0,0.3);">
            <form method="POST" action="{{route ('login')}}">
                @csrf
			<h2><img src="{{asset('images/login_logo.png')}}" alt="" style="width: 178px!important;"></h2>

  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}" required >
    @error('email')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong></span>
    @enderror
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" name="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong></span>
    @enderror
  </div>
  
  <div class="form-group">
  <button type="submit" class="btn btn-primary form-control" style="background:#1F689E;outline:none;border:none">Login</button>
  </div>
  <div class="form-group form-check text-center">
    <input type="checkbox" class="form-check-input" name="remember"
    id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
    </label>
  </div>
  <div class="form-group form-check text-center">
    <a href="" style="color:#1F689E">Forgot Password</a>
  </div>
</form>
		</div>

		<div class="login_text">
		<b>Welcome to Blue Ocean Shipping</b>
		</div>

       


	</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>