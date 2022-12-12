

<div class="card user-card rounded mt-3">
    <div class="px-3 d-flex justify-cotent center">
        <h6 class="text-muted"><b>Consignee Information</b></h6>
    </div>
    <div class="col-12 mt-2">
        <div class="text-muted text-left">
            <b>Consignee</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="consignee" value="same as billing party"
                    {{ @$shipper[0]['consignee'] == 'same as billing party' ? 'checked' : '' }}>
                <span class="px-2">Same as Billing Party</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="consignee" value="new consignee"
                    {{ @$shipper[0]['consignee'] == 'new consignee' ? 'checked' : '' }}>
                <span class="px-2"> Add New Consginee</span>
            </div>
        </div>

        <div class="text-muted text-left">
            <b>Consolidate</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="consolidate" value="yes"
                    {{ @$shipper[0]['consolidate'] == 'yes' ? 'checked' : '' }}>
                <span class="px-2">Yes</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="consolidate" value="no"
                    {{ @$shipper[0]['consolidate'] == 'no' ? 'checked' : '' }}>
                <span class="px-2"> No</span>
            </div>
        </div>

        <div class="text-muted text-left">
            <b>Return the original shipping document to</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="return" value="send back"
                    {{ @$shipper[0]['original_shipping_documents'] == 'send back' ? 'checked' : '' }}>
                <span class="px-2">Send back to me</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="return" value="pick up from office"
                    {{ @$shipper[0]['original_shipping_documents'] == 'pick up from office' ? 'checked' : '' }}>
                <span class="px-2"> Pick up from office</span>
            </div>
        </div>

        <div class="text-muted text-left">
            <b>Insurance</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="insurance" value="yes"
                    {{ @$shipper[0]['insurance'] == 'yes' ? 'checked' : '' }}>
                <span class="px-2">Yes</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="insurance" value="no"
                    {{ @$shipper[0]['insurance'] == 'no' ? 'checked' : '' }}>
                <span class="px-2">No</span>
            </div>
        </div>

        <div class="text-muted text-left">
            <b>Destination Port</b>
        </div>
        <div class="d-flex justify-content-start py-3">
            <div class="text-muted d-flex"><input type="radio" name="destination_port" value="single"
                    {{ @$shipper[0]['destination_port'] == 'single' ? 'checked' : '' }}>
                <span class="px-2">Single</span>
            </div>
            <div class="text-muted d-flex px-2"><input type="radio" name="destination_port" value="multiple"
                    {{ @$shipper[0]['destination_port'] == 'multiple' ? 'checked' : '' }}>
                <span class="px-2">Multiple</span>
            </div>
        </div>
        <div class="text-muted"><input class="form-control w-25 border border-primary rounded" type="text"
                name="port"></div>
        <div class="d-flex justify-content-start mt-2">
            <input class="btn btn-info rounded" type="submit" value="Submit">
        </div>
    </div>
</div>
