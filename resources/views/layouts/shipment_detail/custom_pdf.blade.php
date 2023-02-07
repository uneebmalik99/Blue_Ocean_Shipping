<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>US CUSTOM</title>
</head>


<body>
{{-- <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
    style="background: #1d6092;" onclick="printthis()">
   <div class="d-flex justify-content-center align-items-center">
       <span class="pl-2 font-size">Print</span>
   </div>
</button> --}}

@if($button_hide == 'show')
<div style="width: 228px;">
    <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
    style="background: #1d6092;float:left;" onclick="printthis()">
   <div class="d-flex justify-content-center align-items-center">
       <span class="pl-2 font-size"><i class="fa-solid fa-print" style="color:white;"></i> PRINT</span>
   </div>
</button>
<a href="{{ route('shipment_detail.shipment_Custom_pdf', @$shipment[0]['id']) }}" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
    style="background: #1d6092;float:left;" target="_blank">
   <div class="d-flex justify-content-center align-items-center">
       <span class="pl-2 font-size"><i class="fa-solid fa-file-pdf" style="color:white"></i> PDF</span>
   </div>
</a>
<a class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
    style="background: #1d6092;float:left;" tab="{{ @$shipment[0]['id'] }}" id="custom_pdf" onclick="sendpdfthroughmail(this.id)">
       <span class="pl-2 font-size"><i class="fa-solid fa-envelope" style="color:white;"></i> EMAIL</span>
   </a>
</div>
@endif


    <div id="thissection">


        <style>
            * {
                font-family: sans-serif;
            }
        
            .header {
                text-align: center;
                font-size: medium;
        
            }
        
            .h_footer {
                /* align-items: center; */
                text-align: center;
                font-size: x-small;
                text-decoration: underline;
                /* border-spacing: 60px; */
        
            }
        
            .fff_2 {
                text-align: center;
                font-size: x-small;
            }
        
            .th_text {
                font-weight: bold;
                text-align: center;
                padding-top: 10px;
                padding-bottom: 10px;
            }
        
            .td_text {
                text-align: center;
                padding-top: 5px;
                padding-bottom: 5px;
                font-size: small;
                font-family: 'Times New Roman', Times, serif !important;
            }
        
            .td_last {
                border: 1px solid black;
            }
        
            /* .text_last {
                margin-top: 10px;
            } */
        
            .t2_header {
                text-align: center;
                font-size: small;
            }
        
            .tbl_b {
                border: none;
                border-collapse: collapse;
            }
        
            .t_th {
                border-bottom: 1px solid black;
                border-collapse: collapse;
            }
        
            /* .t_data{
                border: 1px solid black;
                border-collapse: collapse;
            } */
            .t_par {
                border-bottom: 1px solid black;
                border-collapse: collapse;
            }
        
            .t_brd {
                /* border: 1px solid black; */
                border-collapse: inherit !important;
                text-align: center;
                padding-top: 5px;
        
                /* border-width: 3px !important; */
                border-top: 1px solid black !important;
        
            }
        
            .t_headers {
                /* background-color: red; */
                width: 130px;
            }
        
            .address {
                padding-top: 10px;
            }
        
            #blue {
                width: 235px;
            }
        
            #vessel {
                width: 170px;
            }
        
            .w_fax {
                width: 10px;
            }
        
            #v_ww {
                width: 130px;
            }
        
            .adii {
                border-top: 1px solid black;
                text-align: center;
                font-size: smaller;
            }
        
            .ppp {
                padding-top: 8px;
            }
        
            .box_1 {
                padding-top: 5px;
                /* border: 1px solid red; */
            }
        
            .img_div {
                margin: 0 20px 0 20px;
                /* padding: 0 20px 20px 0 20px ; */
        
            }
        
            .desty {
                width: 100px;
            }
        
            .ghk {
                width: 50px;
            }
            .text_itn{
                font-size: x-small;
            }
            td{
                font-size:12px!important;
            }
            label {
    /* Other styling... */
    text-align: right;
    clear: both;
    float:left;
    margin-right:15px;
    margin-top:6px;
    font-weight: bold;
    font-size: 11px!important;
}
        </style>



