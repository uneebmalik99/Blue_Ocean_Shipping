<style>
    .row div {
        margin: 10px 0px;
    }
</style>
<style>
    .text-center {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-images-card {
        margin: auto;
        display: table;
        background: #fff;
        padding: 10px 20px;
        /* box-shadow: 0px 0px 5px #ddd; */
    }

    .profile-images {
        width: 90px;
        height: 90px;
        background: #fff;
        border-radius: 50%;
        overflow: hidden;
    }

    .profile-images img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .custom-file input[type='file'] {
        display: none
    }

    .custom-file label {
        cursor: pointer;
        color: #000;
        text-align: center;
        display: table;
        margin: auto;
        margin-top: 15px;
    }
    #user_file{
        display: none;
      }
      label{
        cursor:pointer;
      }
      #imageName{
        color:green;
      }
</style>

<form method="POST" id="updateCustomers" enctype="multipart/form-data">
    <input type="hidden" id="id" name="id" value="{{ @$documents[0]['id'] }}">
    <input type="hidden" id="id" name="file_id" value="{{ @$documents[0]['documents']['id'] }}">
    <div>
        <div class="row my-1">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-6 col-md-5 col-lg-6">
                        <div class="tab_card px-2">
                            {{-- general information heading --}}
                            <div class="py-2">
                                <div class="text-color" id="general" onclick="slide(this.id)">
                                    <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span class="p-2" style="cursor: pointer">General Information</span>
                                </div>
                            </div>
                            {{-- general information heading End --}}

                            {{-- general information body --}}
                            <div id="general_body">

                                <div class="pb-3 px-2">
                                    <div class="d-flex">
                                        <label for="name" class="col-5 px-0 font-size font-bold">Name
                                            <span class="text-danger" id="name_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7" name="name"
                                            id="name" value="{{ @$documents[0]['name'] }}">
                                    </div>
                                    <div class="d-flex">
                                        <label for="username" class="col-5 px-0 font-size font-bold">Username
                                            <span class="text-danger" id="username_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="username" id="username"
                                            value="{{ @$documents[0]['username'] }}">
                                    </div>
                                    <input type="hidden" name="status" id="status" value="1">
                                    <div class="d-flex">
                                        <label for="phone" class="px-0 col-5 font-size font-bold">Main phone
                                            <span class="text-danger" id="phone_error"></span>
                                        </label>
                                        <input type="phone" class="form-control-sm border border-0 rounded-pill col-7"
                                            name="phone" id="phone" value="{{ @$documents[0]['phone'] }}">
                                    </div>

                                    <div class=" d-flex">
                                        <label for="fax" class="col-5 px-0 font-size font-bold">Main fax
                                            <span class="text-danger" id="fax_error"></span>
                                        </label>
                                        <input type="fax"
                                            class="form-control-sm border border-0 rounded-pill bg col-7" name="fax"
                                            id="fax" value="{{ @$documents[0]['fax'] }}">
                                    </div>
                                    <div class=" d-flex">
                                        <label for="email" class="col-5 px-0 font-size font-bold">Email
                                            <span class="text-danger" id="email_error"></span>
                                        </label>
                                        <input type="email"
                                            class="form-control-sm border border-0 rounded-pill bg col-7" name="email"
                                            id="email" value="{{ @$documents[0]['email'] }}">
                                    </div>


                                    <div class=" d-flex">
                                        <label for="source" class="col-5 px-0 font-size font-bold">Source
                                            <span class="text-danger" id="source_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7" name="source"
                                            id="source" value="{{ @$documents[0]['source'] }}">
                                    </div>

                                    <div class=" d-flex">
                                        <label for="company_name" class="col-5 px-0 font-size font-bold">Company
                                            Name
                                            <span class="text-danger" id="company_name_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="company_name" id="company_name"
                                            value="{{ @$documents[0]['company_name'] }}">
                                    </div>

                                    <div class=" d-flex">
                                        <label for="company_email" class="col-5 px-0 font-size font-bold">Company
                                            Email
                                            <span class="text-danger" id="company_email_error"></span>
                                        </label>
                                        <input type="email"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="company_email" id="company_email"
                                            value="{{ @$documents[0]['company_email'] }}">
                                    </div>


                                    <div class=" d-flex">
                                        <label for="customer_type" class="col-5 px-0 font-size font-bold">Customer
                                            Type
                                            <span class="text-danger" id="customer_type_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="customer_type" id="customer_type"
                                            value="{{ @$documents[0]['customer_type'] }}">
                                    </div>


                                    <div class=" d-flex">
                                        <label for="sales_type" class="col-5 px-0 font-size font-bold">Sales
                                            Type
                                            <span class="text-danger" id="sales_type_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="sales_type" id="sales_type"
                                            value="{{ @$documents[0]['sales_type'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- general information body End --}}

                        <div class="tab_card px-2">
                            {{-- Financial Inforamtion heading Start --}}
                            <div class="py-2">
                                <div class="text-color" id="financial" onclick="slide(this.id)">
                                    <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span class="p-2" style="cursor:pointer">Financial Information</span>
                                </div>
                            </div>
                            {{-- Financial Inforamtion heading End --}}
                            {{-- Financial Information body start --}}
                            <div id="financial_body">

                                <div class="pb-3 px-2">
                                    <div class="d-flex">
                                        <label for="payment_type" class="col-5 px-0 font-size font-bold">Payment
                                            Type
                                            <span class="text-danger" id="payment_type_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="payment_type" id="payment_type"
                                            value="{{ @$documents[0]['payment_type'] }}">
                                    </div>

                                    <div class="d-flex">
                                        <label for="payment_term" class="col-5 px-0 font-size font-bold">Payment
                                            Term
                                            <span class="text-danger" id="payment_term_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="payment_term" id="payment_term"
                                            value="{{ @$documents[0]['payment_term'] }}">
                                    </div>


                                    <div class=" d-flex">
                                        <label for="industry" class="col-5 px-0 font-size font-bold">Industry
                                            <span class="text-danger" id="industry_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="industry" id="industry"
                                            value="{{ @$documents[0]['industry'] }}">
                                    </div>

                                </div>

                            </div>
                            {{-- Financial Information body End --}}
                        </div>

                    </div>
                    {{-- general information End --}}

                    <div class="col-sm-6 col-md-5 col-lg-6 mx-auto">
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
                                <div class="pb-3 px-2">
                                    <div class="d-flex">
                                        <label for="sales_person" class="col-5 px-0 font-size font-bold">Sales
                                            person<span class="text-danger" id="sales_person_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="sales_person" id="sales_person"
                                            value="{{ @$documents[0]['sales_person'] }}">
                                    </div>


                                    <div class="d-flex">
                                        <label for="inside_person" class="col-5 px-0 font-size font-bold">Inside
                                            person<span class="text-danger" id="inside_person_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="inside_person" id="inside_person"
                                            value="{{ @$documents[0]['address_line1'] }}">
                                    </div>

                                    <div class="d-flex">
                                        <label for="level" class="col-5 px-0 font-size font-bold">Level
                                            <span class="text-danger" id="level_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="level" id="level"
                                            value="{{ @$documents[0]['level'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- sales information body end --}}


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

                                    <div class="d-flex">
                                        <label for="location_number"
                                            class="col-5 px-0 font-size font-bold">Location<span class="text-danger"
                                                id="location_number_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="location_number" id="location_number"
                                            value="{{ @$documents[0]['location_number'] }}">
                                    </div>

                                    <div class="d-flex">
                                        <label for="country" class="col-5 px-0 font-size font-bold">Country
                                            <span class="text-danger" id="country_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="country" id="country"
                                            value="{{ @$documents[0]['country'] }}">
                                    </div>


                                    <div class="d-flex">
                                        <label for="zip_code" class="col-5 px-0 font-size font-bold">Zip code
                                            <span class="text-danger" id="zip_code_error"></span>
                                        </label>
                                        <select class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="zip_code" id="zip_code">
                                            <option value="{{ @$documents[0]['zip_code'] }}">
                                                {{ @$documents[0]['zip_code'] }}
                                            </option>
                                            @foreach ($location as $locations)
                                                <option value="{{ $locations['zip_code'] }}">
                                                    {{ $locations['zip_code'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="d-flex">
                                        <label for="state" class="col-5 px-0 font-size font-bold">State
                                            <span class="text-danger" id="state_error"></span>
                                        </label>
                                        <select class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="state" id="state">
                                            <option value="{{ @$documents[0]['location_number'] }}">
                                                {{ @$documents[0]['location_number'] }}
                                            </option>
                                            @foreach ($location as $locations)
                                                <option value="{{ $locations['name'] }}">{{ $locations['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="d-flex">
                                        <label for="address_line1" class="col-5 px-0 font-size font-bold">Address
                                            (1)<span class="text-danger" id="address_line1_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="address_line1" id="address_line1"
                                            value="{{ @$documents[0]['address_line1'] }}">
                                    </div>


                                    <div class="d-flex">
                                        <label for="address_line2" class="col-5 px-0 font-size font-bold">Address
                                            (2)<span class="text-danger" id="address_line2_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="address_line2" id="address_line2"
                                            value="{{ @$documents[0]['address_line2'] }}">
                                    </div>

                                    <div class="d-flex">
                                        <label for="price_code" class="col-5 px-0 font-size font-bold">Price
                                            code<span class="text-danger" id="price_code_error"></span>
                                        </label>
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-7"
                                            name="price_code" id="price_code"
                                            value="{{ @$documents[0]['price_code'] }}">
                                    </div>
                                </div>
                            </div>
                            {{-- sales association body end --}}
                        </div>

                    </div>
                    {{-- <div class="col-sm-10 col-md-11 col-lg-11 px-3 mx-auto">
                        <div class="col-12">
                            <div class="user_image" style="padding-top: .5rem; border-radius: 15px!important;">
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="file" name="user_file[]"
                                class="form-control border border-info rounded col-12 w-100" id="user_file">
                        </div>
                    </div> --}}

                    <div class="col-sm-10 col-md-11 col-lg-11 px-3 mx-auto">
                        <div class="row">
                            <div class="col-6">
                                {{-- <div class="user_image" style="padding-top: .5rem; border-radius: 15px!important;">
                                </div> --}}
                                <div class="profile-images-card" style="   border: 1px dotted black;padding: 1px 96px;">
                                    <div class="profile-images">
                                        <img src="{{ asset('images/profile.jpg') }}" id="upload-img">
                                    </div>
                                    <div class="custom-file">
                                        <label for="fileupload" style="font-size:16px!important"><p>Upload Profile Image</p></label>
                                        <input type="file" id="fileupload" name="user_image[]"
                                            onchange="loadFile(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                {{-- <input type="file" name="user_file[]"
                                    class="form-control border border-info rounded col-12 w-100" id="user_file"> --}}
                                    <label for="user_file" style="cursor: pointer;
                                    border: 1px dotted black;
                                    padding: 9px 96px;">
                                        
                                        <img src="{{asset('images/file.png')}}" alt="" style="width: 94px;">

                                        <input id="user_file" type="file" name="user_file[]"/>
                                        <br/>
                                        <span id="imageName"></span>
                                        <br>
                                        <p>Upload Document</p> <br/>
                                      </label>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <div class="col-12 py-2 px-5 d-flex justify-content-end">
            <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="added_by_user"
                id="added_by_user" readonly value="{{ Auth::user()->id }}">

            <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="role_id"
                id="role_id" readonly value="4">

            <button type="button" class="btn next-style text-white col-1 py-1" style="cursor:pointer;"
                onclick="Update_Customer(this.id)" id="general_customer" data-next="billing_customer_tab">
                <div class="unskew">Update</div>
            </button>
        </div>
    </div>
</form>

<script>
    let input = document.getElementById("user_file");
    let imageName = document.getElementById("imageName");
    input.addEventListener("change", ()=>{
        let inputImage = document.querySelector("#user_file").files[0];
        // console.log(inputImage);
        imageName.innerText = inputImage.name;
    })
</script>