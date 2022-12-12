@if(@$images)
@foreach(@$images as $img)  
<img src="{{asset($img['name'])}}" alt=""class="item_1" style="width:120px!important;height:80px!important;" onclick="showAsMainImage(this.src)">
@endforeach
@endif