
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Of Landing</title>
    
</head>

<body>
    <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
    style="background: #1d6092;" onclick="printthis()">
   <div class="d-flex justify-content-center align-items-center">
       <span class="pl-2 font-size">Print</span>
   </div>
</button>

    <div id="thissection">
        <style>
        #t_pad {
            padding: 25px;
        }

        .td3_p {
            width: 290px;
        }

        .t_data {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .table_3,
        .table_3 tr,
        .table_3 th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .td3_data {
            border: 1px solid black;
            border-collapse: collapse;
            font-size: small;
        }

        .p_text {
            font-size: smaller;
        }

        .p2_text {
            font-size: small;
        }

        .tbl_3 {
            margin-top: 5px;
        }

        .p-dt {
            border: 2px solid darkgray;

        }

        .tbl_0 {
            border: 1px solid black;
            border-collapse: collapse;
        }

        #text_w {
            width: 20%;
        }
        .page{
            margin-top: 188px;
           
        }
        .page_border{
            border-top: 1px solid black;
        }
       
    </style>
        <div class="" >
            <table class="tbl_0" style="width:100%;">
                <tbody>
                    <tr>
                        
                        <td  class="t_data"><input type="text" value="" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                        <td class="t_img" style="text-align:center ;">
                            <img src="{{asset('images/logo_2.png')}}"  class="img_w" alt="" style="width:100px;height: 100px!important;">
                        </td>
                        <td class="t_data"><input type="text" value="BILL OF LADING" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                    </tr>
    
                </tbody>
            </table>
        </div>
    
        <div class="tbl_3">
            <table class="table_3" style="width:100%;">
                <tbody>
                    <tr>
                        <td class="td3_data"><input type="text" value="SHIPPER / EXPORTER" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="BOOKING #" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="REFERENCE #" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="td3_data"><input type="text" value="" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['booking_number'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['shipping_reference'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <!-- <td class="td3_data">BoL/AWB/BOOKING # : 220434507C</td> -->
                        <td class="td3_data"><input type="text" value="PLACE OF RECEIPT" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="PORT OF LOADING" style="width: 100%;border:none;outline:none;text-align:start;"></td>
    
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="BALTIMORE, MD " style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="BALTIMORE, MD" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="PORT OF DISCHARGE:" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="JEBEL ALI, UAE" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
        <div class="tbl_3">
            <table class="table_3" style="width:100%;">
                <tbody>
                    <tr>
                        <td class="td3_data"><input type="text" value="CONSIGNEE" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="PIER #" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="VESSEL #" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="td3_data"><input type="text" value="{{ @$shipment[0]['select_consignee'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="SEAGIRT" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="GUDRUN MAERSK" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <!-- <td class="td3_data">BoL/AWB/BOOKING # : 220434507C</td> -->
                        <td class="td3_data"><input type="text" value="1" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="1" style="width: 100%;border:none;outline:none;text-align:start;"></td>
    
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="LOADING PIER/TERMINAL" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="VOYAGE NO." style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="SEAGIRT" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="234 W" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
        <div class="tbl_3">
            <table class="table_3" style="width:100%;">
                <tbody>
                    <tr>
                        <td colspan="2" class="td3_p"><input type="text" value="NOTIFY" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"></td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2" class="td3_p" id="t_pad"><input type="text" value="{{ @$shipment[0]['notifier'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"></td>
    
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="ETA/2022-10-11" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
    
                </tbody>
            </table>
        </div>
    
        <div class="tbl_3">
            <table class="table_3" style="width:100%;">
                <tbody>
                    <tr>
                        <td class="td3_data"><input type="text" value="CONTAINER #" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="CONTAINER TYPE " style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="SEAL #" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="SPECIAL INSTRUCTIONS" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['container_no'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['container_type'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="29658206" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value=" " style="width: 100%;border:none;outline:none;text-align:start;"></td>
    
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tbl_3">
            <table class="table_3" style="width:100%;">
                <tbody>
                    <tr>
                        <td class="td3_data"><input type="text" value="SHIPPERS DESCRIPTIONS OF GOODS" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="WEIGHT " style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="CUBE" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <!-- <td class="td3_data">SPECIAL INSTRUCTIONS</td> -->
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="4 UNITS USED VEHICLES" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="32" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="55 M3" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <!-- <td class="td3_data"></td> -->
    
                    </tr>
                </tbody>
            </table>
        </div>
    
        <div class="tbl_3">
            <table class="table_3" style="width:100%;">
                <tbody>
                    <tr>
                        <td class="td3_data"><input type="text" value="YEAR" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                        <td class="td3_data"><input type="text" value="MAKE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                        <td class="td3_data"><input type="text" value="MODEL / COLOR" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                        <td class="td3_data"><input type="text" value="VIN" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                        <td class="td3_data"><input type="text" value="WEIGHT" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                        <td class="td3_data"><input type="text" value="CUBE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                    </tr>
                    @foreach ($shipment[0]['vehicle'] as $vehicle)
                    <tr>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['year'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['make'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['model'] }} / {{ @$vehicle['color'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['vin'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['weight'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$vehicle['cube'] }}" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        
                    </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    
        <div class="tbl_3">
            <table class="table_3" style="width:100%;">
                <tbody>
                    <tr>
                        <td class="td3_data"><input type="text" value="" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="OCEAN FREIGHT PAID" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="WEIGHT(KG)" style="width: 100%;border:none;outline:none;text-align:start;"></td>
    
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="SEND TELEX RELEASE" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data"><b>ITN#</b><input type="text" value="X20220827150029" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td class="td3_data"><input type="text" value="7615" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="p_text"><input type="text" value="These Comodities, Technology Or Software Were Exported From The United States In The Acordance With The Exoirt." style="width: 100%;border:none;outline:none;text-align:start;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    
        <div class="tbl_3">
            <table class="table_3" style="width:100%;">
                <tbody>
                    <tr>
                        <td colspan="4" class="p2_text">
                            <input type="text" value="HEREBY CERTIFY HAVING RECEIVED THE ABOVE DESCRIBED SHIPMENT IN OUTWARDLY GOOD CONDITION FROM THE SHIPPER SHOWN IN SECTION" style="width: 100%;border:none;outline:none;text-align:start;">
                        </td>
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="AUTHORIZED:" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td id="text_w" class="td3_data"></td>
                        <td class="td3_data"><input type="text" value="DATED AT:" style="width: 100%;border:none;outline:none;text-align:start;"></td>
                        <td id="text_w" class="td3_data"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    


</body>

</html>