<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">



<title>Blue Ocean Shipping</title>
<!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
<!-- Meta -->
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Phoenixcoded">
<meta name="keywords"
    content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="Phoenixcoded">
{{-- Datatable for pagination and sorting --}}
<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- Favicon icon -->
{{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> --}}

<link rel="icon" href="{{ asset('images/blueocean.png') }}" type="image/x-icon">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
{{-- CK Editor --}}
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
<!-- Calender css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/fullcalendar/css/fullcalendar.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/bower_components/fullcalendar/css/fullcalendar.print.css') }}" media='print'>
{{-- Google API --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> --}}
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/vehicle.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/admin_profile.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/notification.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/master.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/createinvoice.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/invoice.css') }}">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
{{-- Fontawesome icons --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- Photos grid --}}
<link rel="stylesheet" href="{{ asset('assets/css/image-uploader.min.css') }}">
{{-- DataTable Css --}}
<link rel="stylesheet" href="{{ asset('assets/css/datatable.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/custom_datatable.css') }}">
<!--sticky Css-->
<link rel="stylesheet" href="{{ asset('assets/pages/sticky/css/jquery.postitall.css') }}" type="text/css"
    media="all">
<link rel="stylesheet" href="{{ asset('assets/pages/sticky/css/trumbowyg.css') }}" type="text/css" media="all">
<!-- Switch component css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/switchery/css/switchery.min.css') }}">
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
<!-- flag icon framework css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/flag-icon/flag-icon.min.css') }}">
<!-- Menu-Search css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/menu-search/css/component.css') }}">

<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_style.css') }}">
<!--color css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/linearicons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simple-line-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ionicons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
{{-- File uploader --}}
<script src="https://js.upload.io/upload-js/v1"></script>

{{-- Datatable --}}
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
    integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

{{-- multipe input tag --}}
{{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="preconnect" href="https://fonts.gstatic.com"> --}}
{{-- multipe input tag  --}}

    
