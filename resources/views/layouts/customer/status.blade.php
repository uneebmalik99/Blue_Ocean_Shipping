@if ($row->status == '1')
    <div class="font-size badge badge-success py-1 px-2 rounded">
        <span>Active</span>
    </div>
@else
    <div class="ont-size badge badge-danger py-1 px-2 rounded">
        <span>In Active</span>
    </div>
@endif
