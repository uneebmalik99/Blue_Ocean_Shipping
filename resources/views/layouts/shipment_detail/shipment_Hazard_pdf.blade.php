<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NON-HAZARDOUR REPORT</title>

</head>

<body>
    {{-- <button type="button" class="text-white form-control-sm border py-1 btn-info rounded modal_button"
         style="background: #1d6092;" onclick="printthis()">
        <div class="d-flex justify-content-center align-items-center">
            <span class="pl-2 font-size">Print</span>
        </div>
    </button> --}}

    @if ($button_hide == 'show')
        <div style="width: 218px;">
            <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
                style="background: #1d6092;float:left;" onclick="printthis()">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="pl-2 font-size">PRINT</span>
                </div>
            </button>
            <a href="{{ route('shipment_detail.shipment_Hazard_pdf', @$shipment[0]['id']) }}"
                class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
                style="background: #1d6092;float:left;">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="pl-2 font-size">PDF</span>
                </div>
            </a>
            <a class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
    style="background: #1d6092;float:left;" tab="{{ @$shipment[0]['id'] }}" id="hazard_pdf" onclick="sendpdfthroughmail(this.id)">
       <span class="pl-2 font-size">EMAIL</span>
   </a>
        </div>
    @endif


    <div id="thissection">
        <style>
            .non_hazard {
                border: 1px solid gray;
            }

            .header_line {
                text-align: start;
            }

            .non_hazard td {
                border-right: 1px solid gray;

            }

            .logo {
                text-align: center;
            }

            .img_logo {
                display: block;
                width: 25% !important;
                margin-left: -15px !important;
            }

            img {
                vertical-align: middle;
                border-style: none;
                width: 73%;
                margin-left: 0px;
            }

            .footer_head {
                margin-top: 30px;
            }

            .FOOTER {
                border: none;
                border-bottom: 1px solid black;
            }

            input:focus {
                outline: none !important;
            }
        </style>
        <div class="">

            <figure class="img_logo">
                <img src="{{ asset('images/login_logo.png') }}" alt="image">
            </figure>
            <div class="logo" style="margin-top: -47px;">
                <div style="background-color: red">
                    <h4>
                        <input type="text" value="NON-HAZARDOUS DECLARATION"
                            style="width:100%;border:none;text-align:center;" />
                    </h4>
                </div>
            </div>
        </div>

        <div>
            <table class="center non_hazard" style="width:87%;margin-left:78px;">
                <tbody>
                    <tr style="background-color: #c1c1c1!important;">
                        <td>
                            <input type="text" value="CARRIER"
                                style="width: 100%;border:none;outline:none;text-align:center; background-color: #c1c1c1!important;">
                        </td>
                        <td>
                            <input type="text" value="{{ @$shipment[0]['shipping_line'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center; background-color: #c1c1c1!important;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" value="VESSEL NAME / VOYAGE"
                                style="width: 100%;border:none;outline:none;text-align:center; ">
                        </td>
                        <td>
                            <input type="text" value="{{ @$shipment[0]['vessel'] }} {{ @$shipment[0]['voyage'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                    </tr>
                    <tr>
                        <td style=" background-color: #c1c1c1!important;">
                            <input type="text" value="ORIGIN"
                                style="width: 100%;border:none;outline:none;text-align:center; background-color: #c1c1c1!important;">
                        </td>
                        <td style=" background-color: #c1c1c1!important;">
                            <input type="text" value="{{ @$shipment[0]['loading_port'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center; background-color: #c1c1c1!important;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" value="DESTINATION"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                        <td>
                            <input type="text" value="{{ @$shipment[0]['destination_port'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                    </tr>
                    <tr>
                        <td style=" background-color: #c1c1c1!important;">
                            <input type="text" value="BOOKING NUMBER"
                                style="width: 100%;border:none;outline:none;text-align:center; background-color: #c1c1c1!important;">
                        </td>
                        <td style=" background-color: #c1c1c1!important;">
                            <input type="text" value="{{ @$shipment[0]['booking_number'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center; background-color: #c1c1c1!important;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" value="CONTAINER NUMBER"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                        <td>
                            <input type="text" value="{{ @$shipment[0]['container_no'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                    </tr>
                    <tr>
                        <td style=" background-color: #c1c1c1!important;">
                            <input type="text" value="NUMBER OF VEHICLES"
                                style="width: 100%;border:none;outline:none;text-align:center; background-color: #c1c1c1!important;">
                        </td>
                        <td style=" background-color: #c1c1c1!important;">
                            <input type="text" value="{{ count(@$shipment[0]['vehicle']) }}"
                                style="width: 100%;border:none;outline:none;text-align:center; background-color: #c1c1c1!important;">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="
            height: 250px;
        ">
                @if ($button_hide == 'show')
                    <p>
                        <textarea rows="7"
                            style="width: 86%;padding:0;margin:0;box-sizing:border-box;border:none;margin-left: 84px;margin-top: 19px;">
THIS IS TO CERTIFY THAT ALL VEHICLES INCLUDED IN THIS CONTAINER HAVE BEEN COMPLETELY DRAINED OF FUEL AND RUN UNTIL STALLED. BATTERIES ARE DISCONNECTED AND TAPED BACK AND ARE PROPERLY SECURED TO PREVENT MOVEMENT IN ANY DIRECTION. NO UNDECLARED HAZARDOUS MATERIALS ARE CONTAINERIZED, SECURED TO, OR STOWED IN THESE VEHICLES WITH THE ABOVE STATEMENT, THESE VEHICLES ARE CLASSIFIED AS NON-HAZARDOUS.
                </textarea>
                    </p>
                @else
                    <table>
                        <tr>
                            <td>
                                THIS IS TO CERTIFY THAT ALL VEHICLES INCLUDED IN THIS CONTAINER HAVE BEEN COMPLETELY
                                DRAINED OF FUEL AND RUN UNTIL STALLED. BATTERIES ARE DISCONNECTED AND TAPED BACK AND ARE
                                PROPERLY SECURED TO PREVENT MOVEMENT IN ANY DIRECTION. NO UNDECLARED HAZARDOUS MATERIALS
                                ARE CONTAINERIZED, SECURED TO,OR STOWED IN THIS VEHICL WITH THE ABOVE STATEMENT, THESE
                                VEHICLES ARE CLASSIFIED AS NON-HAZARDOUS.
                            </td>
                        </tr>
                    </table>
                @endif
                <div class="footer_head" style="clear:both; margin-top:-25px!important">
                    <div class="" style="float:right;margin-right:77px;">
                        <span>DATE:</span>
                        <input type="text" class="FOOTER">
                    </div>
                    <div class="" style="margin-left:80px;">
                        <SPAN>SIGNED:</SPAN>
                        <input type="text" class="FOOTER">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
