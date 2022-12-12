@if(count($terminal) > 0)
<option selected disabled>Select Terminals</option>
 @foreach ($terminal as $states)
 <option value="{{ $states['terminal'] }}">
    {{ $states['terminal'] }}</option>
 @endforeach
 @else
 <option selected disabled>No Port Found</option>
 @endif
