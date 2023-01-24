@extends('layouts.partials.mainlayout')
@section('body')
    <style>
        .bootstrap-tagsinput {
            background-color: #aadbff !important;
            border: none;
            border-radius: 10px !important;
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
                        <h2 style="color:#1F689E;font-size:22px;margin-left: 6px;" class="px-1">User</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="bg-white rounded p-2">
        {{-- badges start --}}
        <div class="d-flex m-2" style="width: 100%">
            <div class="row"style="width:103%;margin-left:-18px">

                <div class="col-lg-4 col-md-4 order-sm-12 col-12"style="margin-top: 10px; margin-left:-22px">
                    <div class="col-12 py-0 px-0" style="margin-left:21px">
                        <div class="col-12 border-style card-rounded py-2 px-3">
                            <div class="d-flex">
                                <div class="col-10 text-muted p-0 d-flex align-items-center">
                                    <div class="font-size"><span>All Users</span></div>
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
                                <div class="font-bold"><span>{{ @$all_user }}</span> </div>
                                <div class="py-1 col-12 text-muted p-0 font-size">
                                    {{-- <span>Last week Analytics</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 order-sm-12 col-12"style="margin-top: 10px;">
                    <div class="col-12 py-0 px-0" style="margin-left: 13px">
                        <div class="col-12 border-style card-rounded py-2 px-3">
                            <div class="d-flex">
                                <div class="col-10 text-muted p-0 d-flex align-items-center">

                                    <div class="font-size"><span>Active Users</span></div>
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
                                <div class="font-bold"><span>{{ @$active_user }}</span> </div>
                                <div class="py-1 col-12 text-muted p-0 font-size">
                                    {{-- <span>Total Customers
                                    <b>{{ $records->count() }}</b>
                                </span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 order-sm-12 col-12"style="margin-top: 10px; margin-left:-22px">
                    <div class="col-12 py-0 px-0" style="margin-left:21px">
                        <div class="col-12 border-style card-rounded py-2 px-3">
                            <div class="d-flex">
                                <div class="col-10 text-muted p-0 d-flex align-items-center">
                                    <div class="font-size"><span>In Active Users</span></div>
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
                                <div class="font-bold"><span>{{ @$inactive_user }}</span> </div>
                                <div class="py-1 col-12 text-muted p-0 font-size">
                                    {{-- <span>Last week Analytics</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
        {{-- badges end --}}
        {{-- TABS --}}
        <div class="container-fluid">
            <div class="d-flex m-4" style="
            width: 94%;
            margin-right: 2px;">
                {{-- <button class="text-center form-control border next-style reporting_cls " id="users">
                    <a href="{{ route('user.list') }}" style="text-decoration: none!important;"
                    ><div class="unskew" style="color:black;">Users</div></a>
                    
                </button> --}}

                <button class="text-center form-control border next-style reporting_cls" id="users"
                    onclick="user_section(this.id)">
                    <div class="unskew">Users</div>
                </button>

                <button class="text-center form-control border tab_style reporting_cls" id="permissions"
                    onclick="user_section(this.id)">
                    <div class="unskew">Permissions</div>
                </button>

                <button class="text-center form-control border tab_style reporting_cls " id="roles"
                    onclick="user_section(this.id)">
                    <div class="unskew">Roles</div>
                </button>



            </div>
        </div>
        {{-- listing start --}}
        <div class="main-box">
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
                            <div class="col-4 p-0">
                                <span class="h5 text-muted">
                                    {{-- <b>Search Filter</b> --}}
                                </span>
                            </div>
                            <div class=" col-4 d-flex justify-content-end p-0">

                                <div class=" col-6 px-0 d-flex justify-content-center">
                                    <button type="button" id="add_new_user" onclick="createUser()"
                                        class="text-white form-control-sm border py-1 btn-info rounded modal_button col-12"
                                        id="customer" style="background: #3e5871;" data-target="#exampleModal">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <svg width="18" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19 7.99911H17V10.9991H14V12.9991H17V15.9991H19V12.9991H22V10.9991H19V7.99911ZM4 7.99911C3.98768 8.52776 4.08273 9.05342 4.27939 9.54429C4.47605 10.0352 4.77024 10.481 5.14415 10.855C5.51807 11.2289 5.96395 11.5231 6.45482 11.7197C6.94569 11.9164 7.47134 12.0114 8 11.9991C8.52866 12.0114 9.05431 11.9164 9.54518 11.7197C10.0361 11.5231 10.4819 11.2289 10.8558 10.855C11.2298 10.481 11.524 10.0352 11.7206 9.54429C11.9173 9.05342 12.0123 8.52776 12 7.99911C12.0123 7.47045 11.9173 6.94479 11.7206 6.45392C11.524 5.96305 11.2298 5.51718 10.8558 5.14326C10.4819 4.76934 10.0361 4.47516 9.54518 4.2785C9.05431 4.08184 8.52866 3.98679 8 3.99911C7.47134 3.98679 6.94569 4.08184 6.45482 4.2785C5.96395 4.47516 5.51807 4.76934 5.14415 5.14326C4.77024 5.51718 4.47605 5.96305 4.27939 6.45392C4.08273 6.94479 3.98768 7.47045 4 7.99911ZM10 7.99911C10.0129 8.26516 9.96993 8.53096 9.87398 8.77943C9.77802 9.02791 9.63115 9.25356 9.4428 9.44191C9.25446 9.63026 9.0288 9.77712 8.78032 9.87308C8.53185 9.96904 8.26605 10.012 8 9.99911C7.73395 10.012 7.46815 9.96904 7.21968 9.87308C6.9712 9.77712 6.74554 9.63026 6.5572 9.44191C6.36885 9.25356 6.22198 9.02791 6.12602 8.77943C6.03007 8.53096 5.98714 8.26516 6 7.99911C5.98714 7.73306 6.03007 7.46726 6.12602 7.21878C6.22198 6.97031 6.36885 6.74465 6.5572 6.55631C6.74554 6.36796 6.9712 6.22109 7.21968 6.12513C7.46815 6.02917 7.73395 5.98625 8 5.99911C8.26605 5.98625 8.53185 6.02917 8.78032 6.12513C9.0288 6.22109 9.25446 6.36796 9.4428 6.55631C9.63115 6.74465 9.77802 6.97031 9.87398 7.21878C9.96993 7.46726 10.0129 7.73306 10 7.99911ZM4 17.9991C4 17.2035 4.31607 16.4404 4.87868 15.8778C5.44129 15.3152 6.20435 14.9991 7 14.9991H9C9.79565 14.9991 10.5587 15.3152 11.1213 15.8778C11.6839 16.4404 12 17.2035 12 17.9991V18.9991H14V17.9991C14 17.3425 13.8707 16.6923 13.6194 16.0857C13.3681 15.4791 12.9998 14.9279 12.5355 14.4636C12.0712 13.9993 11.52 13.631 10.9134 13.3797C10.3068 13.1284 9.65661 12.9991 9 12.9991H7C5.67392 12.9991 4.40215 13.5259 3.46447 14.4636C2.52678 15.4013 2 16.673 2 17.9991V18.9991H4V17.9991Z"
                                                    fill="#FBFBFB" />
                                            </svg>
                                            <span class="pl-2 font-size">Add User</span>
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
                    <div class="mt-2 bg-light">
                        <table id="user_table1" class="row-border" style="width:100%!important;overflow-x:scroll!important;">
                            <thead class="bg-custom">
                                <tr class="font-size">
                                    <th class="font-bold-tr">User ID</th>
                                    <th class="font-bold-tr">User Name</th>
                                    <th class="font-bold-tr">Company Name</th>
                                    <th class="font-bold-tr">CITY</th>
                                    <th class="font-bold-tr">PHONE</th>
                                    <th class="font-bold-tr">ROLES</th>
                                    <th class="font-bold-tr">STATUS</th>

                                    <th class="font-bold-tr">Created Date</th>
                                    @can(['delete', 'edit'])
                                        <th class="font-bold-tr">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody class="bg-white font-size" id="tbody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- listing end --}}





    <script type="text/javascript">
        $(function() {
            s = '{{ @$state }}';

            if (s) {
                state = s;
            } else {
                state = '';
            }
            var table = $('#user_table1').DataTable({

                destroy: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                'scrollX': true,
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
                ajax: "{{ route('user.records') }}" + "/" + state,

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
                        data: 'city',
                        name: 'city'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'role',
                        name: 'role'
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
