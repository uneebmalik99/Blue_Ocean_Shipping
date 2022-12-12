@extends('layouts.partials.mainlayout')
@section('body')
<style>
    .boxi {
        border: 1px solid #1F689E;
        ;
        filter: drop-shadow(0px 0px 4px rgba(31, 104, 158, 0.19)) !important;
        color: #1F689E !important;
        border-radius: 3px !important;
    }
    
    .boxi-1 {
        background: linear-gradient(0deg, #1F689E, #1F689E), rgba(255, 255, 255, 0.13) !important;
        box-shadow: 3px 5px 16px rgba(31, 104, 158, 0.86) !important;
        border-radius: 10px !important;
    }
    
    /* .text span {
        color: white;
    }
    
    h5 {
        color: #214986;
    }
    
    h4 {
        color: #214986;
    }
    
    h3 {
        color: #1F689E;
    }
    
    span {
        color: #214986;
    }
     */
    .sheet {
        background: rgba(255, 255, 255, 0.13) !important;
        box-shadow: 3px 5px 16px rgba(31, 104, 158, 0.86);
        border-radius: 10px
    }
    
    hr {
        background: #1F689E !important;
        border-radius: 10px !important;
    }
    
    h6 {
        color: #214986 !important;
    }
    
    .b_pic {
        background-image: url("/public/image/bg_sheet.png")!important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-size: cover !important;
    }
    
    .f-b {
        background: rgba(255, 255, 255, 0.13) !important;
        box-shadow: 3px 5px 16px rgba(31, 104, 158, 0.86) !important;
        border-radius: 10px !important;
    }
    
    input {
        background: rgba(255, 255, 255, 0.13) !important;
        box-shadow: 0px 0px 5px rgba(31, 104, 158, 0.86) !important;
        border-radius: 10px !important;
    }
    
    .btn {
        background: #7ABAE9 !important;
        box-shadow: 8px 8px 4px rgba(31, 104, 158, 0.19) !important;
        border-radius: 10px !important;
    }
    
    .unknow {
        background-image: url("/public/image/Group\ 142.png")!important;
        background-repeat: no-repeat !important;
        background-position: bottom !important;
        background-size: cover !important;
    }
    
    @media screen and (max-width: 555px) {
        h6 {
            font-size: 12px;
        }
    }
    
    @media screen and (max-width: 420px) {
        h6 {
            font-size: 10px;
        }
    }
    
    @media screen and (max-width: 656px) {
        span {
            font-size: 12px;
        }
    }
    
    @media screen and (max-width: 482px) {
        span {
            font-size: 10px;
            font-weight: 380px;
        }
    }
    
    @media screen and (max-width: 482px) {
        span {
            font-size: 10px;
            font-weight: 350px;
        }
    }
    
    @media screen and (max-width: 404px) {
        span {
            font-size: 9px;
            font: weight 300px;
        }
    }
    
    @media (min-width: 404px) and (max-width: 404px) {
        span {
            font-size: 9px;
            font-weight: 200px;
        }
    }
</style>



<div class="container-fluid p-0">
    <div>
        <div class="unknow p-5">

        </div>
    </div>
    <div>
        <div class="p-2 p-sm-3 p-md-4">
            <div class="row row m-sm-0 m-lg-3 m-0">
                <div class="col-8">
                    <h3><b>MASTER</b></h3>
                </div>
            </div>
            <div class="row m-sm-0 m-lg-3 m-0">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 boxi boxi-1 d-flex p-3">
                    <div class="col-2 text"><span><b>CITY</b></span></div>
                    <div class="col-2 text-center text"><span><b>AUCTION</b></span></div>
                    <div class="col-2 text-center text"><span><b>NEW JERSERY</b></span></div>
                    <div class="col-2 text-center text"><span><b>GEORGIA</b></span></div>
                    <div class="col-1 text-center text"><span><b>TESES</b></span></div>
                    <div class="col-2 text-center text"><span><b>CALIFORNIA</b></span></div>
                    <div class="col-1 text-center text"><span><b>SEATTLE</b></span></div>
                </div>
                <!-- creat -->
                <div class="d-none d-lg-block col-3 ms-3 gx-5 d-lg-flex align-items-lg-end justify-content-lg-start">
                    <div>
                        <h5 class="m-0"><b>Create Towing Rate</b></h5>
                    </div>
                </div>
            </div>
            <div class="row m-0 mt-3 m-sm-0 m-lg-3  d-flex justify-content-between">
                <!-- sheet -->
                <div class="b_pic mt-sm-3 mt-lg-0 col-12 col-sm-12 col-md-12 col-lg-8 col border sheet p-2">
                    <div class="d-flex text-center p-2">
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
                    <hr class="m-0">
                    <div class="d-flex text-center p-2">
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
                    <hr class="m-0">
                    <div class="d-flex text-center p-2">
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
                    <hr class="m-0">
                    <div class="d-flex text-center p-2">
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
                    <hr class="m-0">
                </div>
                <div class="col-12  col-lg-4 mt-4 mt-lg-0">
                    <div class="text-center d-lg-none d-block">
                        <h4><b>Create</b></h4>
                    </div>
                    <div class="col-12 mt-4 mt-lg-0 ms-lg-3">
                        <div class="f-b border p-4">
                            <form action="" method="">
                                <div class="form-group">
                                    <input type="text" name="container_size" class="form-control mb-3" placeholder="Enter City name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Vehicle" class="form-control mb-3" placeholder="Enter Auction">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Landing_Port" class="form-control mb-3" placeholder="Enter Rate">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="Destination" class="form-control mb-3" placeholder="Enter port of Loading">
                                </div>
                                <div class="d-flex justify-content-between pt-3">
                                    <button type="" class="btn text-white"><b>Reset</b></button>
                                    <button type="" class="btn text-white"><b>Save</b></button>
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