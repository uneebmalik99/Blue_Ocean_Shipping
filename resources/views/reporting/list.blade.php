@extends('layouts.partials.mainlayout')
@section('body')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="z-index:99999;">
        <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between title_style">
                    <div>
                        <h5 class="modal-title text-white" id="exampleModalLabel">New </h5>
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


    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="d-flex dashboard_heading" style="margin-top:-40px!important">
                    <div style="margin-top:1px!important;">
                        {{-- <i class="fas fa-car" style="color:#1F689E"></i> --}}
                    </div>
                    <div>
                        <h2 style="color:#1F689E;font-size:22px;margin-left: 6px;" class="px-1">Reporting</h2>
                    </div>
                </div>
            </div>
        </div>


        {{-- customer design implementation --}}
        <div class="bg-white rounded p-2"style="
        width: 100%;
        
    ">
            {{-- badges start --}}

            <div class="d-flex m-2 ml-3">
                <button class="text-center form-control border next-style reporting_cls " id="new_order_tab"
                    onclick="change_reporting_tab(this.id)" style="margin-left: 25px">
                    <div class="unskew">NEW ORDER REPORT</div>
                </button>
                <button class="text-center form-control border tab_style reporting_cls " id="dispatch_tab"
                    onclick="change_reporting_tab(this.id)">
                    <div class="unskew">DISPATCH REPORT</div>
                </button>
                <button class="text-center form-control border tab_style reporting_cls " id="on_hand_tab"
                    onclick="change_reporting_tab(this.id)">
                    <div class="unskew">ON HAND REPORT</div>
                </button>
                <button class="text-center form-control border tab_style reporting_cls " id="shipment_tab"
                    onclick="change_reporting_tab(this.id)">
                    <div class="unskew">SHIPMENT REPORT</div>
                </button>
                <button class="text-center form-control border tab_style reporting_cls " id="no_title_tab"
                    onclick="change_reporting_tab(this.id)" style="margin-right: 17px;">
                    <div class="unskew">NO TITLE REPORT</div>
                </button>

            </div>
            {{-- badges end --}}

            {{-- listing start --}}
            <div class="px-3 mt-3" id="reporting_tabs">
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
                        <div class="d-flex py-3 px-0"style="
                        width: 108%;
                    ">
                            <div class="col-2 p-0">
                                <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2" name="location" id="location">
                                    <option selected disabled>Select Location</option>
                                    @foreach ($location as $loc)
                                    <option value="{{ @$loc['state'] }}">{{ @$loc['state'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 p-0">
                                <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2" name="shipper" id="shipper">
                                    <option disabled selected>Select Shipper</option>
                                    @foreach ($shippers as $shipper)
                                    <option value="{{ @$shipper['name'] }}">{{ @$shipper['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 p-0">
                                <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2" name="status" id="status">
                                    <option disabled selected>Title Status</option>
                                    @foreach ($titletypes as $type)
                                    <option value="{{ @$type['name'] }}">{{ @$type['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2 p-0">
                                <select class="form-control-sm border-style input-border-style rounded col-12 text-muted" name="company_name" id="company_name">
                                    <option disabled selected>Company Name</option>
                                    @foreach ($companies as $company)
                                    <option value="{{ @$company['company_name'] }}">{{ @$company['company_name'] }}</option>
                                        
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-5" style="margin-left: 13px">
                               <button type="button" class="btn col-5" style="background:#2c3e50;color:white;font-size:11px!important;" id="1" onclick="filter_vehicle_reporting(this.id)">Filter Vehicle</button>
                               <button  type="button" class="btn ml-2 col-2"
                                style="background:#2c3e50;color:white;font-size:11px!important;"
                                onclick="clear_reporting_neworder()">Clear</button>
                            </div>

                            {{-- <div class="col-2 p-0">
                                <button  type="button" class="btn"
                                style="background:#2c3e50;color:white;font-size:11px!important;"
                                onclick="clear_reporting_neworder()">Clear</button>  
                            </div> --}}

                            
                        </div>
                    </form>
                    </div>
                    <div id="status_body" class="mt-2 bg-light">

                        <table id="on_hand_report" class="row-border" style="width:100%!important;">
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
                            <tbody class="bg-white font-size" id="filter_reporting_vehicles">
                                {{-- @foreach ($vehicles as $vehicle)
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
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(".vehicl_navbar_img").click(function() {
                $(".vehicl_navbar_img.active").removeClass('active')
                $(this).addClass('active')
            });

            $(".vehicles_3navbar").click(function() {
                $(".vehicles_3navbar.activee").removeClass('activee')
                $(this).addClass('activee')
            });
        </script>

        <script type="text/javascript">
            $(function() {


                $('#on_hand_report').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    columnDefs: [{
                            orderable: true,
                            targets: 8
                        },
                        {
                            orderable: true,
                            targets: 9
                        },
                        {
                            orderable: true,
                            targets: 10
                        },
                        {
                            orderable: true,
                            targets: 11
                        },
                        {
                            orderable: false,
                            targets: '_all'
                        }
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });





            });
        </script>

        @if (Session::has('success'))
            <script>
                iziToast.success({
                    position: 'topRight',
                    message: '{{ Session::get('success') }}',
                });
            </script>
        @endif


        @if (Session::has('fail'))
            <script>
                iziToast.warning({
                    position: 'topRight',
                    message: '{{ Session::get('fail') }}',
                });
            </script>
        @endif


        <script>
            $('#dispatched_table').DataTable({
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


            $('#dispatch_report').DataTable({
                scrollX: true,
                "lengthMenu": [
                    [50, 100, 500],
                    [50, 100, 500]
                ],
                columnDefs: [{
                        orderable: true,
                        targets: 8
                    },
                    {
                        orderable: true,
                        targets: 9
                    },
                    {
                        orderable: true,
                        targets: 10
                    },
                    {
                        orderable: true,
                        targets: 11
                    },
                    {
                        orderable: false,
                        targets: '_all'
                    }
                ],
                language: {
                    search: "",
                    sLengthMenu: "_MENU_",
                    searchPlaceholder: "Search"
                },
            });
        </script>
        <script>
            function dismissmodal() {
                $('#exampleModal2').modal('hide');
            }
        </script>
        <script>
            function change_reporting_tab(tab) {
                $('.reporting_cls').removeClass('next-style');
                $('.reporting_cls').addClass('tab_style');
                $('#'+tab).addClass('next-style');
                $.ajax({
                    type: 'post',
                    url: '{{ route('reporting.changetab') }}',
                    data: {
                        'id': tab
                    },
                    success: function(data) {
                        $('#reporting_tabs').html(data);
                        $('#dispatch_report').DataTable({
                            scrollX: true,
                            "lengthMenu": [
                                [50, 100, 500],
                                [50, 100, 500]
                            ],
                            columnDefs: [{
                                    orderable: true,
                                    targets: 8
                                },
                                {
                                    orderable: true,
                                    targets: 9
                                },
                                {
                                    orderable: true,
                                    targets: 10
                                },
                                {
                                    orderable: true,
                                    targets: 11
                                },
                                {
                                    orderable: false,
                                    targets: '_all'
                                }
                            ],
                            language: {
                                search: "",
                                sLengthMenu: "_MENU_",
                                searchPlaceholder: "Search"
                            },
                        });

                        $('#new_order_report').DataTable({
                            scrollX: true,
                            "lengthMenu": [
                                [50, 100, 500],
                                [50, 100, 500]
                            ],
                            columnDefs: [{
                                    orderable: true,
                                    targets: 8
                                },
                                {
                                    orderable: true,
                                    targets: 9
                                },
                                {
                                    orderable: true,
                                    targets: 10
                                },
                                {
                                    orderable: true,
                                    targets: 11
                                },
                                {
                                    orderable: false,
                                    targets: '_all'
                                }
                            ],
                            language: {
                                search: "",
                                sLengthMenu: "_MENU_",
                                searchPlaceholder: "Search"
                            },
                        });



                        $('#onhand_report').DataTable({
                            scrollX: true,
                            "lengthMenu": [
                                [50, 100, 500],
                                [50, 100, 500]
                            ],
                            columnDefs: [{
                                    orderable: true,
                                    targets: 8
                                },
                                {
                                    orderable: true,
                                    targets: 9
                                },
                                {
                                    orderable: true,
                                    targets: 10
                                },
                                {
                                    orderable: true,
                                    targets: 11
                                },
                                {
                                    orderable: false,
                                    targets: '_all'
                                }
                            ],
                            language: {
                                search: "",
                                sLengthMenu: "_MENU_",
                                searchPlaceholder: "Search"
                            },
                        });




                        $('#shipment_report').DataTable({
                            scrollX: true,
                            "lengthMenu": [
                                [50, 100, 500],
                                [50, 100, 500]
                            ],
                            columnDefs: [{
                                    orderable: true,
                                    targets: 8
                                },
                                {
                                    orderable: true,
                                    targets: 9
                                },
                                {
                                    orderable: true,
                                    targets: 10
                                },
                                {
                                    orderable: true,
                                    targets: 11
                                },
                                {
                                    orderable: false,
                                    targets: '_all'
                                }
                            ],
                            language: {
                                search: "",
                                sLengthMenu: "_MENU_",
                                searchPlaceholder: "Search"
                            },
                        });

                        $('#notitle_report').DataTable({
                            scrollX: true,
                            "lengthMenu": [
                                [50, 100, 500],
                                [50, 100, 500]
                            ],
                            columnDefs: [{
                                    orderable: true,
                                    targets: 8
                                },
                                {
                                    orderable: true,
                                    targets: 9
                                },
                                {
                                    orderable: true,
                                    targets: 10
                                },
                                {
                                    orderable: true,
                                    targets: 11
                                },
                                {
                                    orderable: false,
                                    targets: '_all'
                                }
                            ],
                            language: {
                                search: "",
                                sLengthMenu: "_MENU_",
                                searchPlaceholder: "Search"
                            },
                        });


                        // $('#shipment_reporting').DataTable({
                        //     scrollX: true,
                        //     "lengthMenu": [
                        //         [50, 100, 500],
                        //         [50, 100, 500]
                        //     ],
                        //     columnDefs: [{
                        //             orderable: true,
                        //             targets: 8
                        //         },
                        //         {
                        //             orderable: true,
                        //             targets: 9
                        //         },
                        //         {
                        //             orderable: true,
                        //             targets: 10
                        //         },
                        //         {
                        //             orderable: true,
                        //             targets: 11
                        //         },
                        //         {
                        //             orderable: false,
                        //             targets: '_all'
                        //         }
                        //     ],
                        //     language: {
                        //         search: "",
                        //         sLengthMenu: "_MENU_",
                        //         searchPlaceholder: "Search"
                        //     },
                        // });



                    }
                });
            }




            function filter_vehicle_reporting(status){
        var formData = new FormData(jQuery('#filter_vehicle_reporting')[0]);
        formData.append('status', status);
        console.log(...formData);
        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/reporting/filter_vehicle') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#filter_reporting_vehicles').html(data);
            }
        });


            }




            function clear_reporting_neworder(){
        $('#filter_vehicle_reporting')[0].reset();
        $('#filter_reporting_vehicles').html('');

    }
        </script>
    @endsection
