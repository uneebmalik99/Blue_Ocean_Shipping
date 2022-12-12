@if(count($port) > 0)
<option selected disabled>Select Ports</option>
 @foreach ($port as $states)
 <option value="{{ $states['port'] }}">
    {{ $states['port'] }}</option>
 @endforeach
 @else
 <option selected disabled>No Port Found</option>
 @endif
