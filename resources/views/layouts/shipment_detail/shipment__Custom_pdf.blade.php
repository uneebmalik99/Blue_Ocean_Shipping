<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shipment Us Custom</title>
</head>
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

    .text_last {
        margin-top: 10px;
    }

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
</style>

<body>
    <!-- <table style="width:100%;">
        <tbody class="t_border">
            <tr>
                <td rowspan="2" class="td_border" style="width: 25%;"><img src="{{asset('images/logo_2.png')}}" width="25%" alt=""></td>
                <td class="td_border">U.S. CUSTOMS AND BORDER PROTECTION</td>
            </tr>
            <tr>
                <td class="td_border"><span>COVER LETTER</span></td>
            </tr>
        </tbody>
    </table> -->
    <div class="header">
        <span><b>U.S. CUSTOMS AND BORDER PROTECTION</b></span>
    </div>
    <div class="img_div">
        <img src="{{asset('images/logo_2.png')}}" width="13%" alt="">
    </div>
    <div class="h_footer">
        <span class="fff-1"><b>COVER LETTER</b></span>
    </div>
    <hr>

    <table style="width:100%;">
        <thead>
            <tr>
                <td colspan="8" class="fff_2"><b>VEHICLE INFORMATION</b></td>
            </tr>
            <tr>
                <td class="th_text">YEAR</td>
                <td class="th_text">MAKE</td>
                <td class="th_text">MODEL</td>
                <td class="th_text">VIN</td>
                <td class="th_text">TITLE NUMBER</td>
                <td class="th_text">STATE</td>
                <td class="th_text">VALUE</td>
                <td class="th_text">X</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="td_text">2013</td>
                <td class="td_text">NISSAN</td>
                <td class="td_text">VERSA</td>
                <td class="td_text">3N1CN7APXDL882583</td>
                <td class="td_text">19991970649</td>
                <td class="td_text">VIRGINIA</td>
                <td class="td_text">$</td>
                <td class="td_text">
                    <div class="td_last">X</div>
                </td>
            </tr>

            <tr>
                <td class="td_text">2019</td>
                <td class="td_text">TOYOTA</td>
                <td class="td_text">CAMRY</td>
                <td class="td_text">4T1BE46K59U798104</td>
                <td class="td_text">19991970649</td>
                <td class="td_text">VIRGINIA</td>
                <td class="td_text">$</td>
                <td class="td_text">
                    <div class="td_last">X</div>
                </td>
            </tr>

            <tr>
                <td class="td_text">2013</td>
                <td class="td_text">NISSAN</td>
                <td class="td_text">VERSA</td>
                <td class="td_text">3N1CN7APXDL882583</td>
                <td class="td_text">19991970649</td>
                <td class="td_text">VIRGINIA</td>
                <td class="td_text">$</td>
                <td class="td_text">
                    <div class="td_last">X</div>
                </td>
            </tr>

            <tr>
                <td class="td_text">2019</td>
                <td class="td_text">TOYOTA</td>
                <td class="td_text">CAMRY</td>
                <td class="td_text">4T1BE46K59U798104</td>
                <td class="td_text">19991970649</td>
                <td class="td_text">VIRGINIA</td>
                <td class="td_text">$</td>
                <td class="td_text">
                    <div class="td_last">X</div>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="text_last">
        <span><b>ROLLOVER</b> ____ (Please check if a cover letter was previously validated)</span>
    </div>

    <hr>

    <table style="width:100%;" class="">
        <tbody>
            <tr>
                <td colspan="6" class="t2_header"><b>EXPORTER INFORMATION</b></td>
            </tr>
            <tr>
                <td class="t_headers"><b>Exporter (USPPI) Name: </b></td>
                <td colspan="5" class="t_th"></td>
                <!-- <td class=""></td> -->

            </tr>
            <tr>
                <td colspan="6" class="address"><b>U.S. Address: </b></td>

            </tr>

            <tr>
                <td></td>
                <td class="">
                    <div class="adii">Street</div>
                </td>
                <td colspan="2" class="">
                    <div class="adii">City</div>
                </td>
                <td class="">
                    <div class="adii">State</div>
                </td>
                <td class="">
                    <div class="adii">Zip</div>
                </td>
                <!-- <td class=""></td> -->
            </tr>
            <tr>
                <td colspan="2" class="ppp"><b>Phone:</b></td>
                <!-- <td class="t_th"></td> -->
                <td colspan="2" class=""><b>Fax:</b></td>
                <td class="ppp"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td id="blue" class="t_brd"></td>
                <td class="w_fax"></td>
                <!-- <td class="t_th">hhh</td> -->
                <td colspan="5" class="t_brd"></td>
            </tr>
            <tr>
                <td><b>Filing Agent/Freight Forwarder:</b></td>
                <td></td>
                <td><b>Contact:</b></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td id="blue" class="t_brd"></td>
                <td class="w_fax"></td>
                <!-- <td class="t_th">hhh</td> -->
                <td colspan="5" class="t_brd"></td>
            </tr>

            <tr>
                <td><b>Loading location(if different from forwarder):</b></td>
                <td></td>
                <td><b>Contact:</b></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td id="blue" class="t_brd"></td>
                <td class="w_fax"></td>
                <!-- <td class="t_th">hhh</td> -->
                <td colspan="5" class="t_brd"></td>
            </tr>

            <tr>
                <td colspan="6" class="address"><b>U.S. Address: </b></td>

            </tr>

            <tr>
                <td></td>
                <td class="">
                    <div class="adii">Street</div>
                </td>
                <td colspan="2" class="">
                    <div class="adii">City</div>
                </td>
                <td class="">
                    <div class="adii">State</div>
                </td>
                <td class="">
                    <div class="adii">Zip</div>
                </td>
                <!-- <td class=""></td> -->
            </tr>
            <tr>
                <td colspan="2" class="ppp"><b>Phone:</b></td>
                <!-- <td class="t_th"></td> -->
                <td colspan="2" class=""><b>Fax:</b></td>
                <td class="ppp"></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td id="blue" class="t_brd"></td>
                <td class="w_fax"></td>
                <!-- <td class="t_th">hhh</td> -->
                <td colspan="5" class="t_brd"></td>
            </tr>

        </tbody>
    </table>
    <hr>

    <table style="width:100%;" class="tbl_b">
        <tbody>
            <tr>
                <td colspan="6" class="t2_header"><b>EXPORTER INFORMATION</b></td>
            </tr>
            <tr>
                <td colspan="2" class="box_1"><b>Booking #:</b></td>
                <td id="v_ww" class="box_1"><b>Vessel Name & Voyage#: </b></td>
                <td colspan="2" class="box_1"></td>
                <!-- <td class=""></td> -->
            </tr>

            <tr>
                <td id="book"></td>
                <td class="t_brd"></td>
                <td class="w_fax"></td>
                <!-- <td class="t_th">hhh</td> -->
                <td colspan="5" class="t_brd"></td>

            </tr>

            <tr>
                <td colspan="2" class="box_1"><b>Vessel Departure Date: </b></td>
                <td class="box_1"><b>US Port of <br> Export: </b></td>
                <td colspan="2" class=""></td>
                <!-- <td class=""></td> -->
            </tr>

            <tr>
                <td id="vessel"></td>

                <td class="t_brd"></td>
                <td class="w_fax"></td>
                <!-- <td class="t_th">hhh</td> -->
                <td colspan="4" class="t_brd"></td>
            </tr>
            <tr>
                <td colspan="5"><b>City and Country of Ultimate <br> Destination:</b> </td>
            </tr>
            <tr>
                <td></td>
                <td class="desty"></td>
                <td colspan="4" class="t_brd"></td>
            </tr>
            <tr>
                <td class="" colspan="2"><b>Steamship Line:</b></td>
                <td class="" colspan="2"><b>Terminal:</b></td>
                <td class=""><b>Container<br>#:</b></td>
            </tr>
            <tr>
                 <td></td>
                <td  class="t_brd" ></td>
                <td></td>
                <td class="t_brd"></td>
                <td></td>
                <td  class="t_brd"></td>
            </tr>
        </tbody>

    </table>
    <hr style="margin-top:none ;">

    <table style="width: 100%;" class="">
        <tbody>
            <tr>
                <td colspan="6" class="t2_header"><b>AES INFORMATION</b></td>
            </tr>
            <tr>
                <td colspan="5"><b>ITN #:</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="5" class="t_brd"></td>
            </tr>
            <tr>
                <td colspan="6" class="text_itn" style="padding-top:10px ;"><span>I certify under penalty of perjury under the laws of the United States of America ( Title 18 U.S.C. § 1001) that the foregoing is true and
                        correct. Title 18 U.S.C. § 1001 prohibits making false statements, lying to or cancealing information from a federal official by oral
                        affirmation, written statement or mere denial.
                    </span></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top:10px ;"><b>AUTHORIZED <br> SIGNATURE:</b></td>
                <td colspan="2" style="padding-top:10px ;"><b>Date:</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2" class="t_brd"></td>
                <td style="width:50px;"></td>
                <td colspan="3" class="t_brd"></td>
                <!-- <td class="t_brd"></td> -->
            </tr>
        </tbody>
    </table>
</body>

</html>