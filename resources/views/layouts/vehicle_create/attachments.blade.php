{{-- {{dd($vehicles[0]['pickupimages'])}} --}}
@include('layouts.vehicle_create.navbar')
<div class="py-4">
    <form method="POST" id="vehicle_attacments" enctype="multipart/form-data" form-data>
        @csrf
        <input type="hidden" name="vin" id="vin" value="{{ $vin }}" />
        <div class="d-lg-flex d-block justify-content-center py-lg-2">
            <div class="px-lg-3 col-lg-5 py-lg-0">
                <div class="box box-bg-2 col-12">
                    {{-- <form method="POST" id="vehicle_invoice_form" enctype="multipart/form-data"> --}}
                    <div class="col-5 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                        <b>Auction Invoice</b>
                    </div>
                    <input type="file" name="auction_invoice[]"
                        accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                    text/plain, application/pdf"
                        class="p-5">
                    {{-- <div class="d-flex justify-content-center">
                        <div class="p-3 col-6">
                            <button type="submit" onclick="auction_invoice()" class="btn btn_image col-12 d-flex"
                                style="cursor: pointer;">
                                <div class="d-flex">
                                    <div class="icon-3 rounded-circle d-flex justify-content-center align-items-center">
                                        <svg width="10" height="10" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.7998 9.33789H13.3748V10.9004H6.7998V9.33789ZM6.7998 12.2879H13.3748V13.8504H6.7998V12.2879ZM6.7998 6.33789H13.3748V7.90039H6.7998V6.33789Z"
                                                fill="white" />
                                            <path
                                                d="M14.1752 1.25L12.0502 0.35L10.1002 1.25L8.0127 0.35L6.0502 1.25L3.0752 0V20L6.0502 18.75L8.0127 19.6125L10.1002 18.75L12.0502 19.6125L14.1752 18.75L16.9252 20V0L14.1752 1.25ZM15.3502 17.6375L14.2002 17.125L12.0877 17.9875L10.1252 17.0875L8.0252 17.95L6.0877 17.0875L4.6502 17.675V2.325L6.0877 2.9125L8.0252 2.05L10.1252 2.9125L12.0877 2.05L14.2002 2.9125L15.3502 2.4V17.6375Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    <div class="px-2" style="font-size:16px">Upload Invoice</div>
                                </div>
                            </button>
                        </div>
                    </div> --}}
                    {{-- </form> --}}
                </div>
            </div>
            <div class="px-lg-3 col-lg-5 py-lg-0">
                <div class="box box-bg-2 col-12">
                    {{-- <form method="POST" id="vehicle_copy_form" enctype="multipart/form-data"> --}}
                    {{-- <input type="hidden" name="vin" id="vin" value="{{$vin}}" /> --}}

                    <div class="col-5 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                        <b>Auction Copy</b>
                    </div>
                    <input type="file" name="auction_copy[]"
                        accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                text/plain, application/pdf"
                        class="p-5">

                    {{-- </form> --}}
                </div>
            </div>
        </div>


        <div class="d-lg-flex d-block justify-content-center py-lg-2">
            <div class="px-lg-3 col-lg-5 py-lg-0">
                <div class="box box-bg-2 col-12">
                    {{-- <form method="POST" id="billofsales" enctype="multipart/form-data"> --}}
                    {{-- @csrf --}}
                    {{-- <input type="hidden" name="vin" id="vin" value="{{$vin}}" /> --}}

                    <div class="col-5 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                        <b>Bill Of Sales</b>
                    </div>
                    <input type="file" name="billofsales[]"
                        accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                    text/plain, application/pdf"
                        class="p-5">
                    {{-- <div class="billofsales" name="billofsales[]" style="padding: .5rem .5rem;">
                    </div> --}}
                    {{-- <div class="d-flex justify-content-center">
                        <div class="p-3 col-6">
                            <button type="button" onclick="billofsales()" class="btn btn_image col-12 d-flex"
                                style="cursor: pointer;">
                                <div class="d-flex">
                                    <div
                                        class="icon-2 rounded-circle d-flex justify-content-center align-items-center">
                                        <svg width="10" height="10" viewBox="0 0 24 27" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.7199 10.851H22.8378C23.4109 10.851 23.6849 10.1409 23.2489 9.76717L12.8337 0.386047C12.3603 -0.0375365 11.6377 -0.0375365 11.1643 0.386047L0.749155 9.76717C0.325571 10.1409 0.587196 10.851 1.16028 10.851H3.2782V19.5719C3.2782 20.2571 3.83882 20.8177 4.52403 20.8177C5.20924 20.8177 5.76986 20.2571 5.76986 19.5719V18.326H18.2282V19.5719C18.2282 20.2571 18.7888 20.8177 19.474 20.8177C20.1592 20.8177 20.7199 20.2571 20.7199 19.5719V10.851ZM6.03149 8.35938H17.9666L18.2282 8.59609V10.851H5.76986V8.59609L6.03149 8.35938ZM15.2008 5.86771H8.79724L11.999 2.98984L15.2008 5.86771ZM5.76986 15.8344V13.3427H18.2282V15.8344H5.76986Z"
                                                fill="white" />
                                        </svg>
                                        </i>
                                    </div>
                                    <div class="px-2" style="font-size:16px">Upload Images</div>
                                </div>
                            </button>
                        </div>
                    </div> --}}
                    {{-- </form> --}}
                </div>
            </div>

            <div class="px-lg-3 col-lg-5 py-lg-0">
                <div class="box box-bg-2 col-12">
                    {{-- <form method="POST" id="originalTitle" enctype="multipart/form-data"> --}}
                    {{-- @csrf --}}
                    {{-- <input type="hidden" name="vin" id="vin" value="{{$vin}}" /> --}}

                    <div class="col-5 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                        <b>Original Title</b>
                    </div>
                    <input type="file" name="originaltitle[]"
                        accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                    text/plain, application/pdf"
                        class="p-5">
                    {{-- <div class="originaltitle" name="originaltitle[]" style="padding: .5rem .5rem;"> --}}
                </div>
                {{-- <div class="d-flex justify-content-center">
                        <div class="p-3 col-6">
                            <button type="button" onclick="originalTitle()" class="btn btn_image col-12 d-flex"
                                style="cursor: pointer;">
                                <div class="d-flex">
                                    <div
                                        class="icon-2 rounded-circle d-flex justify-content-center align-items-center">
                                        <svg width="10" height="10" viewBox="0 0 24 27" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.7199 10.851H22.8378C23.4109 10.851 23.6849 10.1409 23.2489 9.76717L12.8337 0.386047C12.3603 -0.0375365 11.6377 -0.0375365 11.1643 0.386047L0.749155 9.76717C0.325571 10.1409 0.587196 10.851 1.16028 10.851H3.2782V19.5719C3.2782 20.2571 3.83882 20.8177 4.52403 20.8177C5.20924 20.8177 5.76986 20.2571 5.76986 19.5719V18.326H18.2282V19.5719C18.2282 20.2571 18.7888 20.8177 19.474 20.8177C20.1592 20.8177 20.7199 20.2571 20.7199 19.5719V10.851ZM6.03149 8.35938H17.9666L18.2282 8.59609V10.851H5.76986V8.59609L6.03149 8.35938ZM15.2008 5.86771H8.79724L11.999 2.98984L15.2008 5.86771ZM5.76986 15.8344V13.3427H18.2282V15.8344H5.76986Z"
                                                fill="white" />
                                        </svg>
                                        </i>
                                    </div>
                                    <div class="px-2" style="font-size:16px">Upload Images</div>
                                </div>
                            </button>
                        </div>
                    </div> --}}
                {{-- </form> --}}
            </div>
        </div>



        <div class="d-lg-flex d-block justify-content-center py-lg-2">
            <div class="px-lg-3 col-lg-5 py-lg-0">
                <div class="box box-bg-2 col-12">
                    {{-- <form method="POST" id="vehicle_auction_form" enctype="multipart/form-data"> --}}
                    {{-- <input type="hidden" name="vin" id="vin" value="{{$vin}}" /> --}}

                    <div class="col-5 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                        <b>Auction Images</b>
                    </div>
                    @if(@$vehicles)
                    <div class="vehicle_auction_image_update" name="vehicle_auction_image[]" style="padding:.5rem .5rem;"></div>
                    @else
                    <div class="vehicle_auction_image" name="vehicle_auction_image[]" style="padding:.5rem .5rem;"></div>
                    @endif

                    @if(@$vehicles)
                    @if (count($vehicles[0]['auction_image']) > 0)
                    <script>
                        a_image = [];
                        auction_obj = {};
                    </script>
                    @foreach ($vehicles[0]['auction_image'] as $auction_image)
                        <script>
                           auction_obj ={
                                    id: "{{@$auction_image['id']}}",
                                    src: "{{asset(@$auction_image['name'])}}",
                                };
                                a_image.push(auction_obj);
                        </script>
                    @endforeach
                    <script>
                        let auction_image = a_image;
                    </script>
                    @else
                    <script>
                    $('.vehicle_auction_image_update').imageUploader({
                        imagesInputName: 'auction_images',
                        maxFiles: 15,
                    });
                    </script>
                    @endif
                    @endif


                    {{-- <div class="d-flex justify-content-center">
                        <div class="p-3 col-6">
                            <button type="submit" onclick="auction_images()" class="btn btn_image col-12 d-flex"
                                style="cursor: pointer;">
                                <div class="d-flex">
                                    <div class="icon rounded-circle d-flex justify-content-center align-items-center">
                                        <svg width="10" height="10" viewBox="0 0 11 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.35752 0.419016C1.95439 0.0151299 2.71571 -0.0575548 3.47401 0.216952C4.23231 0.491459 4.92547 1.09067 5.401 1.88277L9.70417 9.05063C10.0338 9.59972 10.2787 10.1986 10.4249 10.813C10.5712 11.4274 10.6158 12.0454 10.5563 12.6317C10.4969 13.2179 10.3344 13.7609 10.0783 14.2297C9.8222 14.6985 9.47743 15.0839 9.06367 15.3639C8.64992 15.6439 8.17529 15.8129 7.66688 15.8615C7.15847 15.91 6.62624 15.8371 6.10058 15.6468C5.57492 15.4565 5.06613 15.1526 4.60324 14.7524C4.14035 14.3523 3.73244 13.8637 3.4028 13.3146L0.53402 8.53605L1.43422 7.92691L4.303 12.7055C4.77853 13.4976 5.47169 14.0968 6.22999 14.3713C6.98828 14.6458 7.74961 14.5731 8.34648 14.1692C8.94334 13.7653 9.32686 13.0633 9.41266 12.2177C9.49846 11.372 9.27951 10.4519 8.80398 9.65977L4.5008 2.49191C4.35953 2.25659 4.18471 2.0472 3.98633 1.87571C3.78795 1.70421 3.56989 1.57397 3.34461 1.49242C3.11933 1.41087 2.89123 1.3796 2.67334 1.4004C2.45545 1.4212 2.25204 1.49367 2.07472 1.61366C1.89739 1.73365 1.74963 1.89882 1.63987 2.09973C1.53011 2.30064 1.4605 2.53336 1.43501 2.78461C1.40952 3.03585 1.42865 3.3007 1.49131 3.56403C1.55398 3.82736 1.65894 4.08401 1.80022 4.31934L6.10339 11.4872C6.1985 11.6456 6.33713 11.7655 6.48879 11.8204C6.64045 11.8753 6.79271 11.8607 6.91208 11.7799C7.03146 11.6992 7.10816 11.5588 7.12532 11.3896C7.14248 11.2205 7.09869 11.0365 7.00359 10.8781L3.05901 4.30752L3.95921 3.69837L7.90378 10.2689C8.1891 10.7442 8.32047 11.2962 8.26899 11.8036C8.21751 12.3111 7.9874 12.7323 7.62928 12.9746C7.27116 13.2169 6.81437 13.2605 6.35939 13.0958C5.90441 12.9311 5.48851 12.5716 5.20319 12.0963L0.900021 4.92848C0.424491 4.13638 0.205542 3.21628 0.29134 2.37059C0.377138 1.52491 0.760655 0.822903 1.35752 0.419016V0.419016Z"
                                                fill="white" />
                                        </svg>
                                    </div>
                                    
                                    <div class="px-2" style="font-size:16px">Upload Images</div>
                                </div>
                            </button>
                        </div>
                    </div> --}}
                    {{-- </form> --}}
                </div>
            </div>

            <div class="px-lg-3 col-lg-5 py-lg-0">
                <div class="box box-bg-2 col-12">
                    {{-- <form method="POST" id="vehicle_warehouse_form" enctype="multipart/form-data"> --}}
                    {{-- <input type="hidden" name="vin" id="vin" value="{{$vin}}" /> --}}

                    <div class="col-6 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                        <b>Warehouse Images</b>
                    </div>
                    @if(@$vehicles)
                    <div class="vehicle_warehouse_image_update" name="vehicle_warehouse_image[]" style="padding:.5rem .5rem;"></div>
                    @else
                    <div class="vehicle_warehouse_image" name="vehicle_warehouse_image[]" style="padding:.5rem .5rem;">
                    </div>
                    @endif


                    @if(@$vehicles)
                    @if (count($vehicles[0]['warehouse_image']) > 0)
                    <script>
                        w_image = [];
                        warehouse_obj = {};
                    </script>
                    @foreach ($vehicles[0]['warehouse_image'] as $warehouse_image)
                        <script>
                           warehouse_obj ={
                                    id: "{{@$warehouse_image['id']}}",
                                    src: "{{asset(@$warehouse_image['name'])}}",
                                };
                                w_image.push(warehouse_obj);
                        </script>
                    @endforeach
                    <script>
                        let warehouse_image = w_image;
                    </script>
                    @else
                    <script>
                    $('.vehicle_warehouse_image_update').imageUploader({
                        imagesInputName: 'warehouse_images',
                        maxFiles: 15,
                    });
                    </script>
                    @endif
                    @else
                    <script>
                        $('.vehicle_warehouse_image').imageUploader({
                        imagesInputName: 'warehouse_images',
                        maxFiles: 15,
                    });
                    </script>
                    @endif
                    {{-- <div class="d-flex justify-content-center">
                        <div class="p-3 col-6">
                            <button type="submit" onclick="warehouse_images()" class="btn btn_image col-12 d-flex"
                                style="cursor: pointer;">
                                <div class="d-flex">
                                    <div
                                        class="icon-2 rounded-circle d-flex justify-content-center align-items-center">
                                        <svg width="10" height="10" viewBox="0 0 24 27" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.7199 10.851H22.8378C23.4109 10.851 23.6849 10.1409 23.2489 9.76717L12.8337 0.386047C12.3603 -0.0375365 11.6377 -0.0375365 11.1643 0.386047L0.749155 9.76717C0.325571 10.1409 0.587196 10.851 1.16028 10.851H3.2782V19.5719C3.2782 20.2571 3.83882 20.8177 4.52403 20.8177C5.20924 20.8177 5.76986 20.2571 5.76986 19.5719V18.326H18.2282V19.5719C18.2282 20.2571 18.7888 20.8177 19.474 20.8177C20.1592 20.8177 20.7199 20.2571 20.7199 19.5719V10.851ZM6.03149 8.35938H17.9666L18.2282 8.59609V10.851H5.76986V8.59609L6.03149 8.35938ZM15.2008 5.86771H8.79724L11.999 2.98984L15.2008 5.86771ZM5.76986 15.8344V13.3427H18.2282V15.8344H5.76986Z"
                                                fill="white" />
                                        </svg>
                                        </i>
                                    </div>
                                    <div class="px-2" style="font-size: 16px">Upload Images</div>
                                </div>
                            </button>
                        </div>
                    </div> --}}
                    {{-- </form> --}}
                </div>
            </div>
        </div>


        



