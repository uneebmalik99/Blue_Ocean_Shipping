@include('layouts.vehicle_create.navbar')
<form method="POST" id="vehicle_form" enctype="multipart/form-data">
    @csrf
    @if(@$user[0]['id'])
    <input type="hidden" id="id" name="id" value="{{@$user[0]['id']}}">
    @endif
    <div class="d-lg-flex">
        <div class="col-xl-12 col-12 d-lg-flex p-0">
            <div class="col-lg-6 col-12 p-0">
                <div class="col-12">
                    <div class="tab_card my-3">
                        <div class="col-4 py-3">
                            <div class="text-color" style="cursor: pointer;" id="client" onclick="slide(this.id)">
                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="p-2">Client</span>
                            </div>
                        </div>
                        <div id="client_body">
                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="customer_name" class="col-6 px-0 font-size font-bold">Company Name <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="customer_name" id="customer_name" value="{{ @$user[0]['customer_name'] }}" onchange="getbuyerids()">
                                        @if(@$user[0]['customer_name'])
                                        <option value="{{@$user[0]['customer_name']}}">{{@$user[0]['customer_name']}}</option>
                                        @else
                                        <option selected disabled>Select Company Name</option>
                                        @endif
                                        @if($customer_name)
                                        @foreach ($customer_name as $customer_names)
                                            <option value="{{ @$customer_names['company_name'] }}">
                                                {{ @$customer_names['company_name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="customer_name" id="customer_name" value="{{ @$user[0]['customer_name'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="customer_name_error">
                                        <small></small>
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">



                                <div class="d-flex align-items-center">
                                    <label for="vin" class="col-6 px-0 font-size font-bold">VIN <span
                                            class="text-danger">*</span></label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        {{-- <form> --}}
                                        <input type="text" class="col-8 general_input" name="vin" id="vin"
                                            value="{{ @$user[0]['vin'] }}">

                                        <a class="prefix text-dark px-2 getinf"
                                            style="text-decoration: none!important;
                                             background:rgb(175, 197, 234);border-radius:20px;cursor:pointer"
                                            id="getinfo" onclick="getInfo(this.id)">
                                            <span class="text-white px-1" id="getinfo"  >GetInfo</span>
                                        </a>
                                        {{-- </form> --}}
                                    </div>
                                    {{-- <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="vin" id="vin" value="{{ @$user[0]['vin'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="vin_error">

                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="year" class="col-6 px-0 font-size font-bold">Year<span
                                            class="text-danger">*</span></label>
                                    {{-- <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="year" id="year">
                                    <option selected disabled>Select Year</option>
                                    @foreach ($vehicle_year as $vyear)
                                    <option value="{{@$vyear['name']}}">{{@$vyear['name']}}</option>
                                </select> --}}
                                    <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="year" id="year" value="{{ @$user[0]['year'] }}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="year_error">

                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="make" class="col-6 px-0 font-size font-bold">Make<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6" name="make"
                                        id="make" onchange="FetachModel()">
                                        @if(@$user[0]['make'])
                                        <option value="{{@$user[0]['make']}}">{{@$user[0]['make']}}</option>
                                        @else
                                        <option selected disabled>Select Make</option>
                                        @endif
                                        @if($vehicle_make)
                                        @foreach ($vehicle_make as $vmake)
                                            <option value="{{ @$vmake['make'] }}">{{ @$vmake['make'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                    {{-- <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="make" id="make" value="{{ @$user[0]['make'] }}" disabled> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="make_error">
                                        <small></small>
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="model" class="col-6 px-0 font-size font-bold">Model<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6" name="model"
                                        id="model">
                                        @if(@$user[0]['model'])
                                        <option value="{{@$user[0]['model']}}">{{@$user[0]['model']}}</option>
                                        @else
                                        <option selected disabled>Select Model</option>
                                        @endif
                                    </select>
                                    {{-- <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="model" id="model" value="{{ @$user[0]['model'] }}" disabled> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="model_error">
                                        <small></small>
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="vehicle_type" class="col-6 px-0 font-size font-bold">Vehicle Type<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="vehicle_type" id="vehicle_type" value="{{ @$user[0]['vehicle_type'] }}">
                                        @if(@$user[0]['vehicle_type'])
                                        <option value="{{@$user[0]['vehicle_type']}}">{{@$user[0]['vehicle_type']}}</option>
                                        @else
                                        <option selected disabled>Select Type</option>
                                        @endif
                                        @if($vehicle_types)
                                        @foreach (@$vehicle_types as $types)
                                            <option value="{{ @$types['vehicle_type'] }}">{{ @$types['vehicle_type'] }}
                                            </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="vehicle_type" id="vehicle_type" value="{{ @$user[0]['vehicle_type'] }}" disabled> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="vehicle_type_error">

                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="color" class="col-6 px-0 font-size font-bold">Color
                                        {{-- <span class="text-danger">*</span> --}}
                                        </label>
                                    <select name="color" id="color" value="{{ @$user[0]['color'] }}"
                                        class="form-control-sm border border-0 rounded-pill bg col-6">
                                        @if(@$user[0]['color'])
                                        <option value="{{@$user[0]['color']}}">{{@$user[0]['color']}}</option>
                                        @else
                                        <option selected disabled>Select Color</option>
                                        @endif
                                        @if($colors)
                                        @foreach ($colors as $color)
                                            <option value="{{ @$color['name'] }}">{{ @$color['name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="color" id="color" value="{{ @$user[0]['color'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="color_error">

                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="weight" class="col-6 px-0 font-size font-bold">Weight (Kgs)
                                        {{-- <span class="text-danger">*</span> --}}
                                        </label>
                                    <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="weight"
                                        id="weight" value="{{ @$user[0]['weight'] }}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="weight_error">

                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="values" class="col-6 px-0 font-size font-bold">Value ($)
                                        {{-- <span class="text-danger">*</span> --}}
                                    </label>
                                    <input type="number"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="value"
                                        id="value" value="{{ @$user[0]['value'] }}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="value_error">

                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="auction" class="col-6 px-0 font-size font-bold">Auction<span
                                            class="text-danger">*</span></label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        {{-- <span class="prefix text-dark">$</span> --}}
                                        <select class="general_input col-11" name="auction" id="auction"
                                            value="{{ @$user[0]['auction'] }}">
                                            @if(@$user[0]['auction'])
                                            <option value="{{@$user[0]['auction']}}">{{@$user[0]['auction']}}</option>
                                            @else
                                            <option selected disabled>Select Auction</option>
                                            @endif
                                            @if($auctions)
                                            @foreach ($auctions as $auction)
                                                <option value="{{ @$auction['name'] }}">{{ @$auction['name'] }}
                                                </option>
                                            @endforeach
                                            @endif
                                        </select>
                                        {{-- <input type="text" class="general_input col-11" name="auction"
                                            id="auction" value="{{ @$user[0]['auction'] }}"> --}}
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="auction_error">
                                    </span>
                                </div>
                            </div>


                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="lot" class="col-6 px-0 font-size font-bold">Lot
                                       </label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        {{-- <span class="prefix text-dark">$</span> --}}
                                       
                                        <input type="text" class="general_input col-11" name="lot"
                                            id="lot" value="{{ @$user[0]['lot'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="auction_error">
                                    </span>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="tab_card my-3">
                        <div class="col-4 py-3">
                            <div class="text-color" style="cursor: pointer;" id="buyer"
                                onclick="slide(this.id)">
                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="p-2">Buyer</span>
                            </div>
                        </div>
                        <div id="buyer_body">
                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="buyer_id" class="col-6 px-0 font-size font-bold">Buyer ID<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="buyer_id" id="buyer_id">
                                        @if(@$user[0]['buyer_id'])
                                        <option value="{{@$user[0]['buyer_id']}}">{{@$user[0]['buyer_id']}}</option>
                                        @else
                                        <option selected disabled>Select Buyer Id</option>
                                        @endif
                                        
                                        @if(@$update_buyer_id)
                                        @foreach ($update_buyer_id[0]['billings'] as $buyer)
                                            @php
                                                $buyerid = explode(',', $buyer['buyer_number']);

                                            @endphp
                                            @foreach ($buyerid as $ids)
                                            @if($ids != @$user[0]['buyer_id'])
                                            <option value="{{$ids}}">
                                            {{$ids}}</option>
                                            @endif
                                            @endforeach
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="buyer_error">

                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="keys" class="col-6 px-0 font-size font-bold">Keys<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="key" id="key" value="{{ @$user[0]['keys'] }}">
                                        @if(@$user[0]['key'])
                                        <option value="{{@$user[0]['key']}}">{{@$user[0]['key']}}</option>
                                        @else
                                        <option selected disabled>Select Keys</option>
                                        @endif
                                        @if($keys)
                                        @foreach ($keys as $key)
                                            <option value="{{ @$key['name'] }}">{{ @$key['name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="key"
                                        id="key" value="{{ @$user[0]['keys'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="key_error">

                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="note" class="col-6 px-0 font-size font-bold">Notes</label>
                                    <textarea type="text" class="form-control-sm border border-0 nonrounded-pill bg col-6" name="note"
                                        id="note" value="{{ @$user[0]['note'] }}">{{ @$user[0]['note'] }}</textarea>
                                </div>
                            </div>
                            {{-- <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="title_type" class="col-6 px-0 font-size font-bold">Title Type</label>
                                    <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="title_type" id="title_type" value="{{ @$user[0]['title_type'] }}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger">
                                        @error('title_type')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div> --}}
                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="hat_number" class="col-6 px-0 font-size font-bold">Hat No</label>
                                    <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="hat_number" id="hat_number" value="{{ @$user[0]['hat_number'] }}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger">
                                        @error('hat_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab_card my-3">
                        <div class="col-4 py-3">
                            <div class="text-color" style="cursor: pointer;" id="title"
                                onclick="slide(this.id)">
                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="p-2">Title</span>
                            </div>
                        </div>
                        <div id="title_body">
                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="title" class="col-6 px-0 font-size font-bold">Title</label>

                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="title" id="title">
                                        @if(@$user[0]['title'])
                                        <option value="{{@$user[0]['title']}}">{{@$user[0]['title']}}</option>
                                        @else
                                        <option selected disabled>Select Type</option>
                                        @endif
                                        @if($titles)
                                        @foreach ($titles as $title)
                                            <option value="{{ @$title['name'] }}">{{ @$title['name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>

                                    {{-- <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="title"
                                        id="title" value="{{ @$user[0]['title'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="title_type" class="col-6 px-0 font-size font-bold">Title Type</label>

                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="title_type" id="title_type">
                                    @if(@$user[0]['title_type'])
                                    <option value="{{@$user[0]['title_type']}}">{{@$user[0]['title_type']}}</option>
                                    @else
                                        <option selected disabled>Select Title Type</option>
                                    @endif
                                    @if($title_types)
                                        @foreach ($title_types as $title)
                                            <option value="{{ @$title['name'] }}">{{ @$title['name'] }}</option>
                                        @endforeach
                                    @endif
                                    </select>


                                {{-- <input type="text"
                                    class="form-control-sm border border-0 rounded-pill bg col-6"
                                    name="title_type" id="title_type" value="{{ @$user[0]['title_type'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger">
                                        @error('title_type')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="title_rec_date" class="col-6 px-0 font-size font-bold">Title Rec
                                        Date</label>
                                    <input type="date"
                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="title_rec_date" id="title_rec_date"
                                        value="{{ @$user[0]['title_rec_date'] }}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger">
                                        @error('title_rec_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="title_state" class="col-6 px-0 font-size font-bold">Title
                                        State</label>
                                    {{-- <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="title_state" id="title_state">
                                        @foreach ($location as $locations)
                                            <option value="{{ $locations['id'] }}">{{ $locations['name'] }}</option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="title_state" id="title_state" value="{{ @$user[0]['title_state'] }}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger">
                                        @error('title_state')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="title_number" class="col-6 px-0 font-size font-bold">Title No</label>
                                    <input type="number"
                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="title_number" id="title_number" value="{{ @$user[0]['title_number'] }}">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger">
                                        @error('title_number')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-12 p-0">

                <div class="col-12">
                    <div class="tab_card my-3">
                        <div class="col-4 py-3">
                            <div class="text-color" style="cursor: pointer;" id="shipper"
                                onclick="slide(this.id)">
                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="p-2 ">Shipper</span>
                            </div>
                        </div>
                        <div id="shipper_body">
                            {{-- <div class="col-12 py-2">
                                        <div class="d-flex align-items-center">
                                            <label for="shipment_id" class="col-6 px-0 font-size font-bold">Shipment
                                                ID</label>
                                            <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                                name="port" id="port">
                                                @foreach ($shipment as $shipments)
                                                    <option value="{{ $shipments['id'] }}">{{ $shipments['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <span class="text-danger">
                                                @error('shipment_id')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div> --}}

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="shipper_name" class="col-6 px-0 font-size font-bold">Shipper
                                        Name</label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="shipper_name" id="shipper_name" value="{{ @$user[0]['shipper_name'] }}">
                                        @if(@$user[0]['shipper_name'])
                                        <option value="{{@$user[0]['shipper_name']}}">{{@$user[0]['shipper_name']}}</option>
                                        @else
                                        <option selected disabled>Select Shipper Name</option>
                                        @endif
                                        @if($shipper_names)
                                        @foreach ($shipper_names as $shipper_name)
                                            <option value="{{ @$shipper_name['name'] }}">
                                                {{ @$shipper_name['name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="shipper_name" id="shipper_name" value="{{ @$user[0]['shipper_name'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger">
                                        @error('shipper_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="status" class="col-6 px-0 font-size font-bold">Status<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="status" id="status" value="{{ @$user[0]['status'] }}">
                                        @if(@$user[0]['vehicle_status'])
                                        <option value="{{@$user[0]['status']}}">{{@$user[0]['vehicle_status']['status_name']}}</option>
                                        @else
                                        <option selected disabled>Select Status</option>
                                        @endif
                                        @if($vehicle_status)
                                        @foreach ($vehicle_status as $status)
                                        @if(@$status['status_name'] != @$user[0]['vehicle_status']['status_name'])
                                        <option value="{{ @$status['id'] }}">{{ @$status['status_name'] }}
                                        </option>
                                        @endif
                                        @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="status"
                                        id="status" value="{{ @$user[0]['status'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-center">
                                    <span class="text-danger" id="status_error">

                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="sale_date" class="col-6 px-0 font-size font-bold">Sale Date</label>
                                    <input type="date"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="sale_date"
                                        id="sale_date" value="{{ @$user[0]['sale_date'] }}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('sale_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="paid_date" class="col-6 px-0 font-size font-bold">Paid Date</label>
                                    <input type="date"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="paid_date"
                                        id="paid_date" value="{{ @$user[0]['paid_date'] }}" onchange="finddays()">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('paid_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="days" class="col-6 px-0 font-size font-bold">Days</label>
                                    <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="days"
                                        id="days" value="{{ @$user[0]['days'] }}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('days')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="post_date" class="col-6 px-0 font-size font-bold">Post Date</label>
                                    <input type="date"
                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="posted_date" id="posted_date" value="{{ @$user[0]['post_date'] }}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('post_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="pickup_date" class="col-6 px-0 font-size font-bold">Pickup
                                        Date</label>
                                    <input type="date"
                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="pickup_date" id="pickup_date" value="{{ @$user[0]['pickup_date'] }}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('pickup_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="delivered" class="col-6 px-0 font-size font-bold">Delivered</label>
                                    <input type="date"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="delivered"
                                        id="delivered" value="{{ @$user[0]['delivered'] }}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('delivered')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="pickup_location" class="col-6 px-0 font-size font-bold">Pickup
                                        Location</label>
                                    {{-- <select name="pickup_loaction" id="pickup_location" class="form-control-sm border border-0 rounded-pill bg col-6">
                                    <option value="" selected disabled>Select Location</option>
                                    @foreach ($location as $loc)
                                    <option value="{{@$loc['name']}}">{{@$loc['name']}}</option>
                                    @endforeach
                                    </select> --}}
                                    <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="pickup_location" id="pickup_location"
                                        value="{{ @$user[0]['pickup_location'] }}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('pickup_location')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="site" class="col-6 px-0 font-size font-bold">Site</label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="site" id="site">
                                        @if(@$user[0]['site'])
                                        <option value="{{@$user[0]['site']}}">{{@$user[0]['site']}}</option>
                                        @else
                                        <option selected disabled>Select Site</option>
                                        @endif
                                        @if($sites)
                                        @foreach ($sites as $site)
                                            <option value="{{ $site['name'] }}">{{ $site['name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="text"
                                        class="form-control-sm border border-0 rounded-pill bg col-6" name="site"
                                        id="site" value="{{ @$user[0]['site'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('site')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="port" class="col-6 px-0 font-size font-bold">Warehouse</label>
                                    <select class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="port" id="port">
                                    @if(@$user[0]['port'])
                                        <option value="{{@$user[0]['port']}}">{{@$user[0]['port']}}</option>
                                        @else
                                        <option selected disabled>Select Warehouse</option>
                                        @endif
                                        
                                        @if($warehouses)
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse['name'] }}">{{ $warehouse['name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                                        name="port" id="port" value="{{ @$user[0]['port'] }}"> --}}
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('port')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab_card my-3">
                        <div class="col-4 py-3">
                            <div class="text-color" style="cursor: pointer;" id="charges"
                                onclick="slide(this.id)">
                                <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="p-2 ">Charges</span>
                            </div>
                        </div>
                        <div id="charges_body">

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="dealer_fee" class="col-6 px-0 font-size font-bold">Dealer Fee</label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        <span class="prefix text-dark">$</span>
                                        <input type="text" class="col-11 general_input" name="dealer_fee"
                                            id="dealer_fee" value="{{ @$user[0]['dealer_fee'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('dealer_fee')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">

                                    <label for="late_fee" class="col-6 px-0 font-size font-bold">Late Fee</label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        <span class="prefix text-dark">$</span>
                                        <input type="text" class="col-11 general_input" name="late_fee"
                                            id="late_fee" value="{{ @$user[0]['late_fee'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('late_fee')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="auction_storage" class="col-6 px-0 font-size font-bold">Auction
                                        Storage</label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        <span class="prefix text-dark">$</span>
                                        <input type="text" class="general_input col-11" name="auction_storage"
                                            id="auction_storage" value="{{ @$user[0]['auction_storage'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('auction_storage')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="towing_charges" class="col-6 px-0 font-size font-bold">Towing
                                        Charges</label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        <span class="prefix text-dark">$</span>
                                        <input type="text" class="general_input col-11" name="towing_charges"
                                            id="towing_charges" value="{{ @$user[0]['towing_charges'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('towing_charges')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="title_fee" class="col-6 px-0 font-size font-bold">Title Fee</label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        <span class="prefix text-dark">$</span>
                                        <input type="text" class="col-11 general_input" name="title_fee"
                                            id="title_fee" value="{{ @$user[0]['title_fee'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('title_fee')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="post_detention" class="col-6 px-0 font-size font-bold">Yard
                                        Storage</label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        <span class="prefix text-dark">$</span>
                                        <input type="text" class="general_input col-11" name="port_detention_fee"
                                            id="port_detention_fee" value="{{ @$user[0]['post_detention'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('post_detention')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="custom_inspection" class="col-6 px-0 font-size font-bold">Custom
                                        Inspection</label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        <span class="prefix text-dark">$</span>
                                        <input type="text" class="general_input col-11" name="custom_inspection"
                                            id="custom_inspection" value="{{ @$user[0]['custom_inspection'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('custom_inspection')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="additional_fee" class="col-6 px-0 font-size font-bold">Additional
                                        Fee</label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        <span class="prefix text-dark">$</span>
                                        <input type="text" class="col-11 general_input" name="additional_fee"
                                            id="additional_fee" value="{{ @$user[0]['additional_fee'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('additional_fee')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 py-2">
                                <div class="d-flex align-items-center">
                                    <label for="insurance" class="col-6 px-0 font-size font-bold">Insurance</label>
                                    <div
                                        class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                        <span class="prefix text-dark">$</span>
                                        <input type="text" class="general_input col-11" name="insurance"
                                            id="insurance" value="{{ @$user[0]['insurance'] }}">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <span class="text-danger">
                                        @error('insurance')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-12 py-2 px-5 d-flex justify-content-end">
        <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="added_by_user"
            id="added_by_user" readonly value="{{ Auth::user()->id }}">
        <input type="hidden" readonly name="tab" value="general">
        <button type="button" class="btn next-style text-white col-1 py-1" onclick="create_vehicle_form(this.id)"
            id="general_vehicle" data-next='attachments_vehicle_tab' name="{{ $module['button'] }}"
            style="cursor: pointer;">
            <div class="unskew">Next</div>
        </button>

    </div>
</form>
