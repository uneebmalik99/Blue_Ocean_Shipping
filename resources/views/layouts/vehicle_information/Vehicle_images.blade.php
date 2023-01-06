<style>
  .modal {
z-index:1;
display:none;
padding-top:10px;
position:fixed;
left:0;
top:0;
width:100%;
height:100%;
overflow:auto;
background-color:rgb(0,0,0);
background-color:rgba(0,0,0,0.8)
}

.modal-content{
margin: auto;
display: block;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}


.modal-hover-opacity {
opacity:1;
filter:alpha(opacity=100);
-webkit-backface-visibility:hidden
}

.modal-hover-opacity:hover {
opacity:0.60;
filter:alpha(opacity=60);
-webkit-backface-visibility:hidden
}


.close {
text-decoration:none;float:right;font-size:24px;font-weight:bold;color:white
}
.container1 {
width:200px;
display:inline-block;
}

</style>
@if(@$images)
@foreach(@$images as $img)  
<img src="{{asset($img['name'])}}" alt=""class="item_1" style="width:24%!important;height:auto!important;"   onclick="onClick(this)" class="modal-hover-opacity"class="hover-shadow cursor">
@endforeach
@endif