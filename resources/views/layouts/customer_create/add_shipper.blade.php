<div id="shipper_div"
            style="border: 5px solid #32689C; border-radius: 10px; padding: 10px 10px 10px 10px; margin-top: 20px;">

            <div class="d-flex p-2 mt-3">
                <div class="col-4 d-block">
                    <div>
                        <label for="shipper_name" class="font-style">Shipper Name</label>
                    </div>
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                            name="shipper_name[]" id="shipper_name" value="{{ @$shipper[0]['shipper_name'] }}">
                    </div>
                </div>
                <div class="col-4 d-block">
                    <div>
                        <label for="contact_person_name" class="font-style">Contact Person Name</label>
                    </div>
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                            name="contact_person_name[]" id="contact_person_name"
                            value="{{ @$shipper[0]['contact_person_name'] }}">
                    </div>
                </div>
                <div class="col-4 d-block">
                    <div>
                        <label for="phone" class="font-style">Phone</label>
                    </div>
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                            name="phone[]" id="phone" value="{{ @$shipper[0]['phone'] }}">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-around p-2">
                <div class="col-4 d-block">
                    <div>
                        <label for="company_email" class="font-style">Company Email</label>
                    </div>
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                            name="company_email[]" id="company_email" value="{{ @$shipper[0]['company_email'] }}">
                    </div>
                </div>
                <div class="col-4 d-block">
                    <div>
                        <label for="country" class="font-style">Country</label>
                    </div>
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                            name="country[]" id="country" value="{{ @$shipper[0]['country'] }}">
                    </div>
                </div>
                <div class="col-4 d-block">
                    <div>
                        <label for="city" class="font-style">City</label>
                    </div>
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-8"
                            name="city[]" id="city" value="{{ @$shipper[0]['city'] }}">
                    </div>
                </div>
            </div>

            <div class="d-flex p-2">
                <div class="col-4 d-block">
                    <div>
                        <label class="font-style" for="zip_code">Zip code</label>
                    </div>
                    <div>
                        <input class="form-control-sm border border-0 rounded-pill bg col-8" type="text"
                            name="zip_code[]" id="zip_code" value="{{ @$shipper[0]['zip_code'] }}">
                    </div>
                </div>
                <div class="col-4 d-block">
                    <div>
                        <label class="font-style" for="address">Address</label>
                    </div>
                    <div>
                        <input class="form-control-sm border border-0 rounded-pill bg col-8" type="text"
                            name="address[]" id="address" value="{{ @$shipper[0]['address'] }}">
                    </div>
                </div>





            </div>

        </div>