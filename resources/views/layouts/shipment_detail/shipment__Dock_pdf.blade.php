<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dock Recipt pdf</title>
    
</head>

<body>

    {{-- <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
        style="background: #1d6092;" onclick="printthis()">
        <div class="d-flex justify-content-center align-items-center">
            <span class="pl-2 font-size">Print</span>
        </div>
    </button> --}}
    @if($button_hide == 'show')
<div style="width: 218px;">
    <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
    style="background: #1d6092;float:left;" onclick="printthis()">
   <div class="d-flex justify-content-center align-items-center">
       <span class="pl-2 font-size">PRINT</span>
   </div>
</button>
<a href="{{ route('shipment_detail.shipment_Dock_pdf', @$shipment[0]['id']) }}" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
    style="background: #1d6092;float:left;">
   <div class="d-flex justify-content-center align-items-center">
       <span class="pl-2 font-size">PDF</span>
   </div>
</a>

<button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
    style="background: #1d6092;float:left;">
   {{-- <div class="d-flex justify-content-center align-items-center"> --}}
       <span class="pl-2 font-size">EMAIL</span>
   {{-- </div> --}}
</button>


</div>
@endif

    <div id="thissection">
        
        <style>
            * {
                font-family: sans-serif;
            }
    
            .tbl {
                /* border: 1px solid black; */
                border-collapse: collapse;
            }
    
            .we {
                font-size: 8px;
                border-top: 1px solid black;
                font-weight: bold;
    
            }
    
            .weA {
                border-right: 1px solid black;
                text-align: center;
                font-size: 8px;
                border-top: 1px solid black;
                font-weight: bold;
            }
    
            .weA_last {
                text-align: center;
                font-size: 8px;
                border-top: 1px solid black;
                font-weight: bold;
            }
    
            .tbl_a {
                border-collapse: collapse;
            }
    
            .right {
                border-right: 1px solid black;
                font-size: 13px;
            }
    
            .carrige_p {
                padding-bottom: 8px;
                font-size: x-small;
            }
    
            .jabli {
                font-size: 13px;
            }
    
            #ee {
                width: 160px;
                border-right: 1px solid black;
            }
    
            #prnpl {
                border-right: 1px solid black;
                width: 190px;
                background-color: blueviolet;
                /* border-collapse: collapse; */
            }
    
            #noor {
                border-right: 1px solid black;
                /* background-color: yellowgreen; */
            }
    
            #export_ref {
                border-top: 1px solid black;
                padding-bottom: 30px;
            }
    
            #zip {
                width: 20px !important;
            }
    
            #plce {
                width: 20px !important;
                background-color: aqua;
            }
    
            #pad {
                padding-bottom: 80px;
            }
    
            #delv {
    
                background-color: RED;
    
                /* width:130px; */
            }
    
            #ty {
                width: 360px;
                text-align: center;
                font-size: x-small;
                font-weight: bold;
                padding-top: 10px;
                /* border-right: 1px solid black; */
            }
    
            .pp_s {
                font-size: 8px !important;
                /* border-left: 1px solid black; */
                text-align: center;
            }
    
            .no_al {
                font-size: x-small !important;
            }
    
            .tbl_c {
                border-collapse: collapse;
            }
    
            .wrds {
                font-size: 11px;
                font-weight: 600;
                border-right: 1px solid black;
                /* background-color: greenyellow; */
            }
    
            .d_date {
                font-size: 11px;
                font-weight: 600;
                /* border-right: 1px solid black; */
            }
    
            .for {
                font-size: 11px;
                font-weight: 600;
                /* border-left: 1px solid black; */
            }
    
            .label {
                border-bottom: 1px solid black;
                background-color: black;
    
            }
    
            .adres {
                background-color: red;
            }
    
            .rc {
                font-size: 8px;
                font-weight: bold;
            }
    
            .p_doc {
                font-size: 8px;
                /* background-color: white; */
            }
        </style>









        <div style="">
            <div style="text-align: right;font-size:x-large;">
                <input type="text" value="DOCK RECEIPT" style="width: 100%;border:none;outline:none;text-align:end;">
            </div>
        </div>
    
        <table class="tbl" style="width:100%;">
            <tbody>
                <tr>
                    <td colspan="2" class="we" id="ee"> <input type="text" value="2.EXPORTER
                        (Principle or seller-license and adress including zip code)" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                    <td class="we" id="noor"><input type="text" value="5.DOCUMENT NUMBER" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td class="we"><input type="text" value="SA.B/L NUMBER" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                </tr>
                <tr>
                    <td colspan="2" class="no_al" rowspan="2" id="noor">
                        <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['shipper_name'] }}" style="width: 100%;border:none;outline:none;text-align:start;"><br>
                        <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['address'] }}" style="width: 100%;border:none;outline:none;text-align:start;"><br>
                        <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['phone'] }}" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                    <td class="right"><input type="text" value="{{ @$shipment[0]['booking_number'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td class="no_al"><input type="text" value="{{ @$shipment[0]['booking_number'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                </tr>
                <tr>
    
                    <td colspan="2" rowspan="" class="we" id="export_ref">
                        <input type="text" value="6.EXPORT REFREENCE" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                    <!-- <td style="background-color:blue ;"></td> -->
                    <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td>
                    <td class="we">5.DPCUMENT NUMBER</td>
                    <td class="we">SA.B/L NUMBER</td> -->
                </tr>
                {{-- <tr>
                    <td colspan=""></td>
                    <td class="we" style="border:1px solid black ;padding-bottom:15px;">
                        <input type="text" value="ZIP CODE" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td colspan="2" style="border-left:1px solid black"></td>
                    <!-- <td style="background-color:cadetblue;"></td> -->
                    <!-- <td style="background-color:blue;"></td> -->
                </tr> --}}
                <tr>
                    <td colspan="2" class="we" id="noor"><input type="text" value="3.CONSIGNEE TO" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td colspan="2" class="we"><input type="text" value="7.FORWARDING AGENT (Name and address-reference)" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                </tr>
                <tr>
                    <td colspan="2" class="no_al" rowspan="" id="noor">
                        <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['company_name'] }}" style="width: 100%;border:none;outline:none;text-align:start;">
                        <br>
                        <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['address'] }}, {{ @$shipment[0]['customer']['billings'][0]['city'] }}, {{ @$shipment[0]['customer'][0]['user']['billings'][0]['zip_code'] }}" style="width: 100%;border:none;outline:none;text-align:start;">
                        <br>
                        <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['phone'] }}" style="width: 100%;border:none;outline:none;text-align:start;">
                        {{-- <br> --}}
                        {{-- <input type="text" value="SHARJAH. UNITED ARAB EMIRATES" style="width: 100%;border:none;outline:none;text-align:start;"> --}}
                    </td>
                    <td colspan="2" class="no_al">
                        <input type="text" value="B&C LUXURY AUTO LTD " style="width: 100%;border:none;outline:none;text-align:start;">
                        <br>
                        <input type="text" value="104 LISTER AV., NEWARK, NJ 07105. UNITED " style="width: 100%;border:none;outline:none;text-align:start;">
                        <br>
                        <input type="text" value="STATES" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border-right:1px solid black;"></td>
                    <td colspan="2" class="we" id="" style="padding-bottom:20px;">
                        <input type="text" value="8.POINT (STATE) OF ORIGIN OR FTZ NUMBER" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="we" id="noor">
                        <input type="text" value="4.NOTIFY PARTY /INTERMEDIATE CONSIGNEE (Name and address)" style="width: 100%;border:none;outline:none;text-align:start;">   
                    </td>
                    <td colspan="2" class="we"><input type="text" value="9.DOMESTIC ROUTINGEXPORT INSTRUCTION" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                </tr>
                <tr>
                    <td colspan="2" class="carrige_p" id="noor">
                        <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['company_name'] }}" style="width: 100%;border:none;outline:none;text-align:start;">
                        <br>
                        <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['address'] }}, {{ @$shipment[0]['customer']['billings'][0]['city'] }}, {{ @$shipment[0]['customer'][0]['user']['billings'][0]['zip_code'] }}" style="width: 100%;border:none;outline:none;text-align:start;">
                        <br>
                        <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['phone'] }}" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                    <td colspan="2" rowspan="2"></td>
                </tr>
                <tr>
                    <td class="we" id="noor" style="padding-bottom:20px;">
                        <input type="text" value="12.PRE-CARRIAGE BY" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="we" id="noor" style="padding-bottom:20px;">
                        <input type="text" value="13.PLACE OF RECIEPT BY PRE-CARRIER" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
                <tr>
                    <td class="we" id="noor">
                        <input type="text" value="14.EXPORTING CARRIER by" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="we" id="noor">
                        <input type="text" value="15.PORT OF LOADING/EXPORT" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="we" id="" colspan="2">
                        <input type="text" value="10.LOADING PIER/TERMINAL" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
                <tr>
                    <td class="jabli" id="noor">
                        <input type="text" value="--" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="jabli" id="noor">
                        <input type="text" value="{{ @$shipment[0]['loading_port'] }}" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="jabli" id="" colspan="2">
                        <input type="text" value="{{ @$shipment[0]['loading_terminal'] }}" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
                <tr>
                    <td class="we" id="noor">
                        <input type="text" value="16.FOREIGN PORY OF UNLOADING(Vessel and air only)" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="we" id="noor">
                        <input type="text" value="17.PLACE OF DELIVERY BY-ON-CARRIER" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="we" id="noor">
                        <input type="text" value="11.TYPE OF MOVE" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="we" id="">
                        <input type="text" value="11a.CONTAINERIZED(Vessel only)" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
                <tr>
                    <td class="jabli" id="noor">
                        <input type="text" value="{{ @$shipment[0]['destination_port'] }}" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="jabli" id="noor">
                        <input type="text" value="Jebel Ali,UAE" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="jabli" id="noor">
                        <input type="text" value="Vessel, Containerized" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="jabli" id="">
                        <input type="text" value="{{ (@$shipment[0]['vessel']) ? 'YES' : 'NO' }}" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
            </tbody>
        </table>
        <table class="tbl_a" style="width:100% ;">
            <tr>
                <td class="weA">
                    <input type="text" value="MARKS AND NUMBER" style="width: 100%;border:none;outline:none;text-align:start;">

                    <br>
                    <input type="text" value="(18)" style="width: 100%;border:none;outline:none;text-align:start;">

                </td>
                <td class="weA" style="padding:0 26px 0 27px ;">
                    <input type="text" value="NUMBER" style="width: 100%;border:none;outline:none;text-align:start;">

                    <br> 
                    <input type="text" value="OF PACKAGES " style="width: 100%;border:none;outline:none;text-align:start;">

                    <br>
                    <input type="text" value="(19)" style="width: 100%;border:none;outline:none;text-align:start;">

                </td>
                <td class="weA">
                    <input type="text" value="DISCRIPTION OF COMMODITEIS in Schedule B detail" style="width: 100%;border:none;outline:none;text-align:start;">
 
                    <br>
                    <input type="text" value="(20)" style="width: 100%;border:none;outline:none;text-align:start;">

                </td>
                <td class="weA">
                    <input type="text" value="GROOSS WEIGHT (Kilos) (21)" style="width: 100%;border:none;outline:none;text-align:start;">

                </td>
                <td class="weA_last">
                    <input type="text" value="MEASUREMENT (22)" style="width: 100%;border:none;outline:none;text-align:start;">

                </td>
            </tr>
            {{-- <tbody style="border:1px solid black;">
                <tr>
                    <td class="right">
                        <input type="text" value="CNT: MRSU4542541" style="width: 100%;border:none;outline:none;text-align:start;">

                        <br>
                        <input type="text" value="SEAL: 0488019" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right"></td>
                    <td class="right">
                        <input type="text" value="40 Ft. High Cube" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                    <td class="right"><input type="text" value="6,521.00 Kg" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                    <td class="right">
                        <input type="text" value="52.32 m³" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
                <tr>
                    <td class="right">
                        <input type="text" value="WR 91463 " style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="1 VEH" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="2017 MERCEDES-BENZ C300 1,630.00 Kg 12.24 m³" style="width: 100%;border:none;outline:none;text-align:start;">

                        <br>
                        <input type="text" value="VIN:55SWF4KBXHU220465" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="1,630.00 Kg" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="12.24 m³" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
                <tr>
                    <td class="right">
                        <input type="text" value="WR 91463 " style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="1 VEH" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">                        
                        <input type="text" value="2017 MERCEDES-BENZ C300 1,630.00 Kg 12.24 m³" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                    <td class="right">
                        <input type="text" value="1,630.00 Kg" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="12.24 m³" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
                <tr>
                    <td class="right">
                        <input type="text" value="WR 91463 " style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="1 VEH" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">                        
                        <input type="text" value="2017 MERCEDES-BENZ C300 1,630.00 Kg 12.24 m³" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                    <td class="right">
                        <input type="text" value="1,630.00 Kg" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="12.24 m³" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
                <tr>
                    <td class="right">
                        <input type="text" value="WR 91463 " style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="1 VEH" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">                        
                        <input type="text" value="2017 MERCEDES-BENZ C300 1,630.00 Kg 12.24 m³" style="width: 100%;border:none;outline:none;text-align:start;">
                    </td>
                    <td class="right">
                        <input type="text" value="1,630.00 Kg" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                    <td class="right">
                        <input type="text" value="12.24 m³" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
                </tr>
                <tr>
                    <td class="right" id="pad"></td>
                    <td class="right" id="pad"></td>
                    <td class="right" id="pad"></td>
                    <td class="right" id="pad"></td>
                    <td class="right" id="pad"></td>
                </tr>
            </tbody> --}}
            <tbody style="border:1px solid black;">
                <tr>
                    <td class="td3_data"><input type="text" value="YEAR" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                    <td class="td3_data"><input type="text" value="MAKE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                    <td class="td3_data"><input type="text" value="MODEL / COLOR" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                    <td class="td3_data"><input type="text" value="VIN" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                    <td class="td3_data"><input type="text" value="TITLE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                    <td class="td3_data"><input type="text" value="WEIGHT" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                    {{-- <td class="td3_data"><input type="text" value="CUBE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td> --}}
                </tr>
                @foreach ($shipment[0]['vehicle'] as $vehicle)
                <tr>
                    <td class="td3_data"><input type="text" value="{{ @$vehicle['year'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td class="td3_data"><input type="text" value="{{ @$vehicle['make'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td class="td3_data"><input type="text" value="{{ @$vehicle['model'] }} / {{ @$vehicle['color'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td class="td3_data"><input type="text" value="{{ @$vehicle['vin'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td class="td3_data"><input type="text" value="{{ @$vehicle['title_type'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    <td class="td3_data"><input type="text" value="{{ @$vehicle['weight'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    {{-- <td class="td3_data"><input type="text" value="{{ @$vehicle['cube'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td> --}}
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <table style="width:100%;" class="tbl_c">
    
            <tr>
                <td></td>
                <td colspan="" class="right" id="ty"><span>                        
                    <input type="text" value="DELIVERED BY:" style="width: 100%;border:none;outline:none;text-align:start;">
                </span></td>
                <td></td>
    
                <!-- <td colspan=""  class="right"></td> -->
                <!-- <td colspan=""  class="right"></td> -->
            </tr>
            <tr>
    
                <td colspan="2" style="border-right:1px solid black"></td>
                <td colspan="2" class="pp_s"><span>
                    <input type="text" value="RECEIVED THE ABOVE DESCRIBED GOODS OR PACKAGES SUNBJECT" style="width: 100%;border:none;outline:none;text-align:start;">
    
                </span></td>
            </tr>
            <tr>
                <td colspan="2" class="wrds">
                    <input type="text" value="LIGHTER" style="width: 100%;border:none;outline:none;text-align:start;">

                <td></td>
            </tr>
            <tr>
                <!-- <td style="background-color: yellow;"></td> -->
                <!-- <td ></td> -->
                <!-- <td colspan="" class="label"></td> -->
            </tr>
            <tr>
                <td></td>
                <td class="wrds" style="padding-top:10px ;">
                    <input type="text" value="ARRIVED DATE: {{ @$shipment[0]['est_arrival_date'] }}" style="width: 100%;border:none;outline:none;text-align:start;">
                </td>
    
                <td colspan="2"></td>
            </tr>
            <tr>
                <td></td>
                <td class="wrds"></td>
                <td colspan="2" class="for" style="text-align:center;">
                    <input type="text" value="FOR THE" style="width: 100%;border:none;outline:none;text-align:start;">

                     <br>
                     <input type="text" value="MASTER" style="width: 100%;border:none;outline:none;text-align:start;">

                    </td>
            </tr>
            <tr>
                <td></td>
                <td class="wrds">
                    <input type="text" value="UPLOADED DATE: {{ @$shipment[0]['created_at'] }}" style="width: 100%;border:none;outline:none;text-align:start;">

                </td>
    
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2" class="wrds" style="padding-top:10px;">
                    <input type="text" value="CHECKED BY" style="width: 100%;border:none;outline:none;text-align:start;">

                </td>
                <td colspan="2" class="d_date" style="text-align:center;">
                    <input type="text" value="BY" style="width: 100%;border:none;outline:none;text-align:start;">

                </td>
            </tr>
            <tr>
                <td></td>
                <td class="wrds"></td>
                <td class="rc" colspan="2" style="text-align:center;"></td>
            </tr>
            <tr>
                <td class=""></td>
                <td></td>
                {{-- <td class="wrds">PLACED&nbsp;&nbsp;&nbsp;&nbsp;<span class="p_doc">IN SHIP ON
                        DOCK</span>&nbsp;&nbsp;&nbsp;&nbsp;LOCATION&nbsp;&nbsp;&nbsp;___________________________</td> --}}
                <td colspan="2" class="d_date" style="text-align:center;padding-top:10px;">
                    DATE: <input type="text" value="{{ date(@$shipment[0]['create_at']) }}" style="width: 50%;border:none;outline:none;text-align:start;">

                </td>
            </tr>
    
    
        </table>
    </div>




</body>

</html>
