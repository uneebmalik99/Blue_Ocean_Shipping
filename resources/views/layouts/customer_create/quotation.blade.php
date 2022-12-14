{{-- {{$quotation[0]['id']}} --}}
@include('layouts.customer_create.navbar')
<form method="POST" id="customer_quotation_form" enctype="multipart/form-data">
    @if (@$quotation)
        @foreach (@$quotation as $quo)
            <input type="hidden" id="id" name="id[]" value="{{ @$quo['id'] }}">
        @endforeach
    @endif
    @csrf
    <div class="d-flex justify-content-around p-2">
        <div class="col-4 d-block">
            <div>
                <label for="destination_port" class="text-info font-style">Destination Port</label>
            </div>
            <div>
                <select name="destination_port" id="destination_port"
                    class="form-control-sm border border-0 rounded-pill bg col-6">
                    @if (@$quotation[0]['destination_port'])
                        <option value="{{ @$quotation[0]['destination_port'] }}" selected>
                            {{ @$quotation[0]['destination_port'] }}</option>
                    @else
                        <option selected disabled>Destination Ports</option>
                    @endif
                    @foreach ($destination_port as $ports)
                        <option value="{{ @$ports['port'] }}">{{ @$ports['port'] }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control-sm border border-0 rounded-pill bg col-6"
                    name="destination_port" id="destination_port"> --}}
            </div>
        </div>
        <div class="col-4 d-block">
            <div>
                <label for="valid_from" class="text-info font-style">Valid From</label>
            </div>
            <div>
                <input type="date" class="form-control-sm border border-0 rounded-pill bg col-6" name="valid_from"
                    id="valid_from" value="{{ @$quotation[0]['valid_from'] }}">
            </div>
        </div>
        <div class="col-4 d-block">
            <div>
                <label for="valid_till" class="text-info font-style">Valid Till</label>
            </div>
            <div>
                <input type="date" class="form-control-sm border border-0 rounded-pill bg col-6" name="valid_till"
                    id="valid_till" value="{{ @$quotation[0]['valid_till'] }}">
                <div class="btn ml-5" onclick="Addnew_quotation()" style="background: #1c5f91;color:white;">+</div>
            </div>
        </div>

    </div>
    <div class="d-flex">
        <div class="col-12 px-0">
            <div class="d-flex justify-content-around p-2 col-12">
                <div class="col-2">
                    <div>
                        <label for="container_size" class="text-info font-style">Container Size</label>
                    </div>
                    <div>
                        <select name="container_size[]" id="container_size"
                            class="form-control-sm border border-0 rounded-pill bg col-10">
                            @if (@$quotation[0]['container_size'])
                                <option value="{{ @$quotation[0]['container_size'] }}" selected>
                                    {{ @$quotation[0]['container_size'] }}</option>
                            @else
                                <option selected value="null">Select Container Size</option>
                            @endif
                            @foreach ($container_size as $csize)
                                <option value="{{ @$csize['name'] }}">{{ @$csize['name'] }}</option>
                            @endforeach
                            {{-- <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option> --}}
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div>
                        <label for="vehicle" class="text-info font-style">Vehicle</label>
                    </div>
                    <div>
                        <select name="vehicle[]" id="vehicle"
                            class="form-control-sm border border-0 rounded-pill bg col-10">
                            @if (@$quotation[0]['vehicle'])
                                <option value="{{ @$quotation[0]['vehicle'] }}" selected>
                                    {{ @$quotation[0]['vehicle'] }}</option>
                            @else
                                <option selected value="null">Select Vehicles</option>
                            @endif
                            @foreach ($no_of_vehicle as $no)
                                <option value="{{ @$no['name'] }}">{{ $no['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div>
                        <label for="loading_port" class="text-info font-style">Loading Port</label>
                    </div>
                    <div>
                        <select name="loading_port[]" id="loading_port"
                            class="form-control-sm border border-0 rounded-pill bg col-10">
                            @if (@$quotation[0]['loading_port'])
                                <option value="{{ @$quotation[0]['loading_port'] }}" selected>
                                    {{ @$quotation[0]['loading_port'] }}</option>
                            @else
                                <option selected value="null">Select Loading Port</option>
                            @endif
                            @foreach ($loading_ports as $lports)
                                <option value="{{ @$lports['port'] }}">{{ @$lports['port'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div>
                        <label for="shipping_line" class="text-info font-style">Shipping Line</label>
                    </div>
                    <div>
                        <select name="shipping_line[]" id="shipping_line"
                            class="form-control-sm border border-0 rounded-pill bg col-10">
                            @if (@$quotation[0]['shipping_line'])
                                <option value="{{ @$quotation[0]['shipping_line'] }}" selected>
                                    {{ @$quotation[0]['shipping_line'] }}</option>
                            @else
                                <option selected value="null">Select Shipping Line</option>
                            @endif
                            @foreach ($shipping_lines as $Sline)
                                <option value="{{ @$Sline['name'] }}">{{ @$Sline['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-2">
                    <div>
                        <label for="default" class="text-info font-style">Default</label>
                    </div>
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-10"
                            name="default[]" id="default" value="{{ @$quotation[0]['default'] }}">
                    </div>
                </div>
                <div class="col-2">
                    <div>
                        <label for="special_rate" class="text-info font-style">Special Rate</label>
                    </div>
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-10"
                            name="special_rate[]" id="special_rate" value="{{ @$quotation[0]['special_rate'] }}">
                    </div>
                </div>

            </div>
        </div>

    </div>
    @if (@$quotation[0]['id'])
        @php
            $i = 0;
        @endphp
    @else
        @php
            $i = 1;
        @endphp
    @endif
    <div class="d-flex py-2">
        <div class="col-12 px-0" id="addnew_quotation">
            @if (@$quotation[0]['id'])
            @for ($i = 1; $i < count(@$quotation); $i++)
            <div class="d-flex py-2">
                <div class="col-12 px-0">
                    <div class="d-flex justify-content-around p-2 col-12">
                        <div class="col-2">
                            <div>
                                <select name="container_size[]" id="container_size"
                                    class="form-control-sm border border-0 rounded-pill bg col-10">
                                    @if (@$quotation[$i]['container_size'] != 'null')
                                        <option value="{{ @$quotation[$i]['container_size'] }}" selected>
                                            {{ @$quotation[$i]['container_size'] }}</option>
                                    @elseif (@$quotation[$i]['container_size'] == 'null')
                                        <option selected value="null">Select</option>
                                    @else
                                        <option selected value="null">Select</option>
                                    @endif
                                    @foreach ($container_size as $csize)
                                        <option value="{{ @$csize['name'] }}">{{ @$csize['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">

                            <div>
                                <select name="vehicle[]" id="vehicle"
                                    class="form-control-sm border border-0 rounded-pill bg col-10">
                                    @if (@$quotation[$i]['vehicle'] != 'null')
                                        <option value="{{ @$quotation[$i]['vehicle'] }}" selected>
                                            {{ @$quotation[$i]['vehicle'] }}</option>
                                    @elseif (@$quotation[$i]['vehicle'] == 'null')
                                        <option selected value="null">Select</option>
                                    @else
                                        <option selected value="null">Select</option>
                                    @endif
                                    @foreach ($no_of_vehicle as $no)
                                        <option value="{{ @$no['name'] }}">{{ $no['name'] }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div>
                                <select name="loading_port[]" id="loading_port"
                                    class="form-control-sm border border-0 rounded-pill bg col-10">
                                    @if (@$quotation[$i]['loading_port'] != 'null')
                                        <option value="{{ @$quotation[$i]['loading_port'] }}" selected>
                                            {{ @$quotation[$i]['loading_port'] }}</option>
                                    @elseif (@$quotation[$i]['loading_port'] == 'null')
                                        <option selected value="null">Select</option>
                                    @else
                                        <option selected value="null">Select</option>
                                    @endif
                                    @foreach ($loading_ports as $lports)
                                        <option value="{{ @$lports['port'] }}">{{ @$lports['port'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">

                            <div>
                                <select name="shipping_line[]" id="shipping_line"
                                    class="form-control-sm border border-0 rounded-pill bg col-10">
                                    @if (@$quotation[$i]['shipping_line'] != 'null')
                                        <option value="{{ @$quotation[$i]['shipping_line'] }}" selected>
                                            {{ @$quotation[$i]['shipping_line'] }}</option>
                                    @elseif (@$quotation[$i]['shipping_line'] == 'null')
                                        <option selected value="null">Select</option>
                                    @else
                                        <option selected value="null">Select</option>
                                    @endif
                                    @foreach ($shipping_lines as $Sline)
                                        <option value="{{ @$Sline['name'] }}">{{ @$Sline['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">

                            <div>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-10"
                                    name="default[]" id="default" value="{{ @$quotation[$i]['default'] }}">
                            </div>
                        </div>
                        <div class="col-2">

                            <div>
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-10"
                                    name="special_rate[]" id="special_rate"
                                    value="{{ @$quotation[$i]['special_rate'] }}">
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        @endfor
            @else
            @endif
        </div>
    </div>


    <input type="hidden" class="form-control-sm border border-0 rounded-pill bg col-6" name="email"
        id="email" value="{{ @$module['email'] }}" readonly />
    <div class="d-flex justify-content-between">

        <div class="col-6 py-2 px-5">
            <button type="button" class="btn next-style text-white col-3 py-1 mx-2" onclick="hidemodal()"
                style="padding: 4px;" data-next="shipper_customer_tab">
                <div class="unskew">Cancel</div>
            </button>
        </div>

        <div class="col-6 py-2 px-5 d-flex justify-content-end">

            <button type="button" class="btn next-style text-white col-3 py-1 mx-2" onclick="createForm(this.id)"
                id="quotation_customer" name="{{ $module['button'] }}" style="padding: 4px;"
                data-next="shipper_customer_tab">
                <div class="unskew">Finish</div>
            </button>
        </div>




    </div>
</form>
