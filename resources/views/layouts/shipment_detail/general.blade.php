{{-- {{ dd($shipments) }} --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .imagemodal {
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

    .imagemodal-content {
        margin: auto;
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    .imagemodal-hover-opacity {
        opacity: 1;
        filter: alpha(opacity=100);
        -webkit-backface-visibility: hidden
    }

    .imagemodal-hover-opacity:hover {
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


    #shipment_details thead th {
        position: sticky !important;
        top: 0 !important;
        background: #6d71ff !important;
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
    .shipment_model_slider {
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
    .shipment_modal_content_slider {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 800px;
    }

    /* The Close Button */
    .shipment_close_slider {
        color: red !important;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .shipment_close_slider:hover,
    .shipment_close_slider:focus {
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
        top: 30%;
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

    /* @media screen and (max-width: 991px) {
        .information_second_div {
            margin-top: 50px;
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
    margin-top: 16px!important;
    margin-left: 3px!important;
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
    margin-top: 22px!important;
    margin-left: 17px!important;
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
    margin-top: 35px!important;
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
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index:999999">
    <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between title_style">
                <div>
                    <h5 class="modal-title text-white" id="exampleModalLabel"></h5>
                </div>
                <div>
                    <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close"
                        style="margin-top: -11px;
                 font-size: 26px;" onclick="modelClose()">
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
    <div class="col-sm-10 col-md-10 col-lg-4 pl-0">
        <div class="information_card">
            <div class="d-flex justify-content-between">

                <h6>Export Details</h6>
                @role(['Super Admin', 'Sub Admin'])
                    <button class='edit-button mr-3 mt-1' id='{{ @$shipments[0]['id'] }}' onclick='editShipment(this.id)'
                        style="height: 30px!important;">
                        <a>
                            <svg width='16' height='14' viewBox='0 0 16 16' fill='none'
                                xmlns='http://www.w3.org/2000/svg'>
                                <path
                                    d='M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z'
                                    fill='#2C77E7' />
                            </svg>
                        </a>
                    </button>
                @endrole
            </div>
            <div class="information_div">
                <div class="d-flex justify-content-between my-2 py-1 "
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Company Name</span>
                    <span class="information_text">{{ @$shipments[0]['company_name'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Customer Email</span>
                    <span class="information_text">{{ @$shipments[0]['customer_email'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Customer Phone</span>
                    <span class="information_text">{{ @$shipments[0]['customer_phone'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipment Type</span>
                    <span class="information_text">{{ @$shipments[0]['shipment_type'] }}</span>
                </div>


                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipment Status</span>
                    @if (@$shipments[0]['status'] == '1')
                        <span class="information_text">Booked</span>
                    @elseif (@$shipments[0]['status'] == '2')
                        <span class="information_text">Shipped</span>
                    @elseif (@$shipments[0]['status'] == '3')
                        <span class="information_text">Arrived</span>
                    @else
                        <span class="information_text">Completed</span>
                    @endif
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Sale Date</span>
                    <span class="information_text" style="overflow: hidden;">{{ @$shipments[0]['sale_date'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Booking Number</span>
                    <span class="information_text">{{ @$shipments[0]['booking_number'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Container Number</span>
                    <span class="information_text">{{ @$shipments[0]['container_no'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Container Size</span>
                    <span class="information_text">{{ @$shipments[0]['container_size'] }}</span>
                </div>

                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Container Type</span>
                    <span class="information_text">{{ @$shipments[0]['container_type'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipping Reference</span>
                    <span class="information_text">{{ @$shipments[0]['shipping_reference'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">XTN Number</span>
                    <span class="information_text">{{ @$shipments[0]['xtn_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">OTI Number</span>
                    <span class="information_text">{{ @$shipments[0]['oti_number'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipper</span>
                    <span class="information_text">{{ @$shipments[0]['shipper'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Terminal</span>
                    <span class="information_text">{{ @$shipments[0]['loading_terminal'] }}</span>
                </div>
                <div class="d-flex justify-content-between my-2 py-1"
                    style="border: 1px solid rgba(26, 88, 133, 0.17);
                border-radius: 10px;width: 90%;margin:6px auto">
                    <span class="infromation_mainText">Shipping Line</span>
                    <span class="information_text">{{ @$shipments[0]['shipping_line'] }}</span>
                </div>
                {{-- <div class="information_button d-flex justify-content-center mt-3" style="margin:50px">
                    <button style="background: #1F689E; transform: skew(-30deg) !important;border:none;
                    border-radius: 4px;color:white;margin-right: 6px;font-size: 12px;">
                        <div style="transform: skew(30deg) !important;padding:1px 4px">
                            Trucking PDF
                        </div>
                    </button>
                    <button style="background: #1CACD9;border:none;font-size:12px;
                    transform: skew(-30deg) !important;
                                    border-radius: 4px;color:white;margin-right: 3px;">
                        <div style="transform: skew(30deg) !important;padding:1px 12px">Edit</div>
                    </button>
                </div> --}}
                <br>
                <div class="information_button d-flex justify-content-center">
                    @role(['Super Admin', 'Sub Admin'])
                        <a id="non_hazard" onclick="Openpdf(this.id)"
                            style="color:white;text-decoration:none;font-size: 12px;cursor:pointer" target="_blank">
                            <button
                                style="background: #1F689E; transform: skew(-30deg) !important;border:none;
                    border-radius: 4px;color:white;margin-right: 6px;font-size: 12px;">
                                <div style="transform: skew(30deg) !important;padding:1px 4px">
                                    Non Hazard
                                    Report
                                </div>
                            </button>
                        </a>

                        <a id="houston" onclick="Openpdf(this.id)"
                            style="color:white;text-decoration:none;font-size: 12px;" target="_blank">
                            <button
                                style="background: #1F689E; transform: skew(-30deg) !important;border:none;
                    border-radius: 4px;color:white;margin-right: 6px;font-size: 12px;">
                                <div style="transform: skew(30deg) !important;padding:1px 4px">
                                    Houston Cover Letter
                                </div>
                            </button>
                        </a>
                    @endrole
                </div>

                <div class="information_button d-flex justify-content-center mt-2">
                    <a id="bol" onclick="Openpdf(this.id)"
                        style="color:white;text-decoration:none;font-size: 12px;" target="_blank">
                        <button
                            style="background: #1F689E; transform: skew(-30deg) !important;border:none;
                    border-radius: 4px;color:white;margin-right: 6px;font-size: 12px;">
                            <div style="transform: skew(30deg) !important;padding:1px 4px">
                                BOL
                            </div>
                        </button>
                    </a>
                    @role(['Super Admin', 'Sub Admin'])
                        <a id="us_custom" onclick="Openpdf(this.id)"
                            style="color:white;text-decoration:none;font-size: 12px;" target="_blank">
                            <button
                                style="background: #1F689E; transform: skew(-30deg) !important;border:none;
                    border-radius: 4px;color:white;margin-right: 6px;font-size: 12px;">
                                <div style="transform: skew(30deg) !important;padding:1px 4px">
                                    US Custom
                                </div>
                            </button>
                        </a>
                    @endrole

                    <a id="dock_receipt" onclick="Openpdf(this.id)"
                        style="color:white;text-decoration:none;font-size: 12px;" target="_blank">
                        <button
                            style="background: #1F689E; transform: skew(-30deg) !important;border:none;
                    border-radius: 4px;color:white;margin-right: 6px;font-size: 12px;">
                            <div style="transform: skew(30deg) !important;padding:1px 4px">
                                DOCK RECEIPT
                            </div>
                        </button>
                    </a>
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
                    <h4>Shippment Information</h4>
                </div>
            </div>
            <div class="row" style="">
                <div class="col-sm-12 col-md-5 col-lg-5" style="margin-top:-5px">
                    <div class="d-flex justify-content-between my-2 py-1 "
                        style="border: 1px solid rgba(26, 88, 133, 0.17);border-radius: 10px;width: 90%;margin:6px auto">
                        <span class="infromation_mainText">EXPORTER ID</span>
                        <span class="information_text">78697</span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1 "
                        style="border: 1px solid rgba(26, 88, 133, 0.17);border-radius: 10px;width: 90%;margin:6px auto">
                        <span class="infromation_mainText">EXPORTER TYPE ISSUER</span>
                        <span class="information_text">test</span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1 "
                        style="border: 1px solid rgba(26, 88, 133, 0.17);border-radius: 10px;width: 90%;margin:6px auto">
                        <span class="infromation_mainText">TRANSPORTATION VALUE</span>
                        <span class="information_text">4456456</span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1 "
                        style="border: 1px solid rgba(26, 88, 133, 0.17);border-radius: 10px;width: 90%;margin:6px auto">
                        <span class="infromation_mainText">EXPORTER DOB</span>
                        <span class="information_text">20 Feb</span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1 "
                        style="border: 1px solid rgba(26, 88, 133, 0.17);border-radius: 10px;width: 90%;margin:6px auto">
                        <span class="infromation_mainText">CONSIGNEE DOB</span>
                        <span class="information_text">20 June</span>
                    </div>
                    <div class="d-flex justify-content-between my-2 py-1 "
                        style="border: 1px solid rgba(26, 88, 133, 0.17);border-radius: 10px;width: 90%;margin:6px auto">
                        <span class="infromation_mainText">LABEL</span>
                        <span class="information_text">Testing</span>
                    </div>

                    <div class="d-flex justify-content-start" style="width: 80%;margin-top:6px;margin-left:20px;">
                        Note
                    </div>
                    <div class="d-flex justify-content-start">
                        {{-- <textarea name="" id="" cols="40" rows="4"
                            style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;
                    color: #6D8DA6;text-align:start!important;"
                            disabled>
                    @if (@$shipments[0]['notes'])
{{ @$shipments[0]['notes'] }}
@else
--
@endif
                </textarea>
                        <br> --}}


                        <div style="border: 1px solid rgba(26, 88, 133, 0.17);
                        width: 86%;
                        height: 103px;
                        border-radius: 10px;
                        color: #6D8DA6;
                        text-align: start!important;
                        margin-left: 18px;margin-top:5px;padding:0 15px;">
                            @if (@$shipments[0]['notes'])
                                {{ @$shipments[0]['notes'] }}
                            @else
                                --
                            @endif
                        </div>
                    </div>

                    {{-- <div style="width: 90%; " class="d-flex justify-content-end "> --}}

                    {{-- <button class="send mt-3"
                            style="background: #1CACD9; border-radius: 4px;transform: skew(-30deg) !important;font-size: 13px;border:none;color:white; ">
                            <div style="transform: skew(30deg) !important;padding:1px 12px ">
                                Send
                            </div>
                        </button> --}}

                    {{-- </div> --}}


                </div>
                <div class="col-sm-12 col-md-7 col-lg-7 mb-4">
                    {{-- <div class="information_gallary">

                        <div class="gallary_header d-flex">
                            <div class="row"> --}}

                    <div class="information_gallary image_section col-11 col-sm-11 col-md-11 col-lg-11 order-xl-11 mx-auto"
                        style="margin-top: 1px;padding-top: 12px;height:360px!important;overflow:scroll!important;">


                        @if (@$shipments[0]['loading_image'])
                            @foreach (@$shipments[0]['loading_image'] as $img)
                                <img src="{{ asset($img['name']) }}" alt="vehicle_img" class="item_1 changeImage"
                                    style="width:23.5%;height: auto;" onclick="onClick(this)"
                                    class="modal-hover-opacity"class="hover-shadow cursor">
                            @endforeach
                        @else
                            <h6 class="text-center mt-5 w-100" style="color:gray">No Image Found</h6>
                        @endif



                    </div>
                    {{-- </div>

                        </div>


                    </div> --}}
                    @if ($shipments[0]['loading_image'])
                        <div class="row mt-4">
                            <div class="col-12 d-flex justify-content-center ">
                                <a id="{{ @$shipments[0]['id'] }}" onclick="downloadImages_zip(this.id)">
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
            {{-- <div class="px-3"> --}}
            <div class="row px-3 mt-2">
                <div class="mx-auto shipment_table w-100 scroll"
                    style="background: rgba(255, 255, 255, 0.52);
                    box-shadow: 3px 5px 16px rgb(92 174 235 / 55%);height:388px!important">
                    <table class="w-100 table scroll"
                        style="width:100%!important;border:none!important;overflow-x:scroll!important;">
                        <thead class="bg-custom text-white">
                            <tr>
                                <th>#</th>
                                <th>Year</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Color</th>
                                <th>Vin</th>
                                <th>Status</th>
                                <th>LOT #</th>
                                <th>Title State</th>
                                <th>View</th>
                            </tr>

                        </thead>

                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($shipments[0]['vehicle'] as $vehicles)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ @$vehicles['year'] }}</td>
                                    <td>{{ @$vehicles['make'] }}</td>
                                    <td>{{ @$vehicles['model'] }}</td>
                                    <td>{{ @$vehicles['color'] }}</td>
                                    <td>{{ @$vehicles['vin'] }}</td>
                                    <td>
                                        @if (@$shipments[0]['status'] == '1')
                                            <span class="">Booked</span>
                                        @elseif (@$shipments[0]['status'] == '2')
                                            <span class="">Shipped</span>
                                        @elseif (@$shipments[0]['status'] == '3')
                                            <span class="">Arrived</span>
                                        @else
                                            <span class="">Completed</span>
                                        @endif
                                    </td>
                                    <td>{{ @$vehicles['lot'] }}</td>
                                    <td>{{ @$vehicles['title_state'] }}</td>
                                    <td>
                                        <button class="profile-button">
                                            <a href="{{ route('vehicle.profile') . '/' . @$vehicles['id'] }}"
                                                target="__blank">
                                                <svg width="14" height="13" viewBox="0 0 16 14"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z"
                                                        fill="#048B52" />
                                                    <path
                                                        d="M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z"
                                                        fill="#048B52" />
                                                </svg>
                                            </a>
                                        </button>
                                    </td>
                                </tr>

                                @php
                                    $i++;
                                @endphp
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
            {{-- </div> --}}

        </div>
    </div>
</div>


{{-- <div class="d-flex justify-content-end">
    <div class="col-2">
        <button type="button" class="btn col-12"><a href="{{route ('shipment_detail.shipment_Hazard_pdf')}}">export pdf</a></button>
    </div>
    <div class="col-2">
    <button type="button" class="btn col-12"><a href="{{route ('shipment_detail.shipment_Houston_pdf')}}">export Houston</a></button>
    </div>
    <div class="col-2">
        <button type="button" class="btn col-12"><a href="{{route ('shipment_detail.shipment_Landing_pdf')}}">export Landing</a></button>
    </div>
    <div class="col-2">
        <button type="button" class="btn col-12"><a href="{{route ('shipment_detail.shipment_Custom_pdf')}}">export Custom</a></button>
    </div>
    <div class="col-2">
        <button type="button" class="btn col-12">pdf</button>
    </div>
</div> --}}

<div id="modal01" class="imagemodal" onclick="this.style.display='none'" style="z-index: 999999999999!important;">
    <span class="close vehicle_close cursor" onclick="closeModal()"
        style="margin-top: 40px;margin-right:32px!important;">&times;</span>

    <div class="imagemodal-content">
        <img id="img01" style="max-width:100%">
    </div>
</div>

<div id="myModal" class="modal shipment_model_slider col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12"
    style="color:red;z-index:999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999;background-color:#000000db">
    <span class="close shipment_close_slider cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content shipment_modal_content_slider">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12 "
                style="width:104%!important;height:100%!important">

                <div class="mySlides" style="width:100%!important;margin-left: -15px">

                    <img src="{{ asset(@$shipments[0]['loading_image'][0]['name']) }}" alt=""
                        style="width: 104%!important;height: 100%;">

                </div>

                @if (@$shipments[0]['loading_image'])
                    @foreach (@$shipments[0]['loading_image'] as $img)
                        <div
                            class="mySlides col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12"style="left:-2%;width:80%!important">
                            <img src="{{ asset($img['name']) }}" alt=""
                                style="width: 137%!important;height: 100%;margin-left: -15px;"
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

        <div class="row" style="background-color: black;width: 798px;margin-left: 0px;">
            @if (@$shipments[0]['loading_image'])
                @foreach (@$shipments[0]['loading_image'] as $img)
                    <img src="{{ asset($img['name']) }}" alt=""class="item_4" class="showMainImage"
                        style="width:25%!important" onclick="currentSlide(2)" class="hover-shadow cursor">
                @endforeach
            @endif


        </div>
    </div>
</div>
<script>
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
    }

    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modal01").style.display = "none";
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

    function shipmentChangeImage(src) {
        // imagePath = $('.changeImage').attr('src');
        // alert(imagePath);

        $('#main_image_box').attr('src', src);
        $('#download_shipment_image').attr('href', src);
    }

    async function downloadImages_zip(id) {

        $.ajax({
            method: 'get',
            url: '{{ route('shipment/downloadImages/zipfile') }}' + '/' + id,
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

    function printthis() {
        $("#thissection").printThis({
            "debug": false,
            "importCSS": true,
            "importStyle": false,
            "pageTitle": "NON HAZARDOUS MATERIAL",
            "removeInline": false,
            "printDelay": 200,
            "header": null,
            "formValues": true
        });
    }


    function Openpdf(tab) {

        id = "{{ @$shipments[0]['id'] }}";

        $.ajax({
            type: 'post',
            url: '{{ route('shipment.pdf') }}',
            data: {
                'id': id,
                'tab': tab
            },
            success: function(data) {
                $('#exampleModal').modal('show');
                $('.modal-body').html(data);
            }
        });
    }

    function modelClose() {
        $('#exampleModal').modal('hide');
    }
</script>
