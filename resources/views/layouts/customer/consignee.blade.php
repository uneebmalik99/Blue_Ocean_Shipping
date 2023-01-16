<div class="card user-card rounded  mt-lg-4 mt-md-4 mt-sm-4 mt-4">
    <div class="px-3 d-flex justify-cotent center">
        <h6 class="text-muted"><b>Consignee Information</b></h6>
    </div>
    <div class="col-12 mt-2">
        {{-- <div class="text-muted text-left">
            <b>Consignee</b>
        </div> --}}
        <div class="d-flex justify-content-start flex-wrap">
            {{-- <div class="text-muted d-flex"><input type="radio" name="consignee" value="same as billing party"
                    {{ @$shipper[0]['consignee'] == 'same as billing party' ? 'checked' : '' }}>
                <span class="px-2">Same as Billing Party</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="consignee" value="new consignee"
                    {{ @$shipper[0]['consignee'] == 'new consignee' ? 'checked' : '' }}>
                <span class="px-2"> Add New Consginee</span>
            </div> --}}
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-left text-muted">
                <label for="first_name">Name</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="first_name" id="first_name"
                    value="{{ @$billing[0]['first_name'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-left text-muted">
                <label for="address">Address</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="address" id="address"
                    value="{{ @$billing[0]['address'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-left text-muted">
                <label for="country">Country</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="country" id="country"
                    value="{{ @$billing[0]['country'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-left text-muted">
                <label for="city">City</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="city" id="city"
                    value="{{ @$billing[0]['city'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-left text-muted">
                <label for="zip_code">Zip Code</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="zip_code" id="zip_code"
                    value="{{ @$billing[0]['zip_code'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-left text-muted">
                <label for="phone">Phone</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="phone" id="phone"
                    value="{{ @$billing[0]['phone'] }}">
            </div>
        </div>

        <div class="text-muted text-left mt-4">
            <b>Consolidate</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="consolidate" value="yes"
                    {{ @$shipper[0]['consolidate'] == 'yes' ? 'checked' : '' }}>
                <span class="px-2">Yes</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="consolidate" value="no"
                    {{ @$shipper[0]['consolidate'] == 'no' ? 'checked' : '' }}>
                <span class="px-2"> No</span>
            </div>
        </div>

        <div class="text-muted text-left">
            <b>Return the original shipping document to</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="return" value="send back"
                    {{ @$shipper[0]['original_shipping_documents'] == 'send back' ? 'checked' : '' }}>
                <span class="px-2">Send back to me</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="return" value="pick up from office"
                    {{ @$shipper[0]['original_shipping_documents'] == 'pick up from office' ? 'checked' : '' }}>
                <span class="px-2"> Pick up from office</span>
            </div>
        </div>

        <div class="text-muted text-left">
            <b>Insurance</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="insurance" value="yes"
                    {{ @$shipper[0]['insurance'] == 'yes' ? 'checked' : '' }}>
                <span class="px-2">Yes</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="insurance" value="no"
                    {{ @$shipper[0]['insurance'] == 'no' ? 'checked' : '' }}>
                <span class="px-2">No</span>
            </div>
        </div>

        <div class="text-muted text-left">
            <b>Destination Port</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="destination_port" value="single"
                    {{ @$shipper[0]['destination_port'] == 'single' ? 'checked' : '' }}>
                <span class="px-2">Single</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="destination_port" value="multiple"
                    {{ @$shipper[0]['destination_port'] == 'multiple' ? 'checked' : '' }}>
                <span class="px-2">Multiple</span>
            </div>
        </div>
            {{-- <div class="text-muted"><input class="form-control w-25 border border-primary rounded" type="text"
                    name="port"></div> --}}
        {{-- <div class="d-flex justify-content-start mt-2">
            <input class="btn btn-info rounded" type="submit" value="Submit">
        </div> --}}
    </div>
</div>
