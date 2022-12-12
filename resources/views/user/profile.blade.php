@extends('layouts.partials.mainlayout')
<style>
    .all_roles{
        background: rgba(255, 255, 255, 0.76);
        box-shadow: 3px 5px 3px rgba(92, 174, 235, 0.65);
        border-radius: 10px;
        padding-bottom: 16px;   
        height: 230px;   
    }
    .all_roles h5{
        color: #2C77E7;
        padding: 15px 14px;
        font-weight: bold;
    }
    .roles a{
        color: #214986!important;
        padding: 1px 14px;
        font-size: 13px;
        font-weight: bold;
    }
    .role_buttons{
    justify-content: center;
    align-items: center;
    margin-top: 22px;
    }
    .role_buttons button{
    width: 56px;
    border-radius: 12px;
    height: 38px;
    text-align: center;
    display: flex;
    justify-content: center;

    }
</style>
@section('body')
 
    <div class="container">
        <div class="row py-5 mt-2">
            <div class="col-lg-4 d-block profile-div">
                <div class="text d-flex justify-content-center ps-5 py-5" style="position:relative">
                    <div>
                        <img src="{{ asset('images/user.png') }}" alt="profile_image" class="profile_img"
                            style="position:absolute;top: -21%;  right: 28.5%; width: 120px;">
                    </div>
                    <div class="p-5">
                        <h3 class="pt-4 pb-1 text-center text-dark">
                            {{ strtoupper(@$records['username']) }}
                        </h3>
                        <h5 class="py-2 d-flex align-items-center">
                            <i>
                                <svg width="28" height="32" viewBox="0 0 28 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_533_78)">
                                        <path
                                            d="M13.0006 0C9.07635 0 5.86035 3.2064 5.86035 7.11984C5.86035 8.63616 6.34467 10.0454 7.16427 11.2037L12.1292 19.7868C12.8244 20.6952 13.2867 20.5226 13.8648 19.7388L19.3412 10.4196C19.4516 10.2194 19.5384 10.0063 19.614 9.78864C19.9615 8.9418 20.1402 8.03521 20.1401 7.11984C20.1404 3.2064 16.9253 0 13.0006 0ZM13.0006 3.336C15.114 3.336 16.7945 5.01264 16.7945 7.11984C16.7945 9.22704 15.114 10.903 13.0006 10.903C10.8874 10.903 9.20619 9.22728 9.20619 7.11984C9.20619 5.01264 10.8874 3.33624 13.0006 3.33624V3.336Z"
                                            fill="#214986" />
                                        <path
                                            d="M17.5395 11.7383L17.528 11.7685C17.5316 11.7594 17.5345 11.75 17.5381 11.7409L17.5395 11.7383ZM9.16183 16.574C5.77159 17.0531 3.40039 18.1991 3.40039 19.886C3.40039 22.1584 7.36231 24.0004 13.0004 24.0004C18.6385 24.0004 22.6004 22.1584 22.6004 19.886C22.6004 18.1991 20.2294 17.0531 16.8394 16.574L16.3698 17.3737C18.9248 17.7282 20.6804 18.4732 20.6804 19.3376C20.6804 20.5496 17.2419 21.532 13.0004 21.532C8.75887 21.532 5.32039 20.5496 5.32039 19.3376C5.32015 18.476 7.06423 17.7318 9.62719 17.3759C9.47239 17.1085 9.31663 16.8416 9.16159 16.574H9.16183Z"
                                            fill="#214986" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_533_78" x="-2" y="0" width="32"
                                            height="32" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dx="1" dy="4" />
                                            <feGaussianBlur stdDeviation="2" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0.12158 0 0 0 0 0.406867 0 0 0 0 0.620833 0 0 0 1 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_533_78" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_533_78"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </i>
                            <span class="text-dark px-2">{{ @$records['address_line_1'] }}HA8 7NT, London, Greater
                                London</span>
                        </h5>
                        <h5 class="py-2 d-flex align-items-center">
                            <i>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14 1.09997L2 5.89997C0.9 6.29997 0 7.69997 0 8.89997V17.6C0 18.8 0.9 19.4 2 19L14 14.2C15.1 13.8 16 12.4 16 11.2V2.49997C16 1.29997 15.1 0.699971 14 1.09997ZM14.6 3.69997L8.6 13L1.9 8.49997C1.8 8.39997 1.5 8.09997 1.7 7.79997C1.9 7.39997 2.4 7.59997 2.4 7.59997L8.7 9.89997C8.7 9.89997 13.5 3.59997 13.8 3.19997C13.9 2.99997 14.2 2.89997 14.5 3.09997C14.8 3.29997 14.7 3.59997 14.6 3.69997Z"
                                        fill="#214986" />
                                </svg>
                            </i>
                            <span class="text-dark px-2">{{ $records['email'] }}</span>
                        </h5>
                        <h5 class="py-2 d-flex align-items-center">
                            <i>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5348 0.80699C13.1594 0.432781 12.6509 0.222656 12.1208 0.222656C11.5907 0.222656 11.0823 0.432781 10.7068 0.80699L0.807816 10.706C0.433118 11.0812 0.222656 11.5897 0.222656 12.12C0.222656 12.6502 0.433118 13.1588 0.807816 13.534L6.46482 19.191C6.85482 19.581 7.36682 19.776 7.87882 19.776C8.39081 19.776 8.90282 19.581 9.29282 19.191L19.1918 9.29199C19.9718 8.51299 19.9718 7.24299 19.1918 6.46399L13.5348 0.80699ZM6.70682 14.706C6.61397 14.7988 6.50375 14.8725 6.38244 14.9227C6.26113 14.973 6.13112 14.9988 5.99982 14.9988C5.86851 14.9988 5.7385 14.973 5.61719 14.9227C5.49588 14.8725 5.38566 14.7988 5.29282 14.706C5.19997 14.6131 5.12632 14.5029 5.07608 14.3816C5.02583 14.2603 4.99997 14.1303 4.99997 13.999C4.99997 13.8677 5.02583 13.7377 5.07608 13.6164C5.12632 13.4951 5.19997 13.3848 5.29282 13.292C5.48032 13.1045 5.73464 12.9991 5.99982 12.9991C6.26499 12.9991 6.51931 13.1045 6.70682 13.292C6.89432 13.4795 6.99966 13.7338 6.99966 13.999C6.99966 14.2642 6.89432 14.5185 6.70682 14.706ZM13.7068 19.706L12.2928 18.292L18.2928 12.292L19.7068 13.707L13.7068 19.706ZM6.29282 0.29199L7.70682 1.70599L1.70682 7.70599L0.292815 6.29099L6.29282 0.29199Z"
                                        fill="#214986" />
                                </svg>
                            </i>
                            <span class="text-dark px-2">{{ @$records['phone'] }}</span>
                        </h5>
                    </div>

                </div>

            </div>
            <div class="col-lg-8">
                <form action="" method="" class="px-3">
                    <div class="row">
                        <div class="d-flex justify-content-between col-12">
                            <label class="col-6 profile_style">USERNAME
                                <input type="text" name="username" class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['username'] }}"></label>
                            <label class="col-6 profile_style">NAME
                                <input type="text" name="name" class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['username'] }}"></label>
                                    <input type="hidden" id="user_id" va class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['id'] }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between col-12">
                            <label class="col-6 profile_style">EMAIL
                                <input type="email" name="email" class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['email'] }}"></label>
                            <label class="col-6 profile_style">STATUS
                                <input type="text" name="status" class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['status'] }}"></label>
                                    <input type="hidden" name="id" id="{{ @$records['id'] }}" class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['id'] }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between col-12">
                            <label class="col-6 profile_style">RIDE
                                <input type="text" name="user_ride"
                                    class="form-control mt-1 profile_input col-12"></label>
                            <label class="col-6 profile_style">COMPANY
                                <input type="text" name="company"
                                    class="form-control mt-1 profile_input col-12"></label>
                        </div>
                    </div>

                </form>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-5">
                <div class="all_roles">
                    <h5>Roles</h5>
                    <div class="assign_roles roles d-flex flex-column">
                        @foreach ($roles as $role)
                        <a> <input type="checkbox" name="{{ @$role['name'] }}" value="{{  @$role['name'] }}"/>&nbsp&nbsp{{@$role['name']}}</a>
                        @endforeach
                       
                    </div>

                </div>
            </div>
            <div class="col-2">
                <div class="role_buttons d-flex flex-column">
                    <button class="btn btn-success" onclick="assignRoleToUser()">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 10L12 1V5.99L1 6V14H12V19L19 10Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </button><br>
                        <button class="btn btn-danger" onclick="dismissRoleToUser()">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.85785 10.2105L9.02204 19.0592L8.93012 14.0702L19.9274 13.8252L19.7801 5.82678L8.78258 6.06177L8.69047 1.06275L1.85785 10.2105Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                
                        </button>
                </div>
            </div>
            <div class="col-5">
                <div class="all_roles">
                    <h5>Roles</h5>
                    <div class="dismiss_roles roles d-flex flex-column">
                        @foreach ($assignRoles as $role)
                        <a> <input type="checkbox" name="{{ @$role }}" value="{{  @$role  }}" />&nbsp&nbsp{{@$role}}</a>
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
                        <a>{{@$permission['name']}}</a>
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
                        <a>{{@$permission['name']}}</a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>


        {{-- <div class="row mb-3">
            <div class="col-5">
                <div class="all_roles">
                    <h5>Routes</h5>
                    <div class="roles route d-flex flex-column">
                       @foreach ($routes as $route)
                           <a><input type="checkbox" name="{{ @$route }}" value="{{  @$route['name']  }}" />&nbsp&nbsp{{ @$route['name'] }}</a>
                       @endforeach
                    </div>

                </div>
            </div>
            <div class="col-2">
                <div class="role_buttons d-flex flex-column">
                    <button class="btn btn-success" onclick="assignRouteToUser()">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 10L12 1V5.99L1 6V14H12V19L19 10Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </button><br>
                        <button class="btn btn-danger" onclick="dismissalRouteToUser()">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.85785 10.2105L9.02204 19.0592L8.93012 14.0702L19.9274 13.8252L19.7801 5.82678L8.78258 6.06177L8.69047 1.06275L1.85785 10.2105Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                
                        </button>
                </div>
            </div>
            <div class="col-5">
                <div class="all_roles">
                    <h5>Routes</h5>
                    <div class="roles dismissroute d-flex flex-column">
                        @foreach ($assignedRoutes as  $assignRoute)
                            <a><input type="checkbox" name="{{ @$assignRoute }}" value="{{  @$assignRoute['name']  }}"/>&nbsp&nbsp{{ @$assignRoute['name'] }}</a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div> --}}



    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
@endsection
