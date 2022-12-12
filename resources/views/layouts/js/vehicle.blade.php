<script>
    $('.vehicle_filtering').on('change', function() {
        $warehouse = $('#vehicle_warehouse').val();
        $year = $('#vehicle_year').val();
        $make = $('#vehicle_make').val();
        $model = $('#vehicle_model').val();
        $status = $('#vehicle_status').val();
        $status_name = $('#vehicle_status').find(":selected").text();


        // alert($make);
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/filtering') }}',
            data: {
                'warehouse': $warehouse,
                'year': $year,
                'make': $make,
                'model': $model,
                'status': $status,
                'status_name': $status_name,
            },
            success: function(data) {


                if (data.view) {
                    $('#status_body').html(data.view);
                } else {
                    console.log(data);
                    $('#status_body').html(data);
                }
                $('#new_order_table').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },

                });
                $('#dispatched_table').DataTable({
                    scrollX: true,

                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#on_hand_table').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });

                $('#towing_table').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#vehicle_filter_table').DataTable({
                    columnDefs: [{
                    // className: 'dtr-control',
                    // orderable: false,
                    // targets: -1,
                    orderable: false, targets: '_all'
                }],
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });

                $('#no_title').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
            }
        });
    });
</script>
<script>
    function auction_images() {
        $('#vehicle_auction_form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(jQuery('#vehicle_auction_form')[0]);
            formData.append('tab', 'auction');
            // console.log(formData);
            $.ajax({
                method: 'POST',
                url: '{{ URL::to('admin/vehicles/attachments') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    iziToast.success({
                        title: 'Success',
                        message: 'Auction Images inserted !',
                        timeout: 1500,
                        position: 'topCenter',
                        zindex: '9999999999999',
                    });
                },
                error: function() {
                    iziToast.warning({
                        message: 'Failed to insert data!',
                        position: 'topCenter',
                        zindex: '9999999999999'
                    });
                }
            });
        });
    }
</script>
<script>
    function warehouse_images() {
        $('#vehicle_warehouse_form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(jQuery('#vehicle_warehouse_form')[0]);
            formData.append('tab', 'warehouse');
            $.ajax({
                method: 'POST',
                url: '{{ URL::to('admin/vehicles/attachments') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    iziToast.success({
                        title: 'Success',
                        message: 'Warehouse Images inserted!',
                        timeout: 1500,
                        position: 'topCenter',
                        zindex: '9999999999999',
                    });
                    console.log(data);
                }
            });
        });

    }
</script>
<script>
    function auction_invoice() {
        $('#vehicle_invoice_form').on('submit', function(event) {
            event.preventDefault();
        });
        var formData = new FormData(jQuery('#vehicle_invoice_form')[0]);
        formData.append('tab', 'invoice');
        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/vehicles/attachments') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                iziToast.success({
                    title: 'Success',
                    message: 'Invoice inserted successfully!',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
                console.log(data);
            }
        });


    }
</script>
<script>
    function action_copy() {
        $('#vehicle_copy_form').on('submit', function(event) {
            event.preventDefault();
        });
        var formData = new FormData(jQuery('#vehicle_copy_form')[0]);
        formData.append('tab', 'auction_copy');
        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/vehicles/attachments') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                iziToast.success({
                    title: 'Success',
                    message: 'Auction copy inserted successfully!',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
                console.log(data);
            }
        });
    }
</script>
<script>
    function display_model() {
        // iziToast.success({
        //     title: 'Success',
        //     message: 'Vehicle Created Successfully!',
        //     position: 'topCenter',
        //     zindex: '9999999999999',
        // });
        $('#exampleModal').modal('hide');
        setTimeout(function() {
            window.location.reload(true);
        }, 2000);
    }
