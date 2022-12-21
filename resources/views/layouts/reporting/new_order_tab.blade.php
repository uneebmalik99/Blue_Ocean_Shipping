<div class="border-style card-rounded">

    <div class="row d-flex justify-content-between">
    </div>
   
    <div class="px-4 pt-2 mt-4">
        <div class="d-flex justify-content-between">
            <div class="col-6 p-0">
                <span class="h5 text-muted">
                    <b>Search Filter</b>
                </span>
            </div>
            
        </div>
        <div class="d-flex py-3 px-0">
            <div class="col-3 p-0">
                <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2">
                   <option >Select Location</option>
                </select>
            </div>
            <div class="col-3 p-0">
                <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2">
                    <option value="" disabled selected>Select Shipper</option>
                </select>
            </div>
            <div class="col-3 p-0">
                <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2">
                    <option value="" disabled selected>Title Status</option>
                </select>
            </div>
            <div class="col-3 p-0">
                <select
                    class="form-control-sm border-style input-border-style rounded col-12 text-muted">
                    <option value="" disabled selected>Company Name</option>
                </select>
            </div>
        </div>
    </div>
    <div id="status_body" class="mt-2 bg-light">
     
        <table id="new_order_report" class="row-border"
            style="width:100%!important;">
            <thead class="bg-custom">
                <tr class="font-size">
                    <th class="font-bold-tr">CLIENT</th>
                    <th class="font-bold-tr">YEAR</th>
                    <th class="font-bold-tr">MAKE</th>
                    <th class="font-bold-tr">MODEL</th>
                    <th class="font-bold-tr">VIN</th>
                    <th class="font-bold-tr">LOT #</th>
                    <th class="font-bold-tr">VEHICLE TYPE</th>
                    <th class="font-bold-tr">VALUE</th>
                    <th class="font-bold-tr">AUCTION</th>
                    <th class="font-bold-tr">BUYER ID</th>
                    <th class="font-bold-tr">KEY</th>
                    <th class="font-bold-tr">TITLE STATUS</th>
                    <th class="font-bold-tr">SALE DATE</th>
                    <th class="font-bold-tr">AGE</th>
                    <th class="font-bold-tr">DELIVERY DATE</th>
                    <th class="font-bold-tr">AGE</th>
                    <th class="font-bold-tr">STATUS</th>
                    <th class="font-bold-tr">PICKUP LOCATION</th>
                    <th class="font-bold-tr">WAREHOUSE</th>
                    <th class="font-bold-tr">SHIPPER NAME</th>
                </tr>
            </thead>
            <tbody class="bg-white font-size">
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
                        <td>{{ @$vehicle['title_state'] }}</td>
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
               
            </tbody>
        </table>
    </div>
</div>