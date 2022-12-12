@extends('layouts.partials.mainlayout')
@section('body')
    <div class="bg-primary bg-gradient p-3">
        <h5 class="text-white">Vehicle Page</h5>
    </div>
    <div>
        <div class="bg-white">
            <div class="col-8 d-flex p-0">
                <div class="col-3 px-1 general">
                    <button class="btn btn-secondary col-12">General</button>
                </div>
                <div class="col-3 px-1">
                    <button class="btn btn-secondary col-12"><a class="text-decoration-none text-white"
                            href="{{ route('shipment.attachments') }}">Attachments</a></button>
                </div>
                <div class="col-3 px-1">
                    <button class="btn btn-secondary col-12">Not Available</button>
                </div>
                <div class="col-3">
                    <button class="btn btn-secondary col-12">Not Available</button>
                </div>
            </div>
            <div class="px-3 pt-4 pb-2 d-flex justify-content-between">
                <div class="col-5 d-flex align-items-center text-info">
                    <span><b>Show</b></span>
                    <div class="col-3 d-flex justify-content-center px-1">
                        <select class="form-control border border-info rounded col-10" name="pagination"
                            id="pagination_vehicle">
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="300">300</option>
                        </select>
                    </div>
                    <span><b>Entries</b></span>
                </div>
                <div class="col-7 d-flex justify-content-end align-items-center ml-4">
                    <div class="col-8 px-2">
                        <input type="text" class="btn border border-info rounded col-12 text-dark text-left"
                            id="search_vehicle" name="search" placeholder="Search by customer name, year, make, model...">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                {{-- @dd($action) --}}
                <form action="{{ $action }}" method="POST" class="col-12">
                    @csrf

                    <div style="height: 100%;overflow-x: scroll;">
                        <table class="table sortable scroll">
                            <thead class="bg-white text-info">
                                <th>YEAR</th>
                                <th>MAKE</th>
                                <th>MODEL</th>
                                <th>VIN</th>
                                <th>TITLE</th>
                                <th>TITLE_STATE</th>
                                <th>TITLE_NUMBER</th>
                                <th>CUSTOMER</th>
                                <th class="sorttable_nosort">ACTION</th>
                            </thead>
                            <tbody>
                                <tr>

                                    @foreach ($vehicles as $vehicle)
                                        <td>{{ @$vehicle['year'] }}</td>
                                        <td>{{ @$vehicle['make'] }}</td>
                                        <td>{{ @$vehicle['model'] }}</td>
                                        <td>{{ @$vehicle['vin'] }}</td>
                                        <td>{{ @$vehicle['title'] }}</td>
                                        <td>{{ @$vehicle['title_state'] }}</td>
                                        <td>{{ @$vehicle['title_number'] }}</td>
                                        <td>{{ @$vehicle['customer_name'] }}</td>
                                        <td class="text-center"><input type="checkbox" value="{{ @$vehicle['id'] }}"
                                                id="vehicle" name="vehicle"></td>
                                        {{-- <input type="hidden" value="{{ @$vehicle['id'] }}"> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex py-2">
                        <div class="col-6">
                            <table class="col-12">
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="company_name" class="form-control border border-0"><b>Company
                                                Name</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="company_name" id="company_name">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="customer_email" class="form-control border border-0"><b>Customer
                                                Email</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="customer_email" id="customer_email">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="customer_phone" class="form-control border border-0"><b>Customer
                                                Phone</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="customer_phone" id="customer_phone">
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="shipment_type" class="form-control border border-0"><b>Shipment
                                                Type</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="shipment_type" id="shipment_type">
                                    </td>
                                </tr>

                                <tr class="d-flex mt-5">
                                    <td class="col-4">
                                        <label for="loading_date" class="form-control border border-0"><b>Loading
                                                Date</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date" class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="loading_date" id="loading_date">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="cut_off_date" class="form-control border border-0"><b>Cut off
                                                Date</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date" class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="cut_off_date" id="cut_off_date">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="sail_date" class="form-control border border-0"><b>Sale
                                                Date</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="sail_date" id="sail_date">
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="est_arrival_date" class="form-control border border-0"><b>Est Arrival
                                                Date</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="est_arrival_date" id="est_arrival_date">
                                    </td>
                                </tr>

                                <tr class="d-flex mt-5">
                                    <td class="col-4">
                                        <label for="booking_number" class="form-control border border-0"><b>Booking
                                                Number</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="booking_number" id="booking_number">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="container_number" class="form-control border border-0"><b>Container
                                                No</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="container_no" id="container_number">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="container_size" class="form-control border border-0"><b>Container
                                                Size</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="container_size" id="container_size">
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="container_type" class="form-control border border-0"><b>Container
                                                Type</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="container_type" id="container_type">
                                    </td>
                                </tr>

                                <tr class="d-flex mt-5">
                                    <td class="col-4">
                                        <label for="shipping_reference" class="form-control border border-0"><b>Shipping
                                                Reference</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="shipping_reference" id="shipping_reference">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="ase-itn_number" class="form-control border border-0"><b>ASE-ITN
                                                No</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="ase-itn_number" id="ase-itn_number">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="xtn_number" class="form-control border border-0"><b>XTN No</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="xtn_number" id="xtn_number">
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="oti_number" class="form-control border border-0"><b>OTI
                                                Number</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="oti_number" id="oti_number">
                                    </td>
                                </tr>

                                <tr class="d-flex py-2 mt-5">
                                    <td class="col-4">
                                        <label for="select_consignee "
                                            class="form-control border border-0"><b>Consignee</b></label>
                                    </td>
                                    <td class="col-6">
                                        <select class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="select_consignee" id="select_consignee">
                                            @foreach ($consignees as $consignee)
                                                <option class="form-control-sm border border-0 rounded-pill bg col-10"
                                                    value="{{ $consignee['id'] }}"> {{ $consignee['consignee_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="shipper" class="form-control border border-0"><b>Shipper</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10" name="shipper"
                                            id="shipper">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="col-12">
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="loading_terminal" class="form-control border border-0"><b>Loading
                                                Terminal</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="loading_terminal" id="loading_terminal">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="loading_port" class="form-control border border-0"><b>Port</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="loading_port" id="loading_port">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="loading_state"
                                            class="form-control border border-0"><b>State</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="loading_state" id="loading_state">
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="loading_country"
                                            class="form-control border border-0"><b>Country</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text" class="form-control-sm border border-0 rounded-pill bg"
                                            name="loading_country" id="loading_country">
                                    </td>
                                </tr>

                                <tr class="d-flex mt-5">
                                    <td class="col-4">
                                        <label for="destination_terminal"
                                            class="form-control border border-0 px-1"><b>Destination
                                                Terminal</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="destination_terminal" id="destination_terminal">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="destination_port"
                                            class="form-control border border-0"><b>Port</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="destination_port" id="destination_port">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="destination_state"
                                            class="form-control border border-0"><b>State</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="destination_state" id="destination_state">
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="destination_country" class="form-control border border-0"><b>Country
                                                Line</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="destination_country" id="destination_country">
                                    </td>
                                </tr>

                                <tr class="d-flex mt-5">
                                    <td class="col-4">
                                        <label for="shipping_line" class="form-control border border-0"><b>Shipping
                                                Line</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="shipping_line" id="shipping_line">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="vessel" class="form-control border border-0"><b>Vessel</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10" name="vessel"
                                            id="vessel">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="seal_number" class="form-control border border-0"><b>Seal
                                                No</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="seal_number" id="seal_number">
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="voyage" class="form-control border border-0"><b>Voyage
                                                Type</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10" name="voyage"
                                            id="voyage">
                                    </td>
                                </tr>

                                <tr class="d-flex mt-5">
                                    <td class="col-4">
                                        <label for="units" class="form-control border border-0"><b>Units</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="date"
                                            class="form-control-sm border border-0 rounded-pill bg col-10" name="units"
                                            id="units">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="types" class="form-control border border-0"><b>Types</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10" name="types"
                                            id="types">
                                    </td>
                                </tr>
                                <tr class="d-flex py-2">
                                    <td class="col-4">
                                        <label for="insurance"
                                            class="form-control border border-0"><b>Insurance</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="insurance" id="insurance">
                                    </td>
                                </tr>
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="fmc_license_number" class="form-control border border-0"><b>FMC
                                                License
                                                No</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="fmc_license_number" id="fmc_license_number">
                                    </td>
                                </tr>

                                <tr class="d-flex py-2 mt-5">
                                    <td class="col-4">
                                        <label for="select_notify_party" class="form-control border border-0"><b>Select
                                                Notify Party</b></label>
                                    </td>
                                    <td class="col-6">
                                        <input type="text"
                                            class="form-control-sm border border-0 rounded-pill bg col-10"
                                            name="select_notify_party" id="select_notify_party">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-12">
                            <table class="col-12">
                                <tr class="d-flex">
                                    <td class="col-4">
                                        <label for="note" class="form-control border border-0"><b>Notes</b></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-12">
                                        <div>
                                            <textarea type="text" class="form-control-sm border border-info rounded col-12 text-dark" rows="6"
                                                name="notes" id="note" style="background: rgba(170, 219, 255, 0.35);"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="d-flex justify-content-end mt-3 p-3">
                                    <td class="col-2">
                                        <input type="submit" class="form-control btn border border-0 rounded-pill"
                                            style="cursor:pointer;" value="{{ $button_text }}">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
