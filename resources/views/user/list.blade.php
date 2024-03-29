@extends('layouts.partials.mainlayout')

@section('body')

    <style>
        table.dataTable thead th,
        table.dataTable tfoot th {
            border: none !important;
        }

        #tbody td {
            vertical-align: middle !important;
        }

        div.dataTables_wrapper div.dataTables_info {
            display: inline-block;
            display: none;
        }

        div.dataTables_length select {
            color: #1CACD9 !important;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 27px;
        }

        / .dataTables_info,
        / .dataTables_length {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 27px;
            color: #1CACD9 !important;
        }

        .dataTables_info {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 22px;
            color: #8C8E91 !important;
        }

        #vedicls_table_filter input {
            border: 2px solid #0066FF !important;
            border-radius: 5px !important;
            outline: none !important;
            width: 334px;
            height: 30px;
        }

        .dataTables_paginate .paginate_button {
            background: rgba(152, 153, 202, 0.22) !important;
            color: #8C8E90 !important;
            border-radius: 5px !important;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            margin-right: 3px !important;
            margin-top: 30px !important;
            margin-bottom: 30px !important;
        }

        .dataTables_paginate .current {
            background: rgba(103, 106, 255, 0.99) !important;
            border-radius: 5px !important;
            color: white !important;
            border: none !important;
            outline: none;
        }

        table.dataTable.no-footer {
            border-bottom: 0.8px solid #B3B3B3 !important;
        }

        #tbody tr div b {
            font-size: 12px;
            font-weight: 550;
            color: rgba(32, 32, 32, 1)
        }

        #tbody td p {
            color: rgba(32, 32, 32, 1);
            vertical-align: middle;
        }

        #tbody tr div p {
            font-size: 10px;
            font-weight: 400;
            color: rgba(178, 174, 174, 1);
        }

        .table thead th {
            font-weight: 500 !important;
        }
    </style>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between title_style">
                    <div>
                        <h5 class="modal-title text-white" id="exampleModalLabel">Add New User</h5>
                    </div>
                    <div>
                        <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close"
                            style="margin-top: -11px;
                font-size: 26px;">
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
    <div class="container bg-light border">
        <div class="row">
            <div class="d-flex m-4" style="
            width: 94%;
            margin-right: 2px;">
                <button class="text-center form-control border next-style reporting_cls " id="users">
                    <a href="{{ route('user.list') }}" style="text-decoration: none!important;"
                    ><div class="unskew" style="color:black;">Users</div></a>
                    
                </button>
                <button class="text-center form-control border tab_style reporting_cls" id="permissions"
                onclick="showPermissions(this.id)">
                <div class="unskew">Permissions</div>
                </button>
                <button class="text-center form-control border tab_style reporting_cls " id="roles"
                    onclick="showRoles(this.id)">
                    <div class="unskew">Roles</div>
                </button>
                
                

            </div>
            <div class="col-lg-12 col-md-12 col-12 w-100 d-flex justify-content-between align-items-center my-3">
                
                
                
                <div>
                    


                   

                    

                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">

                
                <div class="main-box">
                    <div class="row mb-4  float-right" style="    margin-right: 12px;">
                        <button class="text-center form-control border next-style reporting_cls" id="add_new_user"
                        onclick="createUser()">
                        <div class="unskew">Add New User</div>
                        </button>
                    </div>
                    
                           
                   
                    <table class="table" id="table_id" style="border:none!important;">
                      
                          
                       
                        <thead style="border:none!imporant;color:rgba(102,102,102,1); ">
                           
                        

    
                           <th>User Name</th>
                            <th>STATE / CITY</th>
                            <th>Role</th>
                            <th>STATUS</th>
                            <th>PHONE</th>
                            
                           @role(['Sub Admin','Super Admin'])
                                <th>Action</th>
                            @endrole
                            
                                
                            
                            
                        </thead>
                        <tbody id="tbody">
                            @foreach ($records as $val)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <div class="d-flex">

                                            <div>
                                                <p></p>
                                                <img src="{{ asset('assets/images/user.png') }}" alt=""
                                                    style="width: 22px;height:22px;margin-top:8px" class="mr-3">
                                            </div>
                                            <div>
                                                <p></p>
                                                <b>{{ @$val['username'] }}</b>
                                                <p>{{ @$val['email'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p></p>
                                            <b>{{ @$val['state'] }}</b>
                                            <p>{{ @$val['city'] }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                        @if(count($val['roles']) > 0)
                                        {{@$val['roles'][0]['name']}}
                                        @else
                                        Not Assign Yet
                                        @endif
                                            {{-- @if (@$val['role_id'] == 1)
                                                <b>Super Admin</b>
                                            @endif
                                            @if (@$val['role_id'] == 2)
                                                <b>Sub Admin</b>
                                            @endif
                                            @if (@$val['role_id'] == 3)
                                                <b>Location Admin</b>
                                            @endif
                                            @if (@$val['role_id'] == 4)
                                                <b>Customer</b>
                                            @endif --}}

                                        </div>
                                    </td>
                                    <td>
                                        @if (@$val['status'] == 1)
                                            <button class="text-white"
                                                style="background: #53A24C;
                                    border-radius: 5px;width: 60px;border:none!important;outline:none">Active</button>
                                        @endif

                                        @if (@$val['status'] == 0)
                                            <button class="text-white btn-danger"
                                                style="
                                    border-radius: 5px;width: 60px;border:none!important;outline:none">In
                                                Active</button>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <b>
                                                {{ @$val['phone'] }}

                                            </b>

                                        </div>
                                    </td>
                                    
                                    {{-- @dd($val['id']) --}}
                                    <td>
                                        {{-- @can('suporsub', $role) --}}
                                            <button class="profile-button">
                                                <a href="{{ route('user.profile') . '/' . @$val['id'] }}">
                                                    <svg width="14" height="14" viewBox="0 0 16 14" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z"
                                                            fill="#048B52" />
                                                        <path
                                                            d="M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z"
                                                            fill="#048B52" />
                                                    </svg>

                                                </a>

                                            </button>
                                        {{-- @endcan --}}
                                        {{-- @can('can_view', $role) --}}
                                            {{-- @if ($val['role_id'] != '1') --}}
                                                @if (@$val['status'] == '0')
                                                    <a id="{{ @$val['id'] }}" onclick="change_status(this.id)">
                                                        <button class="active_button">
                                                            <i class="fa fa-check" style="color:green!important;"></i>
                                                        </button>
                                                    </a>
                                                @else
                                                    <a id="{{ @$val['id'] }}" onclick="change_status(this.id)">
                                                        <button class="inactive_button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </a>
                                                @endif



                                                <button id="{{ @$val['id'] }}" class="edit-button" onclick="editUser(this.id)">
                                                    <a>
                                                        <svg width="14" height="14" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                                fill="#2C77E7" />
                                                        </svg>
                                                    </a>
                                                </button>
                                                <button class="delete-button">
                                                    <a href="{{ route('user.delete', @$val['id']) }}">
                                                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                                fill="#EF5757" />
                                                        </svg>
                                                    </a>
                                                </button>
                                            {{-- @endif --}}
                                        {{-- @endcan --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('delete'))
        <script>
            iziToast.success({
                position: 'topRight',
                message: '{{ Session::get('delete') }}',
                color: "red",
                theme: "dark",
                messageColor: 'black'
            });
        </script>
    @endif    
@endsection
