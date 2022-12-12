<div class="card user-card rounded  mt-lg-4 mt-md-4 mt-sm-4 mt-4">
    <div class="px-3 d-flex justify-cotent center">
        <h6 class="text-muted"><b>Billing Information</b></h6>
    </div>
    <div class="col-12 mt-2 mx-2">

        <div class="row d-flex justify-content-between billing_input_style">
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="first_name">Name</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="first_name" id="first_name"
                    value="{{ @$billing[0]['first_name'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="company_name">Company Name</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="company_name"
                    id="company_name" value="{{ @$billing[0]['company_name'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="country">Country</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="country" id="country"
                    value="{{ @$billing[0]['country'] }}">
            </div>
        {{-- </div> --}}

        {{-- <div class="d-flex justify-content-between mt-4 billing_input_style" > --}}
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="last_name">Last Name</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="last_name" id="last_name"
                    value="{{ @$billing[0]['last_name'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="company_email">Company Email</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="company_email"
                    id="company_email" value="{{ @$billing[0]['company_email'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="city">City</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="city" id="city"
                    value="{{ @$billing[0]['city'] }}">
            </div>
        {{-- </div> --}}

        {{-- <div class="d-flex justify-content-between mt-4 billing_input_style"> --}}
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="phone">Phone</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="phone" id="phone"
                    value="{{ @$billing[0]['phone'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="address">Address</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="address" id="address"
                    value="{{ @$billing[0]['address'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="zip_code">Zip Code</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="zip_code" id="zip_code"
                    value="{{ @$billing[0]['zip_code'] }}">
            </div>
        {{-- </div> --}}

        {{-- <div class="d-flex jusitfy-content-between mt-4">
            <div class="text-muted text-left col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4">
                <b>Identification Type</b>
            </div>
            <div class="text-muted text-left col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4">
                <b>Identification Number</b>
            </div>
            <div class="text-muted text-left col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4">
                <b>Expiry Date</b>
            </div>
        </div> --}}

        {{-- <div class="d-flex justify-content-between mt-4 billing_input_style"> --}}
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="passport">Foreign Passport Number</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="passport" id="passport"
                    value="{{ @$billing[0]['foreign_passport_number'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="calendar">Identificaton Number</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="calendar" id="calendar"
                    value="{{ @$billing[0]['identification_number'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 mt-xxl-4 mt-xl-4 mt-md-4 mt-sm-4 mt-4 text-left text-muted">
                <label for="calendar_2">Expire Date</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="calendar_2"
                    id="calendar_2" value="{{ @$billing[0]['expiry_date'] }}">
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-between mt-4">
                <div class="col-4 text-left text-info">
                    <span><b>Shipping</b></span>
                </div>
            </div>

            <div class="d-flex justify-content-start mt-2">
                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="shipping" id="single"
                        {{ @$billing[0]['shipping'] == 'single' ? 'checked' : '' }}>
                    <span class="px-2">Single Unit</span>
                </div>

                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="shipping" id="multiple"
                        {{ @$billing[0]['shipping'] == 'multiple' ? 'checked' : '' }}>
                    <span class="px-2">Multiple Unit</span>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-between mt-4">
                <div class="col-4 text-left text-info">
                    <span><b>Shipment Type</b></span>
                </div>
            </div>

            <div class="d-flex justify-content-start mt-2">
                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="shipment_type" id="vehicle"
                        {{ @$billing[0]['shipment_type'] == 'vehicle' ? 'checked' : '' }}>
                    <span class="px-2">Vehicle</span>
                </div>

                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="shipment_type" id="motorcycle"
                        {{ @$billing[0]['shipment_type'] == 'motorcycle' ? 'checked' : '' }}>
                    <span class="px-2">Motorcycle</span>
                </div>

                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="shipment_type" id="package"
                        {{ @$billing[0]['shipment_type'] == 'package' ? 'checked' : '' }}>
                    <span class="px-2">Package</span>
                </div>

                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="shipment_type" id="boat"
                        {{ @$billing[0]['shipment_type'] == 'boat' ? 'checked' : '' }}>
                    <span class="px-2">Boat</span>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-between mt-4">
                <div class="col-4 text-left text-info">
                    <span><b>Purchased From</b></span>
                </div>
            </div>

            <div class="d-flex justify-content-start mt-2">
                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="purchased_from" id="auction"
                        {{ @$billing[0]['purchased_from'] == 'auction' ? 'checked' : '' }}>
                    <span class="px-2">Auction</span>
                </div>

                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="purchased_from" id="dealer"
                        {{ @$billing[0]['purchased_from'] == 'dealer' ? 'checked' : '' }}>
                    <span class="px-2">Dealer</span>
                </div>

                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="purchased_from" id="private"
                        {{ @$billing[0]['purchased_from'] == 'private' ? 'checked' : '' }}>
                    <span class="px-2">Private</span>
                </div>

                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="purchased_from" id="own"
                        {{ @$billing[0]['purchased_from'] == 'own' ? 'checked' : '' }}>
                    <span class="px-2">Own</span>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-between mt-4">
                <div class="col-4 text-left text-info">
                    <span><b>Request Pickup</b></span>
                </div>
            </div>

            <div class="d-flex justify-content-start mt-2">
                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="pickup" id="yes"
                        {{ @$billing[0]['request_pickup'] == 'yes' ? 'checked' : '' }}>
                    <span class="px-2">Yes</span>
                </div>

                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="pickup" id="no"
                        {{ @$billing[0]['request_pickup'] == 'no' ? 'checked' : '' }}>
                    <span class="px-2">No</span>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-between mt-4">
                <div class="col-4 text-left text-info">
                    <span><b>End Use</b></span>
                </div>
            </div>

            <div class="d-flex justify-content-start mt-2">
                <div class="text-muted d-flex col-3">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="end_use" id="personal"
                        {{ @$billing[0]['end_use'] == 'personal' ? 'checked' : '' }}>
                    <span class="px-2">Personal Use</span>
                </div>

                <div class="text-muted d-flex col-5">
                    <input disabled class="text-muted d-flex px-2" type="radio" name="end_use" id="business"
                        {{ @$billing[0]['end_use'] == 'business' ? 'checked' : '' }}>
                    <span class="px-2">Resale and wholesale business</span>
                </div>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-between mt-4">
                <div class="col-4 text-left text-info">
                    <span><b>Buyer Number</b></span>
                </div>
            </div>

            <div class="d-flex justify-content-start mt-2">
                <div class="d-flex justify-content-start col-8">
                    <input disabled class="form-control-sm border border-info rounded" type="text" name="buyer_number" data-role="tagsinput"
                        id="buyer" value="{{ @$billing[0]['buyer_number'] }}">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>