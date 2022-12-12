@if(@$buyerids[0]['billings'][0]['buyer_number'])
<option selected disable>Select Buyer Id</option>
@foreach ($buyerids as $buyer)
@php
    $buyerid = explode(',', $buyer['billings'][0]['buyer_number']);
@endphp
@foreach ($buyerid as $ids)
<option value="{{$ids}}">
{{$ids}}</option>
@endforeach
@endforeach
@else
<option selected disabled>Not Id</option>
@endif