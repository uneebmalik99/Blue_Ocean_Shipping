@extends('layouts.partials.mainlayout')
@section('body')
    {{-- <style>
        .dataTables_scrollHead {
            width: 100% !important;
        }

        .dataTables_scrollHeadInner {
            width: 100% !important;
        }

        .modal-content {

            width: 80% !important;
            margin: 0 auto !important;
            z-index: 99999999;
        }
    </style> --}}
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

    {{-- Document Import Modal Start --}}
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                <div class="import-body p-3">
                    ...
                </div>
            </div>
        </div>
    </div>
    {{-- Document Import Modal End --}}
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="d-flex dashboard_heading" style="margin-top:-40px!important">
                    <div style="margin-top:1px!important;">
                        <i class="fas fa-car" style="color:#1F689E"></i>
                    </div>
                    <div>
                        <h2 style="color:#1F689E;font-size:22px;margin-left: 6px;" class="px-1">Vehicles</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- @foreach ($status as $stat)
        @dd($stat['id'])
    @endforeach --}}
        {{-- @dd(count($records)) --}}
        {{-- customer design implementation --}}
        <div class="bg-white rounded p-2">
            {{-- badges start --}}
            <div class="d-flex m-2">
                <div class="col-4 p-1" value="{{@$state}}" id="1" tab="New Order" onclick="fetchVehicles(this.id)"
                    style="cursor: pointer">
                    <div class="col-12 py-0 px-1">
                        <div class="col-12 border-style card-rounded py-2 px-3">
                            <div class="d-flex">
                                <div class="col-10 text-muted p-0 d-flex align-items-center">
                                    <div class="font-size"><span>New Orders</span></div>
                                </div>
                                <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                    style="background: rgba(96, 43, 33, 0.2); !important">
                                    <img src="{{ asset('images/new_order.png') }}" alt="new order.png" height="22">

                                </div>
                            </div>
                            <div>
                                <div class="font-bold"><span>{{ @$new_orders->count() }}</span> </div>
                                <div class="py-1 col-12 text-muted p-0 font-size">
                                    {{-- <span>Total Vehicles
                                    <b>{{ count($records) }}</b>
                                </span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4 p-1" value="{{@$state}}" id="2" tab="Dispatched" onclick="fetchVehicles(this.id)"
                    style="cursor:pointer">
                    <div class="col-12 py-0 px-1">
                        <div class="col-12 border-style card-rounded py-2 px-3">
                            <div class="d-flex">
                                <div class="col-10 text-muted p-0 d-flex align-items-center">
                                    <div class="font-size"><span>Dispatched</span></div>
                                </div>
                                <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                    style="background: rgba(86, 138, 75, 0.2); !important">
                                    <img src="{{ asset('images/dispatched.png') }}" alt="dispatched.png" height="22">

                                </div>
                            </div>
                            <div>
                                <div class="font-bold"><span class="px-1">{{ @$dispatched->count() }}</span>
                                    {{-- <span class="percent_size">(-14%)</span> --}}
                                </div>
                                <div class="py-1 col-12 text-muted p-0 font-size">
                                    {{-- <span>Last week Analytics</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 p-1" value="{{@$state}}" id="3" tab="On Hand" onclick="fetchVehicles(this.id)"
                    style="cursor: pointer;">
                    <div class="col-12 py-0 px-1">
                        <div class="col-12 border-style card-rounded py-2 px-3">
                            <div class="d-flex">
                                <div class="col-10 text-muted p-0 d-flex align-items-center">
                                    <div class="font-size"><span>On Hand</span></div>
                                </div>
                                <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                    style="background: rgba(0, 150, 136, 0.2); !important">
                                    <img src="{{ asset('images/on_hand.png') }}" alt="on hand.png" height="22">


                                </div>
                            </div>
                            <div>
                                <div class="font-bold"><span>{{ @$on_hand->count() }}</span> </div>
                                <div class="py-1 col-12 text-muted p-0 font-size">
                                    {{-- <span>Total Vehicle</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex m-2">
                <div class="col-4 p-1" value="{{@$state}}" id="4" tab="No Title" onclick="fetchVehicles(this.id)"
                    style="cursor:pointer;">
                    <div class="col-12 py-0 px-1">
                        <div class="col-12 border-style card-rounded py-2 px-3">
                            <div class="d-flex">
                                <div class="col-10 text-muted p-0 d-flex align-items-center">
                                    <div class="font-size"><span>No Titles</span></div>
                                </div>
                                <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                    style="background: rgba(36, 40, 219, 0.2);!important">
                                    <img src="{{ asset('images/no_titles.png') }}" alt="no titles.png" height="18">

                                </div>
                            </div>
                            <div>
                                <div class="font-bold"><span>{{ @$no_titles->count() }}</span> </div>
                                <div class="py-1 col-12 text-muted p-0 font-size">
                                    {{-- <span>Last week Analytics</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 p-1" value="{{@$state}}" id="5" tab="Towing" onclick="fetchVehicles(this.id)"
                    style="cursor:pointer;">
                    <div class="col-12 py-0 px-1">
                        <div class="col-12 border-style card-rounded py-2 px-3">
                            <div class="d-flex">
                                <div class="col-10 text-muted p-0 d-flex align-items-center">
                                    <div class="font-size"><span>Towing</span></div>
                                </div>
                                <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                    style="background: rgba(236, 184, 0, 0.2); !important">
                                    <img src="{{ asset('images/towing.png') }}" alt="towing.png">

                                </div>
                            </div>
                            <div>
                                <div class="font-bold"><span class="px-1">{{ @$towing->count() }}</span>
                                    {{-- <span class="percent_size">(-14%)</span> --}}
                                </div>
                                <div class="py-1 col-12 text-muted p-0 font-size">
                                    {{-- <span>Last week Analytics</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 p-1" value="{{@$state}}" id="6" tab="Inventory Value" onclick="fetchVehicles(this.id)"
                    style="cursor:pointer;">
                    <div class="col-12 py-0 px-1">
                        <div class="col-12 border-style card-rounded py-2 px-3">
                            <div class="d-flex">
                                <div class="col-10 text-muted p-0 d-flex align-items-center">
                                    <div class="font-size"><span>Inventory Value</span></div>
                                </div>
                                <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                    style="background: rgba(236, 184, 0, 0.2); !important">
                                    <img src="{{ asset('images/towing.png') }}" alt="towing.png">

                                </div>
                            </div>
                            <div>
                                <div class="font-bold"><span class="px-1">$40,0000</span>
                                </div>
                                <div class="py-1 col-12 text-muted p-0 font-size">
                                    {{-- <span>Last week Analytics</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            {{-- badges end --}}

            {{-- listing start --}}
            <div class="px-3 mt-3">
                <div class="border-style card-rounded">

                    {{-- new customer alert start --}}
                    <div class="row d-flex justify-content-between">
                    </div>
                    {{-- alert end --}}
                    {{-- search filter start --}}
                    <div class="px-4 pt-2 mt-4">
                        <div class="d-flex justify-content-between">
                            <div class="col-6 p-0">
                                <span class="h5 text-muted">
                                    <b>Search Filter</b>
                                </span>
                            </div>
                            <div class="col-6 d-flex justify-content-end p-0">
                                <div class="col-4 d-flex justify-content-end px-2">
                                    <a onclick="import_docs()"
                                        class="px-1 text-muted font-size form-contorl-sm border p-1 rounded col-12"
                                        style="background: #DBDBDB; cursor: pointer;">
                                        <div class="d-flex justify-content-center align-items-center px-1">
                                            <svg width="18" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13 8H11L11 17H8L12 22L16 17H13L13 8Z" fill="#2c3e50" />
                                                <path
                                                    d="M19 2L5 2C3.897 2 3 2.897 3 4V13C3 14.103 3.897 15 5 15H9V13H5L5 4L19 4V13H15V15H19C20.103 15 21 14.103 21 13V4C21 2.897 20.103 2 19 2Z"
                                                    fill="#2c3e50" />
                                            </svg>

                                            <span class="pl-1 font-size" style="color:#2c3e50">Import</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-4 d-flex justify-content-end px-2">
                                    <a href="{{ route('vehicle.export') . '/'. 3 }}"
                                        class="px-1 text-muted font-size form-contorl-sm border p-1 rounded col-12"
                                        style="background: #DBDBDB; cursor: pointer;" id="exportVehicle">
                                        <div class="d-flex justify-content-center align-items-center px-1">
                                            <svg width="18" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 16H13V7H16L12 2L8 7H11V16Z" fill="#2c3e50" />
                                                <path
                                                    d="M5 22H19C20.103 22 21 21.103 21 20V11C21 9.897 20.103 9 19 9H15V11H19V20H5V11H9V9H5C3.897 9 3 9.897 3 11V20C3 21.103 3.897 22 5 22Z"
                                                    fill="#2c3e50" />
                                            </svg>
                                            <span class="pl-1 font-size" style="color:#2c3e50">Export</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-5 px-0 d-flex justify-content-center">
                                    <button type="button"
                                        class="text-white form-control-sm border py-1 btn-info rounded modal_button px-2 col-12"
                                        style="background: rgb(62 88 113) !important;" data-target="#exampleModal"
                                        id="vehicle">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a class="text-white d-flex align-items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24"
                                                    fill="white" viewBox="0 0 512 512">
                                                    <path
                                                        d="M135.2 117.4L109.1 192H402.9l-26.1-74.6C372.3 104.6 360.2 96 346.6 96H165.4c-13.6 0-25.7 8.6-30.2 21.4zM39.6 196.8L74.8 96.3C88.3 57.8 124.6 32 165.4 32H346.6c40.8 0 77.1 25.8 90.6 64.3l35.2 100.5c23.2 9.6 39.6 32.5 39.6 59.2V400v48c0 17.7-14.3 32-32 32H448c-17.7 0-32-14.3-32-32V400H96v48c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V400 256c0-26.7 16.4-49.6 39.6-59.2zM128 288c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm288 32c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z" />
                                                </svg>
                                                <span class="pl-2 font-size">Add New Vehicle</span></a>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- @dd($location) --}}
                        <div class="d-flex py-3 px-0">
                            {{-- <div class="col-3 p-0">
                            <select
                                class="form-control-sm border-style input-border-style rounded vehicle_filtering col-11 text-muted px-2"
                                name="warehouse" id="vehicle_warehouse">
                                <option value="all">All</option>
                                <option value="" disabled selected>WAREHOUSE</option>
                                @foreach ($location as $locations)
                                    <option value="{{ $locations['id'] }}">{{ $locations['name'] }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                            <div class="col-3 p-0">
                                <select
                                    class="form-control-sm border-style input-border-style rounded vehicle_filtering col-11 text-muted px-2"
                                    name="year" id="vehicle_year">
                                    <option value="" disabled selected>YEAR</option>
                                    <option value="all">All</option>

                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                </select>
                            </div>
                            <div class="col-3 p-0">
                                <select
                                    class="form-control-sm border-style input-border-style rounded vehicle_filtering col-11 text-muted px-2"
                                    name="make" id="vehicle_make">
                                    <option value="" disabled selected>MAKE</option>
                                    @foreach ($make as $makes)
                                        <option value="{{ @$makes['make'] }}">{{ @$makes['make'] }}</option>
                                    @endforeach
                                    {{-- <option value="toyota">Toyota</option> --}}
                                </select>
                            </div>
                            <div class="col-3 p-0">
                                <select
                                    class="form-control-sm border-style input-border-style rounded vehicle_filtering col-11 text-muted px-2"
                                    name="model" id="vehicle_model">
                                    <option value="" disabled selected>MODEL</option>
                                    @foreach ($model as $models)
                                        <option value="{{ @$models['model'] }}">{{ @$models['model'] }}</option>
                                    @endforeach
                                    {{-- <option value="civic">Civic</option> --}}
                                    {{-- <option value="corolla">Corolla</option> --}}
                                </select>
                            </div>
                            <div class="col-3 p-0">
                                <select
                                    class="form-control-sm border-style input-border-style rounded vehicle_filtering col-12 text-muted"
                                    name="status" id="vehicle_status">
                                    <option value="" disabled selected>STATUS</option>
                                    <option value="all">All</option>
                                    @foreach ($status as $stat)
                                        {{-- @dd($stat) --}}
                                        <option value="{{ $stat['id'] }}">
                                            {{ ucfirst($stat['status_name']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- search filter end --}}
                    <div id="status_body" class="mt-2 bg-light">
                        {{-- <table id="vehicle_table" class="table row-border vehicle_table" style="width:100%!important;">
                        <thead class="bg-custom" style="color:white!important;">
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
                        <tbody class="bg-white font-size" id="vehicle_tbody">

                        </tbody>
                    </table> --}}
                        <table id="on_hand_table_main" class="table vehicle_table row-border"
                            style="width:100%!important;">
                            <thead class="bg-custom">
                                <tr class="font-size">
                                    <th>
                                        {{-- <input type="checkbox" name="main_checkbox"><label></label>
                                        <button class="delete-button d-none" id="deleteAllbtn">
                                            <a href="#">
                                                <svg width="14" height="13" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                        fill="#EF5757" />
                                                </svg>

                                            </a>
                                        </button> --}}
                                        ADD
                                    </th>
                                    <th class="font-bold-tr">IMAGE</th>
                                    <th class="font-bold-tr">CLIENTS</th>
                                    <th class="font-bold-tr">YEAR</th>
                                    <th class="font-bold-tr">MAKE</th>
                                    <th class="font-bold-tr">MODEL</th>
                                    <th class="font-bold-tr">VIN</th>
                                    <th class="font-bold-tr">AUCTION</th>
                                    <th class="font-bold-tr">BUYER ID</th>
                                    <th class="font-bold-tr">LOT</th>
                                    <th class="font-bold-tr">TITLE</th>
                                    <th class="font-bold-tr">TITLE TYPE</th>
                                    <th class="font-bold-tr">KEY</th>
                                    <th class="font-bold-tr">DEL DATE</th>
                                    <th class="font-bold-tr">AGE</th>
                                    <th class="font-bold-tr">SHIPPER</th>
                                    <th class="font-bold-tr">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white font-size" id="vehicle_tbody">
                                {{-- @dd($records) --}}
                                {{-- @if (@count($records) == 0)
                                    <tr class="font-size">
                                        <td colspan="19" class="h5 text-muted text-center">NO VEHICLES TO DISPLAY</td>
                                    </tr>
                                @endif --}}
                                <?php $i = 1; ?>
                                @foreach ($records as $val)
                                    {{-- @dd($val['images'][0]['name']) --}}
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="checkboxes" id="{{ @$val['id'] }}" title="Add" onchange="addtoShipment(this.id)">
                                        </td>
                                        <td>

                                           
                                                <i class="fa fa-camera" aria-hidden="true"
                                                    style="color:#3e5871!important;"></i>
                                            

                                            {{-- <img src="{{asset($records[0]['pickupimages'][0]['name'])}}" alt="" style="width: 25px;height:25px;border-radius:50%;"> --}}
                                        </td>
                                        <td>

                                            {{ @$val['customer_name'] }}<br>

                                        </td>
                                        {{-- <td>{{ @$val['customer_name'] }}</td> --}}
                                        <td>{{ @$val['year'] }}</td>
                                        <td>{{ @$val['make'] }}</td>
                                        <td>{{ @$val['model'] }}</td>
                                        <td>{{ @$val['vin'] }}</td>
                                        <td>{{ @$val['auction'] }}</td>
                                        <td>{{ @$val['buyer_id'] }}</td>
                                        <td>{{ @$val['lot'] }}</td>
                                        <td>{{ @$val['title'] }}</td>
                                        <td>{{ @$val['title_type'] }}</td>
                                        <td>{{ @$val['keys'] }}</td>
                                        <td>{{ @$val['delivered_date'] }}</td>
                                        <td>{{ @$val['age'] }}</td>
                                        <td>{{ @$val['shipper'] }}</td>
                                        <td>
                                            <button class='profile-button'><a
                                                    href={{ route('vehicle.profile', @$val['id']) }}>
                                                    <svg width='14' height='13' viewBox='0 0 16 14'
                                                        fill='none' xmlns='http://www.w3.org/2000/svg'>
                                                        <path
                                                            d='M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z'
                                                            fill='#048B52' />
                                                        <path
                                                            d='M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z'
                                                            fill='#048B52' />
                                                    </svg>
                                                </a>
                                            </button>
                                            <button class="edit-button" onclick='updatevehicle(this.id)'
                                                id={{ @$val['id'] }}>
                                                <a>
                                                    <svg width="14" height="13" viewBox="0 0 16 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                            fill="#2C77E7" />
                                                    </svg>

                                                </a>
                                            </button>
                                            <button class="delete-button">
                                                <a
                                                    href={{ url(@$module['action'] . '/delete/' . @$val[@$module['db_key']]) }}>
                                                    <svg width="14" height="13" viewBox="0 0 12 12"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                            fill="#EF5757" />
                                                    </svg>

                                                </a>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- listing end --}}
        </div>
        {{-- New Design --}}

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
                // var table = $('.vehicle_table').DataTable({
                //     processing: true,
                //     serverSide: true,
                //     scrollX: true,
                //     autoWidth:false,
                //     "lengthMenu": [
                //         [50, 100, 500],
                //         [50, 100, 500]
                //     ],
                //     language: {
                //         search: "",
                //         sLengthMenu: "_MENU_",
                //         searchPlaceholder: "Search",

                //         processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                //     },
                //     ajax: "{{ route('vehicle.records') }}",
                //     columns: [

                //     {
                //             data: 'customer_name',
                //             name: 'customer_name'
                //         },
                //         {
                //             data: 'vin',
                //             name: 'vin',
                //         },
                //         {
                //             data: 'year',
                //             name: 'year'
                //         },
                //         {
                //             data: 'make',
                //             name: 'make'
                //         },
                //         {
                //             data: 'model',
                //             name: 'model'
                //         },
                //         {
                //             data: 'vehicle_type',
                //             name: 'vehicle_type'
                //         },
                //         {
                //             data: 'value',
                //             name: 'value'
                //         },
                //         {
                //             data: 'status',
                //             name: 'status'
                //         },
                //         {
                //             data: 'buyer_id',
                //             name: 'buyer_id'
                //         },
                //         {
                //             data: 'action',
                //             name: 'action',
                //             orderable: false,
                //             searchable: false
                //         },

                //     ],

                // })


                    $('#on_hand_table_main').DataTable({
                            scrollX: true,
                            "lengthMenu": [
                                [50, 100, 500],
                                [50, 100, 500]
                            ],
                            columnDefs: [
                    { orderable: true, targets: 8 },
                    { orderable: true, targets: 9 },
                    { orderable: true, targets: 10 },
                    { orderable: true, targets: 11 },
                    { orderable: false, targets: '_all' }
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
        </script>

        <script>
            // $('#on_hand_table_main').DataTable({
            //     scrollX: true,
            //     "lengthMenu": [
            //         [50, 100, 500],
            //         [50, 100, 500]
            //     ],
            //     language: {
            //         search: "",
            //         sLengthMenu: "_MENU_",
            //         searchPlaceholder: "Search"
            //     },
            // });
        </script>
    @endsection