</script>
<script>
    $('.vehicle_information_tab').on('click', function() {
        $id = $(this).attr('id');
        $tab = $(this).attr('tab');
        $('.vehicle_information_tab').removeClass('active_information_button col-3 next-style');
        $('.vehicle_information_tab').addClass('col-2');
        $(this).removeClass('col-2');
        $(this).addClass('active_information_button col-3');
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicle/vehicle_informationTab') }}',
            data: {
                'tab': $tab,
                'id': $id,
            },
            success: function(data) {
                $('#vehicle_information_main').html(data);
            }
        });
    });

    function changeImages(id) {
        $id = $('#' + id).attr('tab');
        $tab = id;
        // alert(id);

        $('.img_btn').removeClass('img_active_button');
        $('.img_btn').addClass('image_button');
        $('#' + id).addClass('img_active_button');
        $('#' + id).removeClass('image_button');

        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/vehicle/vehicle_changeImages') }}',
            data: {
                'tab': $tab,
                'id': $id,
            },
            success: function(data) {

                $('.main_image').html(data.main_image);
                $('.changeImages').html(data.images);
            }
        });
    }


    function fetchVehicles(id) {
        $tab = $('#' + id).attr('tab');
        $value = $('#' + id).attr('value');
        $id = id;


        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/vehicle/fetchVehciles') }}',
            data: {
                'tab': $tab,
                'id': $id,
                'state': $value,

            },
            success: function(data) {
                $route = '{{ route('vehicle.export') . '/' }}' + id;
                $('#exportVehicle').attr('href', $route);
                console.log(data);

                $('#status_body').html(data.view);

                $('#new_order_table').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    columnDefs: [

                        {
                            orderable: false,
                            targets: '_all'
                        }
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },

                });
                $('#dispatched_table').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    columnDefs: [

                        {
                            orderable: false,
                            targets: '_all'
                        }
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });

                $('#on_hand_table_main').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    columnDefs: [

                        {
                            orderable: false,
                            targets: '_all'
                        }
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#on_hand_table').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    columnDefs: [{
                            orderable: true,
                            targets: 8
                        },
                        {
                            orderable: true,
                            targets: 9
                        },
                        {
                            orderable: true,
                            targets: 10
                        },
                        {
                            orderable: true,
                            targets: 11
                        },
                        {
                            orderable: false,
                            targets: '_all'
                        }
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#no_title').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    columnDefs: [

                        {
                            orderable: false,
                            targets: '_all'
                        }
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#towing_table').DataTable({
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    columnDefs: [

                        {
                            orderable: false,
                            targets: '_all'
                        }
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#vehicle_filter_table').DataTable({
                    columnDefs: [{
                    // className: 'dtr-control',
                    // orderable: false,
                    // targets: -1,
                    orderable: false, targets: '_all'
                }],
                    scrollX: true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    columnDefs: [

                        {
                            orderable: false,
                            targets: '_all'
                        }
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
            }
        });
    }
