<div>
    <div>
        <div class="bg-white">
            @include('shipment.navbar')
            <form method="POST" enctype="multipart/form-data" id="shipment_attachments_form">
                <input type="hidden" name="shipment_id" value="{{ @$shipment_id }}">
                
                <div class="col-12 py-3 d-flex justify-content-center">
                    <div class="px-lg-3 col-lg-5 py-lg-0">
                        <div class="box box-bg-2 col-12" style="height: 236px!important;">
                            @csrf
                            <div class="col-7 my-3 p-0 d-flex justify-content-center"
                                style="border-bottom:2px solid #3181b9;">
                                <b>Shipment Inovices</b>
                            </div>
                            <input type="file" name="shipment_inovice[]"
                        accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                    text/plain, application/pdf"
                        class="p-5">
                            {{-- <div class="shipment-inovice my-2" name="shipment_inovice[]" style="padding-top: .5rem;">
                            </div> --}}
                        </div>
                    </div>

                    <div class="px-lg-3 col-lg-5 py-lg-0">
                        <div class="box box-bg-2 col-12" style="height: 236px!important;">
                            @csrf
                            <div class="col-7 my-3 p-0 d-flex justify-content-center"
                                style="border-bottom:2px solid #3181b9;">
                                <b>Stamp Titles</b>
                            </div>
                            <input type="file" name="stamp_title[]"
                        accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                    text/plain, application/pdf"
                        class="p-5">
                            {{-- <div class="stamp_title my-2" name="stamp_title[]" style="padding-top: .5rem;">
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-12 py-3 d-flex justify-content-center">
                    <div class="px-lg-3 col-lg-5 py-lg-0">
                        <div class="box box-bg-2 col-12">
                            @csrf
                            <div class="col-7 my-3 p-0 d-flex justify-content-center"
                                style="border-bottom:2px solid #3181b9;">
                                <b>Loading Images</b>
                            </div>


                            @if (@$loading_images)
                                <div class="loading_image_update my-2" name="loading_image[]"
                                    style="padding-top: .5rem;">
                                </div>
                            @else
                                <div class="loading_image my-2" name="loading_image[]" style="padding-top: .5rem;">
                                </div>
                            @endif

                            {{-- {{count($loading_images[0]['loading_image'])}} --}}
                            @if (@$loading_images)
                                @if (count($loading_images[0]['loading_image']) > 0)
                                    <script>
                                        loading_images = [];
                                        loading_obj = {};
                                    </script>
                                    @foreach ($loading_images[0]['loading_image'] as $pickup_image)
                                        {{-- {{asset(@$pickup_image['id'])}} --}}
                                        <script>
                                            loading_obj = {
                                                id: "{{ @$pickup_image['id'] }}",
                                                src: "{{ asset(@$pickup_image['name']) }}",
                                            };
                                            loading_images.push(loading_obj);
                                        </script>
                                    @endforeach
                                    <script>
                                        let loading_old = loading_images;
                                    </script>
                                @else
                                    <script>
                                        $('.loading_image_update').imageUploader({
                                            maxFiles: 4,
                                            imagesInputName: 'loading_image',
                                        });
                                    </script>
                                @endif
                            @else
                                <script>
                                    // $('.loading_image').imageUploader({
                                    //     maxFiles: 4,
                                    //     imagesInputName: 'loading_image',
                                    // });
                                </script>
                            @endif
                        </div>
                    </div>

                    <div class="px-lg-3 col-lg-5 py-lg-0">
                        <div class="box box-bg-2 col-12" style="height: 236px!important;">
                            
                            <div class="col-7 my-3 p-0 d-flex justify-content-center"
                                style="border-bottom:2px solid #3181b9;">
                                <b>Other Documents</b>
                            </div>
                            <input type="file" name="other_document[]"
                        accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
                    text/plain, application/pdf"
                        class="p-5">
                            {{-- <div class="other-document my-2" name="other_document[]" style="padding-top: .5rem;">
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <div class="col-6">
                        <div class="col-3">
                            <button type="button" class="btn next-style text-white col-12 py-1"
                                id="shipment_general_finish" onclick="display_model()" style="cursor: pointer;">
                                <div class="unskew">Cancel</div>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end col-6">
                        

                        <div class="col-3">
                            <button type="button" class="btn next-style text-white col-12 py-1"
                                onclick="shipment_images_upload(this.id)" id="attachments`_shipment"
                                style="cursor: pointer;">
                                <div class="unskew">Finish</div>
                            </button>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
