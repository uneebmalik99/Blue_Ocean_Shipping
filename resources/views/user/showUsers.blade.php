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

        </div>
        {{-- search filter end --}}
        <div class="mt-2 bg-light">
            <table id="user_table2" class="row-border" style="width:100%!important;overflow-x:scroll!important;">
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




<script type="text/javascript">
    $(function() {
        s = '{{ @$state }}';

        if (s) {
            state = s;
        } else {
            state = '';
        }
        var table = $('#user_table2').DataTable({

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
