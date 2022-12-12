

@extends('layouts.partials.mainlayout')
@section('body')
<style>
    .bootstrap-tagsinput {
      background-color: #aadbff!important;
      border: none;
      border-radius: 10px!important;
  }
</style>
    <!-- Modal -->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="z-index: 21474!important;">
        <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between title_style">
                    <div>
                        <h5 class="modal-title text-white" id="exampleModalLabel">New {{ $module['singular'] }}</h5>
                    </div>
                    <div>
                        <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close"
                            style="margin-top: -11px;
                        font-size: F26px;">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>
    {{-- Modal End --}}
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="d-flex dashboard_heading" style="margin-top:-40px!important">
                    <div>
                        <i class="fa fa-user" style="color:#1F689E"></i>
                    </div>
                    <div>
                        <h2 style="color:#1F689E;font-size:22px;margin-left: 6px;" class="px-1">Customers</h2>
                    </div>
                </div>
            </div>
        </div>

    <div class="bg-white rounded p-2">
        {{-- badges start --}}
        <div class="d-flex m-2">
            <div class="col-3 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">

                                <div class="font-size"><span>Active Customers</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(105, 108, 255, 0.16); !important">
                                <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 2.16602C11.9287 2.16602 10.8814 2.4837 9.99066 3.07889C9.0999 3.67408 8.40563 4.52005 7.99565 5.50981C7.58568 6.49958 7.47841 7.58869 7.68741 8.63942C7.89642 9.69015 8.4123 10.6553 9.16984 11.4128C9.92737 12.1704 10.8925 12.6863 11.9433 12.8953C12.994 13.1043 14.0831 12.997 15.0729 12.587C16.0626 12.1771 16.9086 11.4828 17.5038 10.592C18.099 9.70125 18.4167 8.654 18.4167 7.58268C18.4167 6.14609 17.846 4.76834 16.8302 3.75252C15.8143 2.7367 14.4366 2.16602 13 2.16602ZM13 10.8327C12.3572 10.8327 11.7289 10.6421 11.1944 10.285C10.6599 9.92784 10.2434 9.42026 9.99739 8.8264C9.75141 8.23254 9.68705 7.57908 9.81245 6.94864C9.93785 6.3182 10.2474 5.73911 10.7019 5.28459C11.1564 4.83006 11.7355 4.52053 12.366 4.39513C12.9964 4.26973 13.6499 4.33409 14.2437 4.58007C14.8376 4.82606 15.3452 5.24262 15.7023 5.77708C16.0594 6.31154 16.25 6.93989 16.25 7.58268C16.25 8.44464 15.9076 9.27129 15.2981 9.88078C14.6886 10.4903 13.862 10.8327 13 10.8327ZM22.75 22.7493V21.666C22.75 19.6548 21.951 17.7259 20.5289 16.3038C19.1067 14.8816 17.1779 14.0827 15.1667 14.0827H10.8333C8.82211 14.0827 6.89326 14.8816 5.47111 16.3038C4.04896 17.7259 3.25 19.6548 3.25 21.666V22.7493H5.41667V21.666C5.41667 20.2294 5.98735 18.8517 7.00317 17.8359C8.01899 16.82 9.39674 16.2493 10.8333 16.2493H15.1667C16.6033 16.2493 17.981 16.82 18.9968 17.8359C20.0127 18.8517 20.5833 20.2294 20.5833 21.666V22.7493H22.75Z"
                                        fill="#696CFF" />
                                </svg>


                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span>{{ @$active_customer }}</span> </div>
                            <div class="py-1 col-12 text-muted p-0 font-size">
                                {{-- <span>Total Customers
                                    <b>{{ $records->count() }}</b>
                                </span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>In Active Customers</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(239, 87, 87, 0.13);!important">
                                <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.167 11.9165H23.8337V14.0832H15.167V11.9165ZM8.66699 4.33318C8.09428 4.31984 7.52482 4.42281 6.99304 4.63585C6.46127 4.8489 5.97823 5.1676 5.57316 5.57268C5.16808 5.97775 4.84938 6.46079 4.63633 6.99256C4.42328 7.52434 4.32032 8.0938 4.33366 8.66651C4.32032 9.23922 4.42328 9.80869 4.63633 10.3405C4.84938 10.8722 5.16808 11.3553 5.57316 11.7603C5.97823 12.1654 6.46127 12.4841 6.99304 12.6972C7.52482 12.9102 8.09428 13.0132 8.66699 12.9998C9.2397 13.0132 9.80917 12.9102 10.3409 12.6972C10.8727 12.4841 11.3558 12.1654 11.7608 11.7603C12.1659 11.3553 12.4846 10.8722 12.6977 10.3405C12.9107 9.80869 13.0137 9.23922 13.0003 8.66651C13.0137 8.0938 12.9107 7.52434 12.6977 6.99256C12.4846 6.46079 12.1659 5.97775 11.7608 5.57268C11.3558 5.1676 10.8727 4.8489 10.3409 4.63585C9.80917 4.42281 9.2397 4.31984 8.66699 4.33318V4.33318ZM8.66699 10.8332C8.37877 10.8471 8.09082 10.8006 7.82164 10.6967C7.55246 10.5927 7.308 10.4336 7.10396 10.2295C6.89992 10.0255 6.74081 9.78105 6.63685 9.51186C6.5329 9.24268 6.48639 8.95473 6.50033 8.66651C6.48639 8.37829 6.5329 8.09034 6.63685 7.82116C6.74081 7.55198 6.89992 7.30752 7.10396 7.10348C7.308 6.89944 7.55246 6.74033 7.82164 6.63637C8.09082 6.53242 8.37877 6.48591 8.66699 6.49985C8.95521 6.48591 9.24316 6.53242 9.51234 6.63637C9.78152 6.74033 10.026 6.89944 10.23 7.10348C10.4341 7.30752 10.5932 7.55198 10.6971 7.82116C10.8011 8.09034 10.8476 8.37829 10.8337 8.66651C10.8476 8.95473 10.8011 9.24268 10.6971 9.51186C10.5932 9.78105 10.4341 10.0255 10.23 10.2295C10.026 10.4336 9.78152 10.5927 9.51234 10.6967C9.24316 10.8006 8.95521 10.8471 8.66699 10.8332V10.8332ZM4.33366 19.4998C4.33366 18.6379 4.67607 17.8112 5.28556 17.2017C5.89505 16.5923 6.7217 16.2498 7.58366 16.2498H9.75032C10.6123 16.2498 11.4389 16.5923 12.0484 17.2017C12.6579 17.8112 13.0003 18.6379 13.0003 19.4998V20.5832H15.167V19.4998C15.167 18.7885 15.0269 18.0842 14.7547 17.427C14.4825 16.7698 14.0835 16.1727 13.5805 15.6697C13.0775 15.1667 12.4804 14.7677 11.8232 14.4955C11.166 14.2233 10.4617 14.0832 9.75032 14.0832H7.58366C6.14707 14.0832 4.76932 14.6539 3.7535 15.6697C2.73768 16.6855 2.16699 18.0633 2.16699 19.4998V20.5832H4.33366V19.4998Z"
                                        fill="#E41414" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span>{{ @$Inactive_customer }}</span> </div>
                            <div class="py-1 col-12 text-muted p-0 font-size">
                                {{-- <span>Last week Analytics</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>Shipper</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(236, 184, 0, 0.15); !important">
                                <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.1667 13.2715C14.3632 13.2715 13.5777 13.0332 12.9097 12.5868C12.2416 12.1404 11.7209 11.506 11.4134 10.7636C11.1059 10.0213 11.0255 9.20448 11.1822 8.41643C11.339 7.62838 11.7259 6.90452 12.294 6.33636C12.8622 5.76821 13.5861 5.3813 14.3741 5.22455C15.1622 5.06779 15.979 5.14824 16.7213 5.45573C17.4636 5.76321 18.0981 6.28391 18.5445 6.95198C18.9909 7.62006 19.2292 8.4055 19.2292 9.20899C19.2292 10.2864 18.8012 11.3197 18.0393 12.0816C17.2774 12.8435 16.2441 13.2715 15.1667 13.2715ZM15.1667 6.77149C14.6846 6.77149 14.2133 6.91444 13.8125 7.18228C13.4116 7.45011 13.0992 7.8308 12.9147 8.27619C12.7302 8.72159 12.682 9.21169 12.776 9.68452C12.8701 10.1573 13.1022 10.5917 13.4431 10.9326C13.784 11.2734 14.2183 11.5056 14.6911 11.5996C15.164 11.6937 15.6541 11.6454 16.0995 11.4609C16.5449 11.2765 16.9255 10.964 17.1934 10.5632C17.4612 10.1623 17.6042 9.69108 17.6042 9.20899C17.6042 8.56252 17.3474 7.94253 16.8902 7.48541C16.4331 7.02829 15.8131 6.77149 15.1667 6.77149V6.77149ZM22.75 20.8548C22.5354 20.852 22.3303 20.7655 22.1786 20.6137C22.0268 20.462 21.9403 20.2569 21.9375 20.0423C21.9375 17.9298 20.7892 16.5215 15.1667 16.5215C9.54417 16.5215 8.39583 17.9298 8.39583 20.0423C8.39583 20.2578 8.31023 20.4645 8.15786 20.6168C8.00548 20.7692 7.79882 20.8548 7.58333 20.8548C7.36785 20.8548 7.16118 20.7692 7.00881 20.6168C6.85644 20.4645 6.77083 20.2578 6.77083 20.0423C6.77083 14.8965 12.6533 14.8965 15.1667 14.8965C17.68 14.8965 23.5625 14.8965 23.5625 20.0423C23.5597 20.2569 23.4732 20.462 23.3214 20.6137C23.1697 20.7655 22.9646 20.852 22.75 20.8548V20.8548ZM9.01333 14.149H8.66667C7.80471 14.0657 7.01116 13.6433 6.46059 12.9749C5.91001 12.3065 5.64751 11.4468 5.73083 10.5848C5.81416 9.72287 6.23647 8.92931 6.90489 8.37874C7.5733 7.82816 8.43305 7.56566 9.295 7.64899C9.40552 7.65374 9.51391 7.68101 9.61352 7.72912C9.71313 7.77724 9.80187 7.84519 9.87429 7.92881C9.94671 8.01243 10.0013 8.10996 10.0347 8.21542C10.0681 8.32088 10.0796 8.43205 10.0685 8.54212C10.0574 8.65219 10.024 8.75883 9.97025 8.85552C9.9165 8.95221 9.84358 9.0369 9.75594 9.10441C9.6683 9.17191 9.5678 9.22082 9.4606 9.24811C9.3534 9.27541 9.24175 9.28053 9.1325 9.26315C8.92102 9.24207 8.70747 9.26381 8.50458 9.3271C8.3017 9.39038 8.11365 9.49391 7.95167 9.63149C7.78714 9.7642 7.65068 9.92834 7.55024 10.1143C7.4498 10.3003 7.3874 10.5045 7.36667 10.7148C7.34427 10.9278 7.36448 11.1431 7.42612 11.3483C7.48777 11.5534 7.58962 11.7442 7.72574 11.9095C7.86185 12.0749 8.02952 12.2115 8.21896 12.3114C8.4084 12.4113 8.61583 12.4725 8.82917 12.4915C9.18183 12.5217 9.5349 12.4381 9.83667 12.2532C10.0206 12.1397 10.242 12.1039 10.4523 12.1536C10.6625 12.2034 10.8444 12.3347 10.9579 12.5186C11.0714 12.7025 11.1072 12.9239 11.0574 13.1342C11.0077 13.3444 10.8764 13.5263 10.6925 13.6398C10.19 13.9603 9.60915 14.1364 9.01333 14.149V14.149ZM3.25 20.0423C3.03538 20.0395 2.83035 19.953 2.67858 19.8012C2.52681 19.6495 2.44031 19.4444 2.4375 19.2298C2.4375 16.3048 3.2175 14.3548 7.04167 14.3548C7.25716 14.3548 7.46382 14.4404 7.61619 14.5928C7.76856 14.7452 7.85417 14.9518 7.85417 15.1673C7.85417 15.3828 7.76856 15.5895 7.61619 15.7418C7.46382 15.8942 7.25716 15.9798 7.04167 15.9798C4.49583 15.9798 4.0625 16.7923 4.0625 19.2298C4.05969 19.4444 3.97319 19.6495 3.82142 19.8012C3.66965 19.953 3.46462 20.0395 3.25 20.0423V20.0423Z"
                                        fill="#ECB800" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span class="px-1">{{ @$shipper->count() }}</span>
                                {{-- <span class="percent_size">
                                    ({{ @$lastweekanalysis }}%)
                                </span> --}}
                                 </div>
                            <div class="py-1 col-12 text-muted p-0 font-size">
                                {{-- <span>Last week Analytics</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 p-1">
                <div class="col-12 py-0 px-1">
                    <div class="col-12 border-style card-rounded py-2 px-3">
                        <div class="d-flex">
                            <div class="col-10 text-muted p-0 d-flex align-items-center">
                                <div class="font-size"><span>Consignees</span></div>
                            </div>
                            <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                style="background: rgba(193, 23, 129, 0.12); !important">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.7134 6.6398C20.575 6.44229 20.391 6.28104 20.1771 6.16967C19.9632 6.0583 19.7256 6.0001 19.4845 6H15.75V3.75C15.7496 3.35231 15.5914 2.97104 15.3102 2.68983C15.029 2.40863 14.6477 2.25045 14.25 2.25H2.25C1.85231 2.25045 1.47104 2.40863 1.18983 2.68983C0.908625 2.97104 0.750447 3.35231 0.75 3.75V19.125H3.23822C3.37 19.8611 3.75642 20.5273 4.32986 21.0072C4.9033 21.4871 5.62725 21.7501 6.375 21.7501C7.12275 21.7501 7.8467 21.4871 8.42014 21.0072C8.99358 20.5273 9.38 19.8611 9.51178 19.125H14.4882C14.62 19.8611 15.0064 20.5273 15.5799 21.0072C16.1533 21.4871 16.8772 21.7501 17.625 21.7501C18.3728 21.7501 19.0967 21.4871 19.6701 21.0072C20.2436 20.5273 20.63 19.8611 20.7618 19.125H23.25V10.6182C23.2504 10.3873 23.1793 10.162 23.0467 9.97308L20.7134 6.6398ZM2.24906 3.75H14.25V12H2.25L2.24906 3.75ZM6.375 20.25C6.04124 20.25 5.71498 20.151 5.43748 19.9656C5.15997 19.7802 4.94368 19.5166 4.81595 19.2083C4.68823 18.8999 4.65481 18.5606 4.71992 18.2333C4.78504 17.9059 4.94576 17.6053 5.18176 17.3693C5.41776 17.1333 5.71844 16.9725 6.04578 16.9074C6.37313 16.8423 6.71243 16.8757 7.02078 17.0035C7.32913 17.1312 7.59268 17.3475 7.77811 17.625C7.96353 17.9025 8.0625 18.2287 8.0625 18.5625C8.062 19.0099 7.88405 19.4388 7.56769 19.7552C7.25133 20.0716 6.8224 20.2495 6.375 20.25V20.25ZM17.625 20.25C17.2912 20.25 16.965 20.151 16.6875 19.9656C16.41 19.7802 16.1937 19.5166 16.066 19.2083C15.9382 18.8999 15.9048 18.5606 15.9699 18.2333C16.035 17.9059 16.1958 17.6053 16.4318 17.3693C16.6678 17.1333 16.9684 16.9725 17.2958 16.9074C17.6231 16.8423 17.9624 16.8757 18.2708 17.0035C18.5791 17.1312 18.8427 17.3475 19.0281 17.625C19.2135 17.9025 19.3125 18.2287 19.3125 18.5625C19.312 19.0099 19.1341 19.4388 18.8177 19.7552C18.5013 20.0716 18.0724 20.2495 17.625 20.25V20.25ZM21.75 17.625H20.6716C20.4712 16.9734 20.0671 16.4033 19.5188 15.9983C18.9704 15.5933 18.3067 15.3747 17.625 15.3747C16.9433 15.3747 16.2796 15.5933 15.7312 15.9983C15.1829 16.4033 14.7788 16.9734 14.5784 17.625H9.42159C9.22115 16.9734 8.8171 16.4033 8.26877 15.9983C7.72043 15.5933 7.05669 15.3747 6.375 15.3747C5.69331 15.3747 5.02957 15.5933 4.48123 15.9983C3.9329 16.4033 3.52885 16.9734 3.32841 17.625H2.25V13.5H21.75V17.625ZM21.75 12H15.75V7.5H19.4845L21.75 10.7364V12Z"
                                        fill="#C11781" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="font-bold"><span class="px-1">{{ @$consignees }}</span>
                                {{-- <span
                                    class="percent_size">({{ @$lastweekconsigneeanalysis }}%)
                                </span> --}}
                            </div>
                            <div class="py-1 col-12 text-muted p-0 font-size">
                                {{-- <span>Last week Analytics</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- badges end --}}

        {{-- listing start --}}
        <div class="px-3 mt-3">
            <div class="border-style card-rounded">
                {{-- new customer alert start --}}
                <div class="row d-flex justify-content-between">
                    <div>
                        @if (Session::has('success'))
                            <script>
                                iziToast.success({
                                    position: 'topRight',
                                    message: '{{ Session::get('success') }}',
                                });
                            </script>
                        @endif
                    </div>
                </div>
                {{-- alert end --}}
                {{-- search filter start --}}
                <div class="px-4 pt-2 mt-4">
                    <div class="d-flex justify-content-between">
                        <div class="col-6 p-0">
                            <span class="h5 text-muted">
                                {{-- <b>Search Filter</b> --}}
                            </span>
                        </div>
                        <div class="col-6 d-flex justify-content-end p-0">
                            <div class="col-4 d-flex justify-content-end px-2">
                                <a href="{{ route('customer.export') }}"
                                    class="px-1 text-muted font-size form-contorl-sm border p-1 rounded col-12"
                                    style="background: #DBDBDB; cursor: pointer;">
                                    <div class="d-flex justify-content-center align-items-center px-1">
                                        <svg width="18" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <path d="M11 16H13V7H16L12 2L8 7H11V16Z" fill="#2c3e50" />
                                            <path
                                                d="M5 22H19C20.103 22 21 21.103 21 20V11C21 9.897 20.103 9 19 9H15V11H19V20H5V11H9V9H5C3.897 9 3 9.897 3 11V20C3 21.103 3.897 22 5 22Z"
                                                fill="#2c3e50" />
                                        </svg>

                                        <span class="pl-1 font-size" style="color:#2c3e50">Export</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-5 px-0 d-flex justify-content-center">
                                <button type="button"
                                    class="text-white form-control-sm border py-1 btn-info rounded modal_button col-12"
                                    id="customer" style="background: #3e5871;" data-target="#exampleModal">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <svg width="18" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19 7.99911H17V10.9991H14V12.9991H17V15.9991H19V12.9991H22V10.9991H19V7.99911ZM4 7.99911C3.98768 8.52776 4.08273 9.05342 4.27939 9.54429C4.47605 10.0352 4.77024 10.481 5.14415 10.855C5.51807 11.2289 5.96395 11.5231 6.45482 11.7197C6.94569 11.9164 7.47134 12.0114 8 11.9991C8.52866 12.0114 9.05431 11.9164 9.54518 11.7197C10.0361 11.5231 10.4819 11.2289 10.8558 10.855C11.2298 10.481 11.524 10.0352 11.7206 9.54429C11.9173 9.05342 12.0123 8.52776 12 7.99911C12.0123 7.47045 11.9173 6.94479 11.7206 6.45392C11.524 5.96305 11.2298 5.51718 10.8558 5.14326C10.4819 4.76934 10.0361 4.47516 9.54518 4.2785C9.05431 4.08184 8.52866 3.98679 8 3.99911C7.47134 3.98679 6.94569 4.08184 6.45482 4.2785C5.96395 4.47516 5.51807 4.76934 5.14415 5.14326C4.77024 5.51718 4.47605 5.96305 4.27939 6.45392C4.08273 6.94479 3.98768 7.47045 4 7.99911ZM10 7.99911C10.0129 8.26516 9.96993 8.53096 9.87398 8.77943C9.77802 9.02791 9.63115 9.25356 9.4428 9.44191C9.25446 9.63026 9.0288 9.77712 8.78032 9.87308C8.53185 9.96904 8.26605 10.012 8 9.99911C7.73395 10.012 7.46815 9.96904 7.21968 9.87308C6.9712 9.77712 6.74554 9.63026 6.5572 9.44191C6.36885 9.25356 6.22198 9.02791 6.12602 8.77943C6.03007 8.53096 5.98714 8.26516 6 7.99911C5.98714 7.73306 6.03007 7.46726 6.12602 7.21878C6.22198 6.97031 6.36885 6.74465 6.5572 6.55631C6.74554 6.36796 6.9712 6.22109 7.21968 6.12513C7.46815 6.02917 7.73395 5.98625 8 5.99911C8.26605 5.98625 8.53185 6.02917 8.78032 6.12513C9.0288 6.22109 9.25446 6.36796 9.4428 6.55631C9.63115 6.74465 9.77802 6.97031 9.87398 7.21878C9.96993 7.46726 10.0129 7.73306 10 7.99911ZM4 17.9991C4 17.2035 4.31607 16.4404 4.87868 15.8778C5.44129 15.3152 6.20435 14.9991 7 14.9991H9C9.79565 14.9991 10.5587 15.3152 11.1213 15.8778C11.6839 16.4404 12 17.2035 12 17.9991V18.9991H14V17.9991C14 17.3425 13.8707 16.6923 13.6194 16.0857C13.3681 15.4791 12.9998 14.9279 12.5355 14.4636C12.0712 13.9993 11.52 13.631 10.9134 13.3797C10.3068 13.1284 9.65661 12.9991 9 12.9991H7C5.67392 12.9991 4.40215 13.5259 3.46447 14.4636C2.52678 15.4013 2 16.673 2 17.9991V18.9991H4V17.9991Z"
                                                fill="#FBFBFB" />
                                        </svg>
                                        <span class="pl-2 font-size">Add Customer</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="d-flex py-3 px-0">
                        <div class="col-4 p-0">
                            <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                                name="city" id="city" onchange="filterTable(this.value)">
                                <option value="" disabled selected>City</option>
                                @foreach ($location as $locations)
                                    <option value="{{ @$locations['name'] }}">{{ @$locations['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 p-0">
                            <select class="form-control-sm border-style input-border-style rounded col-11 text-muted px-2"
                                name="state" id="state" onchange="filterTable(this.value)">
                                <option value="" disabled selected>State</option>
                                @foreach ($location as $locations)
                                    <option value="{{ @$locations['name'] }}">{{ @$locations['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 p-0">
                            <select class="form-control-sm border-style input-border-style rounded col-12 text-muted"
                                name="status" id="status" onchange="filterTable(this.value)">
                                <option value="" disabled selected>Status</option>
                                <option value="all">All</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                {{-- search filter end --}}
                <div class="mt-2 bg-light" style="height: 100%;overflow-x: scroll;">
                    <table id="customer_table" class="table row-border" style="width:100%!important;">
                        <thead class="bg-custom">
                            <tr class="font-size">
                                <th class="font-bold-tr">Cust ID</th>
                                <th class="font-bold-tr">Customer Name</th>
                                <th class="font-bold-tr">Company Name</th>
                                <th class="font-bold-tr">Phone</th>
                                <th class="font-bold-tr">Status</th>
                                <th class="font-bold-tr">Created Date</th>
                                <th class="font-bold-tr">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white font-size" id="tbody">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- listing end --}}

        <script>
            function updatecustomer(id) {
                $('.btn').attr('id', id);
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('admin/customers/update') }}/' + id,
                    processData: false,
                    contentType: false,

                    success: function(data) {
                        console.log(data);
                        $('.modal-body').html(data);
                        $('#exampleModal').modal('show');
                        $('#exampleModalLabel').text('Update Customer');

                        $('.user_image').imageUploader({
                            maxFiles: 1
                        });

                    }
                });

            }
        </script>
        <script>
            function Update_Customer(id) {
                var data = document.querySelector('#updateCustomers');
                var formData = new FormData(data);
                $.ajax({
                    type: 'post',
                    url: '{{ route('customers.update') }}',
                    processData: false,
                    contentType: false,
                    data: formData,
                    success: function(data) {

                        iziToast.success({
                            title: 'Customer',
                            message: data,
                            position: 'topCenter',
                            zindex: '9999999999999',

                        });

                        $('#exampleModal').modal('hide');
                        location.reload();



                    }
                });
            }
        </script>


        <script type="text/javascript">
            $(function() {
        s = '{{@$state}}';
                
                if(s){
            state = s;
        }
        else{
            state = '';
        }
                var table = $('#customer_table').DataTable({
                    
                    processing: true,
                    serverSide: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    // scrollX: true,
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search",
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                    },
                    ajax: "{{ route('customer.records') }}" + "/" + state,
                    columns: [
                       
                        {
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'username',
                            name: 'username'
                        },
                        {
                            data: 'company_name',
                            name: 'company_name'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
            });
        </script>

        @if (Session::has('deleted'))
            <script>
                iziToast.warning({
                    position: 'topRight',
                    message: '{{ Session::get('deleted') }}',
                });
            </script>
        @endif
    @endsection
