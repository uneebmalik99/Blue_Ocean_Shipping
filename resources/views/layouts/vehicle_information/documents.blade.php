<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


.imagemodal {
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

.imagemodal-content{
margin: auto;
display: block;
    position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}


.imagemodal-hover-opacity {
opacity:1;
filter:alpha(opacity=100);
-webkit-backface-visibility:hidden
}

.imagemodal-hover-opacity:hover {
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



    .item_1 {
        transition: transform .2s;
        box-sizing: border-box;
    }

    .item_1:hover {
        transform: scale(1.5);
        border-radius: 10px !important;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .bottom_button {
        position: absolute;
        top: 85%;
        left: 85%;
        font-size: 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        text-decoration: none !important;
    }

    .left_button {
        position: absolute;
        top: 6px;
        left: 16px;
        font-size: 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        text-decoration: none !important;
    }
/* 
    @media only screen and (max-width: 425px) {
        .bottom_button {
            position: absolute;
            top: 72%;
            left: 75%;
            font-size: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            text-decoration: none !important;
        }}
        @media screen and (min-width: 1600px) {
        .img_fluid {
            height: 300px!important;
            
  }
  .material-icons {
    background-color: #65686c;
    color: white;
    border-radius: inherit;
    margin-top: 16px!important;
    margin-left: 9px!important;
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
    margin-top: 23px!important;
    margin-left: 23px!important;
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
    margin-left: 28px!important;
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
    margin-top: 30px!important;
    margin-left: 44px!important;
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
    margin-top: 41px!important;
    margin-left: 87px!important;
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
} */

        .left_button {
    position: absolute;
    top: 0px!important;
    left: 0px!important;
    font-size: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
    text-decoration: none !important;
}



    img {
        vertical-align: middle;
        border-style: none;
        width: 100%;
    }

    #main_image_box:hover {
        opacity: 0.7;
    }



    * {
        box-sizing: border-box;
    }

    .full-screen:before {
        width: .333em;
        height: 1em;
        left: .233em;
        top: -.1em;
    }

    .full-screen:after {
        width: 1em;
        height: .333em;
        top: .233em;
        left: -.1em;
    }

    .row>.column {
        padding: 0 8px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .column {
        float: left;
        width: 25%;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: black;
    }

    /* Modal Content */
    .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        width: 90%;
        max-width: 800px;
    }

    /* The Close Button */
    .close {
        color: red !important;
        position: absolute;
        top: 10px;
        right: 25px;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red !important;
        text-decoration: none;
        cursor: pointer;
    }

    .mySlides {
        display: none;
    }

    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 33%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    .prev {
        left: -8%;
        border-radius: 3px 0 0 3px;
        color: white;
    }

    /* Position the "next button" to the right */
    .next {
        right: -8%;
        border-radius: 3px 0 0 3px;
        color: white;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

   

    .caption-container {
        text-align: center;
        background-color: black;
        padding: 2px 16px;
        color: white;
    }

    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    img.hover-shadow {
        transition: 0.3s;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .showMainImagemodal {
        width: 100%;
    }

    .image_button {
        background-color: 337fb8;
    }

    element.style {}

    a:not([href]):not([tabindex]) {
        /* color: inherit; */
        text-decoration: none;
        color: white;
    }


</style>
<div class="row my-5">
    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
        <div class="information_second_div">
            <div class="row" style="padding-bottom:20px">
                <div class="col-sm-12 col-md-4 col-lg-6 mb-4">
                    <div class="row">
                        <div class="col-12">
                            <h4>Documents</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <div class="d-flex justify-content-between "
                                style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;  ">
                                <span class="infromation_mainText ">Title</span>
                                <span class="information_text ">{{ @$vehicle['title'] }}</span>
                            </div>
                            {{-- <div class="d-flex justify-content-between " style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;  ">
                                <span class="infromation_mainText ">Title Location</span>
                                <span class="information_text ">{{@$vehicle['title']}}</span>
                            </div> --}}
                            <div class="d-flex justify-content-between "
                                style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;  ">
                                <span class="infromation_mainText ">State</span>
                                <span class="information_text ">{{ @$vehicle['title_state'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between "
                                style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;  ">
                                <span class="infromation_mainText ">Title Type</span>
                                <span class="information_text ">{{ @$vehicle['title_type'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between "
                                style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;  ">
                                <span class="infromation_mainText ">Title No</span>
                                <span class="information_text ">{{ @$vehicle['title_number'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between "
                                style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;  ">
                                <span class="infromation_mainText ">Recive Date</span>
                                <span class="information_text ">{{ @$vehicle['title_rec_date'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between "
                                style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;  ">
                                <span class="infromation_mainText ">Bill of Sale</span>
                                @if (@$vehicle['billofsales'])
                                    <span class="information_text">Yes</span>
                                @else
                                    <span class="information_text">No</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Attachment List</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if (@$vehicle['billofsales'] || @$vehicle['originaltitles'] || @$vehicle['auction_invoice'] || @$vehicle['auction_copy'])
                                <div class="d-flex justify-content-between "
                                    style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px; ">
                                    <div class="w-100 ml-4">
                                        <table class="table w-100" style="color:#6D8DA6;font-size:13px;font-weight:500">
                                            <thead>
                                                <td>Type</td>
                                                <td>Name</td>
                                                <td class="text-center">Documents</td>
                                            </thead>
                                            <tbody>
                                                @if(@$vehicle['billofsales'])
                                                <tr>
                                                    <td>Bill Of Sale</td>
                                                    <td>{{ @$vehicle['billofsales'][0]['thumbnail'] }}</td>
                                                    <td
                                                        style="text-align: center;
                                                width: 33%;">

                                                        <button
                                                            style="background: #3e5871;color:white;border-radius:5px;outline:none;border:none;padding: 0 5px;">
                                                            <a href="{{ asset(@$vehicle['billofsales'][0]['name']) }}"
                                                                download="{{ @$vehicle['billofsales'][0]['thumbnail'] }}"
                                                                target="_blank"
                                                                style="color:white;text-decoration:none;border:none">download</a>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endif
                                                @if(@$vehicle['originaltitles'])
                                                <tr>
                                                    <td>Original Title</td>
                                                    <td>{{ @$vehicle['originaltitles'][0]['thumbnail'] }}</td>
                                                    <td
                                                        style="text-align: center;
                                                    width: 33%;">
                                                        <button
                                                            style="background: #3e5871;color:white;border-radius:5px;outline:none;border:none;padding: 0 5px;">
                                                            <a href="{{ asset(@$vehicle['originaltitles'][0]['name']) }}"
                                                                download="{{ @$vehicle['originaltitles'][0]['thumbnail'] }}"
                                                                target="_blank"
                                                                style="color:white;text-decoration:none;border:none">download</a>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endif
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="text-center py-4 mb-2"
                                    style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;color:gray;">
                                    {{-- {{dd(@$vehicle)}} --}}
                                    No Found
                                </div>
                            @endif
                            <div class="d-flex justify-content-between "
                                style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;  ">
                                <span class="infromation_mainText ml-4">Shipper</span>
                                <span class="information_text ">{{ @$vehicle['shipper_name'] }}</span>
                                {{-- <span class="information_text mr-5">
                                    <button
                                        style="background:#3e5871;color:white;border-radius:5px;outline:none;border:none;">Details</button>
                                </span> --}}
                            </div>
                            <div class="d-flex justify-content-between "
                                style="border: 1px solid rgba(26, 88, 133, 0.17); border-radius: 10px;width: 90%;margin:4px auto;padding:5px;  ">
                                <span class="infromation_mainText ml-4">Consignee</span>
                                <span class="information_text ">24k23j2</span>
                                {{-- <span class="information_text mr-5">
                                    <button
                                        style="background:#3e5871;color:white;border-radius:5px;outline:none;border:none;">Details</button>
                                </span> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 mb-5 mt-5 mx-auto">
                    <div class="information_gallary" style="width:100%">
                        <div class="gallary_header d-flex">
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <div class="d-flex " style="width:100%">
                                            <button class="img_active_button img_btn col-sm-4 col-md-4 col-lg-4 mb-3"
                                            onclick="changeImages(this.id)" tab=" {{ @$vehicle['id'] }}"
                                            id="warehouse_images"
                                            style="color:black;background-color:337fb8;font-size: 12px !important;border-top-left-radius: 8px;font-weight:600;height:41px;">Ware
                                            House Image
                                        </button>
                                    <button class="image_button img_btn col-sm-4 col-md-4 col-lg-4 mb-4"
                                        style="color:black;background-color: #337fb8;font-size:12px!important; border:#e9e9e9;font-weight:600;height:41px;"
                                        id="vehicle_images" onclick="changeImages(this.id)"
                                        tab="{{ @$vehicle['id'] }}">
                                        Pickup Images
                                        <button class="image_button  img_btn col-sm-12 col-md-4 col-lg-4 mb-4"
                                            style="color:black;;font-size:12px!important;font-weight:600;margin-right:-24px!important;height:41px;border-top-right-radius:10px!important;"
                                            onclick="changeImages(this.id)" tab=" {{ @$vehicle['id'] }}"
                                            id="auction_images">
                                            Auction Image
                                        </button>
                                        </div>
                                    </div>
                                </div>
                             

                                <div class="image_section changeImages col-12 col-sm-12 col-md-12 col-lg-12 order-xl-12  mx-auto" style=" margin-top:1px; " >
                                   
                                       
                                    @if (@$vehicle['pickupimages'])
                                    @foreach (@$vehicle['warehouse_image'] as $img)
                                        <img src="{{ asset($img['name']) }}" alt="" class=""
                                            class="showMainImage"
                                            style="width:24%;height:auto%;margin-top:4px;"
                                            onclick="onClick(this)" class="modal-hover-opacity"class="hover-shadow cursor">
                                    @endforeach
                                    @else
                                    <h6 class="text-center mt-5 w-100" style="color:gray">No Image Found</h6>
                                    @endif
                              
                                </div>

                                
                            </div>
                        </div>
                    </div>
                    @if (@$vehicle['warehouse_image'])
                        <div class="row mt-4 showhide">
                            <div class="col-12 d-flex justify-content-center ">
                                <a id="warehouse_images" onclick="download_all(this.id)" class="downloadVehicles_zip">
                                    <button
                                        style="background: #3e5871;cursor:pointer; border-radius: 6px;border:none;color:white;transform: skew(-30deg);">
                                        <div style="transform: skew(30deg);padding:1px 10px;font-size: 13px;">
                                            <i class="fa fa-download"></i> Download Images in Zip
                                        </div>
                                    </button>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

        </div>

    </div>
</div>


<div id="modal01" class="imagemodal" onclick="this.style.display='none'">
    <span class="close vehicle_close cursor" onclick="closeModal()" style="margin-top: 50px">&times;</span>

    <div class="imagemodal-content">
      <img id="img01" style="max-width:100%">
    </div>
  </div>



<div id="myModal" class="modal col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12"
    style="color:red;z-index:999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999;background-color:#000000db">
    
    <div class="modal-content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12 "
                style="width:100%!important;height:100%!important" id="slider_image">
    
                <div class="mySlides" id="slider_main">
    
                    <img src="{{ asset(@$vehicle['warehouse_image'][0]['name']) }}" alt=""
                        style="width:100%!important;height: 100%!important;">
    
                </div>
                @if (@$vehicle['warehouse_image'])
                    @foreach (@$vehicle['warehouse_image'] as $img)
                        <div
                            class="mySlides col-lg-12 col-md-12 col-xl-12 order-sm-12 col-12" style="left:-2%;width:80%!important">
                            <img src="{{ asset($img['name']) }}" alt=""
                                style="width:132%!important;height: 100%!important;"
                                onclick="openModal();currentSlide(1)">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>





        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="caption-container">
            <p id="caption"></p>
        </div>
        <div class="row" style="background-color: black;width: 798px;margin-left: 0px;" id="sliders_images">
            @if (@$vehicle['warehouse_image'])
                @foreach (@$vehicle['warehouse_image'] as $img)
                    <img src="{{ asset($img['name']) }}" alt=""class="item_4" class="showMainImage"
                        style="width:25%!important; " onclick="currentSlide(2)" class="hover-shadow cursor">
                @endforeach
            @endif


        </div>
    </div>
</div>
<script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}

    function closeModal() {
        document.getElementById("modal01").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
