<form method="GET" action="{{ route('track_vin') }}">
    {{-- @csrf --}}
    <h2><img src="{{ asset('images/login_logo.png') }}" alt="" style="width: 178px!important;"></h2>
    <div class="form-group ">
        <label for="vin" class="" style="font-size:12px;">PROVIDE VIN OR LOT NUMBER</label>
        <input type="text" class="form-control
            id="vin" placeholder="ENTER VIN OR LOT NUMBER" name="vin" required>
            
        </div>
        
        @if (Session::has('message'))
               
        <div class="alert-danger">
            <p style="font-size:12px;padding:10px;">{{ Session::get('message') }}</p>
        </div>
    @endif


    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control"
            style="background:#1F689E;outline:none;border:none">Submit</button>
    </div>

</form>
