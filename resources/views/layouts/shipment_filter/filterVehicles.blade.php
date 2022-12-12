 @if(@count($vehicles) > 0)
 {{-- @if (@count($records) == 0) --}}
 @foreach ($vehicles as $vehicle)
                                <tr>
                                        <td>{{ @$vehicle['year'] }}</td>
                                        <td>{{ @$vehicle['make'] }}</td>
                                        <td>{{ @$vehicle['model'] }}</td>
                                        <td>{{ @$vehicle['vin'] }}</td>
                                        <td>{{ @$vehicle['title'] }}</td>
                                        <td>{{ @$vehicle['title_state'] }}</td>
                                        <td>{{ @$vehicle['title_number'] }}</td>
                                        <td>{{ @$vehicle['customer_name'] }}</td>
                                        <td class="text-center"><input type="checkbox" value="{{ @$vehicle['id'] }}"
                                                id="vehicle" name="vehicle[]" onclick="add_vehicle(this.value)"></td>
                                        
                                </tr>
                                @endforeach
@else
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>Not Found Any Vehicle</td>
    <td></td>
    <td></td>
    <td></td>
</tr>
@endif