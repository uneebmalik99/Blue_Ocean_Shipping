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

    @if($button_hide == 'show')
    <div style="width: 118px;">
        <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
        style="background: #1d6092;float:left;" onclick="printthis()">
       <div class="d-flex justify-content-center align-items-center">
           <span class="pl-2 font-size">PRINT</span>
       </div>
    </button>
    <a href="{{ route('shipment_detail.shipment_Hazard_pdf', @$shipment[0]['id']) }}" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
        style="background: #1d6092;float:left;">
       <div class="d-flex justify-content-center align-items-center">
           <span class="pl-2 font-size">PDF</span>
       </div>
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
                border: 1px solid gray;

            }

            .logo {
                text-align: center;
            }

            .img_logo {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
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
        </div>
        <div class="logo">
            <h4>
                <input type="text" value="NON-HAZARDOUS DECLARATION"
                    style="width:100%;border:none;text-align:center;" />
            </h4>
        </div>
        <div>
            <table class="center non_hazard" style="width:100%">
                <tbody>
                    <tr>
                        <td>
                            <input type="text" value="CARRIER"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                        <td>
                            <input type="text" value="{{ @$shipment[0]['shipping_line'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" value="VESSEL NAME / VOYAGE"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                        <td>
                            <input type="text" value="{{ @$shipment[0]['vessel'] }} {{ @$shipment[0]['voyage'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" value="ORIGIN"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                        <td>
                            <input type="text" value="{{ @$shipment[0]['loading_port'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center;">
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
                        <td>
                            <input type="text" value="BOOKING NUMBER"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                        <td>
                            <input type="text" value="{{ @$shipment[0]['booking_number'] }}"
                                style="width: 100%;border:none;outline:none;text-align:center;">
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
                        <td>
                            <input type="text" value="NUMBER OF VEHICLES"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                        <td>
                            <input type="text" value="{{ count(@$shipment[0]['vehicle']) }}"
                                style="width: 100%;border:none;outline:none;text-align:center;">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>
                @if($button_hide == 'show')
                <p>
                    <textarea rows="7" style="width:100%;padding:0;margin:0;box-sizing:border-box;border:none;">
                    THIS IS TO CERTIFY THAT ALL VEHICLES INCLUDED IN THIS CONTAINER HAVE BEEN
                    COMPLETELY DRAINED OF FUEL AND RUN UNTIL STALLED. BATTERIES ARE DISCONNECTED
                    AND TAPED BACK AND ARE PROPERLY SECURED TO PREVENT MOVEMENT IN ANY
                    DIRECTION. NO UNDECLARED HAZARDOUS MATERIALS ARE CONTAINERIZED, SECURED TO,
                    OR STOWED IN THIS VEHICL
                    WITH THE ABOVE STATEMENT, THESE VEHICLES ARE CLASSIFIED AS NON-HAZARDOUS.
                </textarea>
                </p>
                @else
              <table>
                <tr>
                    <td>
                    THIS IS TO CERTIFY THAT ALL VEHICLES INCLUDED IN THIS CONTAINER HAVE BEEN
                    COMPLETELY DRAINED OF FUEL AND RUN UNTIL STALLED. 
                    <br>  BATTERIES ARE DISCONNECTED
                    AND TAPED BACK AND ARE PROPERLY SECURED TO PREVENT MOVEMENT IN ANY
                    DIRECTION. <br> NO UNDECLARED HAZARDOUS MATERIALS ARE CONTAINERIZED, SECURED TO,
                    OR STOWED IN THIS VEHICL
                    <br>
                    WITH THE ABOVE STATEMENT, THESE VEHICLES ARE CLASSIFIED AS NON-HAZARDOUS.
                    </td>
                </tr>
              </table>
              @endif
                <div class="footer_head" style="clear:both;">
                    <div class="" style="float:right;">
                        <span>DATE:</span>
                        <input type="text" class="FOOTER">
                    </div>
                    <div class="" style="float:left;">
                        <SPAN>SIGNED:</SPAN>
                        <input type="text" class="FOOTER">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
