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

    {{-- <div id="thissection" style=""> --}}
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        td {
            font-size: 10px !important;
        }

        table {
            font-size: 10px !important;
            
        }

        * {
            font-family: sans-serif;

        }

        .tbl {
            /* border: 1px solid black; */
            border-collapse: collapse;
        }

        .we {
            font-size: 8px;
            border: 1px solid;
            /* font-weight: bold; */

        }

        .weA {

            text-align: center;
            font-size: 8px;
            border: 1px solid;
            /* font-weight: bold; */
        }

        .weA_last {
            text-align: center;
            font-size: 8px;
            border: 1px solid;
            /* font-weight: bold; */
        }

        .tbl_a {
            border-collapse: collapse;
            border: 1px solid;
        }

        .right {
            border: 1px solid;
            font-size: 13px;
        }

        .carrige_p {
            padding-bottom: 8px;
            font-size: x-small;
            border: 1px solid;
        }

        .jabli {
            font-size: 13px;
            border: 1px solid;
        }

        #ee {
            width: 160px;
            border: 1px solid;
        }

        #prnpl {
            border: 1px solid;
            width: 190px;
            background-color: blueviolet;
            /* border-collapse: collapse; */
        }

        #noor {
            border: 1px solid;
            /* background-color: yellowgreen; */
        }

        /* #export_ref {
            border: 1px solid;
            padding-bottom: 30px;
        } */

        #zip {
            width: 20px !important;
            border: 1px solid;
        }

        #plce {
            width: 20px !important;
            background-color: aqua;
            border: 1px solid;
        }

        #pad {
            padding-bottom: 80px;
            border: 1px solid;
        }

        #delv {

            background-color: RED;
            border: 1px solid;

            /* width:130px; */
        }

        #ty {
            width: 360px;
            text-align: center;
            font-size: x-small;
            font-weight: bold;
            padding-top: 10px;
            border: 1px solid;
            /* border-right: 1px solid black; */
        }

        .pp_s {
            font-size: 8px !important;
            /* border-left: 1px solid black; */
            text-align: center;
            border: 1px solid;
        }

        .no_al {
            font-size: x-small !important;
            border: 1px solid;
        }

        .tbl_c {
            border-collapse: collapse;
            border: 1px solid;
            font-size: 12px !important;
        }

        .wrds {
            font-size: 11px;
            font-weight: 600;
            border: 1px solid;
            /* background-color: greenyellow; */
        }

        .d_date {
            font-size: 11px;
            font-weight: 600;
            border: 1px solid;
            /* border-right: 1px solid black; */
        }

        .for {
            font-size: 11px;
            font-weight: 600;
            border: 1px solid;
            /* border-left: 1px solid black; */
        }

        .label {
            border: 1px solid;
            background-color: black;

        }

        .adres {
            background-color: red;
            border: 1px solid;
        }

        .rc {
            font-size: 8px;
            font-weight: bold;
            border: 1px solid;
        }

        .p_doc {
            font-size: 8px;
            border: 1px solid;
            /* background-color: white; */
        }

        .doc_img {
            margin-left: -99px;
            width: 100px;
            height: 73px !important;
            /* margin-right: -100px; */
            float: left;
            margin-top: 33px;
        }

        textarea {
            overflow: auto;
            resize: vertical;
            width: 513px;
            /* height: 102%; */
            height: inherit;
            height: 107px;
            margin-top: 7px;
            margin-right: -1px;
            border: none;
        }
        .bol_vehicle_table tr:nth-child(even) {
        border-bottom:1px solid lightgray!important;
    }
    </style>

    {{-- <div class="" > --}}
    <table class="tbl_0" style="width:100%;">
        <tbody>
            <tr>
                <td class="" style="text-align:start;width:40%;">
                    <img src="{{ asset('images/logo_2.png') }}" class="" alt=""style="width:100px;height: 80px!important;">
                </td>
                <td class="" style="width:60%;">
                    <input type="text" value="DOCK RECEIPT"
                        style="width: 98%;border:none;outline:none;text-align:start;font-weight:bold;font-size:15px;text-decoration:underline rgb(133, 125, 125)">
                </td>
            </tr>

        </tbody>
    </table>
    {{-- </div> --}}

    <table class="tbl" style="width:100%;">
        <tbody>
            <tr style="border-bottom: .8px solid lightgray;">
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:33%!important;border-bottom:.8px solid lightgray">
                     <input type="text"
                        value="EXPORTER"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold">
                    </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor" style="width:33%!important;font-weight: bold ;font-size:12px;border-bottom:.8px solid lightgray">
                    <input type="text"
                        value="DOCUMENT NUMBER"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <td class="we" style="width:33%!important;font-weight: bold ;font-size:12px;border-bottom:.8px solid lightgray">
                    <input type="text" value="SA.B/L NUMBER"
                        style="width: 80%;border:none;outline:none;text-align:start;font-weight:bold">
                    </td>
            </tr>
            <tr>
                <td colspan="2" class="no_al" rowspan="2" id="noor"; style="border-bottom:none;border-top:.8px solid lightgray;">
                    <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['shipper_name'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;"><br>
                    <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['address'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;"><br>
                    <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['phone'] }}"
                        style="width: 100%;border:none;border-bottom:1px black; outline:none;text-align:start;">
                </td>
                <td class="right" style="border-top:.8px solid lightgray;"><input type="text" value="{{ @$shipment[0]['booking_number'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;"></td>
                <td class="no_al" style="border-top:.8px solid lightgray;"><input type="text" value="{{ @$shipment[0]['booking_number'] }}"
                        style="width: 80%;border:none;outline:none;border-bottom:1px black!important;text-align:start;">
                </td>
            </tr>


            <tr>

                <td class="we" id="export_ref"
                    style="font-weight: bold ;font-size:12px;border-bottom:.8px solid lightgray;">
                    <input type="text" value="EXPORT REFREENCE"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold">
                </td>
                <td class="we" id="export_ref"
                    style="font-weight: bold ;font-size:12px;border-bottom:.8px solid lightgray;">
                    <input type="text" value="POINT(STATE) OF ORIGIN"
                        style="width: 80%;border:none;outline:none;text-align:start;font-weight:bold">
                </td>



                <!-- <td style="background-color:blue ;"></td> -->
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td>
                    <td class="we">5.DPCUMENT NUMBER</td>
                    <td class="we">SA.B/L NUMBER</td> -->
            </tr>
            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:33%!important; border-top:none"> 
                    <input
                        type="text" value=""
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold">
                    </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor" style="font-weight: bold ;font-size:12px;border-top: 0.8px solid lightgray;"><input type="text"
                        value="--" style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold">
                </td>
                <td class="we" style="font-weight: bold ;font-size:12px;border-top: 0.8px solid lightgray;"><input type="text" value="--"
                        style="width: 80%;border:none;outline:none;text-align:start;font-weight:bold"></td>
            </tr>
            <tr style="border-bottom: .8px solid lightgray;">
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:33%!important; border-top:none;border-bottom:.8px solid lightgray;"> <input
                        type="text" value="CONSIGNEE TO
                    "
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:none;border-bottom:.8px solid lightgray;"><input type="text"
                        value="Shipper"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <td style="border: 1px solid black;border-left:none!important;border-bottom:.8px solid lightgray;"></td>

            </tr>




            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-size:12px ;width:33%!important; border-top:none">
                    <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['company_name'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;"><br>
                    <input type="text"
                        value="{{ @$shipment[0]['customer']['billings'][0]['address'] }}, {{ @$shipment[0]['customer']['billings'][0]['city'] }}, {{ @$shipment[0]['customer'][0]['user']['billings'][0]['zip_code'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;"><br>
                    <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['phone'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor"
                    style="font-size:12px;border-top:none;border-right:none">
                    <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['shipper_name'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;"><br>
                    <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['address'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;"><br>
                    <input type="text" value="{{ @$shipment[0]['customer']['shippers'][0]['phone'] }}"
                        style="width: 70%;border:none;outline:none;text-align:start;">
                </td>
                <td style="border: 1px solid black;border-left:none!important;border-top:.8px solid lightgray!important;"></td>
            </tr>
            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:33%!important; border-top:none;border-bottom:.8px solid lightgray;"> <input
                        type="text" value="NOTIFY PARTY /INTERMEDIATE CONSIGNEE"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td colspan="1"class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:none;width:60%!important;border-bottom:.8px solid lightgray">
                    <input type="text"
                        value="DOMESTIC ROUTING EXPORT INSTRUCTION"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold">
                    </td>
                <td style="border: 1px solid black;border-left:none!important;width:7%;border-bottom:.8px solid lightgray;"></td>

            </tr>




            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-size:12px ;width:33%!important; border-top:none;border-top:.8px solid lightgray;">
                    <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['company_name'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                    <input type="text"
                        value="{{ @$shipment[0]['customer']['billings'][0]['address'] }}, {{ @$shipment[0]['customer']['billings'][0]['city'] }}, {{ @$shipment[0]['customer'][0]['user']['billings'][0]['zip_code'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                    <input type="text" value="{{ @$shipment[0]['customer']['billings'][0]['phone'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:none;border-top:.8px solid lightgray;">
                    <input type="text" value="--"
                        style="width: 70%;border:none;outline:none;text-align:start;">
                </td>
                <td style="border: 1px solid black;border-left:none!important;border-top:.8px solid lightgray;"></td>
            </tr>

            <tr style="border-bottom: .8px solid lightgray;">
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold;font-size:12px ;width:33%!important; border-top:none;border-bottom:.8px solid lightgray;"> <input
                        type="text" value="PRE-CARRIAGE BY
                    "
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:none;border-bottom:.8px solid lightgray;"><input type="text"
                        value="PLACE OF RECIEPT BY PRE-CARRIER"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:1px solid black;border-bottom:.8px solid lightgray;"><input
                        type="text" value="EXPORTING CARRIER by"
                        style="width: 90%;border:none;outline:none;text-align:start;font-weight:bold;"></td>


            </tr>




            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:33%!important; border-top:none">
                    <input type="text" value="--"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:1px solid black">
                    <input type="text" value="--"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                </td>
                <td style="border: 1px solid black;border-left:none!important;border-top:.8px solid lightgray;">
                    <input type="text" value="--"
                        style="width: 80%;border:none;outline:none;text-align:start;">
                </td>

            </tr>

            <tr style="border-bottom: .8px solid lightgray;">
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:33%!important; border-top:none;border-bottom:.8px solid lightgray;"> <input
                        type="text" value="PORT OF LOADING/EXPORT
                    "
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:none;border-bottom:.8px solid lightgray;"><input type="text"
                        value="LOADING PIER/TERMINAL"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:1px solid black;border-bottom:.8px solid lightgray;"><input
                        type="text" value="EFOREIGN PORY OF UNLOADING"
                        style="width: 90%;border:none;outline:none;text-align:start;font-weight:bold;"></td>


            </tr>




            <tr>
                <td colspan="2" class="we" id="ee" style="width:33%!important; border-top:none">
                    <input type="text" value="{{ @$shipment[0]['loading_port'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor" style="border-top:none;border-right:1px solid black">
                    <input type="text" value="{{ @$shipment[0]['loading_terminal'] }}"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                </td>
                <td style="border: 1px solid black;border-left:none!important;border-top:.8px solid lightgray;">
                    <input type="text" value="{{ @$shipment[0]['destination_port'] }}"
                        style="width: 80%;border:none;outline:none;text-align:start;">
                </td>

            </tr>


            <tr style="border-bottom: .8px solid lightgray;">
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:33%!important; border-top:none;border-bottom: .8px solid lightgray;"> <input
                        type="text" value="FOREIGN PORT OF LOADING
                    "
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:none;border-bottom: .8px solid lightgray;"><input type="text"
                        value="TYPE OF MOVE"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold"></td>
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:1px solid black;border-bottom: .8px solid lightgray;"><input
                        type="text" value="CONTAINERIZED"
                        style="width: 90%;border:none;outline:none;text-align:start;font-weight:bold;"></td>


            </tr>




            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:33%!important; border-top:none">
                    <input type="text" value="--"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:1px solid black">
                    <input type="text" value="--"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                </td>
                <td style="border: 1px solid black;border-left:none!important;border-top:lightgray;">
                    <input type="text" value="--"
                        style="width: 80%;border:none;outline:none;text-align:start;">
                </td>

            </tr>
            <tr style="border-bottom: .8px solid lightgray;">

                <td class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:11%!important; border-top:none;background-color: #F0F3F4;border-bottom: .8px solid lightgray;
                    ">
                    <input type="text" value="MARKS AND Number
                        "
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;background-color: #F0F3F4;">
                </td>

                <td class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:11%!important; border-top:none;background-color: #F0F3F4;border-bottom: .8px solid lightgray;">
                    <input type="text" value="NUMBER
                            "
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;background-color: #F0F3F4;">
                </td>



                <td class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:11%!important; border-top:none;background-color: #F0F3F4;border-bottom: .8px solid lightgray;">
                    <input type="text" value="DISCRIPTION OF COMMODITEIS in Schedule B detail
                    "
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;background-color: #F0F3F4;">
                </td>

                <td class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:11%!important; border-top:none;background-color: #F0F3F4;border-bottom: .8px solid lightgray;">
                    <input type="text" value="GROOSS WEIGHT (Kilos)
                        "
                        style="width: 90%;border:none;outline:none;text-align:start;font-weight:bold;background-color: #F0F3F4;">
                </td>


            </tr>
            <tr>
                <td class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;width:33%!important; border-top:none">
                    <input type="text" value="--"
                        style="width: 100%;border:none;outline:none;text-align:start;">

                    <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
                <td class="we" id="noor"
                    style="font-weight: bold ;font-size:12px;border-top:none;border-right:1px solid black">
                    <input type="text" value="--"
                        style="width: 100%;border:none;outline:none;text-align:start;">
                </td>
                <td style="border: 1px solid black;border-left:none!important;border-top:.8px solid lightgray">
                    <input type="text" value="--"
                        style="width: 80%;border:none;outline:none;text-align:start;">
                </td>
                <td style="border: 1px solid black;border-left:none!important;border-top:.8px solid lightgray">
                    <input type="text" value="--"
                        style="width: 80%;border:none;outline:none;text-align:start;">
                </td>



            </tr>

            





        </tbody>

    </table>

    <table  class=".bol_vehicle_table"style="width:100%;border:1px solid black;border-top:none!important;">
        <tbody>
            <tr style="width:100%;font-weight:bold;border-bottom:1px solid lightgray!important;">
                <td style="border-bottom: 1px solid lightgray;">YEAR</td>
                <td style="border-bottom: 1px solid lightgray;">MAKE</td>
                <td style="border-bottom: 1px solid lightgray;">MODEL/COLOR</td>
                <td style="border-bottom: 1px solid lightgray;">VIN</td>
                <td style="border-bottom: 1px solid lightgray;">WEIGHT</td>
            </tr>
            

                @foreach (@$shipment[0]['vehicle'] as $vehicle)
                    <tr>
                        <td class="td3_data" style="width: 100%;border:none;outline:none;text-align:start;font-size:12px">{{ @$vehicle['year'] }}</td>
                        <td class="td3_data" style="width: 100%;border:none;outline:none;text-align:start;font-size:12px">{{ @$vehicle['make'] }}</td>
                        <td class="td3_data" style="width: 100%;border:none;outline:none;text-align:start;font-size:12px">{{ @$vehicle['model'] }} / {{ @$vehicle['color'] }}</td>
                        <td class="td3_data" style="width: 100%;border:none;outline:none;text-align:start;font-size:12px">{{ @$vehicle['vin'] }}</td>
                        <td class="td3_data" style="width: 100%;border:none;outline:none;text-align:start;font-size:12px">{{ @$vehicle['weight'] }}</td>
                    </tr>
                @endforeach
                

            
        </tbody>
    </table>

    <table style="width:50.8%;margin-top:-1px;border:1px solid black;border-right:none!important;border-left:1px solid black;border-top:1px solid black;">
        <tbody >
            <tr style="border: none!important;">
                <td colspan="2" class="we" id="ee"
                    style="font-weight:bold;font-size:12px;width:50%;border:none!important">
                    <input type="text" value="DELIVERD BY:" style="width: 100%;border:none;outline:none; text-align:start;font-weight:bold;">
                </td>
                <td colspan="2" class="we" id="ee"
                    style="font-size:12px;border-left:none;border:none;padding-top:4px;"> <input
                        type="text"
                        value="RECEIVED THE ABOVE DESCRIBED GOODS"
                        style="width: 70%;border:none;outline:none;text-align:start;padding-top:4px!important;margin-top:3px!important">
                </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
            </tr>
            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-weight:bold;font-size:12px;width:50%;border:none">
                    <input type="text" value="LIGHTER TRUCK"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;">
                </td>
                <td colspan="2" class="we" id="ee"
                    style="font-size:12px ;border-left:none;border:none">
                    <input type="text" value="EXPORTER"
                        style="width: 78%;border:none;outline:none;text-align:start;">
                </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
            </tr>
            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold;font-size:12px; width:50%;border:none">
                    <input type="text" value="ARRIVED DATE"
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;broder-left:none;border-bottom:none">
                </td>
                <td colspan="2" class="we" id="ee"
                    style="font-size:12px;border:none">
                    <input type="text"
                        value="ARRIVED DATE: {{ @$shipment[0]['est_arrival_date'] }}"
                        style="width: 70%;border:none;outline:none;text-align:start;broder-left:none;border-bottom:none;border-top:none;font-size:10px">
                </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
            </tr>
            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ; width:50%;border:none">
                    <input type="text" value="UPLOADED DATE
                            "
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;broder-left:none;border-top:none;border-bottom:none">
                </td>
                <td colspan="2" class="we" id="ee"
                    style="font-size:12px ;border-left:none;border-top:none;border-bottom:none;border-right:none;">
                    <input type="text"
                        value="{{ date('M d, Y', @$shipment[0]['create_at']) }}
                            "
                        style="width: 70%;border:none;outline:none;text-align:start;broder-left:none;border-top:none;border-bottom:none">
                </td>
                <!-- <td class="we" id="prnpl">(Principle or seller-license and adress including zip code)</td> -->
            </tr>
            <tr>
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ; width:50%;border:none">
                    <input type="text" value="PLACE BY: _________________
                                "
                        style="width: 100%;border:none;outline:none;text-align:start;font-weight:bold;broder-left:none;border-top:none">
                </td>
                <td colspan="2" class="we" id="ee"
                    style="font-weight: bold ;font-size:12px ;border:none"> <input type="text"
                        value="LOCATION: ________________"
                        style="width: 90%;border:none;outline:none;text-align:start;font-weight:bold;broder-left:none;border-top:none;border-bottom:none">
                </td>

            </tr>
        </tbody>

    </table>
    <table class="tbl" style="width:50%;float: right;margin-top:-155.8px;margin-right:0px!important; border-right:1px solid black;border-left:1px solid black!important;border-bottom:1px solid black;">
        <tbody>
            <tr>
                <td class="we" id="ee"
                style="font-size:12px;width: 37%;border:none">

                <textarea style="width: 92%;height:87px;font-size:10px!important;">RECEIVED THE ABOVE DESCRIBED GOODS OR PACKAGES SUBJECT TO ALL THE TERMS OF THE UNDERSIGNED'S  REGULAR FORM OF DOCK RECEIPT AND BILL OF LADING WHICH SHALL CONSTITUTE THE CONTRACT UNDER WHICH THE GOODS ARE RECEIVED, COPIES OF WHICH ARE AVAIABLE FROM THE CARRIER ON REQUEST AND MAY BE INSPECTED AT ANY OF ITS OFFICES.</textarea>
            <br>
                <input type="text" value="FOR THE MASTERS" style="width: 90%;border:none;outline:none;text-align:start;font-weight:bold;">
            
            <br>
            <input type="text" value="BY: ___________________" style="width: 50%;border:none;outline:none;text-align:start;font-weight:bold;">
            <input type="text" value="DATE: _________________" style="width: 40%;border:none;outline:none;text-align:start;font-weight:bold;">
        </td>
            </tr>
        </tbody>
    </table>


    {{-- </div> --}}
