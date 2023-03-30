{{-- {{dd(@$vehicle)}} --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .imgmodal {
        z-index: 1;
        display: none;
        padding-top: 10px;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.8)
    }

    .imgmodal-content {
        margin: auto;
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    .imgmodal-hover-opacity {
        opacity: 1;
        filter: alpha(opacity=100);
        -webkit-backface-visibility: hidden
    }

    .imgmodal-hover-opacity:hover {
        opacity: 0.60;
        filter: alpha(opacity=60);
        -webkit-backface-visibility: hidden
    }


    .close {
        text-decoration: none;
        float: right;
        font-size: 24px;
        font-weight: bold;
        color: white
    }

    .container1 {
        width: 200px;
        display: inline-block;
    }


    .item_1 {
        transition: transform .2s;
        box-sizing: border-box;
    }

    .item_1:hover {
        transform: scale(1.5);
        border-radius: 10px !important;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    @media screen and (max-width: 67%) {
        .material-icons {
            margin-left: 54px;
            margin-top: 33px;
        }
    }

    .bottom_button {
        position: absolute;
        top: 80%;
        left: 80%;
        font-size: 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        text-decoration: none !important;
    }

    .left_button {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        text-decoration: none !important;
    }

    /*
    @media only screen and (max-width: 425px) {
        .bottom_button {
            position: absolute;
            top: 85%;
            left: 85%;
            font-size: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            text-decoration: none !important;
        }

        .left_button {
            position: absolute;
            top: 10%;
            left: 6%;
            font-size: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            text-decoration: none !important;
        }
    }
    @media screen and (max-width: 991px) {
        .information_second_div {
            margin-top: 248px;
  }
}
@media screen and (max-width: 991px) {
        ..information_button {
            margin: 50px;
            margin-left: 238px;
  }
}
@media screen and (min-width: 1600px) {
        .img_fluid {
            height: 300px!important;
            
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 22px!important;
    margin-left: 15px!important;
}
.icon{
background-color: #e93f7800!important;
}
}
@media screen and (min-width: 1800px) {
        .img_fluid {
            height: 350px!important;
            
  }
  .item_1{
    width: 166px!important;
    height: 112px!important;
    
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 30px!important;
    margin-left: 31px!important;
}

  .changeImages{
    left:-2%!important;
  }
}
@media screen and (min-width: 1920px) {
        .img_fluid {
            height: 350px!important;
            
  }
  .item_1{
    width: 182px!important;
    height: 133px!important;
   
  }
  .changeImages{
    left:-2%!important;
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 22px!important;
    margin-left: 40px!important;
}


@media screen and (min-width: 2160px) {
        .img_fluid {
            height: 350px!important;
            
  }
  .item_1{
    width: 290px!important;
    height: 133px!important;
   
  }
  .changeImages{
    left:-2%!important;
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 40px!important;
    margin-left: 61px!important;
}

}
@media screen and (min-width: 2000px) {
        .img_fluid {
            height: 400px!important;
            
  }
}
@media screen and (min-width: 2200px) {
        .img_fluid {
            height: 450px!important;
            
  }
}
@media screen and (min-width: 2880px) {
        .img_fluid {
            height: 500px!important;
            
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 59px!important;
    margin-left: 116px!important;
}

}
@media screen and (min-width: 4320px) {
        .img_fluid {
            height: 850px!important;
            
  }
  .item_1{
    width: 446px!important;
    height: 262px!important;
   
  }
  .changeImages{
    left:-2%!important;
  }
}
}
@media screen and (min-width: 5760px) {
        .img_fluid {
            height: 1300px!important;
            
  }
}
@media screen and (min-width: 5760px) {
        .img_fluid {
            height: 1300px!important;
            
  }
} */




    img {
        vertical-align: middle;
        border-style: none;
        width: 100%;
    }

    #main_image_box:hover {
        opacity: 0.7;
    }



    * {
        box-sizing: border-box;
    }

    .full-screen:before {
        width: .333em;
        height: 1em;
        left: .233em;
        top: -.1em;
    }

    .full-screen:after {
        width: 1em;
        height: .333em;
        top: .233em;
        left: -.1em;
    }

    .row>.column {
        padding: 0 8px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .column {
        float: left;
        width: 25%;
    }

    /* The Modal (background) */
    .my_modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .vehicle_modal_content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 800px;
    }

    /* The Close Button */
    .vehicle_close {
        color: red !important;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .vehicle_close:hover,
    .vehicle_close:focus {
        color: red !important;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 33%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    .prev {
        left: -8%;
        border-radius: 3px 0 0 3px;
        color: white;
    }

    /* Position the "next button" to the right */
    .next {
        right: -8%;
        border-radius: 3px 0 0 3px;
        color: white;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }


    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .showMainImagemodal {
        width: 100%;
    }

    .image_button {
        background-color: 337fb8;
    }

    element.style {}

    a:not([href]):not([tabindex]) {
        /* color: inherit; */
        text-decoration: none;
        color: white;
    }

    .left_button {
        position: absolute;
        top: 0px;
        left: 0px;
        font-size: 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        text-decoration: none !important;
    }

    @media only screen and (min-width: 1920px) {
        .changeImage {
            height: 90px !important;
        }
    }

    @media only screen and (min-width:2160px) {
        .changeImage {
            height: 100px !important;
        }
    }
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index:99999;">
    <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between title_style">
                <div>
                    <h5 class="modal-title text-white" id="exampleModalLabel"></h5>
                </div>
                <div>
                    <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close"
                        style="margin-top: -11px;
                        font-size: 26px;">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
{{-- Modal End --}}
<div class="row my-4">
    <div class="col-sm-12 col-md-10 col-lg-4 pl-0" style="height:500px">
        <div class="information_card">
            <div class="d-flex justify-content-between">
                <h6>General Information</h6>
                <button class="edit-button mr-3 mt-2" onclick='updatevehicle(this.id)' id={{ @$vehicle['id'] }}
                    style="height: 30px!important;">
                    <a>
                        <svg width="16" height="14" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                fill="#2C77E7" />
                        </svg>

                    </a>
                </button>
            </div>

            <div class="information_div mt-3">
                <div class="d-flex justify-content-between my-2 py-1 "
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Customer Name</span>
                    @if (@$vehicle['customer_name'])
                        <span class="information_text">{{ @$vehicle['user']['company_name'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif

                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Title</span>
                    @if (@$vehicle['title'])
                        <span class="information_text">{{ @$vehicle['title'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Title State</span>
                    @if (@$vehicle['title_state'])
                        <span class="information_text">{{ @$vehicle['title_state'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipper Name</span>
                    @if (@$vehicle['shipper_name'])
                        <span class="information_text">{{ @$vehicle['shipper_name'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Status</span>
                    @if (@$vehicle['vehicle_status'])
                        <span class="information_text">{{ @$vehicle['vehicle_status']['status_name'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>


                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Days</span>
                    @if (@$vehicle['days'])
                        <span class="information_text">{{ @$vehicle['days'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Sale Date</span>
                    @if (@$vehicle['sale_date'])
                        <span class="information_text" style="overflow: hidden;">{{ @$vehicle['sale_date'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Paid Date</span>
                    @if (@$vehicle['paid_date'])
                        <span class="information_text">{{ @$vehicle['paid_date'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Posted Date</span>
                    @if (@$vehicle['posted_date'])
                        <span class="information_text">{{ @$vehicle['posted_date'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Pickup Date</span>
                    @if (@$vehicle['pickup_date'])
                        <span class="information_text">{{ @$vehicle['pickup_date'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Delivered Date</span>
                    @if (@$vehicle['delivered'])
                        <span class="information_text">{{ @$vehicle['delivered'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Pickup Location</span>
                    @if (@$vehicle['pickup_location'])
                        <span class="information_text">{{ @$vehicle['pickup_location'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Site</span>
                    @if (@$vehicle['site'])
                        <span class="information_text">{{ @$vehicle['site'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Warehouse</span>
                    @if (@$vehicle['port'])
                        <span class="information_text">{{ @$vehicle['port'] }}</span>
                    @else
                        <span class="information_text">--</span>
                    @endif
                </div>
                <div class="row">
                    <div class="information_button d-flex justify-content-center mt-3"
                        style="margin:12px; margin-left:130px">
                        <a href="{{ route('vehicle.exportpdf', @$vehicle['id']) }} " target="_blank">
                            <button
                                style="background: #1F689E;
                    transform: skew(-30deg) !important;border:none;
                    border-radius: 4px;color:white;margin-right: 6px;font-size: 13px;">
                                <div style="transform: skew(30deg) !important;padding:1px 4px">
                                    <i class="fa fa-file-pdf-o" style="font-size:12px;"></i> Trucking PDF
                                </div>
                            </button>
                        </a>

                    </div>
                </div>




            </div>



        </div>
    </div>
    <div class="col-sm-12 col-md-10 col-lg-8 pl-0">

        <div class="information_second_div">

            <div class="row">
                <div class="col-12">
                    <h4>Vehicle Information</h4>
                </div>
            </div>
            <div class="row" style="padding-bottom:60px">
                <div class=" col-sm-12 col-md-5 col-lg-5">
                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Vin</span>
                        @if (@$vehicle['vin'])
                            <span class="information_text ">{{ @$vehicle['vin'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Year</span>
                        @if (@$vehicle['year'])
                            <span class="information_text ">{{ @$vehicle['year'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Make</span>
                        @if (@$vehicle['make'])
                            <span class="information_text ">{{ @$vehicle['make'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Modal</span>
                        @if (@$vehicle['model'])
                            <span class="information_text ">{{ @$vehicle['model'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Type</span>
                        @if (@$vehicle['vehicle_type'])
                            <span class="information_text ml-5">{{ @$vehicle['vehicle_type'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Color</span>
                        @if (@$vehicle['color'])
                            <span class="information_text ml-5">{{ @$vehicle['color'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Lot #</span>
                        @if (@$vehicle['lot'])
                            <span class="information_text ml-5">{{ @$vehicle['lot'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>


                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Auction Name</span>
                        @if (@$vehicle['auction'])
                            <span class="information_text ml-5">{{ @$vehicle['auction'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>


                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(10, 12, 13, 0.17)!important; border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Buyer Id</span>
                        @if (@$vehicle['buyer_id'])
                            <span class="information_text ml-5">{{ @$vehicle['buyer_id'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>


                    <div class="d-flex justify-content-between my-2 py-1"
                        style="border: 1px solid rgba(10, 12, 13, 0.17)!important; border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                        <span class="infromation_mainText ">Tow By</span>
                        @if (@$vehicle['tow'])
                            <span class="information_text ml-5">{{ @$vehicle['tow'] }}</span>
                        @else
                            <span class="information_text">--</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-start " style="width: 80%;margin:4px auto;padding:5px; ">
                        <p style="color:#6D8DA6 ">Note</p><br>
                    </div>
                    <div class="d-flex justify-content-start " style="width: 90%;margin:4px auto;padding:5px; ">
                        <textarea name=" " id=" " cols="40" rows="4"
                            style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;font-size: 13px;
                    color: #6D8DA6; "
                            disabled>
@if (@$vehicle['note'])
{{ @$vehicle['note'] }}
@else
--
@endif
</textarea>
                    </div>


                </div>
                <div class="col-sm-12 col-md-7 col-lg-7 mb-7 mt-7">
                    <div class="information_gallary">
                        <div class="gallary_header d-flex">
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <div class="d-flex" style="width:100%">


                                            <button class="img_active_button img_btn col-sm-4 col-md-4 col-lg-4 mb-3"
                                                onclick="changeImages(this.id)" tab=" {{ @$vehicle['id'] }}"
                                                id="warehouse_images"
                                                style="color:black;background-color:337fb8;font-size: 12px !important;border-top-left-radius: 8px;font-weight:600;height:41px;">Ware
                                                House Image
                                            </button>

                                            <button class="image_button img_btn col-sm-4 col-md-4 col-lg-4 mb-4"
                                                style="color:black;background-color: #337fb8;font-size:12px!important; border:#e9e9e9;font-weight:600;height:41px;"
                                                id="vehicle_images" onclick="changeImages(this.id)"
                                                tab="{{ @$vehicle['id'] }}">
                                                Pickup Images

                                                <button class="image_button  img_btn col-sm-4 col-md-4 col-lg-4 mb-4"
                                                    style="color:black;;font-size:12px!important;font-weight:600;margin-right:-24px!important;height:41px;"
                                                    onclick="changeImages(this.id)" tab="{{ @$vehicle['id'] }}"
                                                    id="auction_images">
                                                    Auction Image
                                                </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="image_section changeImages col-12 col-sm-12 col-md-12 col-lg-12 order-xl-12  mx-auto"
                                    style=" margin-top:1px; ">
                                    @if (@$vehicle['warehouse_image'])
                                        @foreach (@$vehicle['warehouse_image'] as $img)
                                            {{-- <div style="width: 24%!important;height:100%!important;"> --}}
                                            <img src="{{ asset($img['name']) }}" alt=""
                                                class="showMainImage changeImage"
                                                style="width:24%;height:66px;margin-top:4px;object-fit:fill;"
                                                onclick="onClick(this)" class="modal-hover-opacity"
                                                class="hover-shadow cursor">
                                            {{-- </div> --}}
                                        @endforeach
                                    @else
                                        <h6 class="text-center mt-5 w-100" style="color:gray">No Image Found</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (@$vehicle['warehouse_image'])
                        <div class="row mt-4 showhide">
                            <div class="col-12 d-flex justify-content-center ">
                                <a id="warehouse_images" class="downloadVehicles_zip"
                                    onclick="download_all(this.id)">
                                    <button
                                        style="background: #3e5871;cursor:pointer; border-radius: 6px;border:none;color:white;transform: skew(-30deg);">
                                        <div style="transform: skew(30deg);padding:1px 10px;font-size: 13px;">
                                            <i class="fa fa-download"></i> Download Images in Zip
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>


<div id="modal01" class="imgmodal" onclick="this.style.display='none' color:red">
    <span class="close vehicle_close cursor" onclick="closeModal()" style="margin-top: 50px">&times;</span>
    {{-- <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span> --}}
    <div class="imgmodal-content">
        <img id="img01" style="max-width:100%">
    </div>
</div>


<div id="myModal" class="my_modal col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12"
    style="color:red;z-index:999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999;background-color:#000000db">

    <div class="modal-content vehicle_modal_content">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12"
                style="width:100%!important;height:100%!important" id="slider_image">

                <div class="mySlides" style="width:100%!important;height: 100%!important;" id="slider_main">
                    <img src="{{ asset(@$vehicle['warehouse_image'][0]['name']) }}" alt=""
                        style="width:100%!important;height: 100%!important;">

                </div>

                @if (@$vehicle['warehouse_image'])
                    @foreach (@$vehicle['warehouse_image'] as $img)
                        <div class="mySlides col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12"
                            style="width:100%!important">
                            <img src="{{ asset($img['name']) }}" alt=""
                                style="    width: 104%!important;
                            height: 100%!important;
                            
                            margin-left: -15px;"
                                onclick="openModal();currentSlide(1)">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>





        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <div class="row" style="background-color: black;width: 798px;margin-left: 0px;" id="sliders_images">
            @if (@$vehicle['warehouse_image'])
                @foreach (@$vehicle['warehouse_image'] as $img)
                    <img src="{{ asset($img['name']) }}" alt=""class="item_4" class="showMainImage"
                        style="width:25%!important; " onclick="currentSlide(2)" class="hover-shadow cursor">
                @endforeach
            @endif
        </div>
    </div>
</div>
<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modal01").style.display = "none";
    }

    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }


    async function download_all(tab) {
        id = "{{ @$vehicle['id'] }}";
        $.ajax({
            method: 'post',
            url: '{{ route('vehicle/downloadImages/zipfile') }}',
            data: {
                'id': id,
                'tab': tab,
            },
            success: function(data) {
                var zip = new JSZip();
                var count = 0;
                var zipFilename = "images_bundle.zip";
                var images = data;
                console.log(data);
                images.forEach(async function(imgURL, i) {
                    console.log(i)
                    var filename = "image" + i + '.jpg'
                    var image = await fetch(imgURL)
                    var imageBlog = await image.blob()
                    var img = zip.folder("images");
                    img.file(filename, imageBlog, {
                        binary: true
                    });
                    count++
                    if (count == images.length) {
                        zip.generateAsync({
                            type: 'blob'
                        }).then(function(content) {
                            saveAs(content, zipFilename);
                        });
                    }
                })
            }
        });

    }
</script>
