@if(count($state) > 0)
<option selected disabled>Select State</option>
 @foreach ($state as $states)
     <option value="{{ @$states['state'] }}">{{ @$states['state'] }}</option>
 @endforeach
 @else
 <option selected disabled>No State Found</option>
 @endif
