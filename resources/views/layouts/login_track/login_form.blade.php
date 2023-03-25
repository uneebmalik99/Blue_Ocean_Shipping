<form method="POST" action="{{ route('login') }}">
    @csrf
    <h2><img src="{{ asset('images/login_logo.png') }}" alt="" style="width: 178px!important;"></h2>
    <div class="form-group ">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror"
            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email"
            value="{{ old('email') }}" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <div class="d-flex">
            <input type="password" class="form-control @error('password') is-invalid @enderror"
                id="exampleInputPassword1" placeholder="Password" name="password" />
            <i class="fa-solid fa-eye" id="togglePassword"
                style="margin-left: -30px;margin-top:10px;cursor: pointer;color:#1f689e!important;"></i>
        </div>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control"
            style="background:#1F689E;outline:none;border:none">Login</button>
    </div>
    <div class="form-group form-check text-center">
        <input type="checkbox" class="form-check-input" name="remember" id="remember"
            {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>
    <div class="form-group form-check text-center">
        <a href="" style="color:#1F689E">Forgot Password</a>
    </div>
</form>