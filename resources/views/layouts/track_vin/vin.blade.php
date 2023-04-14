<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-j1+jMxGjKpB9kzJNLhSP23DdKjGUDfDoegez1PGQjFvZdYYtQs4sJ3k4GudPvTcTtT26bRyYwSxl4s3qnf0KjQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vin Details</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"
    integrity="sha512-XMVd28F1oH/O71fzwBnV7HucLxVwtxf26XV8P4wPk26EDxuGZ91N8bsOttmnomcCD3CS5ZMRL50H0GgOHvegtg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="http://cdn.jsdelivr.net/g/filesaver.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style>
        /* Container */
        header {
  background-color: #1F689E;
  color: #fff;
  text-align: center;
  padding: 20px;
  
}

.paragraph{
font-style: normal;
font-weight: 750 !important;
  font-size: 16px !important;
  padding-left: 10px;
  padding-right: 20px;
  margin-top: 8px;
  margin-bottom: 2px;
}

.paragraph1{
font-style: normal;
font-weight: 600 !important;
  font-size: 15px !important;
  padding-left: 10px;
  padding-right: 20px;
  margin-top: 8px;
  margin-bottom: 2px;


}

.button-container {
  font-size: 0;
  padding: 0%;
  

}

.button-container button {
  font-size: 16px;
  width: 33%;
  border: 0.5px solid #1F689E;
  background-color: white;
  color: #1F689E;
  border: none;
  padding: 12px 24px;
  font-size: 16px;
  cursor: pointer;
}

.button-container button.active {
  background: #1F689E;
  color: white;
}

.btn {
    background-color: white;
    color: #1F689E;
    border: 0.5px #1F689E;
    
    border: none;
    padding: 5px 5px;
    font-size: 25px;
    font-weight: 600;
    cursor: pointer;
    border-radius: 0 !important;
    

    
    
  }
  
  .active {
    background: #1F689E;
    color: white;
  }
  
  
  
  .image-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  overflow-y: scroll;
  max-height: 710px ;
}

.image-card {
  margin: 10px;
  padding: 10px;
  background-color: white;
  border: 1px solid #ddd;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  text-align: center;
}

.image-card img {
  margin: 10px;
  max-width: 100%;
  height: auto;
}

.vehicle_details.d-flex.text-color p {
  font-size: 15px;
  
}

h1 {
  margin: 0;
}
.left-top1 {
        /* background-color: #fff; */
        padding: 5px;
        
}
.left {
        background-color: #f5f5f5;
        display: flex;
        flex-direction: column;
        
        padding: 10px;
        height: 100%;
        
     border-radius: 10px;
      }
      
      /* styles for the two divs within the left portion */
      .left-top, .left-bottom {
        background-color: #fff;
        padding: 10px;
        /* margin-bottom: 20px; */
        

      }

      .vehicle_details {
  /* display: flex; */
  justify-content: space-between;
  align-items: center;
  margin-top: 5px;
  margin-bottom: 0px;
  
  border: 0.5px #1F689E;
}

.vehicle_details p:first-child {
  font-weight: 700;
  margin-right: 10px;
  
}

.col-lg-7.right {
    border: 0.4px solid #1F689E;
    padding: 0%;
    flex: 1;
    margin-left: 5%;
    border-radius: 10px;
    align-items: top;
    background-color: #E9E9E9D1;
}

.left-top .vehicle_details p:first-child {
  color: #1F689E;
  
}
.left-bottom .vehicle_details p:first-child {
  color: #1F689E;
}

.text-color {
    color: #1F689E; /* default text color */
    
    
}