<table class="tbl_0" style="width:100%;">
    <tbody>
        <tr>
            <td class="" style="text-align:start;width:40%;">
                <img src="{{ asset('images/logo_2.png') }}" class=""
                    alt=""style="width:100px;height: 80px!important;">
            </td>
            <td class="" style="width:60%;">
                <input type="text" value="U.S. CUSTOMS AND BORDER PROTECTION"
                    style="width: 98%;border:none;outline:none;text-align:start;font-weight:bold;font-size:16.5px;text-decoration:underline rgb(133, 125, 125)">
            </td>
        </tr>

    </tbody>
</table>
        {{-- <div class="h_footer my-2"> --}}
          <input type="text" value="COVER LETTER" style="width: 100%;border:none;outline:none;text-align:center;">
        {{-- </div> --}}

    <div style="border:1px solid black;">
    
        <table style="width:100%;">
            <thead>
                <tr style="border:1px solid lightgray!important;">
                    <td class="th_text"><input type="text" value="YEAR" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;font-size:11px!important;border-bottom:.8px solid lightgray;"></td>
                    <td class="th_text"><input type="text" value="MAKE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;font-size:11px!important;border-bottom:.8px solid lightgray;"></td>
                    <td class="th_text"><input type="text" value="MODEL" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;font-size:11px!important;border-bottom:.8px solid lightgray;"></td>
                    <td class="th_text"><input type="text" value="VIN" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;font-size:11px!important;border-bottom:.8px solid lightgray;"></td>
                    <td class="th_text"><input type="text" value="VALUE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;font-size:11px!important;border-bottom:.8px solid lightgray;"></td>
                </tr>
                
            </thead>
            <tbody>
                @foreach ($shipment[0]['vehicle'] as $vehicle)
                    
                <tr style="border-bottom: .8px solid lightgray;">
                    <td class="td_text"><input type="text" value="{{ @$vehicle['year'] }}" style="width: 100%;border:none;outline:none;text-align:start;border-bottom:.8px solid lightgray;font-size:10px!important;"></td>
                    <td class="td_text"><input type="text" value="{{ @$vehicle['make'] }}" style="width: 100%;border:none;outline:none;text-align:start;border-bottom:.8px solid lightgray;font-size:10px!important;"></td>
                    <td class="td_text"><input type="text" value="{{ @$vehicle['model'] }}" style="width: 100%;border:none;outline:none;text-align:start;border-bottom:.8px solid lightgray;font-size:10px!important;"></td>
                    <td class="td_text"><input type="text" value="{{ @$vehicle['vin'] }}" style="width: 100%;border:none;outline:none;text-align:start;border-bottom:.8px solid lightgray;font-size:10px!important;"></td>
                    <td class="td_text"><input type="text" value="{{ @$vehicle['value'] }}" style="width: 100%;border:none;outline:none;text-align:start;border-bottom:.8px solid lightgray;font-size:10px!important;"></td>
                    
                </tr>
                @endforeach
    
            </tbody>
        </table>
        {{-- <div class="text_last"> --}}
            <input type="text" value="ROLLOVER____ (Please check if a cover letter was previously validated)" style="width: 94%;border:none;outline:none;text-align:start;font-size:10px;">
        {{-- </div> --}}
        <hr style="margin:0;border-top:.8px!important;">
        <table style="width:100%;" class="">
            <tbody>
                <tr>
                    <td colspan="6" class="t2_header" style="border-bottom: .8px solid lightgray;">
                        <input type="text" value="EXPORTER INFORMATION" style="width: 100%;border:none;outline:none;text-align:center;font-weight:bold;margin-top:12px;font-size:11px!important;">
                    </td>
                </tr>
                <tr>
                    <td class="t_headers"><input type="text" value="Exporter (USPPI) Name:" style="width: 98%;border:none;outline:none;text-align:start;font-weight:bold;font-size:11px!important;"></td>
                    <td colspan="5" class="t_th"><input type="text" value=" {{ @$shipment[0]['customer']['shippers'][0]['shipper_name'] }}" style="width: 98%;border:none;outline:none;text-align:start;"></td>
                    <!-- <td class=""></td> -->
                </tr>
                <tr>
                    <td class="address"><input type="text" value="U.S. Address: " style="width: 30%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                    <td class="">
                        <input type="text" value="" style="width: 100%;border:none;outline:none;text-align:start;">
                        <div class="adii" style="font-size:11px!important;">Street</div>
                    </td>
                    <td class="">
                        <input type="text" value="" style="width: 100%;border:none;outline:none;text-align:start;">
                        <div class="adii" style="font-size:11px!important;">City</div>
                    </td>
                    <td class="">
                        <input type="text" value="" style="width: 100%;border:none;outline:none;text-align:start;">
                        <div class="adii" style="font-size:11px!important;">State</div>
                    </td>
                    <td class="">
                        <input type="text" value="" style="width: 100%;border:none;outline:none;text-align:start;">
                        <div class="adii" style="font-size:11px!important;">Zip</div>
                    </td>
                    <!-- <td class=""></td> -->
                </tr>
                <tr>
                    <td colspan="2" class="" style="">
                        <label for="phone">Phone:</label> <input type="text" id="phone" value="--" style="width: 90%;border:none;outline:none;text-align:start;border-bottom:1px solid black;">
                    </td>
                     <td></td>
                    <td colspan="2" class="" style="">
                        <label for="fax">Fax:</label> <input type="text" id="fax" value="--" style="width: 100%;border:none;outline:none;text-align:start;border-bottom:1px solid black;">
                    </td>
                    {{-- <td class=""></td>
                    <td></td> --}}
                </tr>
                <tr>
                    <td></td>
                    <td id="blue" class=""></td>
                    <td class="w_fax"></td>
                    <!-- <td class="t_th">hhh</td> -->
                    <td colspan="4" class=""></td>
                </tr>
                <tr>
                    <td colspan="2" class="" style="">
                    <b style="font-size: 11px!important;">Filing Agent/Freight Forwarder: </b><input type="text" id="phone" value="--" style="border:border;outline:none;text-align:start;border-bottom:1px solid black;">
                    </td>
                     <td class=""></td>
                    <td colspan="2" class="" style="">
                        <label for="fax">Contact:</label> <input type="text" id="fax" value="--" style="width: 100%;border:none;outline:none;text-align:start;border-bottom:1px solid black;">
                    </td>
                </tr>
    
                <tr>
                    <td></td>
                    <td id="blue" class=""></td>
                    <td class="w_fax"></td>
                    <!-- <td class="t_th">hhh</td> -->
                    <td colspan="4" class=""></td>
                </tr>
    
                <tr>
                    <td colspan="2" class="" style="">
                        <b style="font-size:11px!important;">Loading location </b> <br> <small>(if different from forwarder)</small>:<input type="text" id="phone" value="--" style="border:border;outline:none;text-align:start;border-bottom:1px solid black;">
                        </td>
                         <td class=""></td>
                        <td colspan="2" class="" style="">
                            <label for="fax">Contact:</label> <input type="text" id="fax" value="--" style="width: 100%;border:none;outline:none;text-align:start;border-bottom:1px solid black;">
                        </td>
                </tr>
    
                <tr>
                    <td></td>
                    <td id="blue" class=""></td>
                    <td class="w_fax"></td>
                    <!-- <td class="t_th">hhh</td> -->
                    <td colspan="4" class=""></td>
                </tr>

                <tr>
                    <td></td>
                    {{-- <td id="blue" class="t_brd"></td> --}}
                    <td class="w_fax"></td>
                    <!-- <td class="t_th">hhh</td> -->
                    {{-- <td colspan="5" class="t_brd"></td> --}}
                </tr>
    
            </tbody>
        </table>
        <hr style="margin:0;border-top:.8px!important;">
    
        <table style="width:100%;" class="tbl_b">
            <tbody>
                <tr>
                    <td colspan="6" class="t2_header" style=""> <input type="text" value="EXPORTER INFORMATION" style="width: 99.5%;border:none;outline:none;text-align:center;font-weight:bold;margin-top:12px;margin-bottom:6px;border-bottom:.8px solid lightgray;"></td>
                </tr>
            
                <tr>
                    <td colspan="2" class="" style="">
                        <spna style="font-size:11px!important;font-weight:bold;">Booking #:</span> <input type="text" id="phone" value="{{ @$shipment[0]['booking_number'] }}" style="border:border;outline:none;text-align:start;border-bottom:1px solid black;">
                        </td>
                         {{-- <td class=""></td> --}}
                         <td colspan="3" class="" style="">
                            <label for="fax">Vessel & Voyage#:</label> <input type="text" id="fax" value="{{ @$shipment[0]['vessel'] }} & {{ @$shipment[0]['voyage'] }} " style="width: 80%;border:none;outline:none;text-align:start;border-bottom:1px solid black;">
                        </td>
                </tr>
    
                <tr>
                    <td id="book"></td>
                    <td class=""></td>
                    <td class="w_fax"></td>
                    <!-- <td class="t_th">hhh</td> -->
                    <td colspan="4" class=""></td>
    
                </tr>
    
                <tr>

                    <td colspan="2" class="" style="">
                        <spna style="font-size:11px!important;font-weight:bold;">Vessel Departure Date:</span> <input type="text" id="phone" value="--" style="border:border;outline:none;text-align:start;border-bottom:1px solid black;">
                        </td>
                         {{-- <td class=""></td> --}}
                        <td colspan="3" class="" style="">
                            <label for="fax">US Port of Export:</label> <input type="text" id="fax" value="{{ @$shipment[0]['loading_port'] }} " style="width: 80%;border:none;outline:none;text-align:start;border-bottom:1px solid black;">
                        </td>


                </tr>
    
                <tr>
                    <td id="vessel"></td>
    
                    <td class=""></td>
                    <td class="w_fax"></td>
                    <!-- <td class="t_th">hhh</td> -->
                    <td colspan="4" class=""></td>
                </tr>
                <tr>
                    {{-- <td colspan="5"> <input type="text" value="City and Country of Ultimate Destination: " style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;font-size:11px!important;"></td> --}}

                    <td colspan="5" class="" style="">
                        <label for="fax">City and Country of Ultimate Destination:</label> <input type="text" id="fax" value="--" style="width:70%;border:none;outline:none;text-align:start;border-bottom:1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="desty"></td>
                    <td colspan="4" class=""></td>
                </tr>
                <tr>
                    <td class="" colspan="2"> <input type="text" value="Steamship Line: {{ @$shipment[0]['shipping_line'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td class="" colspan="2"> <input type="text" value="Terminal: {{ @$shipment[0]['destination_terminal'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td class=""> <input type="text" value="Container#: {{ @$shipment[0]['container_no'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                </tr>
                <tr>
                     <td></td>
                    {{-- <td  class="t_brd" ></td> --}}
                    <td></td>
                    {{-- <td class="t_brd"></td> --}}
                    <td></td>
                    {{-- <td  class="t_brd"></td> --}}
                </tr>
            </tbody>
    
        </table>
        <hr style="margin:0;border-top:.8px!important;">
    
        <table style="width: 100%;" class="">
            <tbody>
                <tr>
                    <td colspan="6" class="t2_header"> <input type="text" value="AES INFORMATION" style="width: 100%;border:none;outline:none;text-align:start;border-bottom:.8px solid lightgray;"></td>
                </tr>
                <tr>
                    <td colspan="5"> <input type="text" value="ITN #: {{ @$shipment[0]['ase-itn_number'] }}" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                </tr>
                {{-- <tr> --}}
                    {{-- <td></td> --}}
                    {{-- <td colspan="5" class="t_brd"></td> --}}
                {{-- </tr> --}}
                <tr>
                    <td colspan="6" class="text_itn" style="padding-top:10px ;">
                        <input type="text" value="I certify under penalty of perjury under the laws of the United States of America ( Title 18 U.S.C. § 1001) that the foregoing is true and correct. Title 18 U.S.C. § 1001 prohibits making false statements," style="width: 98%;border:none;outline:none;text-align:start;">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding-top:10px ;"><b>AUTHORIZED <br> SIGNATURE:</b>  <input type="text" value=" " style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td colspan="2" style="padding-top:10px ;"><b>Date:</b>  <input type="text" value=" " style="width: 50%;border:none;outline:none;text-align:start;"></td>
                </tr>
                {{-- <tr> --}}
                    {{-- <td></td> --}}
                    {{-- <td colspan="2" class="t_brd"></td> --}}
                    {{-- <td style="width:50px;"></td> --}}
                    {{-- <td colspan="3" class="t_brd"></td> --}}
                    <!-- <td class="t_brd"></td> -->
                {{-- </tr> --}}
            </tbody>
        </table>
    </div>
</body> 

</html>