{{-- <div class="d-flex justify-content-between">
    <div>
        <button class="border-0 form-control text-muted"> <i class="ti-user"></i><b> Account</b></button>
    </div>
    <div>
        <button class="border-0 form-control text-muted"><i class="ti-truck"></i> <b>Consignee</b></button>
    </div>
    <div>
        <button class="border-0 form-control text-muted"><i class="ti-clipboard"></i><b> Billing
                Information</b></button>
    </div>
    <div>
        <button class="btn btn-info form-control rounded"><i class="ti-bell"></i><b>
                Notifications</b></button>
    </div>
    <div>
        <button class="border-0 form-control text-muted"><i class="fa-solid fa-link"></i><b>
                documents</b></button>
    </div>
</div> --}}
<div class="card user-card rounded mt-3">
    <div class="px-3 d-flex justify-cotent center">
        <h6 class="text-muted"><b>Notifications</b></h6>
    </div>
    <div class="col-12 mt-2 d-flex">
        <div class="col-5 pl-0">
            <div class="card user-card border border-info rounded p-3 h-100">
                <div class="d-flex">
                    <input class="form-control border border-info rounded" type="text">
                </div>
                {{-- @dd($notification) --}}
                @if ($notification)
                    @foreach ($notification as $notifications)
                        <div class="card-body border border-info rounded d-flex mt-3 p-2">
                            <div>
                                <div class="row col-12 d-flex justify-content-around">
                                    <div class="text-left p-0">
                                        <span>
                                            <i class="fa-solid fa-clock-rotate-left px-1"></i><b class=" text-dark">{{@$notifications['subject']}}</small></b>
                                        </span>
                                    </div>
                                    <div class="col-3" style="background-color:#E7E7FF; border-radius:px;">
                                        1
                                    </div>
                                </div>
                                <div>
                                    <span class="text-muted">
                                        {{strip_tags(@$notifications['message'])}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- <div class="card-body-sm border border-info rounded d-flex mt-3 p-2">
                    <div class="d-block">
                        <div class="text-left p-0">
                            <span>
                                <i class="fa-solid fa-clipboard-list px-1"></i><b class=" text-dark">Terms and
                                    Condition update</small></b>
                            </span>
                        </div>
                        <div>
                            <span class="text-muted">
                                Hey jon, do you remember....
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body-sm border border-info rounded d-flex mt-3 p-2">
                    <div class="d-block">
                        <div class="text-left p-0">
                            <span>
                                <i class="fa-solid fa-car px-1"></i><b class=" text-dark">Add new vehicle</small></b>
                            </span>
                        </div>
                        <div>
                            <span class="text-muted">
                                Hey jon, do you remember....
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body-sm border border-info rounded d-flex mt-3 p-2">
                    <div class="d-block">
                        <div class="text-left p-0">
                            <span>
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 16V6L6 0L12 6V16H0ZM2 14H5V11H7V14H10V6.825L6 2.825L2 6.825V14ZM5 9V7H7V9H5ZM14 16V5.175L8.825 0H11.65L16 4.35V16H14ZM18 16V3.525L14.475 0H17.3L20 2.7V16H18ZM2 14H10H2Z"
                                        fill="#EF5757" />
                                </svg>
                                <b class=" text-dark">Holiday</small></b>
                            </span>
                        </div>
                        <div>
                            <span class="text-muted">
                                Hey jon, do you remember....
                            </span>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="card-body-sm border border-info rounded d-flex mt-3 p-2">
                    <div class="d-block">
                        <div class="text-left p-0">
                            <span>
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 16V6L6 0L12 6V16H0ZM2 14H5V11H7V14H10V6.825L6 2.825L2 6.825V14ZM5 9V7H7V9H5ZM14 16V5.175L8.825 0H11.65L16 4.35V16H14ZM18 16V3.525L14.475 0H17.3L20 2.7V16H18ZM2 14H10H2Z"
                                        fill="#EF5757" />
                                </svg>
                                <b class=" text-dark">Holiday</small></b>
                            </span>
                        </div>
                        <div>
                            <span class="text-muted">
                                Hey jon, do you remember....
                            </span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-7 px-0">
            <div class="card user-card border border-info rounded p-3 h-100">
                <div class="row d-flex align-items-center">
                    <div class="px-2">
                        <svg class="px-1" width="28" height="28" viewBox="0 0 28 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5 9.12565V14.6457C12.5 15.1707 12.785 15.6656 13.235 15.9356L17.915 18.7107C18.455 19.0257 19.145 18.8456 19.46 18.3207C19.775 17.7806 19.61 17.0907 19.07 16.7757L14.765 14.2107V9.11065C14.75 8.51065 14.24 8.00065 13.625 8.00065C13.01 8.00065 12.5 8.51065 12.5 9.12565ZM27.5 10.2507V2.31565C27.5 1.64065 26.69 1.31065 26.225 1.79065L23.555 4.46065C22.1499 3.05547 20.4522 1.97744 18.5829 1.30334C16.7136 0.629233 14.7186 0.37565 12.74 0.56065C6.45502 1.13065 1.28002 6.18565 0.590022 12.4706C0.225284 15.9947 1.2605 19.5209 3.47233 22.2886C5.68417 25.0562 8.89533 26.8434 12.4131 27.2647C15.9308 27.686 19.4732 26.7075 22.276 24.5404C25.0788 22.3732 26.9173 19.1912 27.395 15.6806C27.5 14.7807 26.795 14.0007 25.895 14.0007C25.145 14.0007 24.515 14.5556 24.425 15.2906C23.78 20.5257 19.265 24.5756 13.85 24.5007C8.28502 24.4256 3.59002 19.7306 3.50002 14.1507C3.41002 8.30065 8.16502 3.50065 14 3.50065C16.895 3.50065 19.52 4.68565 21.425 6.57565L18.29 9.71065C17.81 10.1906 18.14 11.0007 18.815 11.0007H26.75C27.17 11.0007 27.5 10.6706 27.5 10.2507Z"
                                fill="#EF5757" />
                        </svg>
                    </div>
                    <h4 class="h5 text-dark"><b>Rate Update</b></h4>
                </div>
                <div class="row mt-4 px-2 d-flex justify-content-around">
                    <div>
                        <h5 class="text-dark"><b>Subject</b></h5>
                    </div>
                    <div>
                        <h5 class="text-dark"><b>Clear Date</b></h5>
                    </div>
                    <div>
                        <h5 class="text-dark"><b>Expiry Date</b></h5>
                    </div>
                </div>
                <div class="row mt-4 px-2 d-flex justify-content-around">
                    <div>
                        <h6 class="text-muted"><b>Demo</b></h6>
                    </div>
                    <div>
                        <h6 class="text-muted"><b>12-08-2022</b></h6>
                    </div>
                    <div>
                        <h6 class="text-muted"><b>12-08-2022</b></h6>
                    </div>
                </div>
                <div class="row d-flex mt-4">
                    <div class="px-2 text-dark">
                        <h4><b>Message</b></h4>
                    </div>
                </div>
                <div class="row d-flex mt-4">
                    <div class="px-2 text-dark col-12 text-left">
                        asadsadadjsadlasjdasdjaslkdjsadajsdklsajdaskldjsadklasjdaskl
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