.left-bottom .vehicle_details p:first-child {
  color: #f5f5f5;
}
.left-top {
  border: 0.5px solid #1F689E;
  border-radius: 10px;
}
.left-bottom {
  border: 0.5px solid #1F689E;
  border-radius: 10px;
}
</style>
    <style>
        /* .vehicle_details_box {
            background: rgba(243, 243, 243, 0.99);
            box-shadow: 3px 4px 3px rgba(22, 22, 22, 0.24);
            border-radius: 10px;
            /* width: 646px; 
        } */
        /* .vehicle_details_box p {
            font-family: 'Inter';
            font-style: normal;
            /* font-weight: 600; */
            /* font-size: 16px; */
            /* line-height: 27px; */
            /* identical to box height 
            padding: 15px 15px;
            color: #FFFFFF;
        } */
        /* .vehicle_details {
            background: rgba(170, 219, 255, 0.35);
            box-shadow: 0px 4px 4px rgba(71, 147, 204, 0.61);
            width: 80%;
            margin-left: 33px;
            height: 40px;
            border-radius: 10px;
            justify-content: space-between;
            margin-bottom: 12px;
        } */
        /* .vehicle_details p {
            color: black !important;
            font-size: 12px;
        } */
        .share_button {
            background: #1F689E;
border-radius: 10px;
outline: none;
border: none;
color: white;
padding: 8px 16px; /* Increased padding */
padding-bottom:15px ;
float: right;
margin-right: 7.5%;
margin-bottom: 25px;

font-size: 1.2rem; /* Increased font size */
            
        }
        .share_button1 {
            background: #1F689E;
border-radius: 10px;
outline: none;
border: none;
color: white;
padding: 8px 16px; /* Increased padding */
padding-bottom:15px ;
float: right;
margin-right: 2.5%;
margin-bottom: 25px;

font-size: 1.2rem; /* Increased font size */
            
        }

       
        .images_vehicle img {
            width: 19%;
            
            margin-bottom: 24px;
        }
        .images_vehicle img:hover {
            transform: scale(1.5);
        }
        .active {
            background: #1F689E;
            color: white;
            border: 0.5px #1F689E;
        }
        .imgmodal {
        z-index: 1;
        display: none;
        padding-top: 10px;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.8)
    }
    .imgmodal-content {
        margin: auto;
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .imgmodal-hover-opacity {
        opacity: 1;
        filter: alpha(opacity=100);
        -webkit-backface-visibility: hidden
    }
    .imgmodal-hover-opacity:hover {
        opacity: 0.60;
        filter: alpha(opacity=60);
        -webkit-backface-visibility: hidden
    }
    .close {
        text-decoration: none;
        float: right;
        font-size: 24px;
        font-weight: bold;
        color: white
    }
    .container1 {
        width: 200px;
        display: inline-block;
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
    @media screen and (max-width: 67%) {
        .material-icons {
            margin-left: 54px;
            margin-top: 33px;
        }
    }
    .bottom_button {
        position: absolute;
        top: 80%;
        left: 80%;
        font-size: 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        text-decoration: none !important;
    }
    .left_button {
        position: absolute;
        top: 20px;
        left: 20px;
        font-size: 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        text-decoration: none !important;
    }
    .body1{
        background-image: url("{{ asset('assets/images/back.png') }}");
        background-repeat: no-repeat;
        background-size: 100%;
    }
        
    </style>
</head>

<body class="body1" >
    <!-- content of the body goes here -->

  
    

    <?php
    $url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    ?>

<input type="hidden" value="{{ $url }}" id="textToCopy">

    <header style="margin-bottom: 30px; height: 100px;  overflow-x: hidden;">
        <img src="{{ asset('assets/images/headerlogo.png') }}" style="float: left; width: 98px; height: 58px;" alt="Logo">
            <h1 style="margin-top: 10px; font-size: 40px; font-weight: 800;" >Track VIN</h1>
    </header>
    

    <button class="share_button" style="margin-bottom: 10px;" onclick="copyToClipboard()"><svg width="25"
        height="25" style="margin-right: 10px;" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg" >
        <path
            d="M6.5 9.16683C6.15278 9.16683 5.85764 9.0453 5.61458 8.80225C5.37153 8.55919 5.25 8.26405 5.25 7.91683C5.25 7.86822 5.25347 7.8178 5.26042 7.76558C5.26736 7.71336 5.27778 7.66655 5.29167 7.62516L2.35417 5.91683C2.23611 6.021 2.10417 6.10266 1.95833 6.16183C1.8125 6.221 1.65972 6.25044 1.5 6.25016C1.15278 6.25016 0.857639 6.12863 0.614583 5.88558C0.371528 5.64252 0.25 5.34738 0.25 5.00016C0.25 4.65294 0.371528 4.3578 0.614583 4.11475C0.857639 3.87169 1.15278 3.75016 1.5 3.75016C1.65972 3.75016 1.8125 3.77975 1.95833 3.83891C2.10417 3.89808 2.23611 3.97961 2.35417 4.0835L5.29167 2.37516C5.27778 2.3335 5.26736 2.28669 5.26042 2.23475C5.25347 2.1828 5.25 2.13238 5.25 2.0835C5.25 1.73627 5.37153 1.44113 5.61458 1.19808C5.85764 0.955024 6.15278 0.833496 6.5 0.833496C6.84722 0.833496 7.14236 0.955024 7.38542 1.19808C7.62847 1.44113 7.75 1.73627 7.75 2.0835C7.75 2.43072 7.62847 2.72586 7.38542 2.96891C7.14236 3.21197 6.84722 3.3335 6.5 3.3335C6.34028 3.3335 6.1875 3.30405 6.04167 3.24516C5.89583 3.18627 5.76389 3.10461 5.64583 3.00016L2.70833 4.7085C2.72222 4.75016 2.73264 4.79711 2.73958 4.84933C2.74653 4.90155 2.75 4.95183 2.75 5.00016C2.75 5.04877 2.74653 5.09919 2.73958 5.15141C2.73264 5.20363 2.72222 5.25044 2.70833 5.29183L5.64583 7.00016C5.76389 6.896 5.89583 6.81447 6.04167 6.75558C6.1875 6.69669 6.34028 6.66711 6.5 6.66683C6.84722 6.66683 7.14236 6.78836 7.38542 7.03141C7.62847 7.27447 7.75 7.56961 7.75 7.91683C7.75 8.26405 7.62847 8.55919 7.38542 8.80225C7.14236 9.0453 6.84722 9.16683 6.5 9.16683ZM6.5 2.50016C6.61806 2.50016 6.71708 2.46016 6.79708 2.38016C6.87708 2.30016 6.91694 2.20127 6.91667 2.0835C6.91667 1.96544 6.87667 1.86641 6.79667 1.78641C6.71667 1.70641 6.61778 1.66655 6.5 1.66683C6.38194 1.66683 6.28292 1.70683 6.20292 1.78683C6.12292 1.86683 6.08306 1.96572 6.08333 2.0835C6.08333 2.20155 6.12333 2.30058 6.20333 2.38058C6.28333 2.46058 6.38222 2.50044 6.5 2.50016ZM1.5 5.41683C1.61806 5.41683 1.71708 5.37683 1.79708 5.29683C1.87708 5.21683 1.91694 5.11794 1.91667 5.00016C1.91667 4.88211 1.87667 4.78308 1.79667 4.70308C1.71667 4.62308 1.61778 4.58322 1.5 4.5835C1.38194 4.5835 1.28292 4.6235 1.20292 4.7035C1.12292 4.7835 1.08306 4.88238 1.08333 5.00016C1.08333 5.11822 1.12333 5.21725 1.20333 5.29725C1.28333 5.37725 1.38222 5.41711 1.5 5.41683ZM6.5 8.3335C6.61806 8.3335 6.71708 8.2935 6.79708 8.2135C6.87708 8.1335 6.91694 8.03461 6.91667 7.91683C6.91667 7.79877 6.87667 7.69975 6.79667 7.61975C6.71667 7.53975 6.61778 7.49988 6.5 7.50016C6.38194 7.50016 6.28292 7.54016 6.20292 7.62016C6.12292 7.70016 6.08306 7.79905 6.08333 7.91683C6.08333 8.03488 6.12333 8.13391 6.20333 8.21391C6.28333 8.29391 6.38222 8.33377 6.5 8.3335Z"
            fill="white" />
    </svg>
    Share Link</button>
    <button class="share_button1 downloadVehicles_zip" id="warehouse_images" style=""
                onclick="download_all(this.id)">
                <svg width="25" height="25"  viewBox="0 0 12 12" fill="none" style="margin-right: 10px;"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.99935 11.3332C1.63268 11.3332 1.31868 11.2025 1.05735 10.9412C0.796017 10.6798 0.665572 10.3661 0.666017 9.99984V7.99984H1.99935V9.99984H9.99935V7.99984H11.3327V9.99984C11.3327 10.3665 11.202 10.6805 10.9407 10.9418C10.6794 11.2032 10.3656 11.3336 9.99935 11.3332H1.99935ZM5.99935 8.6665L2.66602 5.33317L3.59935 4.3665L5.33268 6.09984V0.666504H6.66602V6.09984L8.39935 4.3665L9.33268 5.33317L5.99935 8.6665Z"
                        fill="white" />
                </svg>

                Download Images</button>


    <div class="container-fluid d-flex flex-wrap" style="">
        
      <div class="col-lg-3 left" style="background-color: rgba(232, 234, 235, 0.8); padding-right: 20px; margin-left: 5% !important;">
        <div class="left-top1" style="background-color: transparent; padding-bottom:0px ;">
            <img src="{{ asset('assets/images/Vector.png') }}" style="float: left; padding: 10px;" alt="Logo"><h2 style="color: #1F689E; font-weight: 650;">Vehicle Details</h2>
            </div>
        <div class="left-top1" style="border-radius:10px ;">
            
          <div class="left-top">
            <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                <p class="paragraph">DESCRIPTION</p>
                <p class="paragraph1">{{ $vin_details[0]['year'] }} {{ $vin_details[0]['make'] }} {{ $vin_details[0]['model'] }}</p>
            
                </div>
                <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                <p class="paragraph">VIN NO</p>
                <p class="paragraph1">{{ $vin_details[0]['vin'] }}</p>
            </div>
            <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                <p class="paragraph">COLOR</p>
                <p class="paragraph1">{{ @$vin_details[0]['color'] }}</p>
            </div>
            <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                <p class="paragraph">KEYS</p>
                @if(@$vin_details[0]['key'] == 'YES')
        <div style="background-color: green; color: white; padding: 5px; font-size: 12px; border-radius: 5px; margin-right: 20px;">
            <img src="{{ asset('assets/images/yes.png') }}" style="width: 15px; height: 15px; padding-bottom: 2px;" alt="Logo"> YES
        </div>
    @elseif(@$vin_details[0]['key'] == 'NO')
        <div style="background-color: red; color: white; padding: 5px; font-size: 12px; border-radius: 5px; margin-right: 20px;">
            <img src="{{ asset('assets/images/no.png') }}" style="width: 15px; height: 15px; padding-bottom: 2px;" alt="Logo" > NO
        </div>
    @else
        <p class="paragraph1">{{ @$vin_details[0]['key'] }}</p>
    @endif
            </div>
            <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                <p class="paragraph">AUCTION</p>
                <p class="paragraph1">{{ @$vin_details[0]['auction'] }}</p>
            </div>
            <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                <p class="paragraph">LOT</p>
            <p class="paragraph1">{{ @$vin_details[0]['lot'] }}</p>
            </div>
            <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                <p class="paragraph">DELIEVERED TO WAREHOUSE</p>
                <p class="paragraph1">{{ @$vin_details[0]['port'] }}</p>
            </div>
            <div class="vehicle_details d-flex text-color" >
                <p class="paragraph">BUYER NO</p>
                <p class="paragraph1">{{ @$vin_details[0]['buyer_id'] }}</p>
            </div>
                
            <!-- <h1></h1> -->

          </div>
           

        </div>

        
        <div class="left-top1" style="background-color: transparent; padding-bottom:0px ;">
            <img src="{{ asset('assets/images/Vector1.png') }}" style="float: left; padding: 10px;" alt="Logo"><h2 style="color: #1F689E; font-weight: 650;">Shipment Details</h2>
            </div>
        <div class="left-top1" style="border-radius:10px ;">
                <div class="left-top">
                    <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                        <p class="paragraph">STATUS</p>
                        <p class="paragraph1">
                            @if (@$vin_details[0]['shipment']['status'] == '1')
                                {{ 'BOOKED' }}
                            @elseif (@$vin_details[0]['shipment']['status'] == '2')
                                {{ 'SHIPPED' }}
                            @elseif (@$vin_details[0]['shipment']['status'] == '3')
                                {{ 'ARRIVED' }}
                            @elseif (@$vin_details[0]['shipment']['status'] == '4')
                                {{ 'COMPLETE' }}
                            @else
                                @if (@$vin_details[0]['status'] == '1')
                                    {{ 'NEW ORDER' }}
                                @elseif (@$vin_details[0]['status'] == '2')
                                    {{ 'DISPATCHED' }}
                                @elseif (@$vin_details[0]['status'] == '3')
                                    {{ 'ON HAND' }}
                                @else
                                @endif
    
                            @endif
    
    
                        </p>
                        
                  </div>
                  <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                    <p class="paragraph">PORT OF LOADING</p>
                    <p class="paragraph1">{{ @$vin_details[0]['shipment']['loading_port'] }}</p>
                  </div>
                  <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                    <p class="paragraph">CONTAINER NUMBER</p>
                    <p class="paragraph1">{{ @$vin_details[0]['shipment']['container_no'] }}</p>
                  </div>
                  <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                    <p class="paragraph">BOOKING NUMBER</p>
                    <p class="paragraph1">3298457234342</p>
                  </div>
                  <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                    <p class="paragraph">LOADING DATE</p>
                    <p class="paragraph1">{{ @$vin_details[0]['shipment']['booking_number'] }}</p>
                  </div>
                  <div class="vehicle_details d-flex text-color" style="border-bottom: 1.5px solid #EFEFEF;">
                    <p class="paragraph">ARRIVAL DATE</p>
                    <p class="paragraph1">{{ @$vin_details[0]['shipment']['est_arrival_date'] }}</p>
                  </div>
                  <div class="vehicle_details d-flex text-color" >
                    <p class="paragraph">DESTINATION PORT</p>
                    <p class="paragraph1">{{ @$vin_details[0]['shipment']['destination_port'] }}</p>
                  </div>
                  

                </div>
                  
              <!-- <h1></h1> -->
      
              </div>

        
        </div>
    
        
<div class="col-lg-7 right" style="margin-right: 3% ;"  >
    <div class="button-container">
    <button id="warehouse" class="btn active" style="width:33% ; border: 0.5px solid #1F689E; border-top-left-radius: 5px !important; "> <img src="{{ asset('assets/images/ware.png') }}"  style="float: left; padding-top: 2px; width: 20px; height: 20px; margin-top: 6px; " alt="Logo"><h4 style="padding: 0px;">Warehouse Images</h4></button>
    <button id="auction" class="btn" style="width:33% ; border: 0.5px solid #1F689E; border-radius: 0px; " ><img src="{{ asset('assets/images/auction.png') }}" style="float: left; padding-top: 2px; width: 20px; height: 20px; margin-top: 6px; " alt="Logo"><h4 style="padding: 0px;">Auction Images</h4></button>
    <button id="pickup" class="btn" style="width:34% ; border: 0.5px solid #1F689E; border-top-right-radius: 10px !important; "><img src="{{ asset('assets/images/pickup.png') }}" style="float: left; padding-top: 2px; width: 20px; height: 20px; margin-top: 6px; " alt="Logo"><h4 style="padding: 0px;">Pickup Images</h4></button>
      </div>

      <input type="hidden" name="" id="vin" value={{ $vin_details[0]['vin'] }}>
    
    <div class="image-container" style="padding: 20px;">
        <div class=".image-card"  id="images_vehicle">
          @if(count($vin_details[0]['warehouse_image']) > 0)
          @foreach ($vin_details[0]['warehouse_image'] as $warehouse_images)
          <img src="{{ asset($warehouse_images['name']) }}" alt=""class="" width="25%"  onclick="onClick(this)">
      @endforeach
      @else
    <div style="position: absolute; top: 10%; left: 0; right: 0; text-align: center; font-size: 30px; color: red; font-weight:700;">No images to display.</div>
      @endif
          
          
          

         
        

        </div>
      <!-- content for the right portion goes here -->
    </div>
  </div>
      </div>
     
      <div id="modal01" class="imgmodal" onclick="this.style.display='none' color:red">
        <span class="close vehicle_close cursor" onclick="closeModal()" style="margin-top: 50px;margin-right:50px;color:red;">&times;</span>
        {{-- <span class="close">&times;&nbsp;&nbsp;&nbsp;&nbsp;</span> --}}
        <div class="imgmodal-content">
            <img id="img01" style="max-width:100%">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script> --}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
    $('.btn').click(function() {
        $('.btn').removeClass('active');
        vin = $('#vin').val();
        // alert(vin);
        $(this).addClass('active');
        tab = $(this).text();
        if (tab == 'Warehouse Images') {
            $('.downloadVehicles_zip').attr('id', 'warehouse_images');
        } else if (tab == 'Auction Images') {
            $('.downloadVehicles_zip').attr('id', 'auction_images');
        } else if (tab == 'Pickup Images') {
            $('.downloadVehicles_zip').attr('id', 'vehicle_images');
        } else {}
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '{{ route('vehicle.tabImages') }}',
            data: {
                'tab': tab,
                'vin': vin
            },
            success: function(data) {
                console.log(data)
                $('#images_vehicle').html(data);
            }
        });
    })