<div class="d-lg-flex justify-content-center d-block py-lg-2">
    <div class="px-lg-3 col-lg-5 py-lg-0">
        <div class="box box-bg-2 col-12">
            

            <div class="col-5 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                <b>Pickup Images</b>
            </div>
            @if(@$vehicles)
            <div class="pick_update"  style="padding: .5rem .5rem;">
            </div>
            @else
            <div class="pick" style="padding: .5rem .5rem;">
            </div>
            @endif

            @if(@$vehicles)
            @if (count($vehicles[0]['pickupimages']) > 0)
            {{-- {{count($vehicles[0]['pickupimages'])}} --}}
            <script>
                p_images = [];
                pickup_obj = {};
            </script>
            @foreach ($vehicles[0]['pickupimages'] as $pickup_image)
            {{-- {{asset(@$pickup_image['name'])}} --}}
                <script>
                   pickup_obj ={
                            id: "{{@$pickup_image['id']}}",
                            src: "{{asset(@$pickup_image['name'])}}",
                        };
                       
                        p_images.push(pickup_obj);
                </script>
            @endforeach
            <script>
                let pickup_image = p_images;
            </script>
            @else
            <script>
                $('.pick_update').imageUploader({
                            imagesInputName: 'pickup',
                            maxFiles: 15,  
                });
            </script>
            @endif
            @else
            <script>
                $('.pick').imageUploader({
                        imagesInputName: 'pickup',
                        maxFiles: 15,  
                    });
            </script>
            @endif

        </div>
    </div>
</div>
<div class="d-lg-flex d-block justify-content-end py-lg-2 px-lg-5">
    <button type="button" class="btn col-1 next-style text-white" id="vehicle_attachment_finish"
        onclick="vehicle_attachments()" style="cursor: pointer;">
        <div class="unskew">Finish</div>
    </button>
</div>


</form>
</div>
