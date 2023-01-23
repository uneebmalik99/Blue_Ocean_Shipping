@extends('layouts.partials.mainlayout')
@section('body')
    <style>
        .profile_img {
            border: 3px solid #4a6da2 !important;
            border-radius: 100px !important;
        }

        .all_roles {
            background: rgba(255, 255, 255, 0.76);
            box-shadow: 3px 5px 3px rgba(92, 174, 235, 0.65);
            border-radius: 10px;
            padding-bottom: 16px;
            height: 230px;
        }

        .all_roles h5 {
            color: #2C77E7;
            padding: 15px 14px;
            font-weight: bold;
        }

        .roles a {
            color: #214986 !important;
            padding: 1px 14px;
            font-size: 13px;
            font-weight: bold;
        }

        .role_buttons {
            justify-content: center;
            align-items: center;
            margin-top: 22px;
        }

        .role_buttons button {
            width: 56px;
            border-radius: 12px;
            height: 38px;
            text-align: center;
            display: flex;
            justify-content: center;

        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #e1e7ed;
            /* text-align: center; */
        }

        h3 {
            font-size: 18px;
            font-weight: 500;
            color: #33363b;
        }

        p {
            font-size: 14px;
            color: #868d9b;
        }

        .card {
            width: 285px;
            height: 275px;
            background-color: #ffffff;
            margin: 0 auto;

            box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.15);
            float: left !important;
            margin-left: 0% !important;
            margin-top: 61px !important;
        }

        .card_profile_img {
            width: 120px;
            height: 120px;
            background-color: #1F689E;
            background: url(https://source.unsplash.com/7Sz71zuuW4k);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border: 3px solid #1f689e;
            border-radius: 120px;
            margin: 0 auto;
            margin-top: -111px;
        }

        .halfdiv {
            width: 100%;
            height: 180px;
            background-color: #1F689E;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /* margin-right: -12px; */

            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            margin-top: -60px;
        }



        .user_details p {
            margin-bottom: 20px;
            margin-top: -5px;
            color: black !important;
        }

        .user_details h3 {
            margin-top: 10px;
            color: #1F689E;
        }

        .card_count {
            padding: 30px;
            border-top: 1px solid #dde1e7;
        }

        .count {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .count p {
            margin-top: -10px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
            margin-top: 47px !important;
        }

        th,
        td {
            float: left !important;
            color: #1F689E;
        }

        .data {
            color: #1F689E !important;
            float: left !important;
        }

        h3 {
            font-size: 25px;
            font-weight: 500;
            color: #1f689e;
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


    <div class="container">
        <div class="row mt-2">
            <div style="margin-top: -110px">
                <h3>User Profile</h3>
            </div>
        </div>
        <div class="row">
            <div class="card width:15%">
                <div class="halfdiv shadow p-3 mb-5"></div>
                <div>
                    {{-- {{ auth()->user()->user_image }} --}}
                    @if (auth()->user()->user_image != null)
                        <img src="{{ asset(auth()->user()->user_image) }}" alt="profile_image" class="profile_img"
                            style="position:absolute;top: 22%;   width: 120px;border-radius:50%!important;">
                    @else
                        <img src="{{ asset('assets/images/user.png') }}" alt="profile_image" class="profile_img"
                            style="position:absolute;top: 15%;  right: 28.5%; width: 120px;">
                    @endif
                </div>
                <div style="background-color: red">

                </div>

                <div class="text-center">

                    {{ strtoupper(@$records['username']) }}

                    </h3>
                    <span>
                        <p style="font-size:12px!important;">{{ strtoupper(@$records['email']) }}</p>
                    </span>

                </div>

            </div>


            <div class="admin_data col-8" style="background-color: white ; border-radius:10px; height235px!important ">
                <button type="button" class="btn btn-primary"
                    style="float: right;margin-top: 24px;background-color:#1f689e!important;" id="{{ @$records['id'] }}" onclick="editUser(this.id)"><i
                        class="far fa-edit"></i> Edit</button>
                <div class="row" style="border-bottom:1px solid #0c0b0b4d; margin-top:10%">
                    <div class="col-4" style="color: #1F689E!important">
                        <p class="data"><b>Company: </b></p>
                    </div>
                    <div class="col-8" style="color: #1F689E">
                        <p class="data">{{ @$records['company_name'] }} </p>
                    </div>
                </div>
                <div class="row" style="border-bottom:1px solid #0c0b0b4d">
                    <div class="col-4" style="color: #1F689E!important">
                        <p class="data"><b>Email:</b></p>
                    </div>
                    <div class="col-8" style="color: #1F689E">
                        <p class="data">{{ @$records['email'] }}</p>
                    </div>
                </div>
                <div class="row" style="border-bottom:1px solid #0c0b0b4d">
                    <div class="col-4" style="color: #1F689E!important">
                        <p class="data"><b>Phone:</b></p>
                    </div>
                    <div class="col-8" style="color: #1F689E">
                        <p class="data">{{ @$records['phone'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4" style="color: #1F689E!important">
                        <p class="data"><b>Address: </b></p>
                    </div>
                    <div class="col-8" style="color: #1F689E">
                        <p class="data">{{ @$records['address_line1'] }}</p>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-lg-8">



            <input type="hidden" id="user_id" va class="form-control mt-1 profile_input col-4"
                value="{{ @$records['id'] }}">





        </div>
    </div>



    <div class="row mb-3">
        <div class="col-5">
            <div class="all_roles">
                <h5>Roles</h5>
                <div class="assign_roles roles d-flex flex-column">
                    @foreach ($roles as $role)
                        <a> <input type="checkbox" name="{{ @$role['name'] }}"
                                value="{{ @$role['name'] }}" />&nbsp&nbsp{{ @$role['name'] }}</a>
                    @endforeach

                </div>

            </div>
        </div>
        <div class="col-2">
            <div class="role_buttons d-flex flex-column">
                <button class="btn btn-success" onclick="assignRoleToUser()">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 10L12 1V5.99L1 6V14H12V19L19 10Z" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button><br>
                <button class="btn btn-danger" onclick="dismissRoleToUser()">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M1.85785 10.2105L9.02204 19.0592L8.93012 14.0702L19.9274 13.8252L19.7801 5.82678L8.78258 6.06177L8.69047 1.06275L1.85785 10.2105Z"
                            stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </button>
            </div>
        </div>
        <div class="col-5">
            <div class="all_roles">
                <h5>Roles</h5>
                <div class="dismiss_roles roles d-flex flex-column">
                    @foreach ($assignRoles as $role)
                        <a> <input style="margin-left: 27px!important;" type="checkbox" name="{{ @$role }}"
                                value="{{ @$role }}" />&nbsp&nbsp{{ @$role }}</a>
                    @endforeach

                </div>

            </div>
        </div>
    </div>


    <div class="row mb-3">
        <div class="col-5">
            <div class="all_roles">
                <h5>All Permissions</h5>
                <div class="roles d-flex flex-column">
                    @foreach ($permissions as $permission)
                        <a>{{ @$permission['name'] }}</a>
                    @endforeach
                </div>

            </div>
        </div>
        <div class="col-2">
            <div class="role_buttons d-flex flex-column">
                {{-- <button class="btn btn-success">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 10L12 1V5.99L1 6V14H12V19L19 10Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </button><br>
                        <button class="btn btn-danger">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.85785 10.2105L9.02204 19.0592L8.93012 14.0702L19.9274 13.8252L19.7801 5.82678L8.78258 6.06177L8.69047 1.06275L1.85785 10.2105Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        </button> --}}
            </div>
        </div>
        <div class="col-5">
            <div class="all_roles">
                <h5>Permissions Assigned</h5>
                <div class="roles d-flex flex-column">
                    @foreach ($assignPermissions as $permission)
                        <a>{{ @$permission['name'] }}</a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
@endsection
