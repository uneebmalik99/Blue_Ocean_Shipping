
<button
    style="border:none;
                    border-radius: 4px;color:white;margin-right: 6px;font-size: 12px;">
    <div style="padding:1px 4px">
        <a href="{{ route('shipment_detail.shipment_Landing_pdf', @$row['id']) }}"
            style="color:white;text-decoration:none;font-size: 12px;" target="_blank"><i class="fa-solid fa-file-pdf" style="color:red;"></i></a>
    </div>
</button>
