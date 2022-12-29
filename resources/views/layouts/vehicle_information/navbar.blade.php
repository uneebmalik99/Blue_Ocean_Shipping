<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="row">
    <div class="col-12 d-flex information_buttons p-0">
        <button class="active_information_button form-control vehicle_information_tab col-3" tab="general"
            id="{{ @$vehicle['id'] }}">
            <div class="unskew">  <i class="fa fa-folder"></i> General</div>
        </button>
        {{-- <button class="form-control vehicle_information_tab col-2" tab="inspection" id="{{ @$vehicle['id'] }}">
            <div class="unskew">Inspection</div>
        </button> --}}
        {{-- <button class="form-control vehicle_information_tab col-2" tab="services" id="{{ @$vehicle['id'] }}">
            <div class="unskew">Services</div>
        </button> --}}
        <button class="form-control vehicle_information_tab col-2" tab="documents" id="{{ @$vehicle['id'] }}">
            <div class="unskew"> <i class="fa fa-file"></i> Documents</div>
        </button>
        {{-- <button class="form-control vehicle_information_tab col-2" tab="notes" id="{{ @$vehicle['id'] }}">
            <div class="unskew">Notes</div>
        </button> --}}
    </div>
</div>
