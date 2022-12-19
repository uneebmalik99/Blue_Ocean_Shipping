<div class="d-flex justify-content-around p-2 col-12">

                <div class="col-2">
                    <div>
                        <select name="container_size[]" id="container_size"
                            class="form-control-sm border border-0 rounded-pill bg col-10">
                            <option selected value="null">Select Container</option>
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
                            <option selected value="null">Select Vehicles</option>
                            @foreach ($no_of_vehicle as $no)
                             <option value="{{@$no['name']}}">{{$no['name']}}</option>
                             @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div>
                        <select name="loading_port[]" id="loading_port"
                            class="form-control-sm border border-0 rounded-pill bg col-10">
                            <option selected value="null">Select Loading Port</option>

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
                            <option selected value="null">Select Shipping line</option>

                            @foreach ($shipping_lines as $Sline)
                            <option value="{{ @$Sline['name'] }}">{{ @$Sline['name'] }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-10"
                            name="default[]" id="default">
                    </div>
                </div>
                <div class="col-2">
                    
                    <div>
                        <input type="text" class="form-control-sm border border-0 rounded-pill bg col-10"
                            name="special_rate[]" id="special_rate">
                    </div>
                </div>
            </div>