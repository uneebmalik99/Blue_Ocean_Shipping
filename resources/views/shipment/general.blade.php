{{-- @foreach($buyer_ids as $ids)
{{dd($ids['billings'][0]['company_name'])}}
@endforeach --}}
<div>
    <div>
        <div class="bg-white">
            @include('shipment.navbar')
            <div class="mt-3">
                <div class="col-12 d-flex justify-content-end">
                    <input type="text" style="outline:none!important;font-size:13px!important;color:gray!important" id="shipment_search" name="shipment_search" onkeyup="search_shipment()" placeholder="Search VIN">
                </div>
                <form method="POST" class="col-12" id="shipment_form">
                    @csrf
                    <div class="mt-2 bg-light" id="shipment_body">
                        <table id="" class="table ">
                            <thead class="bg-custom">
                                <tr style="font-size: 11px!important">
                                    <th>YEAR</th>
                                    <th>MAKE</th>
                                    <th>MODEL</th>
                                    <th>VIN</th>
                                    <th>TITLE</th>
                                    <th>TITLE STATE</th>
                                    <th>TITLE NUMBER</th>
                                    <th>CUSTOMER</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody id="shipment_table">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Search Vehicles</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                {{-- @foreach ($vehicles as $vehicle)
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
                                                id="vehicle" name="vehicle[]"></td>
                                        
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>


                        <table class="table" style="background:lightgray;">
                            <tbody id="add_vehicles">
                                @if(@$shipment)
                                @foreach ($shipment[0]['vehicle'] as $vehicle)
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
                                               id="{{@$vehicle['id']}}" tab="{{@$vehicle['id']}}" name="vehicle[]" onclick="removerow(this.id)" checked></td>
                                        
                               </tr>
                               @endforeach
                               @endif

                               @if(@$vehicle_cart)
                               @foreach ($vehicle_cart as $vehicle)
                               <tr>
                                <td>{{ @$vehicle['vehicle']['year'] }}</td>
                                <td>{{ @$vehicle['vehicle']['make'] }}</td>
                                <td>{{ @$vehicle['vehicle']['model'] }}</td>
                                <td>{{ @$vehicle['vehicle']['vin'] }}</td>
                                <td>{{ @$vehicle['vehicle']['title'] }}</td>
                                <td>{{ @$vehicle['vehicle']['title_state'] }}</td>
                                <td>{{ @$vehicle['vehicle']['title_number'] }}</td>
                                <td>{{ @$vehicle['vehicle']['customer_name'] }}</td>
                                <td class="text-center">
                                    <input type="checkbox" value="{{ @$vehicle['vehicle']['id'] }}" id="{{@$vehicle['id']}}"  tab="{{@$vehicle['id']}}" name="vehicle[]" onclick="removerow(this.id)" checked></td>
                                
                        </tr>
                               @endforeach
                               @endif
                            </tbody>
                        </table>
                    </div>
                    @if(@$shipment[0]['id'])
                    <input type="hidden" id="id" name="id" value="{{@$shipment[0]['id']}}">
                    @endif
                    <div class="d-xl-flex border-shipment">
                        <div class="col-12 d-lg-flex p-0">
                            <div class="col-lg-6 col-12 p-0">
                                <div class="col-12 p-0">
                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_customer"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Customer Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_customer_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="company_name"
                                                        class="col-6 px-0 font-size font-bold">Company
                                                        Name</label>
                                                        <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="company_name" id="company_name" onchange="customer_details()">
                                                        @if(@$shipment[0]['company_name'])
                                                        <option value="{{@$shipment[0]['company_name']}}" selected disabled>{{@$shipment[0]['company_name']}}</option>
                                                        @else
                                                        <option selected disabled>Select Company</option>
                                                        @endif
                                                        @foreach ($companies as $company)
                                                            <option value="{{$company['company_name']}}">{{$company['company_name']}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="company_name" id="company_name"> --}}
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="customer_email"
                                                        class="col-6 px-0 font-size font-bold">Customer
                                                        Email</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="customer_email" id="customer_email" value="{{@$shipment[0]['customer_email']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="customer_phone"
                                                        class="col-6 px-0 font-size font-bold">Customer
                                                        Phone</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="customer_phone" id="customer_phone" value="{{@$shipment[0]['customer_phone']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="shipment_type"
                                                        class="col-6 px-0 font-size font-bold">Shipment
                                                        Type</label>

                                                        <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipment_type" id="shipment_type">
                                                        @if(@$shipment[0]['shipment_type'])
                                                        <option value="{{@$shipment[0]['shipment_type']}}" selected disabled>{{@$shipment[0]['shipment_type']}}</option>
                                                        @else
                                                        <option>Select Shipment Types</option>
                                                        @endif
                                                        @foreach ($shipment_types as $types)
                                                            <option value="{{@$types['name']}}">{{@$types['name']}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipment_type" id="shipment_type"> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_calendar"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Schedule Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_calendar_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_date"
                                                        class="col-6 px-0 font-size font-bold">Loading
                                                        Date</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_date" id="loading_date" value="{{@$shipment[0]['loading_date']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="cut_off_date" class="col-6 px-0 font-size font-bold">Cut
                                                        off
                                                        Date</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="cut_off_date" id="cut_off_date" value="{{@$shipment[0]['cut_off_date']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="sale_date" class="col-6 px-0 font-size font-bold">Sail
                                                        Date</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="sale_date" id="sale_date" value="{{@$shipment[0]['sale_date']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="est_arrival_date"
                                                        class="col-6 px-0 font-size font-bold">Est
                                                        Arrival
                                                        Date</label>
                                                    <input type="date"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="est_arrival_date" id="est_arrival_date" value="{{@$shipment[0]['est_arrival_date']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_container"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Container Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_container_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="booking_number"
                                                        class="col-6 px-0 font-size font-bold">Booking
                                                        Number</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="booking_number" id="booking_number" value="{{@$shipment[0]['booking_number']}}">

                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="container_number"
                                                        class="col-6 px-0 font-size font-bold">Container Number</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="container_no" id="container_number" value="{{@$shipment[0]['container_no']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="container_size"
                                                        class="col-6 px-0 font-size font-bold">Container
                                                        Size</label>
                                                        <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="container_size" id="container_size">
                                                        @if(@$shipment[0]['container_size'])
                                                        <option value="{{@$shipment[0]['container_size']}}">{{@$shipment[0]['container_size']}}</option>
                                                        @else
                                                    <option selected disabled>Select Container Size</option>
                                                    @endif
                                                    @foreach ($container_size as $Csize)
                                                    <option value="{{@$Csize['name']}}">{{@$Csize['name']}}</option>    
                                                    @endforeach
                                                </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="container_size" id="container_size"> --}}
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="container_type"
                                                        class="col-6 px-0 font-size font-bold">Container
                                                        Type</label>
                                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                                    name="container_type" id="container_type">
                                                    @if(@$shipment[0]['container_type'])
                                                    <option value="{{@$shipment[0]['container_type']}}">{{@$shipment[0]['container_type']}}</option>
                                                    @else
                                                    <option selected disabled>Select Container Type</option>
                                                    @endif
                                                    @foreach ($container_types as $Ctype)
                                                    <option value="{{@$Ctype['name']}}">{{@$Ctype['name']}}</option>                                         
                                                    @endforeach
                                                </select>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_reference"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewbox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Reference Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_reference_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="shipping_reference"
                                                        class="col-6 px-0 font-size font-bold">Shipping
                                                        Reference</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipping_reference" id="shipping_reference" value="{{@$shipment[0]['shipping_reference']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="ase-itn_number"
                                                        class="col-6 px-0 font-size font-bold">
                                                        ASE-ITN
                                                        No</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="ase-itn_number" id="ase-itn_number" value="{{@$shipment[0]['ase-itn_number']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="xtn_number" class="col-6 px-0 font-size font-bold">XTN
                                                        No</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="xtn_number" id="xtn_number" value="{{@$shipment[0]['xtn_number']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <td class="col-6">
                                                        <label for="oti_number"
                                                            class="col-6 px-0 font-size font-bold">OTI
                                                            Number</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="oti_number" id="oti_number" value="{{@$shipment[0]['oti_number']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_users"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Users Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_users_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="select_consignee "
                                                        class="col-6 px-0 font-size font-bold">Consignee</label>
                                                    <select
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="select_consignee" id="select_consignee">
                                                        @if(@$shipment[0]['select_consignee'])
                                                        <option value="{{@$shipment[0]['select_consignee']}}" selected disabled>{{@$shipment[0]['select_consignee']}}</option>
                                                        @endif
                                                        {{-- @foreach ($buyer_ids as $buyer_id)
                                                        @if(@$buyer_id['billings'][0]['company_name'])
                                                            <option
                                                                class="form-control-sm border border-0 rounded-pill bg col-6"
                                                                value="{{ @$buyer_id['id'] }}">
                                                                {{ @$buyer_id['billings'][0]['company_name'] }}
                                                            </option>
                                                            @endif
                                                            <option
                                                                class="form-control-sm border border-0 rounded-pill bg col-6"
                                                                value="{{ $buyer_id['id'] }}">
                                                                {{ $buyer_id['company_name'] }}
                                                            </option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="select_consignee "
                                                        class="col-6 px-0 font-size font-bold">Notifier</label>
                                                    <select
                                                        class="form-control-sm border border-0 rounded-pill bg col-6" id="notifier" >
                                                        @if(@$shipment[0]['select_consignee '])
                                                        <option value="{{@$shipment[0]['select_consignee']}}" selected disabled>{{@$shipment[0]['select_consignee']}}</option>
                                                        @else
                                                        <option selected disabled>Select Notifier</option>
                                                        @endif
                                                        {{-- @foreach ($buyer_ids as $buyer_id)
                                                        
                                                        @if(@$buyer_id['billings'][0]['company_name'])
                                                            <option
                                                                class="form-control-sm border border-0 rounded-pill bg col-6"
                                                                value="{{ @$buyer_id['id'] }}">
                                                                {{ @$buyer_id['billings'][0]['company_name'] }}
                                                            </option>
                                                            @endif

                                                            <option
                                                                class="form-control-sm border border-0 rounded-pill bg col-6"
                                                                value="{{ $buyer_id['id'] }}">
                                                                {{ $buyer_id['company_name'] }}
                                                            </option>

                                                            

                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="shipper" class="col-6 px-0 font-size font-bold">
                                                        Shipper
                                                    </label>
                                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                                    name="shipper" id="shipper">
                                                    @if(@$shipment[0]['shipper'])
                                                    <option value="{{@$shipment[0]['shipper']}}">{{@$shipment[0]['shipper']}}</option>
                                                    @else
                                                    <option selected disabled>Select Shipper</option>
                                                    @endif
                                                    @foreach($shippers as $shipper)
                                                    <option value="{{@$shipper['shipper_name']}}">{{@$shipper['shipper_name']}}</option>
                                                    @endforeach
                                                
                                                </select>

                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipper" id="shipper" value="{{@$shipment[0]['shipper']}}"> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-6 col-12 p-0">
                                <div class="col-12 pr-0">
                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_loading"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Loading Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_loading_body">
                                            
                                            
                                            
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_country"
                                                        class="col-6 px-0 font-size font-bold">Country</label>
                                                        <select name="loading_country" id="loading_country" class="form-control-sm border border-0 rounded-pill bg col-6" onchange="FetchState()">
                                                            @if(@$shipment[0]['loading_country'])
                                                            <option value="{{@$shipment[0]['loading_country']}}" selected disabled>{{@$shipment[0]['loading_country']}}</option>
                                                            @else
                                                            <option selected disabled>Select Country</option>
                                                            @endif
                                                            @foreach($countries as $country)
                                                            <option value="{{@$country['country']}}">{{@$country['country']}}</option>
                                                            @endforeach
                                                        </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_country" id="loading_country"> --}}
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_state"
                                                        class="col-6 px-0 font-size font-bold">State</label>
                                                        <select name="loading_state" id="loading_state" class="form-control-sm border border-0 rounded-pill bg col-6" onchange="FetchPort()">
                                                            @if(@$shipment[0]['loading_state'])
                                                            <option value="{{@$shipment[0]['loading_state']}}" selected disabled>{{@$shipment[0]['loading_state']}}</option>
                                                            @else
                                                            <option selected disabled>Select State</option>
                                                            @endif
                                                            {{-- <option selected disabled>Select State</option>
                                                            @foreach ($states as $state)
                                                                <option value="{{@$state['name']}}">{{@$state['name']}}</option>
                                                            @endforeach --}}
                                                        </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_state" id="loading_state"> --}}
                                                </div>
                                            </div>

                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_port"
                                                        class="col-6 px-0 font-size font-bold">Port</label>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_port" id="loading_port"> --}}
                                                    <select
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_port" id="loading_port" onchange="FetchTerminal()">
                                                        @if(@$shipment[0]['loading_port'])
                                                            <option value="{{@$shipment[0]['loading_port']}}" selected disabled>{{@$shipment[0]['loading_port']}}</option>
                                                            @else
                                                        <option selected disabled>Select Ports</option>
                                                        @endif
                                                        {{-- @foreach ($location as $locations)
                                                            <option value="{{ $locations['id'] }}">
                                                                {{ $locations['name'] }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="loading_terminal"
                                                        class="col-6 px-0 font-size font-bold">Loading
                                                        Terminal</label>
                                                        <select
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_terminal" id="loading_terminal">
                                                        @if(@$shipment[0]['loading_terminal'])
                                                            <option value="{{@$shipment[0]['loading_terminal']}}" selected disabled>{{@$shipment[0]['loading_terminal']}}</option>
                                                            @else
                                                        <option selected disabled>Select Terminals</option>
                                                        @endif
                                                        {{-- @foreach ($location as $locations)
                                                            <option value="{{ $locations['id'] }}">
                                                                {{ $locations['name'] }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="loading_terminal" id="loading_terminal"> --}}
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;"
                                                id="shipment_destination" onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Destination Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_destination_body">
                                            
                                            
                                            
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="destination_country"
                                                        class="col-6 px-0 font-size font-bold">Country</label>
                                                        <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_country" id="destination_country" onchange="DestinationState()">
                                                        @if(@$shipment[0]['destination_country'])
                                                            <option value="{{@$shipment[0]['destination_country']}}" selected disabled>{{@$shipment[0]['destination_country']}}</option>
                                                            @else
                                                        <option selected disabled>Select Destination Country</option>
                                                        @endif
                                                        @foreach ($destination_country as $dcountry)
                                                        <option value="{{@$dcountry['country']}}">{{@$dcountry['country']}}</option>
                                                            
                                                        @endforeach
                                                    </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_country" id="destination_country"> --}}
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="destination_state"
                                                        class="col-6 px-0 font-size font-bold">State</label>

                                                        <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_state" id="destination_state" onchange="FetachDestinationPort()">
                                                        @if(@$shipment[0]['destination_state'])
                                                            <option value="{{@$shipment[0]['destination_state']}}" selected disabled>{{@$shipment[0]['destination_state']}}</option>
                                                            @else
                                                        <option selected disabled>Select State</option>
                                                        @endif
                                                    
                                                    </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_state" id="destination_state"> --}}
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="destination_port"
                                                        class="col-6 px-0 font-size font-bold">Port</label>
                                                   
                                                    <select
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_port" id="destination_port" onchange="FetchDestiTerimals()">
                                                        @if(@$shipment[0]['destination_port'])
                                                            <option value="{{@$shipment[0]['destination_port']}}" selected disabled>{{@$shipment[0]['destination_port']}}</option>
                                                            @else
                                                        <option selected disabled>Select Destination Port</option>
                                                        @endif
                                                        {{-- @foreach ($location as $locations)
                                                            <option value="{{ $locations['id'] }}">
                                                                {{ $locations['name'] }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="destination_terminal"
                                                        class="col-6 px-0 font-size font-bold px-1">Destination
                                                        Terminal</label>
                                                        <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_terminal" id="destination_terminal">
                                                        @if(@$shipment[0]['destination_terminal'])
                                                            <option value="{{@$shipment[0]['destination_terminal']}}" selected disabled>{{@$shipment[0]['destination_terminal']}}</option>
                                                            @else
                                                        <option selected disabled>Select Terminal</option>
                                                        @endif
                                                        
                                                    </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="destination_terminal" id="destination_terminal"> --}}
                                                </div>
                                            </div>





                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_shipping"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Shipping Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_shipping_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="shipping_line"
                                                        class="col-6 px-0 font-size font-bold">Shipping
                                                        Line</label>
                                                        <select  class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipping_line" id="shipping_line">
                                                        @if(@$shipment[0]['shipping_line'])
                                                            <option value="{{@$shipment[0]['shipping_line']}}" selected disabled>{{@$shipment[0]['shipping_line']}}</option>
                                                            @else
                                                        <option selected disabled>Select Shipping Line</option>
                                                        @endif
                                                        @foreach ($shipment_lines as $Slines)
                                                            <option value="{{@$Slines['name']}}">{{@$Slines['name']}}</option>
                                                        @endforeach
                                                    
                                                    </select>
                                                    {{-- <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="shipping_line" id="shipping_line"> --}}

                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="vessel"
                                                        class="col-6 px-0 font-size font-bold">Vessel</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="vessel" id="vessel" value="{{@$shipment[0]['vessel']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="seal_number"
                                                        class="col-6 px-0 font-size font-bold">Seal
                                                        No</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="seal_number" id="seal_number" value="{{@$shipment[0]['seal_number']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="voyage"
                                                        class="col-6 px-0 font-size font-bold">Voyage
                                                        Type</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="voyage" id="voyage" value="{{@$shipment[0]['voyage']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="shipment_units"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Units Information</span>
                                            </div>
                                        </div>
                                        <div id="shipment_units_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="units"
                                                        class="col-6 px-0 font-size font-bold">Units</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="units" id="units" value="{{@$shipment[0]['units']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="types"
                                                        class="col-6 px-0 font-size font-bold">Types</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="types" id="types" value="{{@$shipment[0]['types']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="insurance"
                                                        class="col-6 px-0 font-size font-bold">Insurance</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="insurance" id="insurance" value="{{@$shipment[0]['insurance']}}">
                                                </div>
                                            </div>
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="fmc_license_number"
                                                        class="col-6 px-0 font-size font-bold">FMC
                                                        License
                                                        No</label>
                                                    <input type="text"
                                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                                        name="fmc_license_number" id="fmc_license_number" value="{{@$shipment[0]['fmc_license_number']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab_card my-3">
                                        <div class="col-7 py-3">
                                            <div class="text-color" style="cursor: pointer;" id="note"
                                                onclick="slide(this.id)">
                                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <span class="p-2">Note</span>
                                            </div>
                                        </div>
                                        <div id="note_body">
                                            <div class="col-12 py-2">
                                                <div class="d-flex align-items-center">
                                                    <label for="notes"
                                                        class="col-6 px-0 font-size font-bold">Note</label>
                                                    <textarea type="text" class="form-control-sm border border-0 col-6 card-pill" name="notes" id="notes" value="{{@$shipment[0]['notes']}}">{{@$shipment[0]['notes']}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="col-6">
                            <div class="col-3">
                                <button type="button" class="btn next-style text-white col-12 py-1"
                                    id="shipment_general_finish" onclick="display_model()" style="cursor: pointer;">
                                    <div class="unskew">Cancel</div>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end col-6">

                            <div class="col-3">
                                <button type="reset" class="btn next-style text-white col-12 py-1"
                                    id="general_vehicle" value="Reset" style="cursor: pointer;">
                                    <div class="unskew">Clear</div>
                                </button>
                            </div>
                            <div class="col-3">
                                <input type="hidden" class="next_tab" id="attachments">
                                <button type="button" class="btn next-style text-white col-12 py-1"
                                    onclick="create_shipment_form(this.id)" id="general_shipment"
                                    style="cursor: pointer;" tab="attachments_shipment_tab">
                                    <div class="unskew">Next</div>
                                </button>
                            </div>
                           
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
