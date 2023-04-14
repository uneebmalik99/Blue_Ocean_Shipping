@foreach ($vin_details[0]['warehouse_image'] as $warehouse_images)
    <img src="{{ asset($warehouse_images['name']) }}" alt=""class="" width="25%"  onclick="onClick(this)">
@endforeach
