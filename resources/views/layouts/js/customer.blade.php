<script>
    function changemodal(id) {
        $tab = id;
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/customers/create') }}',
            data: {
                'tab': $tab
            },
            success: function(data) {
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
            }
        });
    }

    // function changeImages(id) {
    //     // alert(tab);
    //     $id = $('#' + id).attr('tab');
    //     $tab = id;


    //     $.ajax({
    //         type: 'post',
    //         url: '{{ URL::to('admin/vehicle/vehicle_changeImages') }}',
    //         data: {
    //             'tab': $tab,
    //             'id': $id,
    //         },
    //         success: function(data) {
    //             // alert(data);
    //             console.log(data);
    //             $('.changeImages').html(data);
    //         }
    //     });

    // }

    function create_customer(id){
        $tab = id;
        $next_tab = $('#' + $tab).data('next');
        var formData = new FormData(jQuery('#customer_general_form')[0]);
        formData.append('tab', $tab);
        console.log(...formData);
        // document.getElementById('load').style.visibility = "visible";

        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/customers/create') }}/' + $tab,
            processData: false,
            contentType: false,
            data: formData,

            success: function(data) {
                iziToast.success({
                    zindex: '9999999999999',
                    position: 'topCenter',
                    title: data.result,
                    message: data.tab,
                });
                
               

                    $('#exampleModal').modal('hide');
                    setTimeout(function() {
                        window.location.reload(true);
                    }, 2000);
            },
            complete: function() {
                // alert('complete');
                document.getElementById('load').style.visibility = "hidden";
            },
            error: function(response) {
                document.getElementById('load').style.visibility = "hidden";

              
                if (response.responseJSON['errors']['name']) {
                    $('#name_error').html('<small>Please Fill*</small>');
                    iziToast.warning({
                    message: 'Failed! Name is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }

                else if (response.responseJSON['errors']['username']) {
                    $('#username_error').html('<small>Please Fill*</small>');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');






                    
                    iziToast.warning({
                    message: 'Failed! Username is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                
                else if (response.responseJSON['errors']['password']) {
                    $('#password_error').html('<small>Please Fill*</small>');
                    $('#username_error').html('');
                    $('#name_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');

                    iziToast.warning({
                    message: 'Failed! Password is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['phone']) {
                    $('#phone_error').html('<small>Please Fill*</small>');
                    $('#password_error').html('');
                    $('#name_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Phone number is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['email']) {
                    $('#email_error').html('<small>Please Fill*</small>');
                    $('#phone_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#company_name_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Email is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
               else if (response.responseJSON['errors']['company_name']) {
                    $('#company_name_error').html('<small>Please Fill*</small>');
                    $('#email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Company Name is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
               else if (response.responseJSON['errors']['company_email']) {
                    $('#company_email_error').html('<small>Please Fill*</small>');
                    $('#company_name_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Comany Email is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
               else if (response.responseJSON['errors']['location_number']) {
                    $('#location_number_error').html('<small>Please Fill*</small>');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Location is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
               else if (response.responseJSON['errors']['country']) {
                    $('#country_error').html('<small>Please Fill*</small>');
                    $('#location_number_error').html('');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Country is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['zip_code']) {
                    $('#zip_code_error').html('<small>Please Fill*</small>');
                    $('#country_error').html('');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Zip Code missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['state']) {
                    $('#state_error').html('<small>Please Fill*</small>');
                    $('#zip_code_error').html('');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#country_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! State is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['address_line1']) {
                    $('#address_line1_error').html('<small>Please Fill*</small>');
                    $('#state_error').html('');
                    $('#zip_code_error').html('');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#country_error').html('');
                    $('#username_error').html('');
                    iziToast.warning({
                    message: 'Failed! Address Line 1 is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else{

                }
            }
        });
    }

    function createForm(id) {
        $tab = id;
        $next_tab = $('#' + $tab).data('next');
        // alert($next_tab);
        if (id == "general_customer") {
            var formData = new FormData(jQuery('#customer_general_form')[0]);
        } else if (id == "billing_customer") {
            var formData = new FormData(jQuery('#customer_billing_form')[0]);
        } else if (id == "shipper_customer") {
            var formData = new FormData(jQuery('#customer_shipper_form')[0]);
        } else if (id == "quotation_customer") {
            var formData = new FormData(jQuery('#customer_quotation_form')[0]);
            
        } else {
            alert('no tab');
        }

        formData.append('tab', $tab);
        console.log(...formData);
        document.getElementById('load').style.visibility = "visible";
        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/customers/create') }}/' + $tab,
            processData: false,
            contentType: false,
            data: formData,

            success: function(data) {
                iziToast.success({
                    zindex: '9999999999999',
                    position: 'topCenter',
                    title: data.result,
                    message: data.tab,
                });
                console.log(data);
                $('.modal-body').html(data.view);
                $('#exampleModal').modal('show');
                $('.navbar_tab').removeClass('next-style');
                $('.navbar_tab').addClass('tab_style');
                $('#' + $next_tab).addClass('next-style');
                if (data.quotation == 'fade') {
                    // alert('asdassd');
                    //     iziToast.success({
                    //     zindex: '9999999999999',
                    //     position: 'topCenter',
                    //     title: data.result,
                    //     message: data.tab,
                    // });

                    $('#exampleModal').modal('hide');
                    setTimeout(function() {
                        window.location.reload(true);
                    }, 2000);
                }
            },
            complete: function() {
                // alert('complete');
                document.getElementById('load').style.visibility = "hidden";
            },
            error: function(response) {
                document.getElementById('load').style.visibility = "hidden";

               
                if (response.responseJSON['errors']['name']) {
                    $('#name_error').html('<small>Please Fill*</small>');
                    iziToast.warning({
                    message: 'Failed! Name is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }

                else if (response.responseJSON['errors']['username']) {
                    $('#username_error').html('<small>Please Fill*</small>');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');






                    
                    iziToast.warning({
                    message: 'Failed! Username is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                
                else if (response.responseJSON['errors']['password']) {
                    $('#password_error').html('<small>Please Fill*</small>');
                    $('#username_error').html('');
                    $('#name_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');

                    iziToast.warning({
                    message: 'Failed! Password is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['phone']) {
                    $('#phone_error').html('<small>Please Fill*</small>');
                    $('#password_error').html('');
                    $('#name_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Phone number is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['email']) {
                    $('#email_error').html('<small>Please Fill*</small>');
                    $('#phone_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#company_name_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Email is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
               else if (response.responseJSON['errors']['company_name']) {
                    $('#company_name_error').html('<small>Please Fill*</small>');
                    $('#email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#company_email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Company Name is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
               else if (response.responseJSON['errors']['company_email']) {
                    $('#company_email_error').html('<small>Please Fill*</small>');
                    $('#company_name_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#location_number_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Comany Email is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
               else if (response.responseJSON['errors']['location_number']) {
                    $('#location_number_error').html('<small>Please Fill*</small>');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#country_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Location is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
               else if (response.responseJSON['errors']['country']) {
                    $('#country_error').html('<small>Please Fill*</small>');
                    $('#location_number_error').html('');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#zip_code_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Country is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['zip_code']) {
                    $('#zip_code_error').html('<small>Please Fill*</small>');
                    $('#country_error').html('');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#state_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! Zip Code missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['state']) {
                    $('#state_error').html('<small>Please Fill*</small>');
                    $('#zip_code_error').html('');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#country_error').html('');
                    $('#username_error').html('');


                    iziToast.warning({
                    message: 'Failed! State is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else if (response.responseJSON['errors']['address_line1']) {
                    $('#address_line1_error').html('<small>Please Fill*</small>');
                    $('#state_error').html('');
                    $('#zip_code_error').html('');
                    $('#company_email_error').html('');
                    $('#name_error').html('');
                    $('#password_error').html('');
                    $('#phone_error').html('');
                    $('#email_error').html('');
                    $('#company_name_error').html('');
                    $('#country_error').html('');
                    $('#username_error').html('');
                    iziToast.warning({
                    message: 'Failed! Address Line 1 is missing',
                    position: 'topCenter',
                    zindex: '9999999999999'
                });
                }
                else{

                }
            }
        });
    }

    function change_status(id) {
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Are you sure to change Status ?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function(instance, toast) {

                    $.ajax({
                        type: 'get',
                        url: "{{ route('customer.changeStatus') }}" + '/' + id,
                        success: function(data) {
                            iziToast.success({
                                zindex: '9999999999999',
                                position: 'topCenter',
                                title: 'Deleted',
                                message: data,
                            });
                            setTimeout(function() {
                                window.location.reload(true);
                            }, 2000);
                        }
                    });

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');

                }, true],
                ['<button>NO</button>', function(instance, toast) {

                    instance.hide({
                        transitionOut: 'fadeOut'
                    }, toast, 'button');

                }],
            ],
            onClosing: function(instance, toast, closedBy) {
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy) {
                console.info('Closed | closedBy: ' + closedBy);
            }
        });

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
                    $('#exampleModalLabel').text('New Customer');


                    $('#exampleModal').modal('hide');
                    location.reload();



                }
            });
        }

    }

    function filterTable(val) {
        $tab = val;

        $.ajax({
            type: 'post',
            url: '{{ route('customer.FilterTable') }}',
            data: {
                'id': $tab,
            },
            success: function(data) {

                console.log(data);
                $('#tbody').html(data);
            }
        });

    }

    function skip_view(id) {
        $id = id;
        $tab = $('#' + $id).attr('nexttab');
        $currenttab = $('#' + $id).attr('currenttab');

       if ($currenttab == "billing_customer") {
            var formData = new FormData(jQuery('#customer_billing_form')[0]);
        } else if ($currenttab == "shipper_customer") {
            var formData = new FormData(jQuery('#customer_shipper_form')[0]);
        } else {
            alert('no tab');
        }
        formData.append('tab', $tab);
        $skiptab = $('#' + $id).attr('skiptab');
        $.ajax({
            type: 'post',
            url: '{{ URL::to('admin/customers/create') }}',
            processData: false,
            contentType: false,
            // data: {
            //     'tab': $tab
            // },
            data:formData,
            success: function(data) {
                $('.modal-body').html(data);
                $('#exampleModal').modal('show');
                $('.navbar_tab').removeClass('next-style');
                $('.navbar_tab').addClass('tab_style');
                $('#' + $skiptab).addClass('next-style');

            }
        });
    }
</script>