</script> 


<script>
  
    // JavaScript code
    function copyToClipboard() {
        var copyText = document.getElementById("textToCopy");
        var textArea = document.createElement("textarea");
        textArea.value = copyText.value;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("Copy");
        textArea.remove();
        alert("Link copied to clipboard!");
    }
    async function download_all(tab) {
        id = "{{ @$vin_details[0]['id'] }}";
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'post',
            url: '{{ route('trackVehicle/downloadImages/zipfile') }}',
            data: {
                'id': id,
                'tab': tab,
            },
            success: function(data) {
                var zip = new JSZip();
                var count = 0;
                var zipFilename = "images_bundle.zip";
                var images = data;
                console.log(data);
                images.forEach(async function(imgURL, i) {
                    console.log(i)
                    var filename = "image" + i + '.jpg'
                    var image = await fetch(imgURL)
                    var imageBlog = await image.blob()
                    var img = zip.folder("images");
                    img.file(filename, imageBlog, {
                        binary: true
                    });
                    count++
                    if (count == images.length) {
                        zip.generateAsync({
                            type: 'blob'
                        }).then(function(content) {
                            saveAs(content, zipFilename);
                        });
                    }
                })
            }
        });
    }
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }
    function closeModal() {
        document.getElementById("modal01").style.display = "none";
    }
      function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        
        
    }
    
    
    
</script>


<script>
    // Toggle active class on button click
    // const buttons = document.querySelectorAll('.btn');
    // buttons.forEach(button => {
    //   button.addEventListener('click', () => {
        
    //     buttons.forEach(btn => btn.classList.remove('active'));
    //     button.classList.add('active');
        

    //   });
    // });
     const imageContainer = document.querySelector('.image-container');
  if (imageContainer.scrollHeight <= 15) {
    imageContainer.style.overflowY = 'hidden';
  }else {
    imageContainer.style.overflowY = 'auto';
  }

  </script>
</body>

</html>