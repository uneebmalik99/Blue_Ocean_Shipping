{{-- {{ dd($importVehicles) }} --}}
@extends('layouts.partials.mainlayout')
@section('body')
<style>
    .modal-content {
        width: 50%!important;
    }
</style>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
  style="z-index:999999" style="width:50%!important;">
  <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
      <div class="modal-content">
          <div class="modal-header d-flex justify-content-between title_style">
              <div>
                  <h5 class="modal-title text-white" id="exampleModalLabel">ASSING TO CUSTOMER</h5>
              </div>
              <div>
                  <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close"
                      style="margin-top: -11px;
                  font-size: 26px;">
                      <span aria-hidden="true">x</span>
                  </button>
              </div>
          </div>
          <div class="modal-body">
              <form method="post" action="{{ route('vehicle.assignToCustomer') }}">
                @csrf
                <input type="hidden" name="vehicle_id" id="vehicle_id" value="">
                <div class="form-group">
                    {{-- <label for="assignTo_customer">Example select</label> --}}
                    <select class="form-control"name="assignTo_customer" id="assignTo_customer" onchange="getbuyerid()">
                        <option selected disabled>Select Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{@$customer['id']}}">{{@$customer['username']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {{-- <label for="assignTo_customer">Example select</label> --}}
                    <select class="form-control"name="buyer_id" id="buyer_id">
                        <option selected disabled>Select BuyerId</option>
                    </select>
                </div>

                <div class="form-group">
                    {{-- <label for="assignTo_customer">Example select</label> --}}
                    <select class="form-control"name="key" id="key">
                        <option selected disabled>Select Key</option>
                        @foreach($keys as $key)
                        <option value="{{@$key['name']}}" >{{@$key['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {{-- <label for="assignTo_customer">Example select</label> --}}
                    <select class="form-control"name="shipper" id="shipper">
                        <option selected disabled>Select Shipper</option>
                        @foreach($shipper as $shipper)
                        <option value="{{@$shipper['name']}}" >{{@$shipper['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {{-- <label for="assignTo_customer">Example select</label> --}}
                    <select class="form-control"name="warehouse" id="warehouse">
                        <option selected disabled>Select Location</option>
                        @foreach($location as $location)
                        <option value="{{@$location['name']}}" >{{@$location['name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 d-flex justify-content-end">
                    <button type="submit" class="btn" style="background: #1f689e!important;color:white;">ASSIGN</button>
                </div>
    
              </form>
          </div>
      </div>
  </div>
</div>
{{-- Modal End --}}



<div class="container-fluid p-0">
    <table id="colortable" class="display" style="width:100%">
        <thead style="background: #3e5871 ;color:#fff">
            <tr>
                <th class="font-bold-tr">Sr</th>
                <th class="font-bold-tr">SALE DATE</th>
                <th class="font-bold-tr">BUYER ID</th>
                <th class="font-bold-tr">LOT #</th>
                <th class="font-bold-tr">PICKUP LOCATION</th>
                <th class="font-bold-tr">YEAR</th>
                <th class="font-bold-tr">MAKE</th>
                <th class="font-bold-tr">MODEL</th>
                <th class="font-bold-tr">VIN</th>
                <th class="font-bold-tr">VALUE</th>
                <th class="font-bold-tr">AUCTION</th>
                <th class="font-bold-tr">SITE</th>
                <th class="font-bold-tr">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($importVehicles as $vehicles)
                <tr>
                    <td>{{@$vehicles['id']}}</td>
                    <td>{{@$vehicles['sale_date']}}</td>
                    <td>{{@$vehicles['buyer_id']}}</td>
                    <td>{{@$vehicles['lot']}}</td>
                    <td>{{@$vehicles['pickup_location']}}</td>
                    <td>{{@$vehicles['year']}}</td>
                    <td>{{@$vehicles['make']}}</td>
                    <td>{{@$vehicles['model']}}</td>
                    <td>{{@$vehicles['vin']}}</td>
                    <td>{{@$vehicles['value']}}</td>
                    <td>{{@$vehicles['auction']}}</td>
                    <td>{{@$vehicles['site']}}</td>
                    <td>
                        <button id="{{ @$vehicles['id'] }}" onclick="assigntocutomer(this.id)">Assign to Customer</button>
                    </td>
                </tr>
                {{-- @break --}}
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


    function assigntocutomer(vehicle_id){
        $('#exampleModal').modal('show');
        $('#vehicle_id').val(vehicle_id);


    }

    function getbuyerid(){
        $customer_id = $('#assignTo_customer').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('importVehicle.get_buyerids') }}',
            data: {
                'customer_id': $customer_id,
            },
            success: function(data) {
                // alert(data);
                $('#buyer_id').html(data);
                // $('#customer_email').val(data[0]['email']);
                // $('#customer_phone').val(data[0]['phone']);
            }
        });
    }


    // function assignToCustomer(vehicle_id) {
    //     customer_id = $('#' + vehicle_id).val();
    //     $.ajax({
    //         type: 'post',
    //         url: '{{ route('vehicle.assignToCustomer') }}',
    //         data: {
    //             vehicle_id: vehicle_id,
    //             customer_id: customer_id
    //         },
    //         success: function(data) {
    //             // alert(data);
    //             iziToast.success({
    //                 zindex: '9999999999999',
    //                 position: 'topCenter',
    //                 title: 'Success',
    //                 message: data,
    //             });
    //             setTimeout(function() {
    //                 location.reload();
    //             }, 1000);


    //             // $('#towingrate_body').html(data);
    //         }
    //     });

    // }
</script>

@if (Session::has('success'))
<script>
    iziToast.success({
        position: 'topRight',
        message: '{{ Session::get('success') }}',
    });
</script>
@endif
    @endsection