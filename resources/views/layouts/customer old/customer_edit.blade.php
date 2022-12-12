<form method="POST" id="customer_general_form" enctype="multipart/form-data">
    <div>
        <div class="row my-3">
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="tab_card px-2">
                    {{-- general information heading --}}
                    <div class="py-2">
                        <div class="text-color" id="general" onclick="slide(this.id)">
                            <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="p-2" style="cursor: pointer">General
                                Information</span>
                        </div>
                    </div>
                    {{-- general information heading End --}}

                    {{-- general information body --}}
                    <div id="general_body">

                        <div class="pb-3 px-2">
                            <div class="d-flex py-2">
                                <label for="name" class="col-6 px-0 font-size font-bold">Name</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="name" id="name" value="{{ @$documents[0]['user']['name'] }}">
                            </div>
                            <div class="d-flex py-2">
                                <label for="username" class="col-6 px-0 font-size font-bold">Username</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill col-6"
                                    name="username" id="username" value="{{ @$documents[0]['user']['username'] }}">
                            </div>

                            {{-- status start --}}
                            <input type="hidden" name="status" id="status" value="1">
                            {{-- status end --}}

                            <div class="d-flex py-2">
                                <label for="phone" class="px-0 col-6 font-size font-bold">Main
                                    phone</label>
                                <input type="phone" class="form-control-sm border border-0 rounded-pill col-6"
                                    name="phone" id="phone" value="{{ @$documents[0]['user']['phone'] }}">
                            </div>

                            <div class=" d-flex py-2">
                                <label for="fax" class="col-6 px-0 font-size font-bold">Main
                                    fax</label>
                                <input type="fax" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="fax" id="fax" value="{{ @$documents[0]['user']['fax'] }}">
                            </div>
                            <div class=" d-flex py-2">
                                <label for="email" class="col-6 px-0 font-size font-bold">Email</label>
                                <input type="email" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="email" id="email" value="{{ @$documents[0]['user']['email'] }}">
                            </div>


                            <div class=" d-flex py-2">
                                <label for="source" class="col-6 px-0 font-size font-bold">Source</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="source" id="source" value="{{ @$documents[0]['user']['source'] }}">
                            </div>

                            <div class=" d-flex py-2">
                                <label for="company_name" class="col-6 px-0 font-size font-bold">Company Name</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="company_name" id="company_name"
                                    value="{{ @$documents[0]['user']['company_name'] }}">
                            </div>

                            <div class=" d-flex py-2">
                                <label for="company_email" class="col-6 px-0 font-size font-bold">Company Email</label>
                                <input type="email" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="company_email" id="company_email"
                                    value="{{ @$documents[0]['user']['company_email'] }}">
                            </div>


                            <div class=" d-flex  py-2">
                                <label for="customer_type" class="col-6 px-0 font-size font-bold">Customer Type</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="customer_type" id="customer_type"
                                    value="{{ @$documents[0]['user']['customer_type'] }}">
                            </div>


                            <div class=" d-flex py-2">
                                <label for="sales_type" class="col-6 px-0 font-size font-bold">Sales Type</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="sales_type" id="sales_type"
                                    value="{{ @$documents[0]['user']['sales_type'] }}">
                            </div>
                        </div>
                    </div>
                    {{-- general information body End --}}
                </div>
            </div>
            {{-- general information End --}}

            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="tab_card px-2">
                    {{-- sales information heading --}}
                    <div class="py-2 px-3">
                        <div class="text-color px-3" id="sales_application" onclick="slide(this.id)">
                            <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="p-2" style="cursor:pointer">Sales Application</span>
                        </div>
                    </div>
                    {{-- sales information heading End --}}
                    {{-- sales information body start --}}
                    <div id="sales_application_body" class="">
                        <div class="px-2">
                            <div class="d-flex py-2">
                                <label for="sales_person" class="col-6 px-0 font-size font-bold">Sales person</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="sales_person" id="sales_person"
                                    value="{{ @$documents[0]['user']['sales_person'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('sales_person')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="d-flex py-2">
                                <label for="inside_person" class="col-6 px-0 font-size font-bold">Inside
                                    person</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="inside_person" id="inside_person"
                                    value="{{ @$documents[0]['user']['inside_person'] }}">
                            </div>

                            <div class="d-flex py-2">
                                <label for="level" class="col-6 px-0 font-size font-bold">Level</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="level" id="level" value="{{ @$documents[0]['user']['level'] }}">
                            </div>
                        </div>
                    </div>

                    {{-- sales information body end --}}

                </div>
                <div class="tab_card px-2">
                    {{-- Financial Inforamtion heading Start --}}
                    <div class="py-2">
                        <div class="text-color" id="financial" onclick="slide(this.id)">
                            <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="p-2" style="cursor:pointer">Financial
                                Information</span>
                        </div>
                    </div>
                    {{-- Financial Inforamtion heading End --}}
                    {{-- Financial Information body start --}}
                    <div id="financial_body">

                        <div class="pb-3 px-2">
                            <div class="d-flex py-2">
                                <label for="payment_type" class="col-6 px-0 font-size font-bold">Payment Type</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="payment_type" id="payment_type"
                                    value="{{ @$documents[0]['user']['payment_type'] }}">
                            </div>

                            <div class="d-flex py-2">
                                <label for="payment_term" class="col-6 px-0 font-size font-bold">Payment Term</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="payment_term" id="payment_term"
                                    value="{{ @$documents[0]['user']['payment_term'] }}">
                            </div>

                            <div class=" d-flex py-2">
                                <label for="industry" class="col-6 px-0 font-size font-bold">Industry</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="industry" id="industry" value="{{ @$documents[0]['user']['industry'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>



                    </div>
                    {{-- Financial Information body End --}}
                </div>
            </div>
            {{-- financial end --}}

            <div class="col-sm-6 col-md-3 col-lg-3 px-3">
                <div class="tab_card px-2">
                    {{-- sales association heading start --}}
                    <div class="py-2">
                        <div class="text-color" id="sale_association" onclick="slide(this.id)">
                            <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span class="p-2 ">Sales Association</span>
                        </div>
                    </div>
                    {{-- sales association heading end --}}


                    {{-- sales association body start --}}

                    <div id="sale_association_body">
                        <div class="pb-3 px-2">

                            <div class="d-flex align-items-center py-2">
                                <label for="location_number" class="col-6 px-0 font-size font-bold">Location
                                    Number</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="location_number" id="location_number"
                                    value="{{ @$documents[0]['user']['location_number'] }}">
                            </div>

                            <div class="d-flex align-items-center py-2">
                                <label for="country" class="col-6 px-0 font-size font-bold">Country</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="country" id="country" value="{{ @$documents[0]['user']['country'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="d-flex align-items-center py-2">
                                <label for="zip_code" class="col-6 px-0 font-size font-bold">Zip
                                    code</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="zip_code" id="zip_code" value="{{ @$documents[0]['user']['zip_code'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('zip_code')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="d-flex align-items-center py-2">
                                <label for="state" class="col-6 px-0 font-size font-bold">State</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="state" id="state" value="{{ @$documents[0]['user']['status'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('state')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="d-flex align-items-center py-2">
                                <label for="address_line1" class="col-6 px-0 font-size font-bold">Address (1)</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="address_line1" id="address_line1"
                                    value="{{ @$documents[0]['user']['address_line1'] }}">
                            </div>

                            <div class="d-flex align-items-center py-2">
                                <label for="address_line2" class="col-6 px-0 font-size font-bold">Address (2)</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="address_line2" id="address_line2"
                                    value="{{ @$documents[0]['user']['address_line2'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('address_line2')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="d-flex align-items-center py-2">
                                <label for="price_code" class="col-6 px-0 font-size font-bold">Price code</label>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="price_code" id="price_code"
                                    value="{{ @$documents[0]['user']['price_code'] }}">
                            </div>

                        </div>


                    </div>
                    {{-- sales association body end --}}
                </div>

            </div>

            <div class="col-sm-6 col-md-3 col-lg-3 px-0">
                <br>
                <div class="col-12 d-flex justify-content-center" id="customer_image">
                    <img id="customer_img" src=" {{ asset($documents[0]['user']['user_image']) }} " width="98px"
                        style="border:1px solid black">
                </div>
                <br>
                <div class="col-12 d-flex justify-content-center text-center" style="">
                    <div class="col-12 w-75 p-3" id="customer_file"
                        style="border-radius: 1.5rem!important;border:1px solid black!important;">
                        <a id="customer_file1" alt="" href="{{ asset($documents[0]['file']) }}"
                            download="document_download" style="text-decoration: underline;">Documents.pdf</a>
                    </div>
                </div>

                <br>
                <div class="col-12">

                    <div class="user_image" style="padding-top: .5rem; border-radius: 15px!important;">
                        <img id="customer_img" alt="">
                    </div>
                </div>
                <br><br>
                <div class="col-12">
                    <label for="user_file">Document Upload</label>
                    <input type="file" name="user_file[]" class="form-control rounded col-12 w-100"
                        id="user_file" style="border:1px solid #f3f3f">
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 py-2 px-5 d-flex justify-content-end">
                {{-- <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="add_by_email"
            id="add_by_email" readonly value="{{ Auth::user()->email }}"> --}}
                <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6"
                    name="added_by_user" id="added_by_user" readonly value="{{ Auth::user()->id }}">

                <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="role_id"
                    id="role_id" readonly value="4">

                <button type="button" class="btn col-1 next-style text-white" onclick="Update_Customer(this.id)"
                    id="update" name="" style="padding: 0px;" data-next="">
                    <div class="unskew">Update</div>
                </button>
            </div>

        </div>
    </div>

</form>
