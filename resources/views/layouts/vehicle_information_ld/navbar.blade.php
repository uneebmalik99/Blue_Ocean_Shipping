<div class="row">
    <div class="col-12 d-flex information_buttons p-0">
        <button class="active_information_button form-control vehicle_information_tab col-3" tab="general"
            id="{{ @$vehicle['id'] }}">
            <div class="unskew">General</div>
        </button>
        <button class="form-control vehicle_information_tab col-2" tab="inspection" id="{{ @$vehicle['id'] }}">
            <div class="unskew">Inspection</div>
        </button>
        <button class="form-control vehicle_information_tab col-2" tab="services" id="{{ @$vehicle['id'] }}">
            <div class="unskew">Services</div>
        </button>
        <button class="form-control vehicle_information_tab col-2" tab="documents" id="{{ @$vehicle['id'] }}">
            <div class="unskew">Documents</div>
        </button>
        <button class="form-control vehicle_information_tab col-2" tab="notes" id="{{ @$vehicle['id'] }}">
            <div class="unskew">Notes</div>
        </button>
    </div>
</div>
