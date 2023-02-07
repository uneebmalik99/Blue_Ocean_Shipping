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
        <div style="width: 242px;">
            <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
                style="background: #1d6092;float:left;" onclick="printthis()">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="pl-2 font-size"><i class="fa-solid fa-print" style="color:white;margin-right:3px;"></i> PRINT</span>
                </div>
            </button>
            <a href="{{ route('shipment_detail.shipment_Hazard_pdf', @$shipment[0]['id']) }}"
                class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
                style="background: #1d6092;float:left;"  target="_blank">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="pl-2 font-size"><i class="fa-solid fa-file-pdf" style="color:white;margin-right:3px;"></i> PDF</span>
                </div>
            </a>
            <a class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
                style="background: #1d6092;float:left;" tab="{{ @$shipment[0]['id'] }}" id="hazard_pdf"
                onclick="sendpdfthroughmail(this.id)">
                <span class="pl-2 font-size"><i class="fa-solid fa-envelope" style="color:white;margin-right:3px;"></i> EMAIL</span>
            </a>
        </div>
    @endif


    <div id="thissection">
        <style>
            .non_hazard {
                border: 1px solid #635b5b;
            }

            .header_line {
                text-align: start;
            }

            .non_hazard td {
                border-right: 1px solid #635b5b;

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
        <div>
            <table style="width: 100%">
                <tr>
                    <td style="width:30%">
                        <figure class="img_logo">
                            <img src="{{ asset('images/login_logo.png') }}" alt="image"
                                style="width: 192%;height:98px">
                        </figure>
                    </td>
                    <td>
                        <h4>
                            <input type="text" value="NON-HAZARDOUS DECLARATION"
                                style="width:100%;border:none;text-align:left; " />
                        </h4>
                    </td>
                </tr>
        </div>
    </div>
    </div>


    </table>
    <table class="" style="width:95%;border:1px solid #535050">
        <tbody>
            <tr style="background-color: #F0F3F4!important;">
                <td style="">
                    <input type="text" value="CARRIER"
                        style="width:98%;text-align:center;background-color: #F0F3F4!important;border:none ;border-right:3px black!important;">
                </td>
                <td>
                    <input type="text" value="{{ @$shipment[0]['shipping_line'] }}"
                        style="width:98%;text-align:center;background-color: #F0F3F4!important; border:none;">
                </td>
            </tr>
            <tr>
                <td style="padding: none!important;">
                    <input type="text" value="VESSEL NAME / VOYAGE"
                        style="width: 98%;border:none;padding: none!important;outline:none;text-align:center; ">
                </td>
                <td style="padding: none!important;">
                    <input type="text" value="{{ @$shipment[0]['vessel'] }} {{ @$shipment[0]['voyage'] }}"
                        style="width: 98%;border:none;outline:none;padding: none!important;text-align:center;padding: none!important;">
                </td>
            </tr>
            <tr>
                <td style="padding: none!important;background-color: #F0F3F4!important;;">
                    <input type="text" value="ORIGIN"
                        style="width: 98%;border:none;padding: none!important;outline:none;text-align:center;background-color: #F0F3F4!important; ">
                </td>
                <td style="padding: none!important;background-color: #F0F3F4!important;">
                    <input type="text" value="{{ @$shipment[0]['loading_port'] }} {{ @$shipment[0]['voyage'] }}"
                        style="width: 98%;border:none;outline:none;padding: none!important;text-align:center;padding: none!important;background-color: #F0F3F4!important;">
                </td>
            </tr>
            <tr>
                <td style="padding: none!important;">
                    <input type="text" value="DESTINATION"
                        style="width: 98%;border:none;outline:none;padding: none!important;text-align:center;">
                </td>
                <td style="padding: none!important;">
                    <input type="text" value="{{ @$shipment[0]['destination_port'] }}"
                        style="width: 98%;border:none;padding: none!important;outline:none;text-align:center;">
                </td>
            </tr>
            <tr>
                <td style=" background-color: #F0F3F4!important;padding: none!important;;">
                    <input type="text" value="BOOKING NUMBER"
                        style="width: 98%;border:none;padding: none!important;outline:none;text-align:center; background-color: #F0F3F4!important;">
                </td>
                <td style=" background-color: #F0F3F4!important;padding: none!important;">
                    <input type="text" value="{{ @$shipment[0]['booking_number'] }}"
                        style="width: 98%;border:none;outline:none;text-align:center;padding: none!important; background-color: #F0F3F4!important;">
                </td>
            </tr>
            <tr>
                <td style="padding: none!important;">
                    <input type="text" value="CONTAINER NUMBER"
                        style="width: 98%;border:none;outline:none;text-align:center;padding: none!important;">
                </td>
                <td style="padding: none!important;">
                    <input type="text" value="{{ @$shipment[0]['container_no'] }}"
                        style="width: 98%;border:none;outline:none;text-align:center;padding: none!important;">
                </td>
            </tr>
            <tr>
                <td style=" background-color: #F0F3F4!important;padding: none!important;;">
                    <input type="text" value="NUMBER OF VEHICLES"
                        style="width: 98%;border:none;padding: none!important;outline:none;text-align:center; background-color: #F0F3F4!important;">
                </td>
                <td style=" background-color: #F0F3F4!important;padding: none!important;padding: none!important;">
                    <input type="text" value="{{ count(@$shipment[0]['vehicle']) }}"
                        style="width: 98%;border:none;padding: none!important;outline:none;text-align:center; background-color: #F0F3F4!important;">
                </td>
            </tr>
        </tbody>
    </table>
    <div style="height: 250px;margin-top:15px;">
        @if ($button_hide == 'show')
            <p>
                <textarea rows="7" style="width: 86%;padding:4;margin:0;box-sizing:border-box;border:none;margin-left: 84px; ">
THIS IS TO CERTIFY THAT ALL VEHICLES INCLUDED IN THIS CONTAINER HAVE BEEN COMPLETELY DRAINED OF FUEL AND RUN UNTIL STALLED. BATTERIES ARE DISCONNECTED AND TAPED BACK AND ARE PROPERLY SECURED TO PREVENT MOVEMENT IN ANY DIRECTION. NO UNDECLARED HAZARDOUS MATERIALS ARE CONTAINERIZED, SECURED TO, OR STOWED IN THESE VEHICLES WITH THE ABOVE STATEMENT, THESE VEHICLES ARE CLASSIFIED AS NON-HAZARDOUS.
                </textarea>
            </p>
        @else
            <table>
                <tr>
                    <td>
                        THIS IS TO CERTIFY THAT ALL VEHICLES INCLUDED IN THIS CONTAINER HAVE BEEN COMPLETELY DRAINED OF
                        FUEL AND RUN UNTIL STALLED. BATTERIES ARE DISCONNECTED AND TAPED BACK AND ARE PROPERLY SECURED
                        TO PREVENT MOVEMENT IN ANY DIRECTION. NO UNDECLARED HAZARDOUS MATERIALS ARE CONTAINERIZED,
                        SECURED TO,OR STOWED IN THIS VEHICL WITH THE ABOVE STATEMENT, THESE VEHICLES ARE CLASSIFIED AS
                        NON-HAZARDOUS.
                    </td>
                </tr>
            </table>
        @endif
        <div class="footer_head row" style="clear:both;">
            <table style="width:100%">
                <tr>
                    <td>
                        <SPAN style="margin-left: 105px;">SIGNED:</SPAN>
                        <input type="text" class="FOOTER">
                    </td>
                    <td>
                        <span style="">DATE:</span>
                        <input type="text" class="FOOTER"style="">
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</body>

</html>
