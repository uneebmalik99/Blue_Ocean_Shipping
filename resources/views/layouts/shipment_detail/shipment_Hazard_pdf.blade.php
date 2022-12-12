<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shipment-pdf</title>
    <style>
        table {
            border: 1px solid gray;
        }

        .header_line {
            text-align: start;
        }

        td {
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


        /* table.center {
            margin-left: auto;
            margin-right: auto;
        } */
    </style>
</head>

<body>
    <div class="">
        <div class="">
            <figure class="img_logo">
                <img src="{{asset('images/login_logo.png')}}"  alt="image">
            </figure>
        </div>
        <div class="logo">
            <h4>NON-HAZARDOUS DECLARATION</h4>
        </div>
        <div>
            <table class="center" style="width:100%">
                <tbody>
                    <tr>
                        <td>CARRIER</td>
                        <td>MAERSK</td>
                    </tr>
                    <tr>
                        <td>VESSEL NAME / VOYAGE</td>
                        <td>GUDRUN MAERSK 234 W</td>
                    </tr>
                    <tr>
                        <td>ORIGIN</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>DESTINATION</td>
                        <td>JEBEL ALI</td>
                    </tr>
                    <tr>
                        <td>BOOKING NUMBER</td>
                        <td>220434507C</td>
                    </tr>
                    <tr>
                        <td>CONTAINER NUMBER</td>
                        <td>UETU5849585</td>
                    </tr>
                    <tr>
                        <td>NUMBER OF VEHICLES</td>
                        <td>4</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <p>THIS IS TO CERTIFY THAT ALL VEHICLES INCLUDED IN THIS CONTAINER HAVE BEEN
                    COMPLETELY DRAINED OF FUEL AND RUN UNTIL STALLED. BATTERIES ARE DISCONNECTED
                    AND TAPED BACK AND ARE PROPERLY SECURED TO PREVENT MOVEMENT IN ANY
                    DIRECTION. NO UNDECLARED HAZARDOUS MATERIALS ARE CONTAINERIZED, SECURED TO,
                    OR STOWED IN THIS VEHICLE. <br> WITH THE ABOVE STATEMENT, THESE VEHICLES ARE CLASSIFIED AS NON-HAZARDOUS.
                </p>
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