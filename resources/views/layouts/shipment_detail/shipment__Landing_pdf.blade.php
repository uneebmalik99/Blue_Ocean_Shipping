<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shipment Landing</title>
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
            /* text-align: center; */
        }

        .table_3,
        tr,
        th {
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
        .img_w{
            width:40%;
            height: 35vh;
        }
        .t_img{
            width: 20%;
        }
    </style>
</head>

<body>
    <div class="">
        <table class="tbl_0" style="width:100%;">
            <tbody>
                <tr>
                    
                    <td  class="t_data"><b>ARIANA MARTIME </b></td>
                    <td class="t_img" style="text-align:center ;"><img src="{{asset('images/logo_2.png')}}"  class="img_w" alt=""></td>
                    <td class="t_data"><b>BILL OF LADING</b></td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="tbl_3">
        <table class="table_3" style="width:100%;">
            <tbody>
                <tr>
                    <td class="td3_data">SHIPPER / EXPORTER</td>
                    <td class="td3_data">BOOKING #</td>
                    <td class="td3_data">REFERENCE #</td>
                </tr>
                <tr>
                    <td rowspan="4" class="td3_data">MARHABA USED CARS TR SHARJAH IND # 2</td>
                    <td class="td3_data">220434507C</td>
                    <td class="td3_data">ASLB087622MARHABA215</td>
                </tr>
                <tr>
                    <!-- <td class="td3_data">BoL/AWB/BOOKING # : 220434507C</td> -->
                    <td class="td3_data">PLACE OF RECEIPT</td>
                    <td class="td3_data">PORT OF LOADING</td>

                </tr>
                <tr>
                    <td class="td3_data">BALTIMORE, MD </td>
                    <td class="td3_data">BALTIMORE, MD</td>
                </tr>
                <tr>
                    <td class="td3_data">PORT OF DISCHARGE:</td>
                    <td class="td3_data">JEBEL ALI, UAE</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="tbl_3">
        <table class="table_3" style="width:100%;">
            <tbody>
                <tr>
                    <td class="td3_data">CONSIGNEE</td>
                    <td class="td3_data">PIER # </td>
                    <td class="td3_data">VESSEL #</td>
                </tr>
                <tr>
                    <td rowspan="4" class="td3_data">AMAYA SHIPPING LINE LLC
                        1207 CENTURION STAR TOWER, DEIRA</td>
                    <td class="td3_data">SEAGIRT</td>
                    <td class="td3_data">GUDRUN MAERSK</td>
                </tr>
                <tr>
                    <!-- <td class="td3_data">BoL/AWB/BOOKING # : 220434507C</td> -->
                    <td class="td3_data">1</td>
                    <td class="td3_data">1</td>

                </tr>
                <tr>
                    <td class="td3_data">LOADING PIER/TERMINAL </td>
                    <td class="td3_data">VOYAGE NO.</td>
                </tr>
                <tr>
                    <td class="td3_data">SEAGIRT</td>
                    <td class="td3_data">234 W</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="tbl_3">
        <table class="table_3" style="width:100%;">
            <tbody>
                <tr>
                    <td colspan="2" class="td3_p">NOTIFY</td>
                    <td class="td3_data">FOR RELEASE OF CARGO PLEASE CONTACT:</td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2" class="td3_p" id="t_pad"></td>
                    <td class="td3_data"></td>

                </tr>
                <tr>
                    <td class="td3_data">ETA/2022-10-11</td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="tbl_3">
        <table class="table_3" style="width:100%;">
            <tbody>
                <tr>
                    <td class="td3_data">CONTAINER #</td>
                    <td class="td3_data">CONTAINER TYPE </td>
                    <td class="td3_data">SEAL #</td>
                    <td class="td3_data">SPECIAL INSTRUCTIONS</td>
                </tr>
                <tr>
                    <td class="td3_data">UETU5849585</td>
                    <td class="td3_data">1 X 40'HC DRY VAN</td>
                    <td class="td3_data">29658206</td>
                    <td class="td3_data"></td>

                </tr>
            </tbody>
        </table>
    </div>
    <div class="tbl_3">
        <table class="table_3" style="width:100%;">
            <tbody>
                <tr>
                    <td class="td3_data">SHIPPERS DESCRIPTIONS OF GOODS</td>
                    <td class="td3_data">WEIGHT </td>
                    <td class="td3_data">CUBE</td>
                    <!-- <td class="td3_data">SPECIAL INSTRUCTIONS</td> -->
                </tr>
                <tr>
                    <td class="td3_data">4 UNITS USED VEHICLES</td>
                    <td class="td3_data"></td>
                    <td class="td3_data">55 M3 </td>
                    <!-- <td class="td3_data"></td> -->

                </tr>
            </tbody>
        </table>
    </div>

    <div class="tbl_3">
        <table class="table_3" style="width:100%;">
            <tbody>
                <tr>
                    <td class="td3_data">YEAR</td>
                    <td class="td3_data">MAKE </td>
                    <td class="td3_data">MODEL/COLOR</td>
                    <td class="td3_data">VIN </td>
                    <td class="td3_data">WEIGHT </td>
                    <td class="td3_data">CUBE </td>
                </tr>
                <tr>
                    <td class="td3_data">2013</td>
                    <td class="td3_data">NISSAN</td>
                    <td class="td3_data">VERSA / SILVER</td>
                    <td class="td3_data">3N1CN7APXDL882583</td>
                    <td class="td3_data">1573 KG</td>
                    <td class="td3_data"> </td>

                </tr>
                <tr>
                    <td class="td3_data">2019</td>
                    <td class="td3_data">TOYOTA</td>
                    <td class="td3_data">CAMRY / BLUE</td>
                    <td class="td3_data">4T1BE46K59U798104 </td>
                    <td class="td3_data">1719 KG</td>
                    <td class="td3_data"> </td>

                </tr>
                <tr>
                    <td class="td3_data">2013</td>
                    <td class="td3_data">NISSAN</td>
                    <td class="td3_data">VERSA / SILVER</td>
                    <td class="td3_data">3N1CN7APXDL882583</td>
                    <td class="td3_data">1573 KG</td>
                    <td class="td3_data"> </td>

                </tr>
                <tr>
                    <td class="td3_data">2019</td>
                    <td class="td3_data">TOYOTA</td>
                    <td class="td3_data">CAMRY / BLUE</td>
                    <td class="td3_data">4T1BE46K59U798104 </td>
                    <td class="td3_data">1719 KG</td>
                    <td class="td3_data"> </td>

                </tr>
            </tbody>
        </table>
    </div>

    <div class="tbl_3">
        <table class="table_3" style="width:100%;">
            <tbody>
                <tr>
                    <td class="td3_data">*** NON HAZ MAT</td>
                    <td class="td3_data">OCEAN FREIGHT PAID</td>
                    <td class="td3_data">WEIGHT(KG)</td>

                </tr>
                <tr>
                    <td class="td3_data"><b>SEND TELEX RELEASE</b></td>
                    <td class="td3_data"><b>ITN#</b>X20220827150029</td>
                    <td class="td3_data">7615</td>
                </tr>
                <tr>
                    <td colspan="3" class="p_text"><span>These Comodities, Technology Or Software Were Exported From The United States In The Acordance With The Exoirt
                            Administrative Regulations. Diversion Contrary To The U.s. Law Prohibited.</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="tbl_3">
        <table class="table_3" style="width:100%;">
            <tbody>
                <tr>
                    <td colspan="4" class="p2_text"><span>HEREBY CERTIFY HAVING RECEIVED THE ABOVE DESCRIBED SHIPMENT IN OUTWARDLY GOOD CONDITION FROM
                            THE SHIPPER SHOWN IN SECTION "EXPORTER", FOR FORWARDING TO THE ULTIMATE CONSIGNEE SHOWN IN THE
                            SECTION "CONSIGNEE" ABOVE. IN WITNESS WHEREOF, THE ____________ NONNEGOTIABLE FCR'S HAVE BEEN
                            SIGNED, AND IF ONE (1) IS ACCOMPLISHED BY DELIVERY OF GOODS, ISSUANCE OF A DELIVERY ORDER OR BY SOME
                            OTHER MEANS, THE OTHERS SHALL BE AVOIDED IF REQUIRED BY THE FREIGHT FORWARDER, ONE (1) ORIGINAL
                            FCR MUST BE SURRENDERED, DULY ENDORSED IN EXCHANGE FOR THE GOODS OR DELIVERY ORDER
                        </span></td>
                </tr>
                <tr>
                    <td class="td3_data">AUTHORIZED:</td>
                    <td id="text_w" class="td3_data"></td>
                    <td class="td3_data">DATED AT:</td>
                    <td id="text_w" class="td3_data"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="page">
        <span class="page_border">Page 1</span>
    </div>


</body>

</html>