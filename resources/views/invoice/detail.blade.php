
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice detail</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }

        .btn-pdf {
            background-color: #4CAF50 !important;
            border: none !important;
            color: white !important;
            padding: 15px 32px !important;
            text-align: center !important;
            text-decoration: none !important;
            display: inline-block !important;
            font-size: 16px !important;
            float: right;
            margin-bottom: 10px;
        }
        .btn-pdf,a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
 

        <h1>Invoice detail</h1>
      
            <div>
            <button type="button" class="btn-pdf"><a href="{{route('pdf_files').'/'.$invoices['id']}}">export pdf</a></button>
            </div>
        <table id="customers">
            <tr>
                <th>id</th>
                <th>export id</th>
                <th>customer user id</th>
                <th>consignee id</th>
                <th>total amount</th>
                <th>paid amount</th>
                <th>note</th>
                <th>discount</th>
                <th>upload invoice</th>
                <th>added by role</th>
            </tr>
           
            <tr>
                <td>{{@$invoices['id']}}</td>
                <td>{{@$invoices['export_id']}}</td>
                <td>{{@$invoices['customer_user_id']}}</td>
                <td>{{@$invoices['consignee_id']}}</td>
                <td>{{@$invoices['total_amount']}}</td>
                <td>{{@$invoices['paid_amount']}}</td>
                <td>{{@$invoices['note']}}</td>
                <td>{{@$invoices['discount']}}</td>
                <td>{{@$invoices['upload_invoice']}}</td>
                <td>{{@$invoices['added_by_role']}}</td>
            </tr>
           

        </table>


</body>

</html>