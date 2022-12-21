 @foreach ($vehicles as $vehicle)
     <tr>
         <td>{{ @$vehicle['customer_name'] }}</td>
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
         <td>{{ @$vehicle['sale_date'] }}</td>
         <td>{{ @$vehicle['delivered'] }}</td>
         <td>{{ @$vehicle['posted_date'] }}</td>
         <td>{{ @$vehicle['status'] }}</td>
         <td>{{ @$vehicle['pickup_location'] }}</td>
         <td>{{ @$vehicle['port'] }}</td>
         <td>{{ @$vehicle['shipper_name'] }}</td>
     </tr>
 @endforeach
