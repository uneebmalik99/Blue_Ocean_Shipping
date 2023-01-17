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
                
            </div>
        </div>



        <div class="d-lg-flex d-block justify-content-center py-lg-2">



            <div class="px-lg-3 col-lg-5 py-lg-0">
                <div class="box box-bg-2 col-12">
                    

                    <div class="col-5 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                        <b>Auction Images</b>
                    </div>
                    @if(@$vehicles[0]['auction_image'])
                    <div class="vehicle_auction_image_update" name="vehicle_auction_image[]" style="padding:.5rem .5rem;"></div>
                    @else
                    <div class="vehicle_auction_image" name="vehicle_auction_image[]" style="padding:.5rem .5rem;"></div>
                    @endif

                    {{-- @if(@$vehicles[0]['auction_image']) --}}
                  
                    @if (count((array)@$vehicles[0]['auction_image']) > 0)
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
                        $('.vehicle_auction_image_update').imageUploader({
                        preloaded: auction_image,
                        imagesInputName: 'auction_images',
                        maxFiles: 30,
                        preloadedInputName: 'auction_old'

                    });
                    </script>
                    @else
                    <script>
                    $('.vehicle_auction_image').imageUploader({
                        imagesInputName: 'auction_images',
                        maxFiles: 30,
                    });
                    </script>
                    @endif
                    {{-- @endif --}}
                </div>
            </div>

            <div class="px-lg-3 col-lg-5 py-lg-0">
                <div class="box box-bg-2 col-12">
                    <div class="col-6 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                        <b>Warehouse Images</b>
                    </div>
                    @if(@$vehicles[0]['warehouse_image'])
                    <div class="vehicle_warehouse_image_update" name="vehicle_warehouse_image[]" style="padding:.5rem .5rem;">
                    </div>
                    @else
                    <div class="vehicle_warehouse_image" name="vehicle_warehouse_image[]" style="padding:.5rem .5rem;">
                    </div>
                    @endif
                    {{-- @if(@$vehicles[0]['warehouse_image']) --}}
                    @if (count((array)@$vehicles[0]['warehouse_image']) > 0)
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
                        console.log(warehouse_image);

                        
                $('.vehicle_warehouse_image_update').imageUploader({
                    preloaded: warehouse_image,
                    maxFiles: 30,
                    imagesInputName: 'warehouse_images',
                    preloadedInputName: 'warehouse_old'
                });


                    </script>
                    @else
                    <script>
                    $('.vehicle_warehouse_image').imageUploader({
                        imagesInputName: 'warehouse_images',
                        maxFiles: 30,
                    });
                    </script>
                    @endif
                   
                </div>
            </div>




            
            
        </div>


<div class="d-lg-flex justify-content-center d-block py-lg-2">
    <div class="px-lg-3 col-lg-5 py-lg-0">
        <div class="box box-bg-2 col-12">
            

            <div class="col-5 my-3 p-0 d-flex justify-content-center" style="border-bottom:2px solid #3181B9;">
                <b>Pickup Images</b>
            </div>
            @if(@$vehicles[0]['pickupimages'])
            <div class="pick_update"  style="padding: .5rem .5rem;">
            </div>
            @else
            <div class="pick" style="padding: .5rem .5rem;">
            </div>
            @endif

            {{-- @if(@$vehicles[0]['pickupimages']) --}}
            @if (count((array)@$vehicles[0]['pickupimages']) > 0)
            <script>
                p_images = [];
                pickup_obj = {};
            </script>
            @foreach ($vehicles[0]['pickupimages'] as $pickup_image)
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

                $('.pick_update').imageUploader({
                        imagesInputName: 'pickup',
                        maxFiles: 30,
                        preloaded: pickup_image,
                        preloadedInputName: 'pickup_old',
                    });
            </script>
            @else
            <script>
                $('.pick').imageUploader({
                            imagesInputName: 'pickup',
                            maxFiles: 30, 
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
