@extends('layouts.partials.mainlayout')
@section('body')


    <div class="p-2">
      
        <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index:99999;">
    <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between title_style">
                <div>
                    <h5 class="modal-title text-white" id="exampleModalLabel">New {{ $module['singular'] }}</h5>
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
                ...
            </div>
        </div>
    </div>
</div>
{{-- Modal End --}}
        <div class="d-flex justify-content-end">
            <div>
                
                <button type="button"
                                        class="text-white form-control-sm border py-1 btn-info rounded modal_button px-2 col-12"
                                        style="background: rgb(62 88 113) !important;" data-target="#exampleModal"
                                        onclick="createInvoice()">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a class="text-white d-flex align-items-center">
                                                <span class="pl-2 font-size">Add New Invoice</span></a>
                                        </div>
                                    </button>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body overflow-auto">
                <table class="table" id="inovice_table">
                    <thead>
                        <tr class="font-size">
                            <th class="font-bold-tr">VIEW VEHICLES</th>
                            <th class="font-bold-tr">CONTAINER NUMBER</th>
                            <th class="font-bold-tr">COMPANY NAME</th>
                            <th class="font-bold-tr">LOADING PORT</th>
                            <th class="font-bold-tr">DESTINATION PORT</th>
                            <th class="font-bold-tr">CONTAINER SIZE</th>
                            <th class="font-bold-tr">INVOICE NO:</th>
                            <th class="font-bold-tr">INVOICE AMOUNT</th>
                            <th class="font-bold-tr">INVOICE DATE</th>
                            <th class="font-bold-tr">DUE DATE</th>
                            <th class="font-bold-tr">PAYMENT DATE</th>
                            <th class="font-bold-tr">RECIEVED AMOUNT</th>
                            <th class="font-bold-tr">BALANCE</th>
                            
                            <th class="font-bold-tr">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="inovice_body">
                      

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    {{-- -Invoice Scripts --}}

<script>
    function createInvoice(){
        $.ajax({
            type: 'GET',
            url: '{{ route('invoice.create') }}',
            success: function(data) {
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        function format(d) {
            console.log(d);
            html =
                '<table class="vehicle_shipment_table my-3" style="width:90%!important;"><thead style="background:#dbdbdb;color:#2c3e50;font-size:12px!important;"><th>ID</th><th>Customer Name</th><th>VIN</th><th>YEAR</th><th>MAKE</th><th>MODEL</th><th>VEHICLE TYPE</th><th>VALUE</th><th>Action</th></thead><tbody id="shipemt_vehicle">';
            d.forEach(element => {
            $url_view = 'vehicle/profile/' + element.id;
                html += '<tr><td>' + element.id + '</td><td>' + element.customer_name + '</td><td>' +
                    element.vin + '</td><td>' + element.year + '</td><td>' + element.make +
                    '</td><td>' + element.model + '</td><td>' + element.vehicle_type + '</td><td>' +
                    element.value + '</td><td> <button class="profile-button"><a href='+$url_view+'><svg width="14" height="13" viewBox="0 0 16 14" fill="none"  xmlns="http://www.w3.org/2000/svg"> <path d="M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z" fill="#048B52" /><path d="M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z" fill="#048B52" /></svg></a></button></td></tr>';
            });
            html += '</tbody></table>';
            return html;
        }
        var table = $('#inovice_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: {
                details: {
                    type: 'column',
                    target: -1
                }
            },
            columnDefs: [{
               
                orderable: false, targets: '_all'
            }],
            'scrollX': true,
            "lengthMenu": [
                [50, 100, 500],
                [50, 100, 500]
            ],
            language: {
                search: "",
                sLengthMenu: "_MENU_",
                searchPlaceholder: "Search",
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
            },
            ajax: "{{ route('invoice.records') }}",
            columns: [{
                    // class: 'details-control',
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',

                },
                
                {
                    data: 'ar_number'
                },
                {
                    data: 'company_name'
                },
                {
                    data: 'port_of_loading'
                },
                {
                    data: 'destination_port'
                },
                {
                    data: 'container_size'
                },
                {
                    data: 'invoice_no'
                },
                {
                    data: 'invoice_amount'
                },
                {
                    data: 'invoice_date'
                },
                {
                    data: 'due_date'
                },
                {
                    data: 'payment_date'
                },
                {
                    data: 'received_amount'
                },
                {
                    data: 'balance'
                },
                
                {
                    data: 'action'
                },
            ],
            order: [
                [1, 'asc']
            ],
        });
        $('#inovice_table tbody').on('click', 'td.dt-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            console.log(row.data()['vehicle']);
            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('dt-hasChild shown');
            } else {
                row.child(format(row.data()['vehicle'])).show();
                tr.addClass('dt-hasChild shown');
            }
            $('.vehicle_shipment_table').DataTable({
                "lengthChange": false,
                "info": false,
                "bPaginate": false,
                searching: false,
                "ordering": false,
                language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search",
                        "emptyTable": "No Vehicle Available",
                    },
            });
        });
    });
    
</script>
@endsection
