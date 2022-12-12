<script>
    $('.vehicle_filtering').on('change', function() {
        $warehouse = $('#vehicle_warehouse').val();
        $year = $('#vehicle_year').val();
        $make = $('#vehicle_make').val();
        $model = $('#vehicle_model').val();
        $status = $('#vehicle_status').val();
        $status_name = $('#vehicle_status').find(":selected").text();
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
                    // {{-- scrollX: true, --}}
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#dispatched_table').DataTable({
                    // {{-- scrollX: true, --}}
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#on_hand_table').DataTable({
                    // {{-- scrollX: true, --}}
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#towing_table').DataTable({
                    // {{-- scrollX: true, --}}
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#no_title').DataTable({
                    // {{-- scrollX: true, --}}
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
                $('#vehicle_filter_table').DataTable({
                //    {{-- scrollX: true, --}}
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
{{-- Auction Images --}}
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

{{-- Warehouse Images --}}
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

{{-- Auction Invoice --}}
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
{{-- Auction Copy --}}
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
{{-- Finish button --}}
<script>
    function display_model() {
        // alert('asdasd');
        $('#exampleModal').modal('hide');
    }
</script>

<script>
    $('.vehicle_information_tab').on('click', function() {
        $id = $(this).attr('id');
        $tab = $(this).attr('tab');

        $('.vehicle_information_tab').removeClass('active_information_button col-3');
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
                // $('.vehicle_information_tab')
            }
        });
    });

    function changeImages(id) {
        // alert(tab);
        $id = $('#' + id).attr('tab');
        $tab = id;


        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/vehicle/vehicle_changeImages') }}',
            data: {
                'tab': $tab,
                'id': $id,
            },
            success: function(data) {
                // alert(data);
                console.log(data);
                $('.changeImages').html(data);
            }
        });
    }
