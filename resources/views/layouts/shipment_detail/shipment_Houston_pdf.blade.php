<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houston Cover Letter</title>
    
</head>

<body>
    {{-- <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
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
    <a href="{{ route('shipment_detail.shipment_Houston_pdf', @$shipment[0]['id']) }}" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
        style="background: #1d6092;float:left;">
       <div class="d-flex justify-content-center align-items-center">
           <span class="pl-2 font-size">PDF</span>
       </div>
    </a>
    </div>
    @endif
<br><br>

    <div id="thissection">
        <style>
            .tbl_2{
                margin-top:15px;
            }
            .table_2, .table_2 tr,.table_2 th{
                border: 1px solid black;
                border-collapse: collapse;
            }
            .t_data{
                border: 1px solid black;
                border-collapse: collapse;
                text-align: center;
            }
            .table_3,.table_3 tr,.table_3 th{
                border: 1px solid black;
                border-collapse: collapse;  
            }
            .td3_data{
                border: 1px solid black;
                border-collapse: collapse;  
            }
            .tbl_3{
                margin-top: 15px;
            }
           .tbl_4{
            margin-top: 15px;
           }
           .table_4,.table_4 tr,.table_4 th{
                border: 1px solid black;
                border-collapse: collapse;  
            }
            .td4_data{
                border: 1px solid black;
                border-collapse: collapse; 
                padding: 5px; 
            }
            .tbl_5{
                margin-top: 15px;
            }
            .table_5{
                border: 1px solid black;
                border-collapse: collapse; 
            }
            .td5_data{
                padding: 5px; 
            }
            
            .tbl_6{
                margin-top: 15px;
            }
    
            .p-dt{
                border:2px solid darkslategray;
                padding: 5px;
               
            }
            .td3_data{
                padding: 5px;
            }
            .text_end{
                margin-top: 15px;
                text-align: center;
                font-size: larger;
                font-weight: bold;
            }
            /* .tbl_0{
                border: 1px solid black;
            } */
            .td_0{
                padding: 5px;
            }
            img{
                width: 100%;
            }
            .td_img{
                width:15%;
                pad: 5px;
            }
    
        </style>
        <div class="" >
            
            <table class="tbl_0">
                <tbody>
                    <tr>
                        <td rowspan="2" class="td_img"><img src="{{asset('images/blueocean.png')}}" alt="" width="55%"></td>
                        <td colspan="5"  class="td_0"><b><input type="text" value="U.S. CUSTOMS & BORDER PROTECTION"  style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold!important;"> <br>
                        <input type="text" value="VEHICLE EXPORT COVER SHEET"  style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></b></td>
                    </tr>
                    <tr>
                        <!-- <td  class="td_0"></td> -->
                        <td colspan="5" class="p-dt"><input type="text" value="PORT OF EXPORT : HOUSTON APM BARBOURS CUT"  style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tbl_2">
            <table class="table_2" style="width:100%;">
                <thead>
                    <tr>
                        <th colspan="7" class="t_data"><input type="text" value="DESCRIPTION OF VEHICLE/EQUIPMENT"  style="width: 100%;border:none;outline:none;text-align:center;font-weight:bold;"></th>
                    </tr>
                    <tr>
                        <th><input type="text" value="YEAR"  style="width: 100%;border:none!important;outline:none;text-align:start;font-weight:bold;"></th>
                        <th><input type="text" value="MAKE" style="width: 100%;border:none!important;outline:none;text-align:start;font-weight:bold;"></th>
                        <th><input type="text" value="MODEL" style="width: 100%;border:none!important;outline:none;text-align:start;font-weight:bold;"></th>
                        <th><input type="text" value="VIN" style="width: 100%;border:none!important;outline:none;text-align:start;font-weight:bold;"></th>
                        <th><input type="text" value="TITLE NUMBER" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></th>
                        <th><input type="text" value="STATE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></th>
                        <th><input type="text" value="VALUE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></th>
                    </tr>
                    @foreach ($shipment[0]['vehicle'] as $vehicle)
                    <tr>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['year'] }}" style="width: 100%;border:none!important;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['make'] }}" style="width: 100%;border:none!important;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['model'] }}" style="width: 100%;border:none!important;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['vin'] }}" style="width: 100%;border:none!important;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['title_number'] }}" style="width: 100%;border:none!important;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['state'] }}" style="width: 100%;border:none!important;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vheicle['value'] }}" style="width: 100%;border:none!important;outline:none;text-align:start;"></td>
                        
                    </tr>
                    @endforeach
                </thead>
            </table>
        </div>
        <div class="tbl_3">
            <table class="table_3" style="width:100%;">
                <thead>
                    <tr>
                        <th  colspan="2" class="td3_data"><input type="text" value="TRANSPORTATION INFORMATION" style="width: 100%;border:none;outline:none;text-align:start;"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td3_data"><input type="text" value="ITN : X20220827150029" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="VALUE :" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="CARRIER : MAERSK" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="VESSEL : GUDRUN MAERSK" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="td3_data"><input type="text" value="BoL/AWB/BOOKING # : 220434507C" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="EXPORT DATE : 2022-09-13 " style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="PORT OF UNLADING :" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="td3_data"><input type="text" value="ULTIMATE DESTINATION : {{ @$shipment[0]['destination_port'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="td3_data"><input type="text" value="VEHICLE LOCATION : " style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
        <div class="tbl_4">
            <table class="table_4" style="width:100%;">
                <thead>
                    <tr>
                        <th  colspan="3" class="td4_data"><input type="text" value="SHIPPER/EXPORTER" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2" class="td4_data"><input type="text" value="NAME : {{ @$shipment[0]['shipper'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td4_data"><input type="text" value="DOB :" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td colspan="3"  class="td4_data"><input type="text" value="ADDRESS:SHARJAH IND # 2." style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <!-- <td class="td4_data"></td> -->
                    </tr>
                    <tr>
                        <td class="td4_data"><input type="text" value="CITY :" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td4_data"><input type="text" value="STATE :" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td4_data"><input type="text" value="ZIP CODE : 000000" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        
                    </tr>
                    <tr>
                        <td colspan="3" class="td4_data"><input type="text" value="PHONE : TEL:N/A, FAX:" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <!-- <td class="td4_data"></td> -->
                    </tr>
                    <tr>
                        <td  class="td4_data"><input type="text" value="ID # :" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td colspan="2" class="td4_data"><input type="text" value="TYPE & ISSUER :" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
        <div class="tbl_5">
            <table class="table_5" style="width:100%;">
                <thead>
                    <tr>
                        <th  colspan="3" class="td5_data"><input type="text" value="ULTIMATE CONSIGNEE ([ ] CHECK IF SHIPPER)" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></th>
                        
                    </tr>
                </thead>
            </table>
        </div>
    
        <div class="tbl_6">
            <table class="table_4" style="width:100%;">
                <thead>
                    <tr>
                        <th  colspan="4" class="td4_data"><input type="text" value="DESIGNATED AGENT/BROKER/FREIGHT FORWARDER" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="td4_data"><input type="text" value="NAME : Blue Ocean Shipping" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <!-- <td class="td4_data">DOB :</td> -->
                    </tr>
                    <tr>
                        <td colspan="4"  class="td4_data"><input type="text" value="ADDRESS : 7801 PARKHURST DR" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <!-- <td class="td4_data"></td> -->
                    </tr>
                    <tr>
                        <td colspan="2" class="td4_data"><input type="text" value="CITY : HOUSTON" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td  colspan="2" class="td4_data"><input type="text" value="STATE : TX" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <!-- <td class="td4_data">ZIP CODE : 000000</td> -->
                        
                    </tr>
                    <tr>
                        <td colspan="2" class="td4_data"><input type="text" value="PHONE : l713-631-1560" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td colspan="2" class="td4_data"><input type="text" value="CONTACT :SOPHIA" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    
        <div class="text_end">
            <span><input type="text" value="U N I T E D S T A T E S C U S T O M S A N D B O R D E R P R O T E C T I O N" style="width: 100%;border:none;outline:none;text-align:center;"></span>
        </div>
    </div>


</body>

</html>