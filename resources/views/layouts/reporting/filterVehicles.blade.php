@if(count(@$vehicles) > 0)
@foreach ($vehicles as $vehicle)
     <tr>
         <td>{{ @$vehicle['user']['company_name'] }}</td>
         <td>{{ @$vehicle['year'] }}</td>
         <td>{{ @$vehicle['make'] }}</td>
         <td>{{ @$vehicle['model'] }}</td>
         <td>{{ @$vehicle['vin'] }}</td>
         <td>{{ @$vehicle['lot'] }}</td>
         <td>{{ @$vehicle['@$vehicle_type'] }}</td>
         <td>{{ @$vehicle['value'] }}</td>
         <td>{{ @$vehicle['auction'] }}</td>
         <td>{{ @$vehicle['buyer_id'] }}</td>
         <td>{{ @$vehicle['key'] }}</td>
         <td>{{ @$vehicle['title_type'] }}</td>
         <td>{{ @$vehicle['sale_date'] }}</td>
         <td>{{ (@$val['sale_date']) ? date_diff( new \DateTime(@$val['sale_date']), new \DateTime())->format("%d") + 1 : 0 }}</td>
         <td>{{ @$vehicle['delivered'] }}</td>
         <td>{{ (@$val['posted_date']) ? date_diff( new \DateTime(@$val['posted_date']), new \DateTime())->format("%d") + 1 : 0 }}</td>
         <td>{{ @$vehicle['status'] }}</td>
         <td>{{ @$vehicle['pickup_location'] }}</td>
         <td>{{ @$vehicle['port'] }}</td>
         <td>{{ @$vehicle['shipper_name'] }}</td>
     </tr>
 @endforeach
 @else
 <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td style="text-align: center;">Not Found Any Vehicle</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>

 </tr>
 @endif
