<script>
    function create_shipment_form(id) {
        
       
        var formData = new FormData(jQuery('#shipment_form')[0]);
        $next_tab = $('.next_tab').attr('id');
        formData.append('tab', $next_tab);

        console.log(...formData);


        document.getElementById('load').style.visibility = "visible";
        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/shipments/general') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                
                document.getElementById('load').style.visibility = "hidden";
                
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
                $('.loading_image').imageUploader({
                    maxFiles: 30,
                    imagesInputName: 'loading_image',

                });
                $('.loading_image_update').imageUploader({
                    maxFiles: 30,
                    imagesInputName: 'loading_image',
                    preloaded: loading_old,
                    preloadedInputName: 'loading_old'

                });
                iziToast.success({
                    title: 'Success',
                    message: 'Data inserted successfully!',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });


                $('#general_shipment_tab').removeClass('next-style');
                $('#general_shipment_tab').addClass('tab_style');
                $('#attachments_shipment_tab').addClass('next-style');

               
            },
            complete: function() {
                document.getElementById('load').style.visibility = "hidden";
            },
            error: function() {
                document.getElementById('load').style.visibility = "hidden";

                iziToast.warning({
                    message: 'Failed to insert data!',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
            }
        });
        
    }
</script>

<script>
    $('.shipment_filtering').on('change', function() {
        $port_of_loading = $('#port_of_loading').val();
        $loading_date = $('#loading_date').val();
        $arrival_date = $('#arrival_date').val();
        $destination_port = $('#destination_port').val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/shipments/filtering') }}',
            data: {
                'port_of_loading': $port_of_loading,
                'loading_date': $loading_date,
                'arrival_date': $arrival_date,
                'destination_port': $destination_port,
            },
            success: function(data) {
                console.log(data);
                // $('#shipment_tbody').html(data);
                $('.shipment_table_body').html(data);

            }
        });

    });
</script>

<script>
    function shipment_images_upload(id) {
        var formData = new FormData(jQuery('#shipment_attachments_form')[0]);
        console.log(...formData);
        document.getElementById('load').style.visibility = "visible";
        $.ajax({
            method: 'POST',
            url: '{{ URL::to('admin/shipment/create_images') }}',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                iziToast.success({
                    title: 'Success',
                    message: 'Data inserted successfully!',
                    timeout: 1500,
                    position: 'topCenter',
                    zindex: '9999999999999',
                });
                setTimeout(function() {
                    window.location.reload(true);
                }, 1500);
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


    function search_shipment() {
        $search_shipmentText = $('#shipment_search').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.search_shipment') }}',
            data: {
                'searchText': $search_shipmentText,
            },
            success: function(data) {
                console.log(data);
                $('#shipment_table').html(data);
            }
        });
    }




    function FetchState() {
        $country = $('#loading_country').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetchState') }}',
            data: {
                'country_id': $country,
            },
            success: function(data) {
                console.log(data);
                $('#loading_state').html(data);
            }
        });


    }

    function FetchPort() {
        $state = $('#loading_state').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetchPort') }}',
            data: {
                'state_id': $state,
            },
            success: function(data) {
                console.log(data);
                $('#loading_port').html(data);
            }
        });

    }

    function FetchTerminal() {
        $port = $('#loading_port').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetchTerminal') }}',
            data: {
                'port_id': $port,
            },
            success: function(data) {
                console.log(data);
                $('#loading_terminal').html(data);
            }
        });

    }

    function DestinationState() {
        $country_id = $('#destination_country').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetachDestiState') }}',
            data: {
                'country_id': $country_id,
            },
            success: function(data) {
                console.log(data);
                $('#destination_state').html(data);
            }
        });
    }

    function FetachDestinationPort() {
        $state_id = $('#destination_state').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetachDestiPort') }}',
            data: {
                'state_id': $state_id,
            },
            success: function(data) {
                console.log(data);
                $('#destination_port').html(data);
            }
        });
    }

    function FetchDestiTerimals() {
        $port_id = $('#destination_port').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.FetachDestiTerminal') }}',
            data: {
                'port_id': $port_id,
            },
            success: function(data) {
                console.log(data);
                $('#destination_terminal').html(data);
            }
        });
    }

    function customer_details() {
        company_name = $('#company_name').val();

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.customer_details') }}',
            data: {
                'company_name': company_name,
            },
            success: function(data) {
                console.log(data[0]['shippers'][0]['consignee'])
                // alert(data[0]['shipper']['id']);
                $('#customer_email').val(data[0]['email']);
                $('#customer_phone').val(data[0]['phone']);
                $('#select_consignee').html('<option selected value="'+data[0]['shippers'][0]['consignee']+'">'+data[0]['shippers'][0]['consignee']+'</option>');
                $('#notifier').html('<option selected>'+data[0]['shippers'][0]['consignee']+'</option>');
            }
        });
    }

    function add_vehicle(id) {
        var td = event.target.parentNode;
        var tr = td.parentNode; // the row to be removed
        tr.parentNode.removeChild(tr);

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.add_vehicles') }}',
            data: {
                'id': id,
            },
            success: function(data) {
                $('#add_vehicles').append(data);
            }
        });
    }

    function removerow(id) {

        $value = $('#'+id).val();

        var td = event.target.parentNode;
        var tr = td.parentNode; // the row to be removed
        tr.parentNode.removeChild(tr);

        $.ajax({
            method: 'POST',
            url: '{{ route('shipment.deleteFromCart') }}',
            data: {
                'id': id,
                'value':$value,
            },
            success: function(data) {

            }
        });
    }

    function editShipment(id) {
        $id = id;

        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.edit') }}',
            data: {
                'id': $id,
            },
            success: function(data) {
                console.log(data);
                // $('.modal-body').html(data);
                $('.modal-title').text('Update Shipment');
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });

    }

    function addtoshipment() {
        $.ajax({
            method: 'POST',
            url: '{{ route('shipments.addtoshipment') }}',
            // data: {
            //     'id': $id,
            // },
            success: function(data) {
                console.log(data);
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });
    }
</script>
<script>
    $('.shipment_information_tab').on('click', function() {
        $id = $(this).attr('id');
        $tab = $(this).attr('tab');
        // alert($tab);
        $('.shipment_information_tab').removeClass('active_information_button col-3 next-style');
        $('.shipment_information_tab').addClass('col-2');
        $(this).removeClass('col-2');
        $(this).addClass('active_information_button col-3');
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/shipment/shipment_informationTab') }}',
            data: {
                'tab': $tab,
                'id': $id,
            },
            success: function(data) {
                console.log(data);
                $('#shipment_tab_body').html(data);
            }
        });
    });
</script>
