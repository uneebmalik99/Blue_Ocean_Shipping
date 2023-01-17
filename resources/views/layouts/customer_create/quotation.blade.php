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
            <div class="d-flex justify-content-around p-2 col-12 parent_quotation">
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
                    <div class="d-flex">
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-10"
                            name="special_rate[]" id="special_rate" value="{{ @$quotation[0]['special_rate'] }}">
                            @if (@$quotation)
                            <div style="margin-left:4px!important;">
                                <button class="delete-button" type="button">
                                    <a id="{{ @$quotation[0]['id'] }}" onclick="delete_quotation(this.id)">
                                        <svg width="14" height="13" viewBox="0 0 12 12"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757" />
                                        </svg>

                                    </a>
                                </button>
                            </div>
                            @endif
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
                    <div class="d-flex justify-content-around p-2 col-12 parent_quotation{{ @$quotation[$i]['id'] }}">
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

                            <div class="d-flex">
                                <input type="text" class="form-control-sm border border-0 rounded-pill bg col-10"
                                    name="special_rate[]" id="special_rate"
                                    value="{{ @$quotation[$i]['special_rate'] }}">


                                    <div style="margin-left:4px!important;">
                                        <button class="delete-button" type="button">
                                            <a id="{{ @$quotation[$i]['id'] }}" onclick="delete_quotation_loop(this.id)">
                                                <svg width="14" height="13" viewBox="0 0 12 12"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                        fill="#EF5757" />
                                                </svg>
        
                                            </a>
                                        </button>
                                    </div>
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
