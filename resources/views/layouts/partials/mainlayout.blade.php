<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.head')
    <style>
  
    </style>
</head>

<body>
    <div id="load"></div>
    <div id="contents"></div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('layouts.partials.nav')
            @include('layouts.partials.sidebar')
        </div>
    </div>


    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    @include('layouts.partials.footer-scripts')
    @include('layouts.js.vehicle')
    @include('layouts.js.shipment')
    @include('layouts.js.customer')
    {{-- @include('layouts.js.vehiclejs') --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            
           
            $('#table_id').DataTable({
                "lengthMenu": [[50, 100, 500], [50, 100, 500]],
            });


        
            
            $('#user_table').DataTable({
                "lengthMenu": [[50, 100, 500], [50, 100, 500]],
            });

               
        });
    //     $(document).ready(function() {
    //         $('#customer_table').DataTable({
    //             "lengthMenu": [[50, 100, 500], [50, 100, 500]],
    //             language: {
    //                 search: "",
    //                 sLengthMenu: "_MENU_",
    //                 searchPlaceholder: "Search"
    //             },
    //     });
    // }
        $('#dashboard_shipment').DataTable({
                   scrollX: true,
                    "lengthChange": false,
                    "info": false,
                    "bPaginate": false,
                //    "lengthMenu": [[50, 100, 500], [50, 100, 500]],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search"
                    },
                });
    </script>

</body>



</html>
