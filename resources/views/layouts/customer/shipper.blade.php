{{-- {{dd(@$documents[0]['id'])}} --}}
<div class="card user-card rounded mt-lg-4 mt-md-4 mt-sm-4 mt-4">
    <div class="px-3 d-lg-flex justify-cotent">
        <h6 class="text-muted"><b>Shipper Information</b></h6>
    </div>
    <div class="col-12 mt-0 mx-2">
        <div class="row billing_input_style">
            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-left text-muted mt-lg-4 mt-md-4 mt-sm-4 mt-4">
                <label for="shipper_name">Shipper Name</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="shipper_name" id="first_name"
                    value="{{ @$shipper[0]['shipper_name'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-left text-muted mt-lg-4 mt-md-4 mt-sm-4 mt-4">
                <label for="contact_person_name">Contact Person Name</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="contact_person_name"
                    id="contact_person_name" value="{{ @$shipper[0]['contact_person_name'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-left text-muted mt-lg-4 mt-md-4 mt-sm-4 mt-4">
                <label for="phone">Phone</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="phone" id="phone"
                    value="{{ @$shipper[0]['phone'] }}">
            </div>
        {{-- </div>

        <div class="row billing_input_style" > --}}
            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-left text-muted mt-lg-4 mt-md-4 mt-sm-4 mt-4">
                <label for="company_email">Company Email</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="email" name="company_email" id="company_email"
                    value="{{ @$shipper[0]['company_email'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-left text-muted mt-lg-4 mt-md-4 mt-sm-4 mt-4">
                <label for="country">Country</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="country"
                    id="country" value="{{ @$shipper[0]['country'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-left text-muted mt-lg-4 mt-md-4 mt-sm-4 mt-4">
                <label for="city">City</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="city" id="city"
                    value="{{ @$shipper[0]['city'] }}">
            </div>
        {{-- </div>

        <div class="row billing_input_style"> --}}
            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-left text-muted mt-lg-4 mt-md-4 mt-sm-4 mt-4">
                <label for="zipcode">Zip Code</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="zipcode" id="zipcode"
                    value="{{ @$shipper[0]['zip_code'] }}">
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-12 text-left text-muted mt-lg-4 mt-md-4 mt-sm-4 mt-4">
                <label for="address">Address</label><br>
                <input disabled class="form-control-sm border border-info rounded" type="text" name="address" id="address"
                    value="{{ @$shipper[0]['address'] }}">
            </div>
        </div>

    </div>
</div>
