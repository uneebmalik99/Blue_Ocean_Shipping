@foreach ($vin_details[0]['pickupimages'] as $pickup_image)
    <img src="{{ asset($pickup_image['name']) }}" alt=""class="" width="25%" onclick="onClick(this)">
@endforeach
