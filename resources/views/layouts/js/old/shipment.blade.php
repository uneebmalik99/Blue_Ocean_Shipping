<script>
    function create_shipment_form(id) {
        $('#shipment_form').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(jQuery('#shipment_form')[0]);
            $.ajax({
                method: 'POST',
                url: '{{ URL::to('admin/shipments/general') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    console.log(data);
                    iziToast.success({
                        title: 'Success',
                        message: 'Data inserted successfully!',
                        timeout: 1500,
                        position: 'topCenter',
                        zindex: '9999999999999',
                    });
                },
                error: function() {
                    iziToast.warning({
                        message: 'Failed to insert data!',
                        timeout: 1500,
                        position: 'topCenter',
                        zindex: '9999999999999'
                    });
                }
            });
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
                $('#shipment_tbody').html(data);
                // $('#shipment_filtering_table').DataTable({
                //     scrollX: true,
                //     language: {
                //         search: "",
                //         sLengthMenu: "_MENU_",
                //         searchPlaceholder: "Search"
                //     },
                // });
            }
        });

    });

    
</script>
