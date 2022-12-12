<form action={{ $action }} method="POST" enctype="multipart/form-data" class="h-100">
    @csrf
    <div>
        <div>
            <div class="bg-white">
                <div>
                    <div class="d-flex justify-content-around">
                        <div class="col-4 py-3">
                            <div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="customer_name" class="form-control border border-0 px-0"><b>Client
                                                Name</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="customer_name" id="customer_name"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['customer_name'] == null) value="{{ old('customer_name') }}" @else value= "{{ @$vehicle['customer_name'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('customer_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="vin"
                                            class="form-control border border-0 px-0"><b>VIN</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="vin"
                                            id="vin"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['vin'] == null) value="{{ old('vin') }}" @else value= "{{ @$vehicle['vin'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('vin')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="year"
                                            class="form-control border border-0 px-0"><b>Year</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="year"
                                            id="year"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['year'] == null) value="{{ old('year') }}" @else value= "{{ @$vehicle['year'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('year')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="make"
                                            class="form-control border border-0 px-0"><b>Make</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="make"
                                            id="make"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['make'] == null) value="{{ old('make') }}" @else value= "{{ @$vehicle['make'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('make')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="model"
                                            class="form-control border border-0 px-0"><b>Model</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="model"
                                            id="model"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['model'] == null) value="{{ old('model') }}" @else value= "{{ @$vehicle['model'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('model')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="vehicle_type" class="form-control border border-0 px-0"><b>Vehicle Type</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="vehicle_type" id="vehicle_type"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['vehicle_type'] == null) value="{{ old('vehicle_type') }}" @else value= "{{ @$vehicle['vehicle_type'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('vehicle_type')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="color"
                                            class="form-control border border-0 px-0"><b>Color</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="color"
                                            id="color"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['color'] == null) value="{{ old('color') }}" @else value= "{{ @$vehicle['color'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('color')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="weight"
                                            class="form-control border border-0 px-0"><b>Weight(Kgs)</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="weight"
                                            id="weight"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['weight'] == null) value="{{ old('weight') }}" @else value= "{{ @$vehicle['weight'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('weight')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="value"
                                            class="form-control border border-0 px-0"><b>Value($)</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="value"
                                            id="value"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['value'] == null) value="{{ old('value') }}" @else value= "{{ @$vehicle['value'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('value')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="auction"
                                            class="form-control border border-0 px-0"><b>Auction</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="auction"
                                            id="auction"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['auction'] == null) value="{{ old('auction') }}" @else value= "{{ @$vehicle['auction'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('auction')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="buyer_id" class="form-control border border-0 px-0"><b>Buyer
                                                ID</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <select name="buyer_id" id="buyer_id"
                                            class="form-control-sm border border-0 rounded-pill col-12">
                                            @if (\Request::route()->getName() == 'vehicle.edit')
                                                <option disabled value="{{ @$vehicle['customer']['id'] }}">
                                                    {{ @$vehicle['customer']['id'] }}</option>
                                            @endif

                                            @foreach (@$buyers as $buyer)
                                                <option @if (@$buyer['id'] == '2') selected @endif
                                                    value="{{ @$buyer['id'] }}">{{ @$buyer['id'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('buyer_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="key"
                                            class="form-control border border-0 px-0"><b>Keys</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="key"
                                            id="key"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['key'] == null) value="{{ old('key') }}" @else value= "{{ @$vehicle['key'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('key')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="note"
                                            class="form-control border border-0 px-0"><b>Notes</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <textarea type="text" class="form-control-sm border border-info rounded" name="note" id="note"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['note'] == null) value="{{ old('note') }}" @else value= "{{ @$vehicle['note'] }}" @endif></textarea>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('note')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="title_type" class="form-control border border-0 px-0"><b>Title
                                                Type</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="title_type" id="title_type"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_type'] == null) value="{{ old('title_type') }}" @else value= "{{ @$vehicle['title_type'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('title_type')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="title"
                                            class="form-control border border-0 px-0"><b>Title</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="title"
                                            id="title"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title'] == null) value="{{ old('title') }}" @else value= "{{ @$vehicle['title'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="title_rec_date" class="form-control border border-0 px-0"><b>Title
                                                Rec
                                                Date</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="title_rec_date" id="title_rec_date"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_rec_date'] == null) value="{{ old('title_rec_date') }}" @else value= "{{ @$vehicle['title_rec_date'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('title_rec_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="title_state" class="form-control border border-0 px-0"><b>Title
                                                State</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="title_state" id="title_state"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_state'] == null) value="{{ old('title_state') }}" @else value= "{{ @$vehicle['title_state'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('title_state')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="title_number" class="form-control border border-0 px-0"><b>Title
                                                Number</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="title_number" id="title_number"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_number'] == null) value="{{ old('title_number') }}" @else value= "{{ @$vehicle['title_number'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('title_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 py-3">
                            <div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="shipper_name" class="form-control border border-0 px-0"><b>Shipper
                                                Name</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="shipper_name" id="shipper_name"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['shipper_name'] == null) value="{{ old('shipper_name') }}" @else value= "{{ @$vehicle['shipper_name'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('shipper_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="status"
                                            class="form-control border border-0 px-0"><b>status</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="status"
                                            id="status"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['status'] == null) value="{{ old('status') }}" @else value= "{{ @$vehicle['status'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('status')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="sale_date" class="form-control border border-0 px-0"><b>Sale
                                                Date</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="sale_date" id="sale_date"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['sale_date'] == null) value="{{ old('sale_date') }}" @else value= "{{ @$vehicle['sale_date'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('sale_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="paid_date" class="form-control border border-0 px-0"><b>Paid
                                                Date</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="paid_date" id="paid_date"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['paid_date'] == null) value="{{ old('paid_date') }}" @else value= "{{ @$vehicle['paid_date'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('make')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="days"
                                            class="form-control border border-0 px-0"><b>Days</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="days"
                                            id="days"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['days'] == null) value="{{ old('days') }}" @else value= "{{ @$vehicle['days'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('days')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="post_date" class="form-control border border-0 px-0"><b>Posted
                                                Date</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="post_date" id="post_date"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['post_date'] == null) value="{{ old('post_date') }}" @else value= "{{ @$vehicle['post_date'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('post_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="pickup_date" class="form-control border border-0 px-0"><b>Pickup
                                                Date</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="pickup_date" id="pickup_date"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['pickup_date'] == null) value="{{ old('pickup_date') }}" @else value= "{{ @$vehicle['pickup_date'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('pickup_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="delivered"
                                            class="form-control border border-0 px-0"><b>Delivered</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="delivered" id="delivered"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['delivered'] == null) value="{{ old('delivered') }}" @else value= "{{ @$vehicle['delivered'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('delivered')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="pickup_location"
                                            class="form-control border border-0 px-0"><b>Pickup
                                                Location</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="pickup_location" id="pickup_location"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['pickup_location'] == null) value="{{ old('pickup_location') }}" @else value= "{{ @$vehicle['pickup_location'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('pickup_location')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="site"
                                            class="form-control border border-0 px-0"><b>Site</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="site"
                                            id="site"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['site'] == null) value="{{ old('site') }}" @else value= "{{ @$vehicle['site'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('site')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="hat_no" class="form-control border border-0 px-0"><b>Hat
                                                Number</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12" name="hat_no"
                                            id="hat_no"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['hat_no'] == null) value="{{ old('hat_no') }}" @else value= "{{ @$vehicle['hat_no'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('hat_no')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="dealer_fee" class="form-control border border-0 px-0"><b>Dealer
                                                Fee</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="dealer_fee" id="dealer_fee"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['dealer_fee'] == null) value="{{ old('dealer_fee') }}" @else value= "{{ @$vehicle['dealer_fee'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('dealer_fee')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="late_fee" class="form-control border border-0 px-0"><b>Late
                                                Fee</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="late_fee" id="late_fee"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['late_fee'] == null) value="{{ old('late_fee') }}" @else value= "{{ @$vehicle['late_fee'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('late_fee')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="auction_storage"
                                            class="form-control border border-0 px-0"><b>Auction
                                                Storage</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="auction_storage" id="auction_storage"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['auction_storage'] == null) value="{{ old('auction_storage') }}" @else value= "{{ @$vehicle['auction_storage'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('auction_storage')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="towing_charges"
                                            class="form-control border border-0 px-0"><b>Towing
                                                Charges</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="towing_charges" id="towing_charges"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['towing_charges'] == null) value="{{ old('towing_charges') }}" @else value= "{{ @$vehicle['towing_charges'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('towing_charges')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="warehouse_storage"
                                            class="form-control border border-0 px-0"><b>Warehouse
                                                Storage</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="warehouse_storage" id="warehouse_storage"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['warehouse_storage'] == null) value="{{ old('warehouse_storage') }}" @else value= "{{ @$vehicle['warehouse_storage'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('warehouse_storage')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="title_fee" class="form-control border border-0 px-0"><b>Title
                                                Fee</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="title_fee" id="title_fee"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['title_fee'] == null) value="{{ old('title_fee') }}" @else value= "{{ @$vehicle['title_fee'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('title_fee')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="port_detention_fee"
                                            class="form-control border border-0 px-0"><b>Port
                                                Detention</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="port_detention_fee" id="port_detention_fee"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['port_detention_fee'] == null) value="{{ old('port_detention_fee') }}" @else value= "{{ @$vehicle['port_detention_fee'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('port_detention_fee')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="custom_inspection"
                                            class="form-control border border-0 px-0"><b>Custom
                                                Inspection</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="custom_inspection" id="custom_inspection"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['custom_inspection'] == null) value="{{ old('custom_inspection') }}" @else value= "{{ @$vehicle['custom_inspection'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('custom_inspection')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="additional_fee"
                                            class="form-control border border-0 px-0"><b>Additional
                                                Fee</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="additional_fee" id="additional_fee"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['additional_fee'] == null) value="{{ old('additional_fee') }}" @else value= "{{ @$vehicle['additional_fee'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('additional_fee')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="col-5 p-0">
                                        <label for="insurance"
                                            class="form-control border border-0 px-0"><b>Insurance</b></label>
                                    </div>
                                    <div class="col-7 p-0">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill col-12"
                                            name="insurance" id="insurance"
                                            @if (\Request::route()->getName() == 'vehicle.create' || @$vehicle['insurance'] == null) value="{{ old('insurance') }}" @else value= "{{ @$vehicle['insurance'] }}" @endif>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('insurance')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 py-3">
                            <div class="col-12">
                                <input type="file" name="image[]"
                                    class="form-control border border-info rounded col-12 w-100" id="fileupload"
                                    multiple="multiple">
                            </div>
                            <div class="d-flex p-2">
                                <div class="d-flex flex-column align-items-center">
                                    <div id="dvPreview1" class="vehicle_image">
                                    </div>
                                    <div><i class="fa fa-trash delete d-none" style="cursor:pointer;"></i></div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div id="dvPreview2" class="vehicle_image">
                                    </div>
                                    <div><i class="fa fa-trash delete d-none" style="cursor:pointer;"></i></div>
                                </div>
                            </div>
                            <div class="d-flex p-2">
                                <div class="d-flex flex-column align-items-center">
                                    <div id="dvPreview3" class="vehicle_image">
                                    </div>
                                    <div><i class="fa fa-trash delete d-none" style="cursor:pointer;"></i></div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <div id="dvPreview4" class="vehicle_image">
                                    </div>
                                    <div><i class="fa fa-trash delete d-none" style="cursor:pointer;"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center p-3">
                        <input type="submit" class="btn btn-primary rounded" value="{{ $button_text }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="added_by_email" value="{{ Auth::user()->id }}">
    <input type="hidden" name="added_by_role" value="{{ Auth::user()->id }}">

</form>
