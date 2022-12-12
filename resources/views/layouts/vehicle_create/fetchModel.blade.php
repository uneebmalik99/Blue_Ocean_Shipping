@if(count($state) > 0)
<option selected disabled>Select Model</option>
 @foreach ($state as $states)
     <option value="{{ @$states['model'] }}">{{ @$states['model'] }}</option>
 @endforeach
 @else
 <option selected disabled>No Model Found</option>
 @endif
