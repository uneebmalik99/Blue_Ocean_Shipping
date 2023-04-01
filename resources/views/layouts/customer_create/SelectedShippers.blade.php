@foreach ($shippers as $shipper)
    <option value="{{ @$shipper['id'] }}">
        {{ @$shipper['shipper_name'] }}</option>
@endforeach
