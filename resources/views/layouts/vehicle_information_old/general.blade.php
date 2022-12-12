{{-- {{dd(@$vehicle)}} --}}
<div class="row my-4">
    <div class="col-sm-10 col-md-10 col-lg-4 pl-0">
        <div class="information_card">
            <h6>General Information</h6>
            <div class="information_div">
                <div class="d-flex justify-content-between my-2 py-1 " style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Customer Name</span>
                    <span class="information_text">{{@$vehicle['customer_name']}}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Title</span>
                    <span class="information_text">{{@$vehicle['title']}}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Title State</span>
                    <span class="information_text">{{@$vehicle['title_state']}}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipper Name</span>
                    <span class="information_text">{{@$vehicle['shipper_name']}}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Status</span>
                    <span class="information_text">{{@$vehicle['status']}}</span>
                </div>


                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Days</span>
                    <span class="information_text">{{@$vehicle['days']}}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Sale Date</span>
                    <span class="information_text" style="overflow: hidden;">{{@$vehicle['sale_date']}}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Paid Date</span>
                    <span class="information_text">{{@$vehicle['paid_date']}}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Posted Date</span>
                    <span class="information_text">{{@$vehicle['posted_date']}}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Pickup Date</span>
                    <span class="information_text">{{@$vehicle['pickup_date']}}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1" style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Pickup Location</span>
                    <span class="information_text">{{@$vehicle['pickup_location']}}</span>
                </div>




                <div class="information_button d-flex justify-content-center mt-3" style="margin:50px">
                    <a href="{{ route('vehicle.exportpdf')}}">
                        <button style="background: #1F689E; transform: skew(-30deg) !important;border:none;border-radius: 4px;color:white;margin-right: 6px;font-size: 12px;">
                        <div style="transform: skew(30deg) !important;padding:1px 4px">
                            Trucking PDF
                        </div>
                        </button>
                        
                    </a>
                    <button style="background: #1CACD9;border:none;font-size:12px;
                    transform: skew(-30deg) !important;
                                    border-radius: 4px;color:white;margin-right: 3px;"><div style="transform: skew(30deg) !important;padding:1px 12px">Edit</div></button>

                </div>
                <div>
                    <br>
                </div>




            </div>



        </div>
    </div>
    <div class="col-sm-10 col-md-10 col-lg-8 pl-0">

        <div class="information_second_div">

            <div class="row">
                <div class="col-12">
                    <h4>Vehicle Information</h4>
                </div>
            </div>

            <div class="row" style="padding-bottom:60px">
                <div class=" col-sm-12 col-md-5 col-lg-5">
                    <div class="d-flex justify-content-between" style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">Vin</span>
                        <span class="information_text ">{{@$vehicle['vin']}}</span>
                    </div>
                    <div class="d-flex justify-content-between " style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">Year</span>
                        <span class="information_text ">{{@$vehicle['year']}}</span>
                    </div>
                    <div class="d-flex justify-content-between " style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">Make</span>
                        <span class="information_text ">{{@$vehicle['make']}}</span>
                    </div>
                    <div class="d-flex justify-content-between " style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">Modal</span>
                        <span class="information_text ">{{@$vehicle['model']}}</span>
                    </div>
                    <div class="d-flex justify-content-between " style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">Type</span>
                        <span class="information_text ">{{@$vehicle['vehicle_type']}}</span>
                    </div>
                    <div class="d-flex justify-content-between " style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">Order Date</span>
                        <span class="information_text ">{{@$vehicle['sale_date']}}</span>
                    </div>
                    <div class="d-flex justify-content-between " style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto ">
                        <span class="infromation_mainText ">location</span>
                        <span class="information_text ">{{@$vehicle['pickup_location']}}</span>
                    </div>

                    <div class="mt-4 " style="width: 80%;margin:4px auto ">
                        <p style="color:#6D8DA6; ">Note to department</p>
                    </div>
                    <div class=" ">
                        <select name=" " id=" " class="form-control " style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;font-size:13px;color:#6D8DA6; ">
                            <option value=" ">Please Select department</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-start " style="width: 80%;margin:4px auto ">
                        <p style="color:#6D8DA6 ">Note</p><br>
                    </div>
                    <div class="d-flex justify-content-start " style="width: 90%;margin:4px auto ">
                        <textarea name=" " id=" " cols="40" rows="4" style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;font-size: 13px;
    color: #6D8DA6; ">{{@$vehicle['note']}}</textarea>

                    </div>

                    <div style="width: 90%; " class="d-flex justify-content-end ">

                        <button class="send mt-3" style="background: #1CACD9; border-radius: 4px;transform: skew(-30deg) !important;font-size: 13px;border:none;color:white; ">
                        <div style="transform: skew(30deg) !important;padding:1px 12px ">
                            Send
                        </div>
                    </button>

                    </div>


                </div>
                <div class="col-sm-12 col-md-7 col-lg-7 mb-4">
                    <div class="information_gallary">
                        <div class="gallary_header d-flex">
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <div class="w-100 d-flex justify-content-center" style="
                                        margin: 10px 2px;
                                        padding: 0 6px;">
                                            <button class="img_active_button img_btn" id="vehicle_images" onclick="changeImages(this.id)" tab="{{@$vehicle['id']}}">
                                                <div class="img_button">Vehicle Image</div>
                                            </button>
        
                                            <button class="image_button mx-1 img_btn" style="margin-left:22px"  onclick="changeImages(this.id)" tab=" {{@$vehicle['id']}}" id="auction_images">
                                            <div class="img_button">
                                                Auction Image
                                            </div>
                                        </button>

                                        <button class="image_button img_btn" onclick="changeImages(this.id)" tab=" {{@$vehicle['id']}}" id="warehouse_images" style="color:#4d89b5!important;    font-family:Inter;
                                        font-style:normal;
                                        font-weight:600;">Ware House Image
                                        </button>

                                        </div>
                                       
        
                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="w-100 p-2">
                                        <img src="{{asset(@$vehicle['billofsales'][0]['name'])}}" alt=""class="img_fluid mx-auto w-100" style="max-height:172px!important;border-radius: 10px!important;">

                                    </div>
                                    
        
                                        
                                  
                                </div>
                            </div>
                            
                           
                        </div>

                        <div class="gallary_body">
                            <div class="d-flex flex-wrap justify-content-center changeImages">
                                {{-- {{count(@$vehicle['billofsales'])}} --}}
                                @if(@$vehicle['billofsales'])
                                @foreach(@$vehicle['billofsales'] as $img)                       
                                <div class="img">
                                    <img src="{{asset($img['name'])}}" alt=" " style="width: 60px; height: 55px;" class="download_images">
                                </div>
                                @endforeach
                                @else
                                <div class="img">
                                    <img src="#" alt="" style="width: 60px; height: 55px;" class="download_images">
                                </div>
                                @endif
                               
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-center ">
                        <a href="#" id="download_all">
                            <button style="background: rgba(37, 101, 4, 0.72); border-radius: 6px;border:none;color:white;transform: skew(-30deg);">
                                <div style="transform: skew(30deg);padding:1px 10px;font-size: 13px;">
                                Download Images in Zip
                            </div>
                        </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>