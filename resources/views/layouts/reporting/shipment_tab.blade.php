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
        <form id="filter_vehicle_reporting">
            <div class="d-flex py-3 px-0">
                <div class="col-2 p-0">
                    <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                        name="location"  id="location">
                        <option selected disabled>Select Location</option>
                        @foreach ($location as $loc)
                            <option value="{{ @$loc['state'] }}">{{ @$loc['state'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2 p-0">
                    <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                        name="shipper" id="shipper" >
                        <option disabled selected>Select Shipper</option>
                        @foreach ($shippers as $shipper)
                            <option value="{{ @$shipper['name'] }}">{{ @$shipper['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2 p-0">
                    <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                        name="status"  id="status">
                        <option disabled selected>Select Status</option>
                        <option value="1">Booked</option>
                        <option value="2">Shipped</option>
                        <option value="3">Arrived</option>
                        <option value="4">Completed</option>
                    </select>
                </div>
                <div class="col-2 p-0">
                    <select class="form-control-sm border-style input-border-style rounded col-12 text-muted"
                        name="company_name" id="company_name">
                        <option disabled selected>Company Name</option>
                        @foreach ($companies as $company)
                            <option value="{{ @$company['company_name'] }}">{{ @$company['company_name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-4 p-0 ml-2 d-flex">
                    <button type="button" class="btn"
                        style="background:#2c3e50;color:white;font-size:11px!important;"
                        onclick="filter_shipment_reporting()">Search</button>
                        <button  type="button" class="btn ml-2"
                        style="background:#2c3e50;color:white;font-size:11px!important;"
                        onclick="clear_reporting()">Clear</button>  
                         
                </div>
                {{-- <div class="col-2 p-0">
                    <button  type="button" class="btn"
                    style="background:#2c3e50;color:white;font-size:11px!important;"
                    onclick="clear_reporting()">Clear</button>  
                </div> --}}

            </div>
        </form>
    </div>
    <div class="shipment_table_body" style="overflow: scroll">
        <table id="shipment_reporting" class="table row-border" style="width:100%!important;">
            <thead class="bg-custom">
                <tr class="font-size">
                    <th class="font-bold-tr">VIEW</th>
                    <th class="font-bold-tr">IMG</th>
                    <th class="font-bold-tr">CONSIGNEES</th>
                    <th class="font-bold-tr">CONTAINER NO:</th>
                    <th class="font-bold-tr">BOOKING NO:</th>
                    <th class="font-bold-tr">LINES</th>
                    <th class="font-bold-tr">VEHICLES</th>
                    <th class="font-bold-tr">SIZE</th>
                    <th class="font-bold-tr">LOAD DATE</th>
                    <th class="font-bold-tr">CUT OFF DATE</th>
                    <th class="font-bold-tr">EXPORT DATE</th>
                    <th class="font-bold-tr">ARR Date</th>
                    <th class="font-bold-tr">Shipper</th>
                    <th class="font-bold-tr">P.O.L</th>
                    <th class="font-bold-tr">P.O.D</th>
                    <th class="font-bold-tr">BAL</th>
                    <th class="font-bold-tr">ACTIONS</th>
                </tr>
            </thead>
            <tbody class="bg-white font-size" id="shipment_tbody">
                
            </tbody>
        </table>
    </div>
</div>



<script type="text/javascript">
    function filter_shipment_reporting() {
        // state = "{{ @$state }}";
        var formData = new FormData(jQuery('#filter_vehicle_reporting')[0]);
        console.log(...formData);

        function format(d) {
            console.log(d);
            html =
                '<table class="vehicle_shipment_table my-3" style="width:90%!important;"><thead style="background:#dbdbdb;color:#2c3e50;font-size:12px!important;"><th>ID</th><th>Customer Name</th><th>VIN</th><th>YEAR</th><th>MAKE</th><th>MODEL</th><th>VEHICLE TYPE</th><th>VALUE</th><th>Action</th></thead><tbody id="shipemt_vehicle">';
            d.forEach(element => {
                $url_view = 'vehicle/profile/' + element.id;
                html += '<tr><td>' + element.id + '</td><td>' + element.customer_name + '</td><td>' +
                    element.vin + '</td><td>' + element.year + '</td><td>' + element.make +
                    '</td><td>' + element.model + '</td><td>' + element.vehicle_type + '</td><td>' +
                    element.value + '</td><td> <button class="profile-button"><a href=' + $url_view +
                    '><svg width="14" height="13" viewBox="0 0 16 14" fill="none"  xmlns="http://www.w3.org/2000/svg"> <path d="M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z" fill="#048B52" /><path d="M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z" fill="#048B52" /></svg></a></button></td></tr>';
            });
            html += '</tbody></table>';
            return html;
        }
        var table = $('#shipment_reporting').DataTable({
            // retrieve: true,
            // paging: false,
            // searching: false,
            // processing: true,
            // serverSide: true,
            
            responsive: {
                details: {
                    type: 'column',
                    target: -1
                }
            },
            columnDefs: [{
                orderable: false,
                targets: '_all',
                
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
            // ajax: "{{ route('reporting.shipments') }}" +"/"+formData,
            // data: formData,
            
            
            ajax: {
                data: {
                    'status' : $('#status').val(),
                    'location' : $('#location').val(),
                    'shipper' : $('#shipper').val(),
                    'company_name' : $('#company_name').val(),
                },
                data : {
                    'status' : $('#status').val(),
                    'location' : $('#location').val(),
                    'shipper' : $('#shipper').val(),
                    'company_name': $('#company_name').val()
                },
                url: "{{ route('reporting.shipments') }}",
                type: 'POST',
            },
            columns: [{
                    className: 'dt-control',
                    orderable: false,
                    defaultContent: '',
                   
                    
                   
                },
                {
                    data: 'id'
                },
                {
                    data: 'select_consignee'
                },
                {
                    data: 'container_no'
                },
                {
                    data: 'booking_number'
                },
                {
                    data: 'shipping_line'
                },
                {
                    data: 'shipment_id'
                },
                {
                    data: 'container_size'
                },
                {
                    data: 'loading_date'
                },
                {
                    data: 'cut_off_date'
                },
                {
                    data: 'sale_date'
                },
                {
                    data: 'est_arrival_date'
                },
                {
                    data: 'shipper'
                },
                {
                    data: 'loading_port'
                },
                {
                    data: 'destination_port'
                },
                {
                    data: 'notes'
                },
                {
                    data: 'action'
                },
            ],
            order: [
                [1, 'asc']
            ],
        });
        $('#shipment_reporting tbody').on('click', 'td.dt-control', function() {
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

    }
    function clear_reporting(){
        $('#filter_vehicle_reporting')[0].reset();
        $('#shipment_reporting').DataTable().clear().destroy();
    }
    // $(document).ready(function() {
    //     state = "{{ @$state }}";
    //     function format(d) {
    //         console.log(d);
    //         html =
    //             '<table class="vehicle_shipment_table my-3" style="width:90%!important;"><thead style="background:#dbdbdb;color:#2c3e50;font-size:12px!important;"><th>ID</th><th>Customer Name</th><th>VIN</th><th>YEAR</th><th>MAKE</th><th>MODEL</th><th>VEHICLE TYPE</th><th>VALUE</th><th>Action</th></thead><tbody id="shipemt_vehicle">';
    //         d.forEach(element => {
    //         $url_view = 'vehicle/profile/' + element.id;
    //             html += '<tr><td>' + element.id + '</td><td>' + element.customer_name + '</td><td>' +
    //                 element.vin + '</td><td>' + element.year + '</td><td>' + element.make +
    //                 '</td><td>' + element.model + '</td><td>' + element.vehicle_type + '</td><td>' +
    //                 element.value + '</td><td> <button class="profile-button"><a href='+$url_view+'><svg width="14" height="13" viewBox="0 0 16 14" fill="none"  xmlns="http://www.w3.org/2000/svg"> <path d="M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z" fill="#048B52" /><path d="M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z" fill="#048B52" /></svg></a></button></td></tr>';
    //         });
    //         html += '</tbody></table>';
    //         return html;
    //     }
    //     var table = $('#shipment_reporting').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         responsive: {
    //             details: {
    //                 type: 'column',
    //                 target: -1
    //             }
    //         },
    //         columnDefs: [{

    //             orderable: false, targets: '_all'
    //         }],
    //         'scrollX': true,
    //         "lengthMenu": [
    //             [50, 100, 500],
    //             [50, 100, 500]
    //         ],
    //         language: {
    //             search: "",
    //             sLengthMenu: "_MENU_",
    //             searchPlaceholder: "Search",
    //             processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
    //         },
    //         ajax: "{{ route('reporting.shipments') }}"+"/"+state,
    //         columns: [{
    //                 className: 'dt-control',
    //                 orderable: false,
    //                 data: null,
    //                 defaultContent: '',

    //             },
    //             // {
    //             //     data: 'id'
    //             // },
    //             {
    //                 data: 'select_consignee'
    //             },
    //             {
    //                 data: 'container_no'
    //             },
    //             {
    //                 data: 'booking_number'
    //             },
    //             {
    //                 data: 'shipping_line'
    //             },
    //             {
    //                 data: 'shipment_id'
    //             },
    //             {
    //                 data: 'container_size'
    //             },
    //             {
    //                 data: 'loading_date'
    //             },
    //             {
    //                 data: 'cut_off_date'
    //             },
    //             {
    //                 data: 'sale_date'
    //             },
    //             {
    //                 data: 'est_arrival_date'
    //             },
    //             {
    //                 data: 'shipper'
    //             },
    //             {
    //                 data: 'loading_port'
    //             },
    //             {
    //                 data: 'destination_port'
    //             },
    //             {
    //                 data: 'notes'
    //             },
    //             {
    //                 data: 'action'
    //             },
    //         ],
    //         order: [
    //             [1, 'asc']
    //         ],
    //     });
    //     $('#shipment_reporting tbody').on('click', 'td.dt-control', function() {
    //         var tr = $(this).closest('tr');
    //         var row = table.row(tr);
    //         console.log(row.data()['vehicle']);
    //         if (row.child.isShown()) {
    //             row.child.hide();
    //             tr.removeClass('dt-hasChild shown');
    //         } else {
    //             row.child(format(row.data()['vehicle'])).show();
    //             tr.addClass('dt-hasChild shown');
    //         }
    //         $('.vehicle_shipment_table').DataTable({
    //             "lengthChange": false,
    //             "info": false,
    //             "bPaginate": false,
    //             searching: false,
    //             "ordering": false,
    //             language: {
    //                     search: "",
    //                     sLengthMenu: "_MENU_",
    //                     searchPlaceholder: "Search",
    //                     "emptyTable": "No Vehicle Available",
    //                 },
    //         });
    //     });
    // });
</script>
