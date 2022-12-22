<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blue Ocean Shipping</title>
</head>
<style>
    p{
        font-size: 12px !important;
    }
    td{
        border: 1px solid black;
        border-collapse: collapse; 
    }
    .table-main {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size:12px;
}

.td, th {
  border: 1px  black;
  border: black
  text-align: right;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
  border:0px solid white;
}
tr{
    border-color:white;
}
.end-tr{
    background-color:white;
    border-color:white;
    text-align:right;
    
}

</style>
<body>
    <div style="border:3px; border:solid;border-color:black ;width:100%">
    <span style="margin-top:-12px;margin-left:55%;color: silver">INVOICE </SPAN>
    <div style="width:95%;margin-left:20px;">
    <div>
        <table style="float:left;width:80% !important;font-size:12px;">
        <tr>
              <span><h3> GLOBAL OCEAN SHIPPING<h3></span>
            </tr>
            <tr>
               <span>Address: {{ @$vehicle[0]['user']['shippers'][0]['address']}}</span>
            </tr>
            <tr>
                <span>{{ @$vehicle[0]['user']['shippers'][0]['country']}} , {{ @$vehicle[0]['user']['shippers'][0]['city']}} , {{ @$vehicle[0]['user']['shippers'][0]['zip_code']}}</span>
            </tr>
            <tr>
                <span>PHONE NO: {{ @$vehicle[0]['user']['shippers'][0]['phone']}}</span>
            </tr>
            
        </table>
        <div style="left:50%;">
        <table style="margin-bottom:20px;float:right;width:40% !important;border-collapse: collapse; font-size:12px; left:20%;">
        <tr> <td style="border:none"><b>DATE:</b></td><td style="width: 50%;height:25px;border:none">  {{ \Carbon\Carbon::now()->format('Y-m-d') }}</td> </tr>
        <tr>  <td style="border:none;background-color:white;" ><strong>INVOICE #<strong></td><td style="width: 50%;height:25px;border:none;background-color:white;">{{ random_int(1000, 9999) }}</td> </tr>
        <tr>  <td style="border:none"><strong>FOR:<strong></td><td style="width: 50%;height:25px;border:none">{{ @$vehicle[0]['towing_charges'] }}</td> </tr>
            
        </table>
</div>
    </div>
    <div style="clear: both;width:100% !important">
    <div >
        <table style="float:left;width:60% !important;font-size:12px;">
            <tr>
               <span><h3>BILL T0:<h3></span>
            </tr>
            <tr>
                <span>Customer Name: {{ @$vehicle[0]['user']['billings'][0]['first_name']}} {{ @$vehicle[0]['user']['billings'][0]['last_name']}}</span>
            </tr>
            <tr>
                <span>Company Name: {{ @$vehicle[0]['user']['billings'][0]['company_name']}}</span>
            </tr>
            <tr>
                <span>Company Address: {{ @$vehicle[0]['user']['billings'][0]['address']}}</span>
            </tr>
            <tr>
                <span style="height:35px !important">{{ @$vehicle[0]['user']['billings'][0]['country']}},  {{ @$vehicle[0]['user']['billings'][0]['city']}}, {{ @$vehicle[0]['user']['billings'][0]['zip_code']}}</span>
            </tr>
            <tr>
              <span>Phone: {{ @$vehicle[0]['user']['billings'][0]['phone']}}</span>
          </tr>
        </table>
        <table style="margin-bottom:20px;float:right;width:40% !important;border-collapse: collapse;font-size:12px;">
            <td style="border:none"><strong> PICKUP DETAILS<strong></td>
            <tr> <td style="width: 50%;height:25px;border:none">location</td><td style="width: 50%;height:25px;border:none">{{ @$vehicle[0]['pickup_location'] }}</td> </tr>
            <tr> <td style="width: 50%;height:25px;border:none ;background-color:white;">AUCTION</td><td style="width: 50%;height:25px;border:none;background-color:white;">{{ @$vehicle[0]['auction'] }}</td> </tr>
            <tr> <td style="width: 50%;height:25px;border:none">BUYER ID</td><td style="width: 50%;height:25px;border:none">{{ @$vehicle[0]['buyer_id'] }}</td> </tr>
            <tr> <td style="width: 50%;height:25px;border:none;background-color:white;">LOT#</td><td style="width: 50%;height:25px;border:none;background-color:white;">{{ @$vehicle[0]['lot'] }}</td> </tr>
            
        </table>
       
    </div>
    <div style="margin-top:200px";>
    <table border="2" class="table-main " >
  <tr style="border-color:black">
    <th>DESCRIPTION</th>
    <th>QTY</th>
    <th>RATE</th>
      <th>AMOUNT</th>
  </tr>
  <tr>
