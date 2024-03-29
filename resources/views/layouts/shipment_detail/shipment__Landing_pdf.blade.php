<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Of Landing</title>

</head>

<body>
    @if ($button_hide == 'show')
        <div style="width: 242px;">
            <button type="button" class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
                style="background: #1d6092;float:left;" onclick="printthis()">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="pl-2 font-size"><i class="fa-solid fa-print" style="color:white;margin-right:3px;"></i>
                        PRINT</span>
                </div>
            </button>
            <a href="{{ route('shipment_detail.shipment_Landing_pdf', @$shipment[0]['id']) }}"
                class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
                style="background: #1d6092;float:left;" target="_blank">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="pl-2 font-size"><i class="fa-solid fa-file-pdf"
                            style="color:white;margin-right:3px;"></i> PDF</span>
                </div>
            </a>
            <a class="text-white form-control-sm border py-1 my-2 btn-info rounded modal_button"
                style="background: #1d6092;float:left;" tab="{{ @$shipment[0]['id'] }}" id="bol_pdf"
                onclick="sendpdfthroughmail(this.id)">
                <span class="pl-2 font-size"><i class="fa-solid fa-envelope" style="color:white;margin-right:3px;"></i>
                    EMAIL</span>
            </a>
        </div>
    @endif

    <div id="thissection" style="width:100%">
        <style>
            .td3_p {
                width: 290px;
            }

            .t_data {

                border-collapse: collapse;
            }

            .table_3,
            .table_3 tr,
            .table_3 th {
                border: 1px solid #aea3a3;
                border-collapse: collapse;
            }

            .td3_data {
                border: 1px solid #aea3a3;
                border-top: none;
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
                border: 1px solid #aea3a3;
                border-collapse: collapse;
            }

            .no_al {
                font-size: 12px !important;
                border: 1px solid;
            }

            #text_w {
                width: 20%;
            }

            .page {
                margin-top: 188px;

            }

            .page_border {
                border: 1px solid #aea3a3;
            }

            .bol_vehicle_table tr {
                border-bottom: 1px solid lightgray !important;
            }
        </style>
        {{-- <div class="" style="height: 131px;" > --}}
        <table class="tbl_0" style="width:100%;border:none!important;">
            <tbody>
                <tr>
                    <td class="" style="text-align:start;width:40%;">
                        <img src="{{ asset('images/logo_2.png') }}" class=""
                            alt=""style="width:100px;height: 80px!important;">
                    </td>
                    <td class="" style="width:60%;">
                        <input type="text" value="BILL OF LADING"
                            style="width: 98%;border:none;outline:none;text-align:start;font-weight:bold;font-size:16.5px;text-decoration:underline rgb(133, 125, 125)">
                    </td>
                </tr>

            </tbody>
        </table>
        {{-- </div> --}}

        <div class="tbl_3">
            <table class="table_3" style="width:100%;margin-top: 12px!important">
                <tbody>
                    <tr style="border-bottom: .8px solid lightgray;">
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="SHIPPER / EXPORTER"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="BOOKING #"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="REFERENCE #"
                                style="width: 97%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="td3_data">
                            <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['shipper_name'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:12px"><br>
                            <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['address'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:12px;"><br>
                            <input type="text"
                                value="{{ @$shipment[0]['customer']['shippers'][0]['city'] }}, {{ @$shipment[0]['custgomer']['shippers'][0]['zip_code'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:12px;"><br>
                            <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['phone'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:12px;"><br>

                        </td>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['booking_number'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:12px;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['shipping_reference'] }}"
                                style="width: 97%;border:none;outline:none;text-align:start;font-size:12px;"></td>
                    </tr>
                    <tr style="border-bottom: .8px solid lightgray;">
                        <!-- <td class="td3_data">BoL/AWB/BOOKING # : 220434507C</td> -->
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="PORT OF LOADING"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="PORT OF DISCHARGE:"
                                style="width: 97%;font-weight:bold; border:none;outline:none;text-align:start;weight:bold">
                        </td>

                    </tr>

                    <tr>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['loading_port'] }}"
                                style="width: 97%;border:none;outline:none;text-align:start;font-size:12px;"></td>


                        <td class="td3_data"><input type="text" value=" {{ @$shipment[0]['destination_port'] }}"
                                style="width: 97%;border:none;outline:none;text-align:start;font-size:12px;"></td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="tbl_3">
            <table class="table_3" style="width:100%;margin-top: -6px">
                <tbody>
                    <tr style="border-bottom: .8px solid lightgray;">
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="CONSIGNEE"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="PLACE OF RECEIPT #"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="VESSEL #"
                                style="width: 92%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="td3_data">
                            <input type="text"
                                value="{{ @$shipment[0]['customer']['billings'][0]['company_name'] }}"
                                style="width: 97%;border:none;outline:none;text-align:start;font-size:12px;"><br>
                            <input type="text"
                                value="{{ @$shipment[0]['customer']['billings'][0]['address'] }}, {{ @$shipment[0]['customer']['billings'][0]['city'] }}, {{ @$shipment[0]['customer'][0]['user']['billings'][0]['zip_code'] }}"
                                style="width: 97%;border:none;outline:none;text-align:start;font-size:12px;"><br>
                            <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['phone'] }}"
                                style="width: 97%;border:none;outline:none;text-align:start;font-size:12px">

                        </td>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['loading_terminal'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:12px;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['vessel'] }}"
                                style="width: 92%;border:none;outline:none;text-align:start;font-size:12px;"></td>
                    </tr>

                    <tr style="border-bottom: .8px solid lightgray;">
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="LOADING PIER/TERMINAL"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="VOYAGE NO."
                                style="width: 92%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                    </tr>
                    <tr>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['loading_terminal'] }}"
                                style="width: 92%;border:none;outline:none;text-align:start;font-size:12px;"></td>
                        <td class="td3_data"><input type="text" value="{{ @$shipment[0]['voyage'] }}"
                                style="width: 92%;border:none;outline:none;text-align:start;font-size:12px;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tbl_3">
            <table class="table_3" style="width:100%;margin-top: -6px;border-top:none!important;">
                <tbody>
                    <tr style="border-top:none!important;border-bottom:.8px solid lightgray;">
                        <td class="td3_data" style="border-top:none!important; border-bottom:.8px solid lightgray;">
                            <b>NOTIFY</b></td>
                        <td class="td3_data" style="border-top:none!important; border-bottom:.8px solid lightgray;">
                            <b>EXTRA INFORMATION</b></td>
                    </tr>
                    <tr>
                        <td colspan="1" rowspan="1" class="td3_p" id="t_pad" style="width: 50%">
                            <input type="text"
                                value="{{ @$shipment[0]['customer']['billings'][0]['company_name'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:none;font-size:12px"><br>
                            <input type="text"
                                value="{{ @$shipment[0]['customer']['billings'][0]['address'] }}, {{ @$shipment[0]['customer']['billings'][0]['city'] }}, {{ @$shipment[0]['customer'][0]['user']['billings'][0]['zip_code'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:12px;"><br>
                            <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['phone'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:12;">

                        </td>
                        <td class="td3_data"><input type="text"
                                value="ETA/{{ @$shipment[0]['est_arrival_date'] }}"
                                style="width: 92%;border:none;outline:none;text-align:start;font-size:12px"></td>

                    </tr>


                </tbody>
            </table>
        </div>

        <div class="tbl_3">
            <table class="table_3" style="width:100%;margin-top: -6px;border-top:none">
                <tbody>
                    <tr style="border-top:none;border-bottom:.8px solid lightgray;">
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="CONTAINER #"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="CONTAINER TYPE "
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="BOOKING NUMBER#"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="SPECIAL INSTRUCTIONS"
                                style="width: 97%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                    </tr>
                    <tr>

                        <td class="td3_data" style="background-color:#F0F3F4;"><input type="text"
                                value="{{ @$shipment[0]['container_no'] }}"
                                style="width: 100%;background-color:#F0F3F4;border:none;outline:none;text-align:start;font-size:12px">
                        </td>
                        <td class="td3_data"style="border:none"><input type="text"
                                value="{{ @$shipment[0]['container_type'] }}"
                                style="width: 100%;border:none;outline:none;text-align:start;fontt-size:12px"></td>
                        <td class="td3_data" style="background-color:#F0F3F4;"><input type="text"
                                value="{{ @$shipment[0]['booking_number'] }}"
                                style="width: 100%;background-color:#F0F3F4;border:none;outline:none;text-align:start;font-size:12p">
                        </td>
                        <td class="td3_data"style="border:none"><input type="text" value=" "
                                style="width: 97%;border:none;outline:none;text-align:start;font-size:12px"></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tbl_3">
            <table class="table_3" style="width:100%;margin-top: -6px;border-top:none;">
                <tbody>
                    <tr style="border-top:none;border-bottom:.8px solid lightgray;">
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="SHIPPERS DESCRIPTIONS OF GOODS"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="WEIGHT "
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="CUBE"
                                style="width: 92%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <!-- <td class="td3_data">SPECIAL INSTRUCTIONS</td> -->
                    </tr>
                    <tr>
                        <td class="td3_data" style="background-color:#F0F3F4;"><input type="text"
                                value="{{ @$shipment[0]['units'] }} UNITS USED VEHICLES"
                                style="width: 100%;background-color:#F0F3F4;border:none;outline:none;text-align:start;font-size:12px">
                        </td>
                        <td class="td3_data"style="border:none"><input type="text" value="--"
                                style="width: 100%;border:none;outline:none;text-align:start;font-size:12px"></td>
                        <td class="td3_data" style="background-color:#F0F3F4;"><input type="text" value="55 M3"
                                style="width: 92%;border:none;outline:none;text-align:start;background-color:#F0F3F4;font-size:12px">
                        </td>
                        <!-- <td class="td3_data"></td> -->

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tbl_3">
            <table class="table_3 bol_vehicle_table" style="width:100%;margin-top: -6px;border-top:none">
                <tbody>
                    <tr style="border-top:none;">
                        <td class="td3_data"><input type="text" value="YEAR"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;font-weight:bold">
                        </td>
                        <td class="td3_data"><input type="text" value="MAKE"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;font-weight:bold">
                        </td>
                        <td class="td3_data"><input type="text" value="MODEL"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                        <td class="td3_data"><input type="text" value="COLOR"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                        <td class="td3_data"><input type="text" value="VIN"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                        <td class="td3_data"><input type="text" value="WEIGHT"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;"></td>
                    </tr>
                    @foreach ($shipment[0]['vehicle'] as $vehicle)
                        <tr>
                            <td class="td3_data" style="border:none"><input class="input_vehicle" type="text"
                                    value="{{ @$vehicle['year'] }}"
                                    style="width: 100%;border:none;outline:none;text-align:start;font-size:12px; ">
                            </td>
                            <td class="td3_data" style="border:none"><input class="input_vehicle" type="text"
                                    value="{{ @$vehicle['make'] }}"
                                    style="width: 100%;border:none;outline:none;text-align:start;font-size:12px; ">
                            </td>
                            <td class="td3_data" style="border:none"><input class="input_vehicle" type="text"
                                    value="{{ @$vehicle['model'] }} "
                                    style="width: 100%;border:none;outline:none;text-align:start;font-size:12px; ">
                            </td>
                            <td class="td3_data" style="border:none"><input class="input_vehicle" type="text"
                                    value=" {{ @$vehicle['color'] }}"
                                    style="width: 100%;border:none;outline:none;text-align:start;font-size:12px; ">
                            </td>
                            <td class="td3_data" style="border:none"><input class="input_vehicle" type="text"
                                    value="{{ @$vehicle['vin'] }}"
                                    style="width: 100%;border:none;outline:none;text-align:start;font-size:12px; ">
                            </td>
                            <td class="td3_data" style="border:none"><input class="input_vehicle" type="text"
                                    value="{{ @$vehicle['weight'] }}"
                                    style="width: 100%;border:none;outline:none;text-align:start;font-size:12px; ">
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="tbl_3">
            <table class="table_3" style="width:100%;margin-top: -6px;border-top:none">
                <tbody>

                    <tr style="border-top:none;border-bottom:.8px solid lightgray;">
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="SEND TELEX RELEASE"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="INT#"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="OCEAN FREIGHT PAID"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td class="td3_data" style="border-bottom: .8px solid lightgray;"><input type="text"
                                value="WEIGHT(KG)"
                                style="width: 97%;border:none;outline:none;text-align:start;font-weight:bold"></td>

                    </tr>
                    <tr>
                        <td class="td3_data"style="background-color:#F0F3F4;"><input type="text"
                                value="{{ @$shipment[0]['ase-itn_number'] }}"
                                style="width: 100%;background-color:#F0F3F4;border:none;outline:none;text-align:start; font-size:12px;">
                        </td>
                        <td class="td3_data" style="border:none"><input type="text" value="{{ @$total_weight }}"
                                style="width: 100%;border:none;outline:none;text-align:start; font-size:12px;"></td>
                        <td class="td3_data"style="background-color:#F0F3F4;"><input type="text"
                                value="{{ @$shipment[0]['ase-itn_number'] }}"
                                style="width: 100%;border:none;background-color:#F0F3F4;outline:none;text-align:start; font-size:12px;">
                        </td>
                        <td class="td3_data" style="border: none"><input type="text"
                                value="{{ @$total_weight }}"
                                style="width: 97%;border:none;outline:none;text-align:start; font-size:12px;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="p_text" style="width: 89%;"><input type="text"
                                value="These Comodities, Technology Or Software Were Exported From The United States In The Acordance With The Exoirt."
                                style="width: 100%;border:none;outline:none;text-align:start;padding:10px 0;"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tbl_3">
            <table class="table_3" style="width:100%;margin-top: -6px;border-top:none;">
                <tbody>
                    <tr style="width: 80%;border-top:none;">
                        <td colspan="5" class="p2_text" style="width: 90%;border-top:none;">
                            <input type="text"
                                value="HEREBY CERTIFY HAVING RECEIVED THE ABOVE DESCRIBED SHIPMENT IN OUTWARDLY GOOD CONDITION FROM THE SHIPPER SHOWN IN SECTION"
                                style="width: 100%;border:none;outline:none;text-align:start;padding:10px 0">
                        </td>
                    </tr>
                    <tr>
                        <td class="td3_data" style="border: none;padding:10px 0;"><input type="text"
                                value="AUTHORIZED:"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td id="text_w" colspan="1"
                            class="td3_data"style="border: none;background-color:#F0F3F4;"></td>
                        <td class="td3_data"style="border: none"><input type="text" value="DATED AT:"
                                style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                        <td id="text_w" class="td3_data"style="border: none;background-color:#F0F3F4;"></td>
                        <td id="text_w" class="td3_data"style="border-right:1px black; border-left:none"></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div>
        <br>
        <br>
    </div>



</body>

</html>
