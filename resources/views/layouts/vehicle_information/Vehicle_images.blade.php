<style>
@media screen and (min-width: 1600px) {
        .img_fluid {
            height: 300px!important;
            
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 22px!important;
    margin-left: 33px!important;
}
.icon{
background-color: #e93f7800!important;
}
}
@media screen and (min-width: 1800px) {
        .img_fluid {
            height: 350px!important;
            
  }
  .item_1{
    width: 166px!important;
    height: 112px!important;
    
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 30px!important;
    margin-left: 31px!important;
}

  .changeImages{
    left:-2%!important;
  }
}
@media screen and (min-width: 1920px) {
        .img_fluid {
            height: 350px!important;
            
  }
  .item_1{
    width: 182px!important;
    height: 133px!important;
   
  }
  .changeImages{
    left:-2%!important;
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 22px!important;
    margin-left: 40px!important;
}


@media screen and (min-width: 2160px) {
        .img_fluid {
            height: 350px!important;
            
  }
  .item_1{
    width: 290px!important;
    height: 133px!important;
   
  }
  .changeImages{
    left:-2%!important;
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 40px!important;
    margin-left: 61px!important;
}

}
@media screen and (min-width: 2000px) {
        .img_fluid {
            height: 400px!important;
            
  }
}
@media screen and (min-width: 2200px) {
        .img_fluid {
            height: 450px!important;
            
  }
}
@media screen and (min-width: 2880px) {
        .img_fluid {
            height: 500px!important;
            
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 59px!important;
    margin-left: 116px!important;
}

}
@media screen and (min-width: 4320px) {
        .img_fluid {
            height: 850px!important;
            
  }
  .item_1{
    width: 446px!important;
    height: 262px!important;
   
  }
  .changeImages{
    left:-2%!important;
  }
}
}
@media screen and (min-width: 5760px) {
        .img_fluid {
            height: 1300px!important;
            
  }
}
@media screen and (min-width: 5760px) {
        .img_fluid {
            height: 1300px!important;
            
  }
}

</style>
@if(@$images)
@foreach(@$images as $img)  
<img src="{{asset($img['name'])}}" alt=""class="item_1" style="width:120px;height:80px;" onclick="showAsMainImage(this.src)">
@endforeach
@endif