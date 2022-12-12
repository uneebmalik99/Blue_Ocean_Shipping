
<div>
    <div>
        <div class="bg-white">
            
            <div class="mt-3">
                
                <form method="POST" class="col-12" id="invoice_shipment_form" enctype="multipart/form-data">
                    @csrf
                    
                    @if(@$shipment[0]['id'])
                    <input type="hidden" id="id" name="id" value="{{@$shipment[0]['id']}}">
                    @endif
                    
                    <div class="d-xl-flex border-shipment">
                        <div class="col-12 d-lg-flex p-0">
                            <div class="col-lg-12 col-12 p-0">
                                <div class="col-12 p-0">
                                    
                                    <div class="row">

                                        <div class="tab_card col-6">
                                            <div class="col-12 py-3">
                                                <div class="text-color" style="cursor: pointer;" id="invoice_calendar"
                                                    onclick="slide(this.id)">
                                                    <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <span class="p-2">Invoice Detail Information</span>
                                                </div>
                                            </div>
                                            <div id="container_ar_no">
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="ar_number" class="col-6 px-0 font-size font-bold">Container AR Number <span
                                                                class="text-danger">*</span></label>
                                                        <div
                                                            class="d-flex align-items-center d-flex align-items-center form-control-sm border border-0 rounded-pill bg col-6">
                                                            
                                                            <input type="text" class="col-8 general_input" name="ar_number" id="ar_number"
                                                                value="{{ @$invoice[0]['ar_number'] }}">
                    
                                                            <a class="prefix text-dark px-2 getinf"
                                                                style="text-decoration: none!important;
                                                                 background:rgb(175, 197, 234);border-radius:20px;cursor:pointer"
                                                                id="getshipmentinfo" onclick="getshipmentInfo(this.id)">
                                                                <span class="text-white px-1" id="getshippmentinfo">GetInfo</span>
                                                            </a>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="customer_email"
                                                            class="col-6 px-0 font-size font-bold">Company Name</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="company_name" id="company_name" value="{{ @$invoice[0]['company_name'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="port_of_loading"
                                                            class="col-6 px-0 font-size font-bold">Port Of Loading</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="port_of_loading" id="port_of_loading" value="{{ @$invoice[0]['port_of_loading'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="destination_port"
                                                            class="col-6 px-0 font-size font-bold">Port Destination</label>
    
                                                            <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="destination_port" id="destination_port" value="{{ @$invoice[0]['destination_port'] }}">   
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="container_size"
                                                            class="col-6 px-0 font-size font-bold">Container Size(40HC)</label>
    
                                                            <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="container_size" id="container_size" value="{{ @$invoice[0]['container_size'] }}">   
                                                        {{-- <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="shipment_type" id="shipment_type"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="tab_card my-3 col-6">
                                            <div class="col-12 py-3">
                                                <div class="text-color" style="cursor: pointer;" id="invoice_calendar"
                                                    onclick="slide(this.id)">
                                                    <svg width="8" height="6" viewBox="0 0 8 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1.36328L4 4.82148L7 1.36328" stroke="#FF8514"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <span class="p-2">Invoice Information</span>
                                                </div>
                                            </div>
                                            <div id="invoice_no">
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="invoice_no"
                                                            class="col-6 px-0 font-size font-bold">Invoice#</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="invoice_no" id="invoice_no" value="{{ @$invoice[0]['invoice_no'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="invoice_date" class="col-6 px-0 font-size font-bold">
                                                            Invoice Date</label>
                                                        <input type="date"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="invoice_date" id="invoice_date" value="{{ @$invoice[0]['invoice_date'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="Invoice Amount"
                                                            class="col-6 px-0 font-size font-bold">Invoice Amount</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="invoice_amount" id="invoice_amount" value="{{ @$invoice[0]['invoice_amount'] }}">
    
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="invoice_date"
                                                            class="col-6 px-0 font-size font-bold">Due Date</label>
                                                        <input type="date"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="due_date" id="due_date" value="{{ @$invoice[0]['due_date'] }}">
    
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="payment_date"
                                                            class="col-6 px-0 font-size font-bold">Payment Date</label>
                                                        <input type="date"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="payment_date" id="payment_date" value="{{ @$invoice[0]['payment_date'] }}">
    
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="received_amount"
                                                            class="col-6 px-0 font-size font-bold">Recieved Amount</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="received_amount" id="received_amount" value="{{ @$invoice[0]['received_amount'] }}" onchange="findbalance()" >
    
                                                    </div>
                                                </div>
                                                <div class="col-12 py-2">
                                                    <div class="d-flex align-items-center">
                                                        <label for="balance"
                                                            class="col-6 px-0 font-size font-bold">Balance</label>
                                                        <input type="text"
                                                            class="form-control-sm border border-0 rounded-pill bg col-6"
                                                            name="balance" id="balance" value="">
    
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                <label for="invoice_document" style="cursor: pointer;
                                
                                padding: 9px 96px;">
                                    
                                    <img src="{{asset('images/file.png')}}" alt="" style="width: 5rem;">
    
                                    <input id="invoice_document" class="invoice_document" type="file" name="invoice_document"/>
                                    <br/>
                                    <div class="imageName">
    
                                    </div>
                                    {{-- <span id="imageName"></span> --}}
                                    <br>
                                    <p>Upload Invoice</p> <br/>
                                  </label>
                                </div>
                            </div>
                        
                        </div>
                    
                    
                    </div>
                    
                    <div class="mt-2 bg-light" id="shipment_body">
                        <table id="" class="table inovice_table_vehicle" style="width: 100%important;">
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
                            <tbody id="inovice_shipment_table">
                               
                            </tbody>
                        </table>


                        
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
                                <input type="hidden" class="next_tab" id="invoice">
                                <button type="button" class="btn next-style text-white col-12 py-1"
                                    onclick="create_invoice_form()" id="general_invoice"
                                    style="cursor: pointer;" tab="attachments_invoice_tab">
                                    <div class="unskew">Save</div>
                                </button>
                            </div>
                           
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<script>
    let input = document.getElementById("invoice_document");
    let imageName = document.getElementById("imageName");
    input.addEventListener("change", ()=>{
        let inputImage = document.querySelector("#invoice_document").files[0];
        // console.log(inputImage);
        imageName.innerText = inputImage.name;
    })
</script>
<script>
    function findbalance() {
        invoice_amount = $('#invoice_amount').val();
        received_amount = $('#received_amount').val();
        var balance = Math.abs(Math.floor(invoice_amount)-Math.floor(received_amount))
        
        $('#balance').val(balance);
    }
</script>
