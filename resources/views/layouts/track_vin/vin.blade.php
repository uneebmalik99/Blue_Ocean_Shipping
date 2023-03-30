<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vin Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .vehicle_details_box {
            background: rgba(243, 243, 243, 0.99);
            box-shadow: 3px 4px 3px rgba(22, 22, 22, 0.24);
            border-radius: 10px;
            /* width: 646px; */
        }

        .vehicle_details_box p {

            font-family: 'Inter';
            font-style: normal;
            /* font-weight: 600; */
            font-size: 16px;
            /* line-height: 27px; */
            /* identical to box height */
            padding: 15px 15px;


            color: #FFFFFF;
        }

        .vehicle_details {
            background: rgba(170, 219, 255, 0.35);
            box-shadow: 0px 4px 4px rgba(71, 147, 204, 0.61);
            width: 80%;
            margin-left: 33px;
            height: 40px;
            border-radius: 10px;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .vehicle_details p {
            color: black !important;
            font-size: 12px;
        }

        .share_button {
            background: linear-gradient(89.64deg, rgba(80, 148, 198, 0.77) 36.3%, #5094C6 72.35%, rgba(92, 165, 225, 0.526042) 109.66%, rgba(105, 183, 255, 0) 152.66%);
            box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
            border-radius: 44px;
            outline: none;
            border: none;
            color: white;
            padding: 2px 8px;
        }

        .images_vehicle img {
            width: 214px;
            margin-bottom: 24px;
        }

        .images_vehicle img:hover {
            transform: scale(1.5);
        }

        .active {
            background: #5d9ccb;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="vin_track_header"
                style="width:100%;height:60px;background: linear-gradient(269.85deg, #91BFE0 17.37%, #1970AF 108.96%);">
                <p style="color: white;
        font-size: 20px;
        padding: 15px 15px;">Track VIN</p>
            </div>
        </div>

        <div class="row mx-auto" style="margin-top:30px;">
            <div class="col-md-6 mx-auto">
                <div class="vehicle_details_box">
                    <header
                        style="background: linear-gradient(180deg, #4D92C5 0%, #87B8DC 100%);
                    box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.25);">
                        <p>Vehicle Details</p>
                    </header>

                    {{-- <div class="vehicle_details" style="color:black!important;"> --}}
                    <div class="vehicle_details d-flex text-black">
                        <p>VIN NO</p>
                        <p>{{ $vin_details[0]['vin'] }}</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>COLOR</p>
                        <p>{{ @$vin_details[0]['color'] }}</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>KEYS</p>
                        <p>{{ @$vin_details[0]['key'] }}</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>AUCTION</p>
                        <p>{{ @$vin_details[0]['auction'] }}</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>LOT</p>
                        <p>{{ @$vin_details[0]['lot'] }}</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>DELIEVERED TO WAREHOUSE</p>
                        <p>{{ @$vin_details[0]['port'] }}</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>BUYER NO</p>
                        <p>{{ @$vin_details[0]['buyer_id'] }}</p>
                    </div>
                    <br>
                    {{-- </div> --}}
                </div>
            </div>


            <div class="col-md-6 mx-auto">
                <div class="vehicle_details_box">
                    <header
                        style="background: linear-gradient(180deg, #4D92C5 0%, #87B8DC 100%);
                  box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.25);">
                        <p>Container Details</p>
                    </header>

                    {{-- <div class="vehicle_details" style="color:black!important;"> --}}
                    <div class="vehicle_details d-flex text-black">
                        <p>Port of Loading</p>
                        <p>NY</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>Container Numner</p>
                        <p>293847524239</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>Booking Number</p>
                        <p>3298457234342</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>Loading Date</p>
                        <p>12/12/1998</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>Arrival date</p>
                        <p>12/12/1998</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>Expected Arrival date</p>
                        <p>12/12/1998</p>
                    </div>

                    <div class="vehicle_details d-flex text-black">
                        <p>Destination Port</p>
                        <p>XYZ</p>
                    </div>
                    <br>
                    {{-- </div> --}}
                </div>
            </div>


        </div>
    </div>

    {{-- <table class="table">
        <thead>
            <tr>
                <th scope="col">VIN NO</th>
                <th scope="col">{{ $vin_details[0]['vin'] }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">COLOR</th>
                <td>{{ @$vin_details[0]['color'] }}</td>

            </tr>
            <tr>
                <th scope="row">KEYS</th>
                <td>{{ @$vin_details[0]['key'] }}</td>

            </tr>
            <tr>
                <th scope="row">AUCTION</th>
                <td>{{ @$vin_details[0]['auction'] }}</td>

            </tr>

            <tr>
                <th scope="row">LOT</th>
                <td>{{ @$vin_details[0]['lot'] }}</td>

            </tr>
            <tr>
                <th scope="row">DELIEVERED TO WAREHOUSE</th>
                <td>{{ @$vin_details[0]['port'] }}</td>

            </tr>
            <tr>
                <th scope="row">BUYER NO</th>
                <td>{{ @$vin_details[0]['buyer_id'] }}</td>

            </tr>
        </tbody>
    </table> --}}
    <br>


    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button class="share_button" style=""><svg width="8" height="10" viewBox="0 0 8 10"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.5 9.16683C6.15278 9.16683 5.85764 9.0453 5.61458 8.80225C5.37153 8.55919 5.25 8.26405 5.25 7.91683C5.25 7.86822 5.25347 7.8178 5.26042 7.76558C5.26736 7.71336 5.27778 7.66655 5.29167 7.62516L2.35417 5.91683C2.23611 6.021 2.10417 6.10266 1.95833 6.16183C1.8125 6.221 1.65972 6.25044 1.5 6.25016C1.15278 6.25016 0.857639 6.12863 0.614583 5.88558C0.371528 5.64252 0.25 5.34738 0.25 5.00016C0.25 4.65294 0.371528 4.3578 0.614583 4.11475C0.857639 3.87169 1.15278 3.75016 1.5 3.75016C1.65972 3.75016 1.8125 3.77975 1.95833 3.83891C2.10417 3.89808 2.23611 3.97961 2.35417 4.0835L5.29167 2.37516C5.27778 2.3335 5.26736 2.28669 5.26042 2.23475C5.25347 2.1828 5.25 2.13238 5.25 2.0835C5.25 1.73627 5.37153 1.44113 5.61458 1.19808C5.85764 0.955024 6.15278 0.833496 6.5 0.833496C6.84722 0.833496 7.14236 0.955024 7.38542 1.19808C7.62847 1.44113 7.75 1.73627 7.75 2.0835C7.75 2.43072 7.62847 2.72586 7.38542 2.96891C7.14236 3.21197 6.84722 3.3335 6.5 3.3335C6.34028 3.3335 6.1875 3.30405 6.04167 3.24516C5.89583 3.18627 5.76389 3.10461 5.64583 3.00016L2.70833 4.7085C2.72222 4.75016 2.73264 4.79711 2.73958 4.84933C2.74653 4.90155 2.75 4.95183 2.75 5.00016C2.75 5.04877 2.74653 5.09919 2.73958 5.15141C2.73264 5.20363 2.72222 5.25044 2.70833 5.29183L5.64583 7.00016C5.76389 6.896 5.89583 6.81447 6.04167 6.75558C6.1875 6.69669 6.34028 6.66711 6.5 6.66683C6.84722 6.66683 7.14236 6.78836 7.38542 7.03141C7.62847 7.27447 7.75 7.56961 7.75 7.91683C7.75 8.26405 7.62847 8.55919 7.38542 8.80225C7.14236 9.0453 6.84722 9.16683 6.5 9.16683ZM6.5 2.50016C6.61806 2.50016 6.71708 2.46016 6.79708 2.38016C6.87708 2.30016 6.91694 2.20127 6.91667 2.0835C6.91667 1.96544 6.87667 1.86641 6.79667 1.78641C6.71667 1.70641 6.61778 1.66655 6.5 1.66683C6.38194 1.66683 6.28292 1.70683 6.20292 1.78683C6.12292 1.86683 6.08306 1.96572 6.08333 2.0835C6.08333 2.20155 6.12333 2.30058 6.20333 2.38058C6.28333 2.46058 6.38222 2.50044 6.5 2.50016ZM1.5 5.41683C1.61806 5.41683 1.71708 5.37683 1.79708 5.29683C1.87708 5.21683 1.91694 5.11794 1.91667 5.00016C1.91667 4.88211 1.87667 4.78308 1.79667 4.70308C1.71667 4.62308 1.61778 4.58322 1.5 4.5835C1.38194 4.5835 1.28292 4.6235 1.20292 4.7035C1.12292 4.7835 1.08306 4.88238 1.08333 5.00016C1.08333 5.11822 1.12333 5.21725 1.20333 5.29725C1.28333 5.37725 1.38222 5.41711 1.5 5.41683ZM6.5 8.3335C6.61806 8.3335 6.71708 8.2935 6.79708 8.2135C6.87708 8.1335 6.91694 8.03461 6.91667 7.91683C6.91667 7.79877 6.87667 7.69975 6.79667 7.61975C6.71667 7.53975 6.61778 7.49988 6.5 7.50016C6.38194 7.50016 6.28292 7.54016 6.20292 7.62016C6.12292 7.70016 6.08306 7.79905 6.08333 7.91683C6.08333 8.03488 6.12333 8.13391 6.20333 8.21391C6.28333 8.29391 6.38222 8.33377 6.5 8.3335Z"
                            fill="white" />
                    </svg>
                    Share Link</button>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="d-flex justify-content-between w-100">
                <button id="auction" class="btn active" style="width:33%">Auction Images</button>
                <button id="warehouse" class="btn" style="width:33%">Warehouse Images</button>
                <button id="pickup" class="btn" style="width:33%">Pickup Images</button>
            </div>
            <div class="images_vehicle d-flex flex-wrap justify-content-between"
                style="background: rgba(243, 243, 243, 0.72);
            box-shadow: 3px 4px 3px rgba(22, 22, 22, 0.24);
            border-radius: 10px;padding: 20px 20px;">

                {{-- @foreach ($vin_details[0]['warehouse_image'] as $warehouse_images)
                    <img src="{{ asset($warehouse_images['name']) }}" alt=""class="" width="50">
                @endforeach --}}

                @foreach ($vin_details[0]['auction_image'] as $auction_images)
                    <img src="{{ asset($auction_images['name']) }}" alt=""class="" width="50">
                @endforeach

                {{-- @foreach ($vin_details[0]['pickupimages'] as $pickup_image)
                    <img src="{{ asset($pickup_image['name']) }}" alt=""class="" width="50">
                @endforeach --}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <button class="share_button" style="">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.99935 11.3332C1.63268 11.3332 1.31868 11.2025 1.05735 10.9412C0.796017 10.6798 0.665572 10.3661 0.666017 9.99984V7.99984H1.99935V9.99984H9.99935V7.99984H11.3327V9.99984C11.3327 10.3665 11.202 10.6805 10.9407 10.9418C10.6794 11.2032 10.3656 11.3336 9.99935 11.3332H1.99935ZM5.99935 8.6665L2.66602 5.33317L3.59935 4.3665L5.33268 6.09984V0.666504H6.66602V6.09984L8.39935 4.3665L9.33268 5.33317L5.99935 8.6665Z"
                            fill="white" />
                    </svg>

                    Download All</button>
            </div>
        </div>
    </div>

    <input type="hidden" name="" id="vin" value= {{ $vin_details[0]['vin'] }} >

    <br><br>
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
                    $('.images_vehicle').html(data);
                }
            });
        })
    </script>
</body>

</html>
