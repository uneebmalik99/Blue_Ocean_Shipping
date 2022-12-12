@extends('layouts.partials.mainlayout')
@section('body')
<div class="container-fluid p-0">
    <table id="colortable" class="display" style="width:100%">
        <thead style="background: #3e5871 ;color:#fff">
            <tr>
                <th class="font-bold-tr">Sr</th>
                <th class="font-bold-tr">Customer Name</th>
                <th class="font-bold-tr">VIN</th>
                <th class="font-bold-tr">YEAR</th>
                <th class="font-bold-tr">MAKE</th>
                <th class="font-bold-tr">MODEL</th>
                <th class="font-bold-tr">VEHICLE TYPE</th>
                <th class="font-bold-tr">VALUE</th>
                <th class="font-bold-tr">STATUS</th>
                <th class="font-bold-tr">BUYER</th>
                <th class="font-bold-tr">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($importVehicles as $vehicles)
                <tr>
                    <td>{{@$vehicles['id']}}</td>
                    <td>{{@$vehicles['customer_name']}}</td>
                    <td>{{@$vehicles['vin']}}</td>
                    <td>{{@$vehicles['year']}}</td>
                    <td>{{@$vehicles['make']}}</td>
                    <td>{{@$vehicles['model']}}</td>
                    <td>{{@$vehicles['vehicle_type']}}</td>
                    <td>{{@$vehicles['value']}}</td>
                    <td>{{@$vehicles['status']}}</td>
                    <td>{{@$vehicles['buery_id']}}</td>
                    <td>
                        <select name="assignTo_customer" id="{{@$vehicles['id']}}" onchange="assignToCustomer(this.id)">
                            <option selected disabled>Select Customer</option>
                            @foreach($customers as $customer)
                            <option value="{{@$customer['id']}}" >{{@$customer['username']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- compnay modal -->
<div class="modal fade" id="commonmodal" tabindex="-1" role="dialog" aria-labelledby="commonmodalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content" id="common_body">

    </div>
</div>
</div>
<script>
    $('#colortable').DataTable({
        scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
       
    });
</script>
    @endsection