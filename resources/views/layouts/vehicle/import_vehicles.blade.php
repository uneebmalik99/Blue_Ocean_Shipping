<form action="{{ route('vehicle.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="import_document" id="import_document" required>

    <div class="col-12 d-flex justify-content-end">
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn col-1 next-style text-white col-4" id="general_shipment"
                style="cursor: pointer;">
                <div class="unskew">Upload</div>
            </button>
        </div>
    </div>
</form>
