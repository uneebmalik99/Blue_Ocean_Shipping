<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdf files</title>
    <style>
        .pdf_all{
            background-image: url('images/blueocean.png');
            background-position:center;
            background-repeat:no-repeat;
            background-size:400px 400px;
            opacity: 0.1;
        }
        .tbls {
            width: 100%;
            padding-bottom: 35px;
        }

        #pdf,
        #pdf-2,
        #pdf-3,
        #pdf_4,
        td {
            border: 0.5px solid black;
            border-collapse: collapse;
        }
        td{
            padding: 5px;
            
        }
        .side_blak{
            border: none;

        }

        .blak {
            border: none;
            border-top: 0.5px solid black;
        }

        #pdf-2 {
            float: right;
        }
    </style>
</head>

<body>
    <div class="pdf_all">
        
            <table id="pdf" style="width:100%">
                <thead>
                    <tr>
                        <th colspan="4" style="width:30%; padding:8px;"><img src="{{asset('images/login_logo.png')}}" alt="" style="width:50% ;"></th>
                        <!-- <th  colspan="3">Blue Oceans</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3" class="blak">invoice number:</td>
                        <td class="blak">date:</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="blak">V&S CarGo INC.</td>
                        <td class="blak" style="width:30;">Phone:</td>
                        <td class="blak" style="width:160px;">12345678912</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="side_blak">395 NJ-34</td>

                        <td class="side_blak">Email:</td>
                        <td class="side_blak">yu@dfhjg.com</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="side_blak">Matwan,NJ</td>
                        <td class="side_blak">Web:</td>
                        <td class="side_blak">www.fujfbsk.com</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="side_blak">POSTAL CODE#07747</td>
                    </tr>

                </tbody>
            </table>
            <br>
        

        <div class="tbls">
            <table id="pdf-2" style="width:50%"> 
                <tr>
                    <td class="blak">Billing Address:</td>
                    <td colspan="2" class="blak">423432ffs</td>
                </tr>
                <tr>
                    <td class="blak">Name:</td>
                    <td colspan="2" class="blak">xvvx535</td>
                </tr>
                <tr>
                    <td class="blak">Company:</td>
                    <td colspan="2" class="blak">xvvx553</td>
                </tr>
                <tr>
                    <td class="blak">Address:</td>
                    <td colspan="2" class="blak">dhgdf4553</td>
                </tr>
                <tr>
                    <td class="blak">ID#</td>
                    <td colspan="2" class="blak">423424243423</td>
                </tr>
                <tr>
                    <td colspan="3" style="padding: 40px 0px"></td>
                </tr>

            </table>
            <table id="pdf-3" style="width:45%">
                <tr>
                    <th>Bank information</th>
                </tr>

                <tbody>
                    <tr>
                        <td>Bank of America</td>
                    </tr>
                    <tr>
                        <td>395 Route34</td>
                    </tr>
                    <tr>
                        <td>Matawan,NJ 07799 USA</td>
                    </tr>
                    <tr>
                        <td>Acc#34567</td>
                    </tr>
                    <tr>
                        <td>Wire Routing#24234242</td>
                    </tr>
                    <tr>
                        <td>ACH Routing#23432464353423</td>
                    </tr>
                    <tr>
                        <td>Swift#12345679</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <table id="pdf_4" style="width:100%">
            <thead>
                <tr>
                    <td>QTY:</td>
                    <td>Description</td>
                    <td>Unit price:</td>
                    <td>TAX</td>
                    <td>Amount</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>iaghuhewiuhfew</td>
                    <td>$0001</td>
                    <td>N/A</td>
                    <td>$34650021</td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>iaghuhewiuhfew</td>
                    <td>$0001</td>
                    <td>N/A</td>
                    <td>$34650021</td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>iaghuhewiuhfew</td>
                    <td>$0001</td>
                    <td>N/A</td>
                    <td>$34650021</td>
                </tr>

                <tr>
                    <td>1</td>
                    <td>iaghuhewiuhfewihgakjgnhgerhgnersngregerguergegberger</td>
                    <td>$0001</td>
                    <td>N/A</td>
                    <td>$34650021</td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2"></td>
                    <td style="padding:30px 0;" colspan="3"></td>
                </tr>
                <tr>

                    <td>Total Amount Due:</td>
                    <td colspan="2">$872,23423</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>