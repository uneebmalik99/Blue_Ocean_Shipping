@extends('layouts.partials.mainlayout')
@section('body')
    <div class="container-fluid p-0">
        {{-- <div>
            <div class="unknow p-5"></div>
        </div> --}}
        <div>
            <div class="p-0">
                {{-- <div class="row row m-sm-0 m-lg-3 m-0">
                    <div class="col-8">
                        <h3><b>MASTER</b></h3>
                    </div>
                </div> --}}
                <div class="row m-sm-0 m-lg-3 m-0">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 boxi boxi-1 d-flex p-3">
                        <div class="col-1 text-center text">
                            <span class="master-locations">CITY</span>
                        </div>
                        <div class="col-2 text-center text">
                            <span class="master-locations">AUCTION</span>
                        </div>
                        <div class="col-2 text-center text">
                            <span class="master-locations">NEW JERSERY</span>
                        </div>
                        <div class="col-2 text-center text">
                            <span class="master-locations">GEORGIA</span>
                        </div>
                        <div class="col-1 text-center text">
                            <span class="master-locations">TESES</span>
                        </div>
                        <div class="col-2 text-center text">
                            <span class="master-locations">CALIFORNIA</span>
                        </div>
                        <div class="col-2 text-center text">
                            <span class="master-locations">SEATTLE</span>
                        </div>
                    </div>

                    <!-- create -->
                    <div class="d-none d-lg-block col-3 ms-3 gx-5 d-lg-flex align-items-lg-end justify-content-lg-start">
                        <div>
                            <h5 class="m-0" style="color: #214986;"><b>Create Towing Rate</b></h5>
                        </div>
                    </div>
                </div>

                <div class="row m-0 mt-3 m-sm-0 m-lg-3 d-flex justify-content-between">
                    <!-- sheet -->

                    <div class="b_pic mt-sm-3 mt-lg-0 col-12 col-sm-12 col-md-12 col-lg-8 col border sheet p-2">
                        <div class="d-flex text-center p-2">
                            <div class="col-2 text-lg-start">
                                <h6 class="tr_head">ABILENE-TX</h6>
                            </div>
                            <div class="col-2">
                                <h6 class="tr_head">AUCTION</h6>
                            </div>
                            <div class="col-2">
                                <h6 class="tr_head">$250</h6>
                            </div>
                            <div class="col-2">
                                <h6 class="tr_head">$2500</h6>
                            </div>
                            <div class="col-1">
                                <h6 class="tr_head">$500</h6>
                            </div>
                            <div class="col-2">
                                <h6 class="tr_head">$300</h6>
                            </div>
                            <div class="col-1">
                                <h6 class="tr_head">$350</h6>
                            </div>
                        </div>
                        <hr class="m-0" />

                        {{-- <div class="d-flex text-center p-2">
                            <div class="col-2 text-lg-start">
                                <h6>ABILENE-TX</h6>
                            </div>
                            <div class="col-2">
                                <h6>AUCTION</h6>
                            </div>
                            <div class="col-2">
                                <h6>$250</h6>
                            </div>
                            <div class="col-2">
                                <h6>$2500</h6>
                            </div>
                            <div class="col-1">
                                <h6>$500</h6>
                            </div>
                            <div class="col-2">
                                <h6>$300</h6>
                            </div>
                            <div class="col-1">
                                <h6>$350</h6>
                            </div>
                        </div>
                        <hr class="m-0" /> --}}

                        {{-- <div class="d-flex text-center p-2">
                            <div class="col-2 text-lg-start">
                                <h6>ABILENE-TX</h6>
                            </div>
                            <div class="col-2">
                                <h6>AUCTION</h6>
                            </div>
                            <div class="col-2">
                                <h6>$250</h6>
                            </div>
                            <div class="col-2">
                                <h6>$2500</h6>
                            </div>
                            <div class="col-1">
                                <h6>$500</h6>
                            </div>
                            <div class="col-2">
                                <h6>$300</h6>
                            </div>
                            <div class="col-1">
                                <h6>$350</h6>
                            </div>
                        </div>
                        <hr class="m-0" /> --}}

                        {{-- <div class="d-flex text-center p-2">
                            <div class="col-2 text-lg-start">
                                <h6>ABILENE-TX</h6>
                            </div>
                            <div class="col-2">
                                <h6>AUCTION</h6>
                            </div>
                            <div class="col-2">
                                <h6>$250</h6>
                            </div>
                            <div class="col-2">
                                <h6>$2500</h6>
                            </div>
                            <div class="col-1">
                                <h6>$500</h6>
                            </div>
                            <div class="col-2">
                                <h6>$300</h6>
                            </div>
                            <div class="col-1">
                                <h6>$350</h6>
                            </div>
                        </div>
                        <hr class="m-0" /> --}}
                    </div>

                    <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                        {{-- <div class="text-center d-lg-none d-block">
                            <h4><b>Create</b></h4>
                        </div> --}}
                        <div class="col-12 mt-4 mt-lg-0 ms-lg-3">
                            <div class="f-b border p-4">
                                <form action="" method="">
                                    <div class="form-group">
                                        <input type="text" name="container_size" class="form-control mb-3"
                                            placeholder="Enter City name" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="Vehicle" class="form-control mb-3"
                                            placeholder="Enter Auction" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="Landing_Port" class="form-control mb-3"
                                            placeholder="Enter Rate" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="Destination" class="form-control mb-3"
                                            placeholder="Enter port of Loading" />
                                    </div>
                                    <div class="d-flex justify-content-between pt-3">
                                        <button type="" class="btn btn_button text-white">
                                            <b>Reset</b>
                                        </button>
                                        <button type="" class="btn btn_button text-white">
                                            <b>Save</b>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
