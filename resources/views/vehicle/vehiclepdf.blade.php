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
  font-family: arial, sans-serif;
}
tr{
    border-color:white;
  font-family: arial, sans-serif;
}
.end-tr{
    background-color:white;
    border-color:white;
    text-align:right;
   font-family: arial, sans-serif;
}
span{
  font-family: arial, sans-serif;
}

</style>
<body>
    <div style="border:3px; border:solid;border-color:black ;width:100%">
    <span style="margin-top:-12px;margin-left:55%;color: silver">INVOICE </SPAN>
    <div style="width:95%;margin-left:20px;">
    <div>
        <table style="float:left;width:50% !important;font-size:12px; ">
        <tr>
              <span style="font-family: arial, sans-serif;margin-top:-3px;font-size:18px"><b> GLOBAL OCEAN SHIPPING  LLC</b></span>
            </tr>
            
               <span style="font-size:10px" >ADDRESS OF GLOBAL OCEAN SHIPPING: {{ @$vehicle[0]['user']['shippers'][0]['address']}}</span>
            </tr>
            <tr>
                <span style="font-size:10px">STATE,CITY,ZIPCODE:{{ @$vehicle[0]['user']['shippers'][0]['country']}} , {{ @$vehicle[0]['user']['shippers'][0]['city']}} , {{ @$vehicle[0]['user']['shippers'][0]['zip_code']}}</span>
            </tr>
            <tr>
                <span style="font-size:10px">PHONE NO: {{ @$vehicle[0]['user']['shippers'][0]['phone']}}</span>
            </tr> 
            <tr>
</tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr></tr> <tr>
<tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr>
      
            <tr>
            
               <span style="margin-top:16px;"><b>BILL TO:</b></span>
            </tr>
            <tr>
                <span>CUSTOMER NAME: {{ @$vehicle[0]['user']['billings'][0]['first_name']}} {{ @$vehicle[0]['user']['billings'][0]['last_name']}}</span>
            </tr>
            <tr>
                <span>COMPANY NAME: {{ @$vehicle[0]['user']['billings'][0]['company_name']}}</span>
            </tr>
            <tr>
                <span>COMPANY ADDRESS: {{ @$vehicle[0]['user']['billings'][0]['address']}}</span>
            </tr>
            <tr>
                <span >STATE,CITY,ZIPCODE:{{ @$vehicle[0]['user']['billings'][0]['country']}},  {{ @$vehicle[0]['user']['billings'][0]['city']}}, {{ @$vehicle[0]['user']['billings'][0]['zip_code']}}</span>
            </tr>
            <tr>
              <span>PHONE: {{ @$vehicle[0]['user']['billings'][0]['phone']}}</span>
          </tr>
        </table>
        <div style="left:50%;">
        <table style="margin-top:25px;float:right;width:50% !important;border-collapse: collapse; font-size:12px; left:20%;">
        <tr> <span><b>DATE:</b></span>       <span style="margin-left:22%;">  {{ \Carbon\Carbon::now()->format('Y-m-d') }}</span> </tr>
        <tr>  <span ><b>INVOICE #</b></span>      <span style="margin-left:16%;" >{{ random_int(1000, 9999) }}</span></tr>
        <tr>  <span><b>FOR:</b></span>        <span style="margin-left:25%;" >{{ @$vehicle[0]['towing_charges'] }}</span> </tr>
       <tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr>
       <tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr>
       <tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr>
       <tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr>
       <tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr><tr style="border:none"><td style="border:none; background-color:white"></td></tr>
      
        <td style="border:none ;font-family: arial, sans-serif";><b> PICKUP DETAILS</b></td>
            <tr>  <span style="font-size:10px"><b>LOCATION:</b></span> <span style="margin-left:16%;">{{ @$vehicle[0]['pickup_location'] }}</span>  </tr>
            <tr>  <span style="font-size:10px"><b>AUCTION:</b></span> <span style="margin-left:18%;">{{ @$vehicle[0]['auction'] }}</span>  </tr>
            <tr>  <span style="font-size:10px"><b>BYER ID:</b></span> <span style="margin-left:20%;">{{ @$vehicle[0]['buyer_id'] }}</span>  </tr>
            <tr>  <span style="font-size:10px"><b>LOT#:</b></span>LOT#</td> <span style="margin-left:24%;">{{ @$vehicle[0]['lot'] }}</span>  </tr>
            
        </table>
</div>
    </div>
    <div style="clear: both;width:100% !important; margin-bottom:40px">
    <div >
        <table style="float:left;width:60% !important;font-size:12px;">
            
        </table>
        <table style="margin-bottom:20px;float:right;width:40% !important;border-collapse: collapse;font-size:12px;">
           
            
        </table>
       
    </div>
    <div style="margin-top:20px";>
    <table border="2" class="table-main " >
  <tr style="border-color:black">
    <th>DESCRIPTION</th>
    <th>QTY</th>
    <th>RATE</th>
      <th>AMOUNT</th>
  </tr>
  <tr>
<td style="height: 40px!important;">{{ @$vehicle[0]['year'] }} {{ @$vehicle[0]['make'] }} {{ @$vehicle[0]['model'] }} {{ @$vehicle[0]['vin'] }}</td>
    <td>1.00</td>
    <td>{{ @$vehicle[0]['towing_charges'] }}</td>
    <td style="background-color: silver;border:none;" class="end-tr"> 
    <div>
        <span style="margin-left:-12px;">
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
    <td style="height: 40px!important;">LATE FEE</td>
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
    <td style="height: 40px!important;">STORAGE FEE:</td>
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
  <tr style="height: 40px!important;">
    <td style="height: 40px!important;">ADDITIONAL CHARGES</td>
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
    <p style="font-family: arial, sans-serif;"> Make all checks payable to GLOBAL OCEAN SHIPPING LLC.</p>
    <p style="text-align:center;font-family: arial, sans-serif"><b> THANK YOU FOR YOUR BUSINESS!</b>
</div>
</div>
</div>
</body>

</html>