</script>
{{-- edit vehicle info --}}
<script>
    function updatevehicle(id) {
        $id = id;
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/vehicles/update') }}/' + $id,
            data: {
                'id': $id
            },
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
                $('.modal-title').text('Update Vehicle');
                $('.user_image').imageUploader({
                    maxFiles: 1
                });


            }
        });
    }

    // $(document).on('click', 'input[name="main_checkbox"]', function() {
    //     if (this.checked) {
    //         $('input[name="checkboxes"]').each(function() {
    //             this.checked = true;
    //         })
    //     } else {
    //         $('input[name="checkboxes"]').each(function() {
    //             this.checked = false;
    //         })
    //     }
    //     toggleDeleteAllBtn();
    // })

    // $(document).on('change', 'input[name="checkboxes"]', function() {
    //     if ($('input[name="checkboxes"]').length == $('input[name="checkboxes"]:checked').length) {
    //         $('input[name="main_checkbox"]').prop('checked', true);
    //     } else {
    //         $('input[name="main_checkbox"]').prop('checked', false);

    //     }
    //     toggleDeleteAllBtn();
    // })


    // function toggleDeleteAllBtn() {
    //     if ($('input[name="checkboxes"]:checked').length > 0) {
    //         $('button#deleteAllbtn').text('Delete (' + $('input[name="checkboxes"]:checked').length + ')').removeClass(
    //             'd-none');
    //     } else {
    //         $('#deleteAllbtn').addClass('d-none');
    //     }
    // }


    // $(document).on('click', '#deleteAllbtn', function() {
    //     var deleteAllid = [];
    //     $('input[name="checkboxes"]:checked').each(function() {
    //         deleteAllid.push($(this).data('id'));
    //     });
    //     $.ajax({
    //         type: 'post',
    //         url: '{{ route('Vehicle.SelectedDelete') }}',
    //         data: {
    //             ids: deleteAllid
    //         },
    //         success: function(data) {
    //             iziToast.warning({
    //                 title: 'Vehicle',
    //                 message: data.success,
    //                 position: 'topCenter',
    //                 zindex: '9999999999999',
    //             });


    //             setTimeout(function() {
    //                 window.location.reload(true);
    //             }, 2000);


    //         }
    //     });



    // });

    function addtoShipment(id) {
        $.ajax({
            method: 'POST',
            url: '{{ route('vehicle.add_to_cart') }}',
            data: {
                'vehicle_id': id,
            },
            success: function(data) {
                // alert(data);
                iziToast.success({
                    title: 'Success',
                    message: data,
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
                setTimeout(function() {
                    window.location.reload(true);
                }, 2000);
                // $('#model').html(data);
            }
        });
    }


    function vehicle_attachments() {
        var formData = new FormData(jQuery('#vehicle_attacments')[0]);

        document.getElementById('load').style.visibility = "visible";


        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/vehicles/attachments') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log(data);
                $('#exampleModal').modal('hide');
                iziToast.success({
                    title: 'Success',
                    message: 'Images inserted !',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
                $('.modal-title').text('New Vehicle');
                setTimeout(function() {
                    window.location.reload(true);
                }, 2000);

            },

            complete: function() {
                document.getElementById('load').style.visibility = "hidden";
            },
            error: function() {
                document.getElementById('load').style.visibility = "hidden";

                iziToast.warning({
                    message: 'Failed to insert data!',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
            }
        });

    }

    function FetachModel() {
        $make_id = $('#make').val();
        $.ajax({
            method: 'POST',
            url: '{{ route('vehicle.FetchModel') }}',
            data: {
                'make_id': $make_id,
            },
            success: function(data) {
                console.log(data);
                $('#model').html(data);
            }
        });
    }


    function finddays() {
        paid_date = $('#paid_date').val();
        sale_date = $('#sale_date').val();
        var Difference_In_Time = new Date(sale_date).getTime() - new Date(paid_date).getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        var days = Math.abs(Difference_In_Days);
        $('#days').val(days);
    }

    function showAsMainImage(src) {
        $('#main_image_box').attr('src', src);
        $('#download_image').attr('href', src);
    }





    function getbuyerids() {
        company_name = $('#customer_name').val();
        // alert(company_name);
        $.ajax({
            method: 'POST',
            url: '{{ route('vehicles.get_buyerids') }}',
            data: {
                'company_name': company_name,
            },
            success: function(data) {
                // alert(data);
                $('#buyer_id').html(data);
                // $('#customer_email').val(data[0]['email']);
                // $('#customer_phone').val(data[0]['phone']);
            }
        });
    }

    // function exportVehicle(id){
    //     $.ajax({
    //         method: 'get',
    //         url: '{{ route('vehicle.export') }}',
    //         data: {
    //             'id': id,
    //         },
    //         success: function(data) {
    //             // alert(data);
    //             // $('#buyer_id').html(data);
    //             // $('#customer_email').val(data[0]['email']);
    //             // $('#customer_phone').val(data[0]['phone']);
    //         }
    //     });
    // }
</script>
