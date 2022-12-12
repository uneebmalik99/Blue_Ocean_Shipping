{{-- @include('layouts.vehicle_information.navbar') --}}
<style>
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
        top: 25px;
        left: 20px;
        font-size: 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        text-decoration: none !important;
    }

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
    }
</style>
<div class="row my-5">
    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
        <div class="information_second_div">
            <div class="row" style="padding-bottom:60px">
                <div class="col-sm-12 col-md-5 col-lg-6 mx-auto mb-4">
                    <div class="inspection_heading" style="width:80%">
                        <h6>Inspection</h6>
                        <div class="information_div">
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Branch</span>
                                @if (@$vehicle['branch'])
                                    <span class="information_text">{{ @$vehicle['branch'] }}</span>
                                @else
                                    <span class="information_text">--</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Order Date</span>
                                @if (@$vehicle['order_date'])
                                    <span class="information_text">{{ @$vehicle['order_date'] }}</span>
                                @else
                                    <span class="information_text">--</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Received Date</span>
                                @if (@$vehicle['pickup_date'])
                                    <span class="information_text">{{ @$vehicle['pickup_date'] }}</span>
                                @else
                                    <span class="information_text">--</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Status</span>
                                @if (@$vehicle['vehicle_status'])
                                    <span
                                        class="information_text">{{ @$vehicle['vehicle_status']['status_name'] }}</span>
                                @else
                                    <span class="information_text">--</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Shipped Line</span>
                                @if(@$vehicle['shipped_line'])
                    <span class="information_text">{{@$vehicle['shipped_line']}}</span>
                    @else
                    <span class="information_text">--</span>
                    @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Container Number</span>
                                @if(@$vehicle['container_no'])
                                <span class="information_text">{{@$vehicle['container_no']}}</span>
                                @else
                                <span class="information_text">--</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Tracking url</span>
                                @if(@$vehicle['trucking_url'])
                                <span class="information_text">{{@$vehicle['trucking_url']}}</span>
                                @else
                                <span class="information_text">--</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Final Port</span>
                                @if(@$vehicle['final_port'])
                                <span class="information_text">{{@$vehicle['final_port']}}</span>
                                @else
                                <span class="information_text">--</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Final City</span>
                                @if(@$vehicle['final_city'])
                    <span class="information_text">{{@$vehicle['final_city']}}</span>
                    @else
                    <span class="information_text">--</span>
                    @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Final Country</span>
                                @if(@$vehicle['final_country'])
                                <span class="information_text">{{@$vehicle['final_country']}}</span>
                                @else
                                <span class="information_text">--</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between"
                                style="border: 1px solid rgba(26, 88, 133, 0.17);
                            border-radius: 10px;width: 80%;margin:6px auto;padding:5px; ">
                                <span class="infromation_mainText">Location</span>
                                @if(@$vehicle['pickup_location'])
                                <span class="information_text">{{@$vehicle['pickup_location']}}</span>
                                @else
                                <span class="information_text">--</span>
                                @endif
                            </div>
                            <div>
                                <br>
                            </div>




                        </div>



                    </div>

                </div>

                <div class="col-sm-12 col-md-7 col-lg-6 mb-4 mt-5">
                    <div class="information_gallary">
                        <div class="gallary_header d-flex">
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <div class="w-100 d-flex"
                                            style="justify-content: space-around;margin: 5px 1px; padding: 0 3px;">
                                            <button class="img_active_button img_btn" id="vehicle_images"
                                                onclick="changeImages(this.id)" tab="{{ @$vehicle['id'] }}">
                                                <div class="img_button"
                                                    style="color:#4d89b5!important;font-size: 12px !important;font-weight:600;">
                                                    Pickup Image</div>
                                            </button>

                                            <button class="image_button mx-1 img_btn"
                                                style="color:#4d89b5!important;font-size: 12px !important;font-weight:600;margin-left:22px"
                                                onclick="changeImages(this.id)" tab=" {{ @$vehicle['id'] }}"
                                                id="auction_images">
                                                <div class="img_button">
                                                    Auction Image
                                                </div>
                                            </button>

                                            <button class="image_button img_btn" onclick="changeImages(this.id)"
                                                tab=" {{ @$vehicle['id'] }}" id="warehouse_images"
                                                style="color:#4d89b5!important;font-size: 12px !important;font-weight:600;">Ware
                                                House Image
                                            </button>

                                        </div>


                                    </div>

                                </div>
                                @if(@$vehicle['pickupimages'])
                                <div class="col-12 main_image">
                                    <div class="w-100  p-3" style="position: relative;">
                                        <img src="{{ asset(@$vehicle['pickupimages'][0]['name']) }}"
                                            alt=""class="img_fluid mx-auto w-100"
                                            style="max-height:250px !important;border-radius: 10px!important;" id="main_image_box">
                                        <a class="bottom_button">
                                            <svg width="39" height="25" viewBox="0 0 39 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect width="39" height="22" rx="5" fill="white"
                                                    fill-opacity="0.3" />
                                                <g filter="url(#filter0_d_0_1)">
                                                    <path
                                                        d="M10.2481 8.63636L10.4491 9.29091L10.2481 8.63636ZM29.7519 8.63636L29.9528 7.98045L29.7519 8.635V8.63636ZM15.7173 18.1164L16.3627 18.4436L15.7173 18.1164ZM24.2827 18.1164L24.9251 17.7905L24.2812 18.1177L24.2827 18.1164ZM13.3941 6.39591L12.7136 6.14364L13.3941 6.39591ZM11.9847 7.83727C11.917 8.00418 11.9224 8.1891 11.9997 8.35237C12.0769 8.51564 12.2199 8.64425 12.398 8.71062C12.5761 8.77699 12.7751 8.77583 12.9522 8.7074C13.1294 8.63896 13.2707 8.5087 13.3457 8.34454L11.9847 7.83727ZM26.6029 6.39591L27.2835 6.14364L26.6029 6.39591ZM26.6513 8.34454C26.6858 8.42944 26.7381 8.5071 26.8052 8.57297C26.8723 8.63884 26.9529 8.69159 27.0422 8.72813C27.1315 8.76467 27.2278 8.78428 27.3253 8.78579C27.4229 8.7873 27.5198 8.77069 27.6104 8.73693C27.701 8.70317 27.7834 8.65294 27.8528 8.58919C27.9223 8.52543 27.9773 8.44944 28.0148 8.36565C28.0522 8.28186 28.0713 8.19197 28.0709 8.10124C28.0705 8.01051 28.0506 7.92077 28.0124 7.83727L26.6513 8.34454ZM29.5319 9.27182V13.8318H30.9985V9.27045H29.5319V9.27182ZM25.4413 17.6364H24.6464V19H25.4413V17.6364ZM15.3536 17.6364H14.5587V19H15.3536V17.6364ZM10.4667 13.8318V9.27045H9V13.8318H10.4667ZM10.4491 9.29091C16.6914 7.63258 23.3086 7.63258 29.5509 9.29091L29.9528 7.98045C23.4477 6.25255 16.5523 6.25255 10.0472 7.98045L10.4491 9.29091ZM14.5587 17.6364C13.4734 17.6364 12.4326 17.2355 11.6652 16.522C10.8978 15.8085 10.4667 14.8408 10.4667 13.8318H9C9 15.2025 9.58564 16.5171 10.6281 17.4863C11.6705 18.4555 13.0844 19 14.5587 19V17.6364ZM15.0749 17.7905C15.1023 17.7439 15.1426 17.7051 15.1916 17.6779C15.2406 17.6508 15.2966 17.6365 15.3536 17.6364V19C15.5599 19.0003 15.7625 18.9488 15.9398 18.8509C16.1172 18.7529 16.2628 18.6122 16.3612 18.4436L15.0749 17.7905ZM16.3612 18.4436C17.932 15.7668 22.0665 15.7668 23.6388 18.4436L24.9251 17.7905C22.7984 14.1659 17.2001 14.1659 15.0749 17.7905L16.3612 18.4436ZM24.6464 17.6364C24.7637 17.6364 24.8693 17.695 24.9251 17.7905L23.6388 18.4436C23.7372 18.6122 23.8828 18.7529 24.0602 18.8509C24.2375 18.9488 24.4401 19.0003 24.6464 19V17.6364ZM29.5333 13.8318C29.5333 14.8408 29.1022 15.8085 28.3348 16.522C27.5674 17.2355 26.5266 17.6364 25.4413 17.6364V19C26.9156 19 28.3295 18.4555 29.3719 17.4863C30.4144 16.5171 31 15.2025 31 13.8318H29.5333ZM31 9.27045C30.9999 8.97884 30.8977 8.69518 30.7087 8.46242C30.5198 8.22966 30.2544 8.06047 29.9528 7.98045L29.5509 9.29091C29.546 9.28973 29.5416 9.2871 29.5385 9.28341C29.5353 9.27972 29.5335 9.27518 29.5333 9.27045H31ZM10.4667 9.27045C10.4665 9.27518 10.4647 9.27972 10.4615 9.28341C10.4584 9.2871 10.454 9.28973 10.4491 9.29091L10.0472 7.98182C9.74583 8.06177 9.48064 8.23076 9.29172 8.46324C9.10279 8.69573 9.00039 8.97907 9 9.27045H10.4667ZM12.7151 6.14364L11.9861 7.83727L13.3472 8.34454L14.0761 6.64955L12.7151 6.14364ZM25.9239 6.64818L26.6528 8.34454L28.0139 7.83727L27.2849 6.14364L25.9239 6.64818ZM16.1192 5.36364H23.8808V4H16.1192V5.36364ZM27.2849 6.14364C27.0129 5.51095 26.5432 4.96857 25.9364 4.58648C25.3296 4.20438 24.6136 4.0001 23.8808 4V5.36364C24.3206 5.36357 24.7503 5.48604 25.1145 5.71526C25.4786 5.94447 25.7606 6.2699 25.9239 6.64955L27.2849 6.14364ZM14.0761 6.64818C14.2397 6.26879 14.5217 5.94365 14.8859 5.71469C15.25 5.48573 15.6796 5.36346 16.1192 5.36364V4C15.3864 4.0001 14.6704 4.20438 14.0636 4.58648C13.4568 4.96857 12.9871 5.51095 12.7151 6.14364L14.0761 6.64818Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <filter id="filter0_d_0_1" x="5" y="2"
                                                        width="30" height="23" filterUnits="userSpaceOnUse"
                                                        color-interpolation-filters="sRGB">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                            result="hardAlpha" />
                                                        <feOffset dy="2" />
                                                        <feGaussianBlur stdDeviation="2" />
                                                        <feComposite in2="hardAlpha" operator="out" />
                                                        <feColorMatrix type="matrix"
                                                            values="0 0 0 0 0.2875 0 0 0 0 0.2875 0 0 0 0 0.2875 0 0 0 0.54 0" />
                                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                                            result="effect1_dropShadow_0_1" />
                                                        <feBlend mode="normal" in="SourceGraphic"
                                                            in2="effect1_dropShadow_0_1" result="shape" />
                                                    </filter>
                                                </defs>
                                            </svg>

                                        </a>

                                        <div class="left_button">
                                            <a href="" style="text-decoration: none">
                                                <svg width="23" height="22" viewBox="0 0 23 22"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="23" height="22" rx="5"
                                                        fill="white" fill-opacity="0.3" />
                                                    <g filter="url(#filter0_d_0_1)">
                                                        <path
                                                            d="M8.6 8.4L8.92 8.64C8.96457 8.58057 8.99171 8.50991 8.99838 8.43592C9.00505 8.36194 8.99099 8.28756 8.95777 8.22112C8.92455 8.15467 8.87348 8.0988 8.81029 8.05974C8.7471 8.02069 8.67428 8 8.6 8V8.4ZM7.4 10L7.08 9.76C7.03543 9.81943 7.00829 9.89009 7.00162 9.96408C6.99495 10.0381 7.00901 10.1124 7.04223 10.1789C7.07545 10.2453 7.12652 10.3012 7.18971 10.3403C7.2529 10.3793 7.32572 10.4 7.4 10.4V10ZM15.1888 6.2832L15.4944 6.5416L15.1888 6.2832ZM6.6 8.8H8.6V8H6.6V8.8ZM8.28 8.16L7.08 9.76L7.72 10.24L8.92 8.64L8.28 8.16ZM7.4 10.4H7.8V9.6H7.4V10.4ZM7.8 11.2H6.6V12H7.8V11.2ZM8.2 10.8C8.2 10.9061 8.15786 11.0078 8.08284 11.0828C8.00783 11.1579 7.90609 11.2 7.8 11.2V12C8.11826 12 8.42348 11.8736 8.64853 11.6485C8.87357 11.4235 9 11.1183 9 10.8H8.2ZM7.8 10.4C7.90609 10.4 8.00783 10.4421 8.08284 10.5172C8.15786 10.5922 8.2 10.6939 8.2 10.8H9C9 10.4817 8.87357 10.1765 8.64853 9.95147C8.42348 9.72643 8.11826 9.6 7.8 9.6V10.4ZM11.4 8H11V8.8H11.4V8ZM9.8 9.2V10H10.6V9.2H9.8ZM9.8 10V10.8H10.6V10H9.8ZM11 9.6H10.2V10.4H11V9.6ZM12.2 10.8C12.2 10.4817 12.0736 10.1765 11.8485 9.95147C11.6235 9.72643 11.3183 9.6 11 9.6V10.4C11.1061 10.4 11.2078 10.4421 11.2828 10.5172C11.3579 10.5922 11.4 10.6939 11.4 10.8H12.2ZM11 12C11.3183 12 11.6235 11.8736 11.8485 11.6485C12.0736 11.4235 12.2 11.1183 12.2 10.8H11.4C11.4 10.9061 11.3579 11.0078 11.2828 11.0828C11.2078 11.1579 11.1061 11.2 11 11.2V12ZM11 11.2C10.8939 11.2 10.7922 11.1579 10.7172 11.0828C10.6421 11.0078 10.6 10.9061 10.6 10.8H9.8C9.8 11.1183 9.92643 11.4235 10.1515 11.6485C10.3765 11.8736 10.6817 12 11 12V11.2ZM11 8C10.6817 8 10.3765 8.12643 10.1515 8.35147C9.92643 8.57652 9.8 8.88174 9.8 9.2H10.6C10.6 9.09392 10.6421 8.99217 10.7172 8.91716C10.7922 8.84214 10.8939 8.8 11 8.8V8ZM14.6 9.2V10.8H15.4V9.2H14.6ZM13.8 10.8V9.2H13V10.8H13.8ZM14.2 11.2C14.0939 11.2 13.9922 11.1579 13.9172 11.0828C13.8421 11.0078 13.8 10.9061 13.8 10.8H13C13 11.1183 13.1264 11.4235 13.3515 11.6485C13.5765 11.8736 13.8817 12 14.2 12V11.2ZM14.6 10.8C14.6 10.9061 14.5579 11.0078 14.4828 11.0828C14.4078 11.1579 14.3061 11.2 14.2 11.2V12C14.5183 12 14.8235 11.8736 15.0485 11.6485C15.2736 11.4235 15.4 11.1183 15.4 10.8H14.6ZM14.2 8.8C14.3061 8.8 14.4078 8.84214 14.4828 8.91716C14.5579 8.99217 14.6 9.09392 14.6 9.2H15.4C15.4 8.88174 15.2736 8.57652 15.0485 8.35147C14.8235 8.12643 14.5183 8 14.2 8V8.8ZM14.2 8C13.8817 8 13.5765 8.12643 13.3515 8.35147C13.1264 8.57652 13 8.88174 13 9.2H13.8C13.8 9.09392 13.8421 8.99217 13.9172 8.91716C13.9922 8.84214 14.0939 8.8 14.2 8.8V8ZM11 15.2C9.62087 15.2 8.29823 14.6521 7.32304 13.677C6.34786 12.7018 5.8 11.3791 5.8 10H5C5 11.5913 5.63214 13.1174 6.75736 14.2426C7.88258 15.3679 9.4087 16 11 16V15.2ZM16.2 10C16.2 10.6829 16.0655 11.3591 15.8042 11.99C15.5428 12.6208 15.1598 13.1941 14.677 13.677C14.1941 14.1598 13.6208 14.5428 12.99 14.8042C12.3591 15.0655 11.6829 15.2 11 15.2V16C12.5913 16 14.1174 15.3679 15.2426 14.2426C16.3679 13.1174 17 11.5913 17 10H16.2ZM11 4C9.4087 4 7.88258 4.63214 6.75736 5.75736C5.63214 6.88258 5 8.4087 5 10H5.8C5.8 8.62088 6.34786 7.29824 7.32304 6.32305C8.29823 5.34786 9.62087 4.8 11 4.8V4ZM15.8 6.4C15.9061 6.4 16.0078 6.44215 16.0828 6.51716C16.1579 6.59217 16.2 6.69392 16.2 6.8H17C17 6.48174 16.8736 6.17652 16.6485 5.95147C16.4235 5.72643 16.1183 5.6 15.8 5.6V6.4ZM15.8 7.2C15.6939 7.2 15.5922 7.15786 15.5172 7.08284C15.4421 7.00783 15.4 6.90609 15.4 6.8H14.6C14.6 7.11826 14.7264 7.42349 14.9515 7.64853C15.1765 7.87357 15.4817 8 15.8 8V7.2ZM15.4 6.8C15.4 6.7016 15.4352 6.612 15.4944 6.5416L14.884 6.0248C14.7072 6.2336 14.6 6.5048 14.6 6.8H15.4ZM15.4944 6.5416C15.5319 6.49711 15.5787 6.46138 15.6315 6.43692C15.6843 6.41246 15.7418 6.39986 15.8 6.4V5.6C15.432 5.6 15.1032 5.7656 14.884 6.0248L15.4944 6.5416ZM11 4.8C12.5472 4.8 13.9368 5.4752 14.8896 6.5488L15.488 6.0176C14.9256 5.38251 14.2346 4.8742 13.4609 4.52636C12.6871 4.17853 11.8483 3.99911 11 4V4.8ZM15.6832 7.736C16.0144 8.4208 16.2 9.188 16.2 10H17C17 9.064 16.7856 8.1784 16.4032 7.388L15.6832 7.7368V7.736ZM16.2 6.8C16.2001 6.88493 16.1732 6.96768 16.1231 7.03629C16.0731 7.10489 16.0025 7.15579 15.9216 7.1816L16.1648 7.9432C16.4073 7.86584 16.6188 7.71339 16.769 7.5079C16.9191 7.3024 17 7.0545 17 6.8H16.2ZM15.9216 7.1816C15.8823 7.19397 15.8412 7.20017 15.8 7.2V8C15.9238 8.00026 16.0468 7.98137 16.1648 7.944L15.9216 7.1816Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <filter id="filter0_d_0_1" x="1" y="2"
                                                            width="20" height="20"
                                                            filterUnits="userSpaceOnUse"
                                                            color-interpolation-filters="sRGB">
                                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                result="hardAlpha" />
                                                            <feOffset dy="2" />
                                                            <feGaussianBlur stdDeviation="2" />
                                                            <feComposite in2="hardAlpha" operator="out" />
                                                            <feColorMatrix type="matrix"
                                                                values="0 0 0 0 0.2875 0 0 0 0 0.2875 0 0 0 0 0.2875 0 0 0 0.83 0" />
                                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                                result="effect1_dropShadow_0_1" />
                                                            <feBlend mode="normal" in="SourceGraphic"
                                                                in2="effect1_dropShadow_0_1" result="shape" />
                                                        </filter>
                                                    </defs>
                                                </svg>

                                            </a>
                                            <br>
                                            <a href="" style="text-decoration: none">
                                                <svg width="23" height="22" viewBox="0 0 23 22"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="23" height="22" rx="5"
                                                        fill="white" fill-opacity="0.3" />
                                                    <g filter="url(#filter0_d_0_1)">
                                                        <path
                                                            d="M14.8182 8.25L12.6364 10.5H14.2727C14.2727 12.3619 12.8055 13.875 11 13.875C10.4491 13.875 9.92545 13.7344 9.47273 13.4812L8.67636 14.3025C9.34727 14.7413 10.1436 15 11 15C13.4109 15 15.3636 12.9862 15.3636 10.5H17L14.8182 8.25ZM7.72727 10.5C7.72727 8.63812 9.19455 7.125 11 7.125C11.5509 7.125 12.0745 7.26562 12.5273 7.51875L13.3236 6.6975C12.6527 6.25875 11.8564 6 11 6C8.58909 6 6.63636 8.01375 6.63636 10.5H5L7.18182 12.75L9.36364 10.5H7.72727Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <filter id="filter0_d_0_1" x="1" y="4"
                                                            width="20" height="17"
                                                            filterUnits="userSpaceOnUse"
                                                            color-interpolation-filters="sRGB">
                                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                result="hardAlpha" />
                                                            <feOffset dy="2" />
                                                            <feGaussianBlur stdDeviation="2" />
                                                            <feComposite in2="hardAlpha" operator="out" />
                                                            <feColorMatrix type="matrix"
                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.74 0" />
                                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                                result="effect1_dropShadow_0_1" />
                                                            <feBlend mode="normal" in="SourceGraphic"
                                                                in2="effect1_dropShadow_0_1" result="shape" />
                                                        </filter>
                                                    </defs>
                                                </svg>

                                            </a>
                                            <br>
                                            <a href="{{ asset(@$vehicle['pickupimages'][0]['name']) }}"
                                                download="{{ @$vehicle['pickupimages'][0]['thumbnail'] }}"
                                                style="text-decoration: none" id="download_image">
                                                <svg width="23" height="23" viewBox="0 0 23 23"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="23" height="22" rx="5"
                                                        fill="white" fill-opacity="0.3" />
                                                    <g filter="url(#filter0_d_0_1)">
                                                        <path
                                                            d="M11 11.4L14 8.2H11.75V5H10.25V8.2H8L11 11.4ZM13.727 10.0912L12.8863 10.988L15.9342 12.2L11 14.1624L6.06575 12.2L9.11375 10.988L8.273 10.0912L5 11.4V14.6L11 17L17 14.6V11.4L13.727 10.0912Z"
                                                            fill="white" />
                                                    </g>
                                                    <defs>
                                                        <filter id="filter0_d_0_1" x="1" y="3"
                                                            width="20" height="20"
                                                            filterUnits="userSpaceOnUse"
                                                            color-interpolation-filters="sRGB">
                                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                                                result="hardAlpha" />
                                                            <feOffset dy="2" />
                                                            <feGaussianBlur stdDeviation="2" />
                                                            <feComposite in2="hardAlpha" operator="out" />
                                                            <feColorMatrix type="matrix"
                                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.53 0" />
                                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                                result="effect1_dropShadow_0_1" />
                                                            <feBlend mode="normal" in="SourceGraphic"
                                                                in2="effect1_dropShadow_0_1" result="shape" />
                                                        </filter>
                                                    </defs>
                                                </svg>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <h6 class="text-center mt-5 w-100" style="color:gray">No Image Found</h6>
                                @endif
                                <div class="image_section">

                                    <div class="col-12 changeImages">
                                        @if (@$vehicle['pickupimages'])
                                            @foreach (@$vehicle['pickupimages'] as $img)
                                                <img src="{{ asset($img['name']) }}" alt=""class="item_1"
                                                    style="width:120px!important;height:80px!important;" onclick="showAsMainImage(this.src)">
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    @if(@$vehicle['pickupimages'])
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-center ">
                            <a href="#" id="download_all">
                                <button
                                    style="background: rgba(37, 101, 4, 0.72); border-radius: 6px;border:none;color:white;transform: skew(-30deg);">
                                    <div style="transform: skew(30deg);padding:1px 10px;font-size: 13px;">
                                        Download Images in Zip
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
