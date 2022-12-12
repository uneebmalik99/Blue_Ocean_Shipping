
@include('layouts.customer_create.navbar')
<form method="POST" id="customer_billing_form" enctype="multipart/form-data">
    @csrf
    @if(@$billing[0]['id'])
    <input type="hidden" id="id" name="id" value="{{@$billing[0]['id']}}">
    <input type="hidden" id="customer_id" name="customer_id" value="{{@$billing[0]['customer_id']}}">
    @endif
    <div class="d-flex px-2 ml-5 mt-4" style="width: 90%!important;">
        <div class="d-block w-100">
            <div>
                <label for="first_name" class="font-style">First Name</label>
            </div>
            <div>
                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                    style="font-size:12px!important;" name="first_name" id="first_name" value="{{@$billing[0]['first_name']}}">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label for="company_name" class="font-style">Company Name</label>
            </div>
            <div>
                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                    style="font-size:12px!important;" name="company_name" id="company_name" value="{{@$billing[0]['company_name']}}">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label for="country" class="font-style">Country</label>
            </div>
            <div>
                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                    style="font-size:12px!important;" name="country" id="country" value="{{@$billing[0]['country']}}">
            </div>
        </div>
    </div>

    <div class="d-flex px-2 ml-5 my-3" style="width: 90%!important;">
        <div class="d-block w-100">
            <div>
                <label for="last_name" class="font-style">Last Name</label>
            </div>
            <div>
                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                    style="font-size:12px!important;" name="last_name" id="last_name" value="{{@$billing[0]['last_name']}}">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label for="company_email" class="font-style">Company Email</label>
            </div>
            <div>
                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                    style="font-size:12px!important;" name="company_email" id="company_email" value="{{@$billing[0]['company_email']}}">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label for="city" class="font-style">City</label>
            </div>
            <div>
                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                    style="font-size:12px!important;" name="city" id="city" value="{{@$billing[0]['city']}}">
            </div>
        </div>
    </div>

    <div class="d-flex px-2 ml-5" style="width: 90%!important;">
        <div class="d-block w-100">
            <div>
                <label class="font-style" for="phone">Phone</label>
            </div>
            <div>
                <input class="form-control-sm border border-0 rounded-pill bg col-8" style="font-size:12px!important;"
                    type="text" name="phone" id="phone" value="{{@$billing[0]['phone']}}">
            </div>
        </div>
        <div class="d-block w-100 p-2">
            <div>
                <label class="font-style" for="address">Address</label>
            </div>
            <div>
                <input class="form-control-sm border border-0 rounded-pill bg col-8" style="font-size:12px!important;"
                    type="text" name="address" id="address" value="{{@$billing[0]['address']}}">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label class="font-style" for="zip_code">Zip Code</label>
            </div>
            <div>
                <input class="form-control-sm border border-0 rounded-pill bg col-8" style="font-size:12px!important;"
                    type="text" name="zip_code" id="zip_code" value="{{@$billing[0]['zip_code']}}">
            </div>
        </div>
    </div>

    {{-- <div class="d-flex w-75 mt-4 p-2 ml-5">
        <div class="text-muted text-left col-4 text-head">
            <div style="font-weight:bold;font-size:14px!important">Identification Type</div>
        </div>
        <div class="text-muted text-left col-4 text-head">
            <div style="font-weight:bold;font-size:14px!important">Identification Number</div>
        </div>
        <div class="text-muted text-left col-4 text-head">
            <div style="font-weight:bold;font-size:14px!important">Expiry Date</div>
        </div>
    </div> --}}

    <div class="d-flex ml-5 p-2" style="width: 90%!important;">
        <div class="d-block w-100">
            <div>
                <label class="font-style" for="foreign_passport_number">Foreign Passport No</label>
            </div>
            <div>
                <input class="form-control-sm border border-0 rounded-pill bg col-8" style="font-size:12px!important;"
                    type="text" name="foreign_passport_number" id="foreign_passport_number" value="{{@$billing[0]['foreign_passport_number']}}">
            </div>
        </div>
        <div class="d-block w-100">
            <div style="font-weight:bold;font-size:14px!important;">
                <label class="font-style" for="identification_number">Identification Number</label>
            </div>
            <div>
                <input class="form-control-sm border border-0 rounded-pill bg col-8"
                    style="font-size:12px!important;" type="text" name="identification_number"
                    id="identification_number" value="{{@$billing[0]['identification_number']}}">
            </div>
        </div>
        <div class="d-block w-100">
            <div>
                <label class="font-style" for="expiry_date">Expiry Date</label>
            </div>
            <div>
                <input class="form-control-sm border border-0 rounded-pill bg col-8"
                    style="font-size:12px!important;" type="date" name="expiry_date" id="expiry_date" value="{{@$billing[0]['expiry_date']}}">
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span>
                    <div style="font-size:14px!important">Shipping</div>
                </span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipping" type="radio" name="shipping" value="single" {{ @$billing[0]['shipping'] == "single" ? 'checked' : '' }}>
                <span class="px-2">Single Unit</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipping" type="radio" name="shipping" value="multiple" {{ @$billing[0]['shipping'] == "multiple" ? 'checked' : '' }}>
                <span class="px-2">Multiple Unit</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span>
                    <div style="font-size:14px!important">Shipment Type</div>
                </span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipment_type" type="radio" name="shipment_type"
                    value="vehicle" {{ @$billing[0]['shipment_type'] == "vehicle" ? 'checked' : '' }}>
                <span class="px-2">Vehicle</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipment_type" type="radio" name="shipment_type"
                    value="motorcycle" {{ @$billing[0]['shipment_type'] == "motorcycle" ? 'checked' : '' }}>
                <span class="px-2">Motorcycle</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipment_type" type="radio" name="shipment_type"
                    value="package" {{ @$billing[0]['shipping'] == "package" ? 'checked' : '' }}>
                <span class="px-2">Package</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 shipment_type" type="radio" name="shipment_type"
                    value="boat" {{ @$billing[0]['shipping'] == "boat" ? 'checked' : '' }}>
                <span class="px-2">Boat</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span>
                    <div style="font-size:14px!important">Purchased From</div>
                </span>
            </div>
        </div>
        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 purchased_from" type="radio"
                    name="purchased_from" value="auction" {{ @$billing[0]['purchased_from'] == "auction" ? 'checked' : '' }}>
                <span class="px-2">Auction</span>
            </div>
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 purchased_from" type="radio"
                    name="purchased_from" value="dealer" {{ @$billing[0]['purchased_from'] == "dealer" ? 'checked' : '' }}>
                <span class="px-2">Dealer</span>
            </div>
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 purchased_from" type="radio"
                    name="purchased_from" value="private" {{ @$billing[0]['purchased_from'] == "private" ? 'checked' : '' }}>
                <span class="px-2">Private</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 purchased_from" type="radio"
                    name="purchased_from" value="pwn" {{ @$billing[0]['purchased_from'] == "pwn" ? 'checked' : '' }}>
                <span class="px-2">Own</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span>
                    <div style="font-size:14px!important">Request Pickup</div>
                </span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 request_pickup" type="radio" name="request_pickup"
                    value="yes" {{ @$billing[0]['request_pickup'] == "yes" ? 'checked' : '' }}>
                <span class="px-2">Yes</span>
            </div>

            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 request_pickup" type="radio" name="request_pickup"
                    value="no" {{ @$billing[0]['request_pickup'] == "no" ? 'checked' : '' }}>
                <span class="px-2">No</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span>
                    <div style="font-size:14px!important">End Use</div>
                </span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="text-muted d-flex col-3">
                <input class="text-muted d-flex px-2 end_use" type="radio" name="end_use" id="personal"
                    value="personal" {{ @$billing[0]['end_use'] == "personal" ? 'checked' : '' }}>
                <span class="px-2">Personal Use</span>
            </div>

            <div class="text-muted d-flex col-5">
                <input class="text-muted d-flex px-2 end_use" type="radio" name="end_use" id="business"
                    value="business" {{ @$billing[0]['end_use'] == "business" ? 'checked' : '' }}>
                <span class="px-2">Resale and wholesale business</span>
            </div>
        </div>
    </div>

    <div>
        <div class="d-flex justify-content-between p-2 ml-5">
            <div class="col-4 text-left text-info">
                <span>
                    <div style="font-size:14px!important">Buyer Number</div>
                </span>
            </div>
        </div>

        <div class="d-flex justify-content-start p-2 ml-5">
            <div class="d-flex col-4">
                <input type="text" data-role="tagsinput" class="form-control border border-0 rounded-pill bg col-10" style="font-size:12px!important;" name="buyer_number"  id="buyer_number" value="{{@$billing[0]['buyer_number']}}">
            </div>
        </div>

        {{-- <div class="multi_buyer_id">
            <div class="content">
                <div class="tags-and-input">
                    <!-- <span class="tag" data-value="jquery"><i class="fas fa-times-circle"></i></span> -->
                    <input type="text" class="input form-control-sm border border-0 rounded-pill bg col-10" autocomplete="false">
                </div>
            </div>
        </div> --}}
    </div>

    <div class="col-12 py-2 px-5 d-flex justify-content-end">

        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="email"
            id="email" value="{{ @$module['email'] }}"readonly>
            @if(!@$billing[0]['id'])
        <button type="button" class="btn next-style text-white col-1 py-1 mx-2" style="cursor:pointer;"
            onclick="skip_view(this.id)" id="skip" currenttab="billing_customer" nexttab="shipper" skiptab="shipper_customer_tab">
            <div class="unskew">skip</div>
        </button>
        @endif

        @if(@$billing[0]['id'])
        <button type="button" class="btn next-style text-white col-1 py-1 mx-2" onclick="createForm(this.id)"
            id="billing_customer" name="{{ $module['button'] }}" style="padding: 4px;"
            data-next="shipper_customer_tab">
            <div class="unskew">Next</div>
        </button>
        @else
        <button type="button" class="btn next-style text-white col-1 py-1 mx-2" onclick="createForm(this.id)"
            id="billing_customer" name="{{ $module['button'] }}" style="padding: 4px;"
            data-next="shipper_customer_tab">
            <div class="unskew">Next</div>
        </button>
        @endif

        
    </div>
</form>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>