<td>{{ @$vehicle[0]['year'] }} {{ @$vehicle[0]['make'] }} {{ @$vehicle[0]['model'] }} {{ @$vehicle[0]['vin'] }}</td>
    <td>1.00</td>
    <td>{{ @$vehicle[0]['towing_charges'] }}</td>
    <td style="background-color: silver;border:none;" class="end-tr"> 
    <div>
        <span >
         $</span>
         <span>
</span>

         <span>
          {{ @$vehicle[0]['towing_charges'] }}
</span>
</div>
    
    </td>
  </tr>
  <tr>
    <td>LATE FEE</td>
    <td>1.00</td>
    <td>{{ @$vehicle[0]['late_fee'] }}</td>
    <td style="background-color: silver;border:none;" class="end-tr"><div>
        <span >
         $</span>
         <span>
</span>

         <span>
          {{ @$vehicle[0]['late_fee'] }}
</span>
</div></td>
  </tr>
  <tr>
    <td>STORAGE FEE:</td>
    <td>1.00</td>
    <td>{{ @$vehicle[0]['port_detention_fee'] }}
    </td>
    <td style="background-color: silver;border:none;" class="end-tr"><div>
        <span >
         $</span>
         <span>
</span>

         <span>
          {{ @$vehicle[0]['port_detention_fee'] }}
</span>
</div></td>
  </tr>
  <tr>
    <td>ADDITIONAL CHARGES</td>
    <td>1.00</td>
    <td>{{ @$vehicle[0]['additional_fee'] }}</td>
    <td style="background-color: silver;border:none;" class="end-tr"><div>
        <span >
         $</span>
         <span>
</span>

         <span>
          {{ @$vehicle[0]['additional_fee'] }}
</span>
</div></td>
  </tr>
  
 
  <tr class="end-tr">
    
    <td  colspan="3";  class="end-td" style="border:none;">SUBTOTAL</td>
    <td style="background-color: silver;border:none;"><div>
        <span >
         $</span>
         <span>
</span>

         <span>
    {{   @$vehicle[0]['towing_charges']   +   @$vehicle[0]['additional_fee'] +   @$vehicle[0]['port_detention_fee']  +  @$vehicle[0]['late_fee']  }}
</span>
</div></td>
    
  </tr>
  <tr class="end-tr">
    
    <td  colspan="3";  class="end-td" style="border:none;">TAX RATE</td>
    <td style="background-color: silver;border:none; border-left:2px;border-left:red"><div>
        <span >
         $</span>
         <span>
</span>

         <span>
          {{   @$vehicle[0]['towing_charges']   +   @$vehicle[0]['additional_fee'] +   @$vehicle[0]['port_detention_fee']  +  @$vehicle[0]['late_fee']  }}
</span>
</div></td>
    
  </tr>
  <tr class="end-tr">
    
    <td  colspan="3";  class="end-td" style="border:none;">SALES TAX</td>
    <td style="background-color: silver;border:none; border-left:2px;border-left:red"><div>
        <span >
         $</span>
         <span>
</span>

         <span>
          --
</span>
</div></td>
    
  </tr>
  <tr class="end-tr">
    
    <td  colspan="3";  class="end-td" style="border:none;">OTHERS</td>
    <td style="background-color: silver;border:none; border-left:2px;border-left:red"><div>
        <span >
         $</span>
         <span>
</span>

         <span>
          --
</span>
</div></td>
    
  </tr>
  <tr class="end-tr">
    
    <td  colspan="3";  class="end-td" style="border:none;"><b>TOTAL</b></td>
    <td style="background-color: silver;border:none; border-left:2px;border-left:red"><div>
        <span >
         $</span>
         <span>
</span>

         <span>
          {{   @$vehicle[0]['towing_charges']   +   @$vehicle[0]['additional_fee'] +   @$vehicle[0]['port_detention_fee']  +  @$vehicle[0]['late_fee']  }}
</span>
</div></td>
    
  </tr>
</table>
</div>
<div>
    <p> Make all checks payable to GLOBAL OCEAN SHIPPING LLC.</p>
    <p style="text-align:center"><b> THANK YOU FOR YOUR BUSINESS!</b>
</div>
</div>
</div>
</body>

</html>