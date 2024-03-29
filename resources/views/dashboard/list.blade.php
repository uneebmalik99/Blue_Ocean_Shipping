@extends('layouts.partials.mainlayout')
@section('body')
    <style>
        .col-xl-auto,
        .col-xl-4,
        .col-xl-5,
        .col-xl-6,
        .col-xl-7,
        .col-xl-8,
        .col-xl-9,
        .col-xl-auto {
            position: relative !important;
            width: 100% !important;
            min-height: 0px !important;
            padding-right: 0px !important;
            padding-left: 0px !important;
        }

        table.dataTable td.dt-control:before {
            height: 1em;
            width: 1em;
            margin-top: -9px !important;
            color: black !important;
            box-shadow: 0 0 0.2em #444;
            box-sizing: content-box;
            text-align: center;
            text-indent: 0 !important;
            font-family: "Courier New", Courier, monospace;
            line-height: 1em;
            content: "+";
            background-color: #dbdbdb !important;
        }

        table.dataTable tr.dt-hasChild td.dt-control:before {
            content: "-" !important;
            background-color: #d33333 !important;
            color: white !important;
        }

        .dataTables_wrapper {
            border-top: none !important;
            border-bottom: none !important;
        }
    </style>
    {{-- @dd(Auth::user()->role->name) --}}
    <style>
        .dashboard_heading {
            font-weight: bold;
        }

        .parent {
            position: relative;
        }

        .child {
            position: absolute;
            right: 14%;
            top: 10%;
            background: linear-gradient(180deg, #16B797 21.51%, rgba(44, 119, 231, 0.38) 100%);
            width: 27px;
            height: 27px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .dispatch_card .child {
            background: linear-gradient(180deg, rgba(44, 119, 231, 0.86) 21.51%, rgba(28, 172, 217, 0.26) 100%);
        }

        .onhand_card .child {
            background: linear-gradient(180.32deg, #F47E91 34.24%, rgba(105, 108, 255, 0.21) 158.18%);
        }

        .manifest_card .child {
            background: linear-gradient(182.63deg, #97DBA1 41.61%, rgba(44, 119, 231, 0.23) 185.42%);
        }

        .shipped_card .child {
            background: linear-gradient(187.22deg, rgba(236, 184, 0, 0.63) 29.79%, #FFFFFF 117.95%);
        }

        .arrived_card .child {
            background: linear-gradient(180.42deg, #E38CC3 26.03%, rgba(44, 119, 231, 0.26) 119.67%);
        }

        .vehicle_card {
            background: #FFFFFF;
            box-shadow: -8px 0px 4px #8CDDCD, 4px 9px 20px #CECEFA;
            border-radius: 15px;
            width: 218px;
            margin-left: -11px;
        }

        .dispatch_card {
            background: #FFFFFF;
            box-shadow: -8px 0px 6px rgba(7, 131, 224, 0.65), 4px 9px 10px #CECEFA;
            border-radius: 15px;
            width: 218px;
            margin-left: -11px;
        }

        .onhand_card {
            background: #FFFFFF;
            box-shadow: -8px 0px 4px rgba(253, 53, 80, 0.59), 4px 9px 10px #CECEFA;
            border-radius: 15px;
            width: 218px;
            margin-left: -11px;

        }

        .manifest_card {
            background: #FFFFFF;
            box-shadow: -8px 0px 4px rgba(22, 202, 32, 0.45), 4px 9px 20px #CECEFA;
            border-radius: 15px;
            width: 218px;
            margin-left: -11px;
        }

        .shipped_card {
            background: #FFFFFF;
            box-shadow: -8px 0px 4px rgba(224, 176, 5, 0.59), 4px 9px 20px #CECEFA;
            border-radius: 15px;
            width: 218px;
            margin-left: -11px;
        }

        .arrived_card {
            background: #FFFFFF;
            box-shadow: -8px 0px 4px #E279BB, 4px 9px 10px #CECEFA;
            border-radius: 15px;
            width: 218px;
            margin-left: -11px;
        }

        .card_body {
            padding: 10px
        }

        .vehicle_card h4,
        .dispatch_card h4,
        .onhand_card h4,
        .manifest_card h4,
        .shipped_card h4,
        .arrived_card h4 {
            font-weight: 400;
            font-size: 12px;
            /* line-height: 27px; */
            color: #4E4D4D;
            margin: 8px 0;

        }

        .vehicle_card b,
        .dispatch_card b,
        .onhand_card b,
        .manifest_card b,
        .shipped_card b,
        .arrived_card b {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 22px;
            /* line-height: 36px; */
            line-height: 1;
            color: #1DC7A5;
        }

        .dispatch_card b {
            color: #3896E1 !important;
        }

        .onhand_card b {
            color: #F47E91;
        }

        .manifest_card b {
            color: #87D891;
        }

        .shipped_card b {
            color: #EBC43E;
        }

        .arrived_card b {
            color: #E38CC3;
        }

        .vehicle_card p,
        .dispatch_card p,
        .onhand_card p,
        .manifest_card p,
        .shipped_card p,
        .arrived_card p {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 12px;
            line-height: 22px;
            color: #3D3D3D;
            margin: 8px 0;
        }

        .vehicle_card button,
        .dispatch_card button,
        .onhand_card button,
        .manifest_card button,
        .shipped_card button,
        .arrived_card button {
            width: 97px;
            height: 20px;
            background: linear-gradient(181.66deg, #16B797 1.41%, #F2F2F2 163.4%);
            border-radius: 18px;
            font-size: 12px;
            margin-left: 18%;
            color: #fff;
            outline: none;
            border: none;
        }

        .dispatch_card button {
            background: linear-gradient(181.66deg, #3DA2F8 1.41%, #C2D7E4 163.4%);
            border-radius: 18px;
        }

        .onhand_card button {
            background: linear-gradient(180.32deg, #F47E91 34.24%, rgba(105, 108, 255, 0.21) 158.18%);
            border-radius: 18px;
        }

        .manifest_card button {
            background: linear-gradient(181.66deg, #87D891 1.41%, #F2F2F2 163.4%);
            border-radius: 18px;
        }

        .shipped_card button {
            background: linear-gradient(181.66deg, #E1C564 1.41%, #F2F2F2 163.4%);
            border-radius: 18px;
        }

        .arrived_card button {
            background: linear-gradient(181.07deg, #E27BBC 0.91%, #FFFFFF 241.45%);
            border-radius: 18px;
        }

        .dashboard_card {
            width: 217px;
            margin-left: 31px;
            height: 283px;
            background: #FFFFFF;
            box-shadow: -8px 0px 4px rgb(105 108 255 / 49%), 4px 9px 10px #cecefa;
            border-radius: 15px;
        }

        .car_header {
            border-bottom: 1px solid #696CFF;
            height: 36px;
        }

        .dashboard_card h6 {
            font-size: 12px;
            padding: 12px 13px;
            color: 1px solid #696CFF;

        }

        .dashboard_card a {
            padding: 6px 19px;
        }

        .dispatched_vehicles {
            background: #3e5871;
            box-shadow: 3px 5px 16px rgba(31, 104, 158, 0.86);
            /* border-radius: 10px; */
            color: #fff;

        }

        .dispatched_vehicles p {
            margin-top: 12px;
            font-size: 12px;
        }

        .dispatch_search input {
            width: 190px;
            border: 2px solid #3e5871;
            border-radius: 10px;
            padding: 6px 10px;
            outline: none;
            font-size: 12px;
        }

        .dispatch_search input:focus {
            outline: none;
        }

        .dispatch_search button {
            width: 88px;
            /* height: 50px; */
            margin-left: 20px;
            background: #3e5871;
            border-radius: 5px;
            padding: 7px 10px;
            outline: none;
            border: none;
            font-size: 12px;
            color: #fff;
            cursor: pointer;
        }

        .table {
            border: .7px solid #B3B3B3;
        }

        .card_footer p {
            font-size: 8px !important;
        }

        .progress {
            width: 118px;
            height: 11px;

        }

        .pcoded-inner-content {
            padding: none !important;
        }

        .col-3 p-1 {
            width: 188px !important;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: 190px !important;
            border: 2px solid #3e5871 !important;
            border-radius: 10px !important;
            padding: 6px 10px !important;
            outline: none !important;
            font-size: 12px !important;
        }

        .dataTables_wrapper {

            border: none !important;
        }

        @media (min-width: 1200px) {
            .col-3 p-1 {
                width: 218px !important;
            }
        }

        @media (max-width: 780px) {
            .boxes {
                display: flex;
                flex-direction: column;
            }

            .col-lg-4 {
                margin-bottom: 20px !important;
            }
        }
    </style>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="z-index:999999">
        <div class="modal-dialog modal-fullscreen scrollable mw-100 m-2 px-3 py-2" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between title_style">
                    <div>
                        <h5 class="modal-title text-white" id="exampleModalLabel">New {{ $module['singular'] }}</h5>
                    </div>
                    <div>
                        <button type="button" class="close text-white h6" data-dismiss="modal" aria-label="Close"
                            onclick="modalClose()" style="margin-top: -11px;
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








    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="d-flex dashboard_heading" style="margin-top:-40px!important">
                    <div style="margin-top:3px!important">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <mask id="path-1-inside-1_1317_355" fill="white">
                                <path
                                    d="M12.531 1.72034C12.4613 1.6505 12.3786 1.59508 12.2875 1.55727C12.1963 1.51946 12.0987 1.5 12 1.5C11.9014 1.5 11.8037 1.51946 11.7126 1.55727C11.6214 1.59508 11.5387 1.6505 11.469 1.72034L2.469 10.7203C2.3994 10.7901 2.34423 10.8729 2.30665 10.964C2.26908 11.0552 2.24983 11.1528 2.25 11.2513V21.7513C2.25 21.9503 2.32902 22.141 2.46967 22.2817C2.61032 22.4223 2.80109 22.5013 3 22.5013H9.75C9.94891 22.5013 10.1397 22.4223 10.2803 22.2817C10.421 22.141 10.5 21.9503 10.5 21.7513V15.7513H13.5V21.7513C13.5 21.9503 13.579 22.141 13.7197 22.2817C13.8603 22.4223 14.0511 22.5013 14.25 22.5013H21C21.1989 22.5013 21.3897 22.4223 21.5303 22.2817C21.671 22.141 21.75 21.9503 21.75 21.7513V11.2513C21.7502 11.1528 21.7309 11.0552 21.6933 10.964C21.6558 10.8729 21.6006 10.7901 21.531 10.7203L19.5 8.69084V3.75134C19.5 3.55243 19.421 3.36166 19.2803 3.22101C19.1397 3.08036 18.9489 3.00134 18.75 3.00134H17.25C17.0511 3.00134 16.8603 3.08036 16.7197 3.22101C16.579 3.36166 16.5 3.55243 16.5 3.75134V5.69084L12.531 1.72034ZM3.75 21.0013V11.5618L12 3.31184L20.25 11.5618V21.0013H15V15.0013C15 14.8024 14.921 14.6117 14.7803 14.471C14.6397 14.3304 14.4489 14.2513 14.25 14.2513H9.75C9.55109 14.2513 9.36032 14.3304 9.21967 14.471C9.07902 14.6117 9 14.8024 9 15.0013V21.0013H3.75Z" />
                            </mask>
                            <path
                                d="M12.531 1.72034C12.4613 1.6505 12.3786 1.59508 12.2875 1.55727C12.1963 1.51946 12.0987 1.5 12 1.5C11.9014 1.5 11.8037 1.51946 11.7126 1.55727C11.6214 1.59508 11.5387 1.6505 11.469 1.72034L2.469 10.7203C2.3994 10.7901 2.34423 10.8729 2.30665 10.964C2.26908 11.0552 2.24983 11.1528 2.25 11.2513V21.7513C2.25 21.9503 2.32902 22.141 2.46967 22.2817C2.61032 22.4223 2.80109 22.5013 3 22.5013H9.75C9.94891 22.5013 10.1397 22.4223 10.2803 22.2817C10.421 22.141 10.5 21.9503 10.5 21.7513V15.7513H13.5V21.7513C13.5 21.9503 13.579 22.141 13.7197 22.2817C13.8603 22.4223 14.0511 22.5013 14.25 22.5013H21C21.1989 22.5013 21.3897 22.4223 21.5303 22.2817C21.671 22.141 21.75 21.9503 21.75 21.7513V11.2513C21.7502 11.1528 21.7309 11.0552 21.6933 10.964C21.6558 10.8729 21.6006 10.7901 21.531 10.7203L19.5 8.69084V3.75134C19.5 3.55243 19.421 3.36166 19.2803 3.22101C19.1397 3.08036 18.9489 3.00134 18.75 3.00134H17.25C17.0511 3.00134 16.8603 3.08036 16.7197 3.22101C16.579 3.36166 16.5 3.55243 16.5 3.75134V5.69084L12.531 1.72034ZM3.75 21.0013V11.5618L12 3.31184L20.25 11.5618V21.0013H15V15.0013C15 14.8024 14.921 14.6117 14.7803 14.471C14.6397 14.3304 14.4489 14.2513 14.25 14.2513H9.75C9.55109 14.2513 9.36032 14.3304 9.21967 14.471C9.07902 14.6117 9 14.8024 9 15.0013V21.0013H3.75Z"
                                fill="#214986" />
                            <path
                                d="M12.531 1.72034L-39.861 53.9801L-39.8329 54.0082L-39.8048 54.0364L12.531 1.72034ZM12 1.5V75.5V1.5ZM11.469 1.72034L63.7949 54.0462L63.828 54.0132L63.861 53.9801L11.469 1.72034ZM2.469 10.7203L-49.8569 -41.6056L-49.8899 -41.5726L-49.9229 -41.5395L2.469 10.7203ZM2.25 11.2513H76.25V11.1853L76.2499 11.1192L2.25 11.2513ZM2.25 21.7513H-71.75H2.25ZM10.2803 22.2817L62.6062 74.6076L10.2803 22.2817ZM10.5 15.7513V-58.2487H-63.5V15.7513H10.5ZM13.5 15.7513H87.5V-58.2487H13.5V15.7513ZM21.75 11.2513L-52.2499 11.1192L-52.25 11.1853V11.2513H21.75ZM21.531 10.7203L73.9229 -41.5395L73.8803 -41.5822L73.8376 -41.6249L21.531 10.7203ZM19.5 8.69084H-54.5V39.3587L-32.8066 61.0361L19.5 8.69084ZM18.75 3.00134V-70.9987V3.00134ZM16.5 5.69084L-35.8358 58.0069L90.5 184.39V5.69084H16.5ZM3.75 21.0013H-70.25V95.0013H3.75V21.0013ZM3.75 11.5618L-48.5759 -40.7641L-70.25 -19.09V11.5618H3.75ZM12 3.31184L64.3259 -49.0141L12 -101.34L-40.3259 -49.0141L12 3.31184ZM20.25 11.5618H94.25V-19.09L72.5759 -40.7641L20.25 11.5618ZM20.25 21.0013V95.0013H94.25V21.0013H20.25ZM15 21.0013H-59V95.0013H15V21.0013ZM9 21.0013V95.0013H83V21.0013H9ZM64.923 -50.5394C57.9792 -57.5007 49.7304 -63.0236 40.6492 -66.7919L-16.0743 69.9064C-24.9733 66.2138 -33.0566 60.8017 -39.861 53.9801L64.923 -50.5394ZM40.6492 -66.7919C31.5679 -70.5602 21.8323 -72.5 12 -72.5V75.5C2.36504 75.5 -7.17521 73.5992 -16.0743 69.9064L40.6492 -66.7919ZM12 -72.5C2.16781 -72.5 -7.56781 -70.5603 -16.6492 -66.7919L40.0743 69.9064C31.1751 73.5992 21.6349 75.5 12 75.5V-72.5ZM-16.6492 -66.7919C-25.7306 -63.0235 -33.9794 -57.5006 -40.923 -50.5394L63.861 53.9801C57.0567 60.8016 48.9735 66.2137 40.0743 69.9064L-16.6492 -66.7919ZM-40.8569 -50.6056L-49.8569 -41.6056L54.7949 63.0462L63.7949 54.0462L-40.8569 -50.6056ZM-49.9229 -41.5395C-56.8599 -34.5849 -62.3582 -26.3313 -66.1035 -17.2503L70.7168 39.1784C67.0467 48.0771 61.6587 56.1652 54.8609 62.9802L-49.9229 -41.5395ZM-66.1035 -17.2503C-69.8488 -8.16938 -71.7674 1.56066 -71.7499 11.3835L76.2499 11.1192C76.2671 20.7449 74.3869 30.2797 70.7168 39.1784L-66.1035 -17.2503ZM-71.75 11.2513V21.7513H76.25V11.2513H-71.75ZM-71.75 21.7513C-71.75 41.5762 -63.8746 60.5892 -49.8562 74.6076L54.7956 -30.0442C68.5327 -16.3071 76.25 2.3243 76.25 21.7513H-71.75ZM-49.8562 74.6076C-35.8378 88.626 -16.8248 96.5013 3 96.5013V-51.4987C22.427 -51.4987 41.0584 -43.7814 54.7956 -30.0442L-49.8562 74.6076ZM3 96.5013H9.75V-51.4987H3V96.5013ZM9.75 96.5013C29.5748 96.5013 48.5878 88.626 62.6062 74.6076L-42.0456 -30.0442C-28.3084 -43.7814 -9.67698 -51.4987 9.75 -51.4987V96.5013ZM62.6062 74.6076C76.6246 60.5892 84.5 41.5763 84.5 21.7513H-63.5C-63.5 2.32425 -55.7826 -16.3072 -42.0456 -30.0442L62.6062 74.6076ZM84.5 21.7513V15.7513H-63.5V21.7513H84.5ZM10.5 89.7513H13.5V-58.2487H10.5V89.7513ZM-60.5 15.7513V21.7513H87.5V15.7513H-60.5ZM-60.5 21.7513C-60.5 41.5761 -52.6247 60.5891 -38.6062 74.6076L66.0456 -30.0442C79.7828 -16.307 87.5 2.32443 87.5 21.7513H-60.5ZM-38.6062 74.6076C-24.5877 88.6261 -5.57472 96.5013 14.25 96.5013V-51.4987C33.6769 -51.4987 52.3084 -43.7814 66.0456 -30.0442L-38.6062 74.6076ZM14.25 96.5013H21V-51.4987H14.25V96.5013ZM21 96.5013C40.8247 96.5013 59.8377 88.6261 73.8562 74.6076L-30.7956 -30.0442C-17.0584 -43.7814 1.5731 -51.4987 21 -51.4987V96.5013ZM73.8562 74.6076C87.8747 60.5891 95.75 41.5761 95.75 21.7513H-52.25C-52.25 2.32443 -44.5327 -16.307 -30.7956 -30.0442L73.8562 74.6076ZM95.75 21.7513V11.2513H-52.25V21.7513H95.75ZM95.7499 11.3835C95.7674 1.56066 93.8488 -8.16938 90.1035 -17.2503L-46.7168 39.1784C-50.3869 30.2797 -52.2671 20.7449 -52.2499 11.1192L95.7499 11.3835ZM90.1035 -17.2503C86.3583 -26.3312 80.86 -34.5849 73.9229 -41.5395L-30.8609 62.9802C-37.6588 56.1651 -43.0467 48.0771 -46.7168 39.1784L90.1035 -17.2503ZM73.8376 -41.6249L71.8066 -43.6544L-32.8066 61.0361L-30.7756 63.0656L73.8376 -41.6249ZM93.5 8.69084V3.75134H-54.5V8.69084H93.5ZM93.5 3.75134C93.5 -16.0735 85.6247 -35.0865 71.6062 -49.1049L-33.0456 55.5469C-46.7827 41.8098 -54.5 23.1783 -54.5 3.75134H93.5ZM71.6062 -49.1049C57.5879 -63.1233 38.5749 -70.9987 18.75 -70.9987V77.0013C-0.67708 77.0013 -19.3085 69.284 -33.0456 55.5469L71.6062 -49.1049ZM18.75 -70.9987H17.25V77.0013H18.75V-70.9987ZM17.25 -70.9987C-2.5749 -70.9987 -21.5879 -63.1233 -35.6062 -49.1049L69.0456 55.5469C55.3085 69.284 36.6771 77.0013 17.25 77.0013V-70.9987ZM-35.6062 -49.1049C-49.6247 -35.0865 -57.5 -16.0735 -57.5 3.75134H90.5C90.5 23.1783 82.7827 41.8098 69.0456 55.5469L-35.6062 -49.1049ZM-57.5 3.75134V5.69084H90.5V3.75134H-57.5ZM68.8358 -46.6252L64.8668 -50.5957L-39.8048 54.0364L-35.8358 58.0069L68.8358 -46.6252ZM77.75 21.0013V11.5618H-70.25V21.0013H77.75ZM56.0759 63.8877L64.3259 55.6377L-40.3259 -49.0141L-48.5759 -40.7641L56.0759 63.8877ZM-40.3259 55.6377L-32.0759 63.8877L72.5759 -40.7641L64.3259 -49.0141L-40.3259 55.6377ZM-53.75 11.5618V21.0013H94.25V11.5618H-53.75ZM20.25 -52.9987H15V95.0013H20.25V-52.9987ZM89 21.0013V15.0013H-59V21.0013H89ZM89 15.0013C89 -4.82339 81.1247 -23.8364 67.1062 -37.8549L-37.5456 66.7969C-51.2828 53.0597 -59 34.4282 -59 15.0013H89ZM67.1062 -37.8549C53.0877 -51.8734 34.0747 -59.7487 14.25 -59.7487V88.2513C-5.1769 88.2513 -23.8084 80.5341 -37.5456 66.7969L67.1062 -37.8549ZM14.25 -59.7487H9.75V88.2513H14.25V-59.7487ZM9.75 -59.7487C-10.0748 -59.7487 -29.0878 -51.8733 -43.1062 -37.8549L61.5456 66.7969C47.8084 80.534 29.177 88.2513 9.75 88.2513V-59.7487ZM-43.1062 -37.8549C-57.1246 -23.8365 -65 -4.82357 -65 15.0013H83C83 34.4284 75.2826 53.0599 61.5456 66.7969L-43.1062 -37.8549ZM-65 15.0013V21.0013H83V15.0013H-65ZM9 -52.9987H3.75V95.0013H9V-52.9987Z"
                                fill="#214986" mask="url(#path-1-inside-1_1317_355)" />
                        </svg>
                    </div>
                    {{-- <div> --}}
                    <h2 style="color:#1F689E;font-size:22px;margin-left: 6px;" class="px-1">Dashboard</h2>
                    {{-- </div> --}}
                </div>
            </div>
        </div>


        <div class="bg-white rounded p-2 ">
            {{-- badges start --}}
            <div class="pt-3">
                @can('Page Access')
                    <div class="d-flex m-2">

                        <div class="col-3 p-1">
                            <div class="col-12 py-0 px-1">
                                <div class="col-12 border-style card-rounded py-2 px-3">
                                    <div class="d-flex">
                                        <div class="col-10 text-muted p-0 d-flex align-items-center">
                                            <div class="font-size"><span>Active Customers</span></div>
                                        </div>
                                        <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                            style="background: rgba(239, 87, 87, 0.13);!important">
                                            <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13 2.16602C11.9287 2.16602 10.8814 2.4837 9.99066 3.07889C9.0999 3.67408 8.40563 4.52005 7.99565 5.50981C7.58568 6.49958 7.47841 7.58869 7.68741 8.63942C7.89642 9.69015 8.4123 10.6553 9.16984 11.4128C9.92737 12.1704 10.8925 12.6863 11.9433 12.8953C12.994 13.1043 14.0831 12.997 15.0729 12.587C16.0626 12.1771 16.9086 11.4828 17.5038 10.592C18.099 9.70125 18.4167 8.654 18.4167 7.58268C18.4167 6.14609 17.846 4.76834 16.8302 3.75252C15.8143 2.7367 14.4366 2.16602 13 2.16602ZM13 10.8327C12.3572 10.8327 11.7289 10.6421 11.1944 10.285C10.6599 9.92784 10.2434 9.42026 9.99739 8.8264C9.75141 8.23254 9.68705 7.57908 9.81245 6.94864C9.93785 6.3182 10.2474 5.73911 10.7019 5.28459C11.1564 4.83006 11.7355 4.52053 12.366 4.39513C12.9964 4.26973 13.6499 4.33409 14.2437 4.58007C14.8376 4.82606 15.3452 5.24262 15.7023 5.77708C16.0594 6.31154 16.25 6.93989 16.25 7.58268C16.25 8.44464 15.9076 9.27129 15.2981 9.88078C14.6886 10.4903 13.862 10.8327 13 10.8327ZM22.75 22.7493V21.666C22.75 19.6548 21.951 17.7259 20.5289 16.3038C19.1067 14.8816 17.1779 14.0827 15.1667 14.0827H10.8333C8.82211 14.0827 6.89326 14.8816 5.47111 16.3038C4.04896 17.7259 3.25 19.6548 3.25 21.666V22.7493H5.41667V21.666C5.41667 20.2294 5.98735 18.8517 7.00317 17.8359C8.01899 16.82 9.39674 16.2493 10.8333 16.2493H15.1667C16.6033 16.2493 17.981 16.82 18.9968 17.8359C20.0127 18.8517 20.5833 20.2294 20.5833 21.666V22.7493H22.75Z"
                                                    fill="#696CFF" />
                                            </svg>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold"><span>{{ @$ActiveCustomers }}</span> </div>
                                        <div class="py-1 col-12 text-muted p-0 font-size">
                                            {{-- <span>Total Customers --}}
                                            {{-- <b>{{ @$TotalCustomers }}</b></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 p-1">
                            <div class="col-12 py-0 px-1">
                                <div class="col-12 border-style card-rounded py-2 px-3">
                                    <div class="d-flex">
                                        <div class="col-10 text-muted p-0 d-flex align-items-center">
                                            <div class="font-size"><span>In Active Customers</span></div>
                                        </div>
                                        <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                            style="background: rgba(236, 184, 0, 0.15); !important">


                                            <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.167 11.9165H23.8337V14.0832H15.167V11.9165ZM8.66699 4.33318C8.09428 4.31984 7.52482 4.42281 6.99304 4.63585C6.46127 4.8489 5.97823 5.1676 5.57316 5.57268C5.16808 5.97775 4.84938 6.46079 4.63633 6.99256C4.42328 7.52434 4.32032 8.0938 4.33366 8.66651C4.32032 9.23922 4.42328 9.80869 4.63633 10.3405C4.84938 10.8722 5.16808 11.3553 5.57316 11.7603C5.97823 12.1654 6.46127 12.4841 6.99304 12.6972C7.52482 12.9102 8.09428 13.0132 8.66699 12.9998C9.2397 13.0132 9.80917 12.9102 10.3409 12.6972C10.8727 12.4841 11.3558 12.1654 11.7608 11.7603C12.1659 11.3553 12.4846 10.8722 12.6977 10.3405C12.9107 9.80869 13.0137 9.23922 13.0003 8.66651C13.0137 8.0938 12.9107 7.52434 12.6977 6.99256C12.4846 6.46079 12.1659 5.97775 11.7608 5.57268C11.3558 5.1676 10.8727 4.8489 10.3409 4.63585C9.80917 4.42281 9.2397 4.31984 8.66699 4.33318V4.33318ZM8.66699 10.8332C8.37877 10.8471 8.09082 10.8006 7.82164 10.6967C7.55246 10.5927 7.308 10.4336 7.10396 10.2295C6.89992 10.0255 6.74081 9.78105 6.63685 9.51186C6.5329 9.24268 6.48639 8.95473 6.50033 8.66651C6.48639 8.37829 6.5329 8.09034 6.63685 7.82116C6.74081 7.55198 6.89992 7.30752 7.10396 7.10348C7.308 6.89944 7.55246 6.74033 7.82164 6.63637C8.09082 6.53242 8.37877 6.48591 8.66699 6.49985C8.95521 6.48591 9.24316 6.53242 9.51234 6.63637C9.78152 6.74033 10.026 6.89944 10.23 7.10348C10.4341 7.30752 10.5932 7.55198 10.6971 7.82116C10.8011 8.09034 10.8476 8.37829 10.8337 8.66651C10.8476 8.95473 10.8011 9.24268 10.6971 9.51186C10.5932 9.78105 10.4341 10.0255 10.23 10.2295C10.026 10.4336 9.78152 10.5927 9.51234 10.6967C9.24316 10.8006 8.95521 10.8471 8.66699 10.8332V10.8332ZM4.33366 19.4998C4.33366 18.6379 4.67607 17.8112 5.28556 17.2017C5.89505 16.5923 6.7217 16.2498 7.58366 16.2498H9.75032C10.6123 16.2498 11.4389 16.5923 12.0484 17.2017C12.6579 17.8112 13.0003 18.6379 13.0003 19.4998V20.5832H15.167V19.4998C15.167 18.7885 15.0269 18.0842 14.7547 17.427C14.4825 16.7698 14.0835 16.1727 13.5805 15.6697C13.0775 15.1667 12.4804 14.7677 11.8232 14.4955C11.166 14.2233 10.4617 14.0832 9.75032 14.0832H7.58366C6.14707 14.0832 4.76932 14.6539 3.7535 15.6697C2.73768 16.6855 2.16699 18.0633 2.16699 19.4998V20.5832H4.33366V19.4998Z"
                                                    fill="#E41414" />
                                            </svg>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold"><span class="px-1">{{ @$InActiveCustomers }}</span></div>
                                        <div class="py-1 col-12 text-muted p-0 font-size">
                                            {{-- <span>Total Customers
                                            <b>{{ @$TotalCustomers }}</b></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 p-1">
                            <div class="col-12 py-0 px-1">
                                <div class="col-12 border-style card-rounded py-2 px-3">
                                    <div class="d-flex">
                                        <div class="col-10 text-muted p-0 d-flex align-items-center">
                                            <div class="font-size"><span>Consignees</span></div>
                                        </div>
                                        <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                            style="background: rgba(193, 23, 129, 0.12); !important">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20.7134 6.6398C20.575 6.44229 20.391 6.28104 20.1771 6.16967C19.9632 6.0583 19.7256 6.0001 19.4845 6H15.75V3.75C15.7496 3.35231 15.5914 2.97104 15.3102 2.68983C15.029 2.40863 14.6477 2.25045 14.25 2.25H2.25C1.85231 2.25045 1.47104 2.40863 1.18983 2.68983C0.908625 2.97104 0.750447 3.35231 0.75 3.75V19.125H3.23822C3.37 19.8611 3.75642 20.5273 4.32986 21.0072C4.9033 21.4871 5.62725 21.7501 6.375 21.7501C7.12275 21.7501 7.8467 21.4871 8.42014 21.0072C8.99358 20.5273 9.38 19.8611 9.51178 19.125H14.4882C14.62 19.8611 15.0064 20.5273 15.5799 21.0072C16.1533 21.4871 16.8772 21.7501 17.625 21.7501C18.3728 21.7501 19.0967 21.4871 19.6701 21.0072C20.2436 20.5273 20.63 19.8611 20.7618 19.125H23.25V10.6182C23.2504 10.3873 23.1793 10.162 23.0467 9.97308L20.7134 6.6398ZM2.24906 3.75H14.25V12H2.25L2.24906 3.75ZM6.375 20.25C6.04124 20.25 5.71498 20.151 5.43748 19.9656C5.15997 19.7802 4.94368 19.5166 4.81595 19.2083C4.68823 18.8999 4.65481 18.5606 4.71992 18.2333C4.78504 17.9059 4.94576 17.6053 5.18176 17.3693C5.41776 17.1333 5.71844 16.9725 6.04578 16.9074C6.37313 16.8423 6.71243 16.8757 7.02078 17.0035C7.32913 17.1312 7.59268 17.3475 7.77811 17.625C7.96353 17.9025 8.0625 18.2287 8.0625 18.5625C8.062 19.0099 7.88405 19.4388 7.56769 19.7552C7.25133 20.0716 6.8224 20.2495 6.375 20.25V20.25ZM17.625 20.25C17.2912 20.25 16.965 20.151 16.6875 19.9656C16.41 19.7802 16.1937 19.5166 16.066 19.2083C15.9382 18.8999 15.9048 18.5606 15.9699 18.2333C16.035 17.9059 16.1958 17.6053 16.4318 17.3693C16.6678 17.1333 16.9684 16.9725 17.2958 16.9074C17.6231 16.8423 17.9624 16.8757 18.2708 17.0035C18.5791 17.1312 18.8427 17.3475 19.0281 17.625C19.2135 17.9025 19.3125 18.2287 19.3125 18.5625C19.312 19.0099 19.1341 19.4388 18.8177 19.7552C18.5013 20.0716 18.0724 20.2495 17.625 20.25V20.25ZM21.75 17.625H20.6716C20.4712 16.9734 20.0671 16.4033 19.5188 15.9983C18.9704 15.5933 18.3067 15.3747 17.625 15.3747C16.9433 15.3747 16.2796 15.5933 15.7312 15.9983C15.1829 16.4033 14.7788 16.9734 14.5784 17.625H9.42159C9.22115 16.9734 8.8171 16.4033 8.26877 15.9983C7.72043 15.5933 7.05669 15.3747 6.375 15.3747C5.69331 15.3747 5.02957 15.5933 4.48123 15.9983C3.9329 16.4033 3.52885 16.9734 3.32841 17.625H2.25V13.5H21.75V17.625ZM21.75 12H15.75V7.5H19.4845L21.75 10.7364V12Z"
                                                    fill="#C11781" />
                                            </svg>

                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold"><span class="px-1">{{ @$consignee }}</span>
                                        </div>
                                        <div class="py-1 col-12 text-muted p-0 font-size">
                                            {{-- <span>Last week Analytics</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 p-1">
                            <div class="col-12 py-0 px-1">
                                <div class="col-12 border-style card-rounded py-2 px-3">
                                    <div class="d-flex">
                                        <div class="col-10 text-muted p-0 d-flex align-items-center">

                                            <div class="font-size"><span>Shipper</span></div>
                                        </div>
                                        <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                            style="background: rgba(105, 108, 255, 0.16); !important">


                                            <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M15.1667 13.2715C14.3632 13.2715 13.5777 13.0332 12.9097 12.5868C12.2416 12.1404 11.7209 11.506 11.4134 10.7636C11.1059 10.0213 11.0255 9.20448 11.1822 8.41643C11.339 7.62838 11.7259 6.90452 12.294 6.33636C12.8622 5.76821 13.5861 5.3813 14.3741 5.22455C15.1622 5.06779 15.979 5.14824 16.7213 5.45573C17.4636 5.76321 18.0981 6.28391 18.5445 6.95198C18.9909 7.62006 19.2292 8.4055 19.2292 9.20899C19.2292 10.2864 18.8012 11.3197 18.0393 12.0816C17.2774 12.8435 16.2441 13.2715 15.1667 13.2715ZM15.1667 6.77149C14.6846 6.77149 14.2133 6.91444 13.8125 7.18228C13.4116 7.45011 13.0992 7.8308 12.9147 8.27619C12.7302 8.72159 12.682 9.21169 12.776 9.68452C12.8701 10.1573 13.1022 10.5917 13.4431 10.9326C13.784 11.2734 14.2183 11.5056 14.6911 11.5996C15.164 11.6937 15.6541 11.6454 16.0995 11.4609C16.5449 11.2765 16.9255 10.964 17.1934 10.5632C17.4612 10.1623 17.6042 9.69108 17.6042 9.20899C17.6042 8.56252 17.3474 7.94253 16.8902 7.48541C16.4331 7.02829 15.8131 6.77149 15.1667 6.77149V6.77149ZM22.75 20.8548C22.5354 20.852 22.3303 20.7655 22.1786 20.6137C22.0268 20.462 21.9403 20.2569 21.9375 20.0423C21.9375 17.9298 20.7892 16.5215 15.1667 16.5215C9.54417 16.5215 8.39583 17.9298 8.39583 20.0423C8.39583 20.2578 8.31023 20.4645 8.15786 20.6168C8.00548 20.7692 7.79882 20.8548 7.58333 20.8548C7.36785 20.8548 7.16118 20.7692 7.00881 20.6168C6.85644 20.4645 6.77083 20.2578 6.77083 20.0423C6.77083 14.8965 12.6533 14.8965 15.1667 14.8965C17.68 14.8965 23.5625 14.8965 23.5625 20.0423C23.5597 20.2569 23.4732 20.462 23.3214 20.6137C23.1697 20.7655 22.9646 20.852 22.75 20.8548V20.8548ZM9.01333 14.149H8.66667C7.80471 14.0657 7.01116 13.6433 6.46059 12.9749C5.91001 12.3065 5.64751 11.4468 5.73083 10.5848C5.81416 9.72287 6.23647 8.92931 6.90489 8.37874C7.5733 7.82816 8.43305 7.56566 9.295 7.64899C9.40552 7.65374 9.51391 7.68101 9.61352 7.72912C9.71313 7.77724 9.80187 7.84519 9.87429 7.92881C9.94671 8.01243 10.0013 8.10996 10.0347 8.21542C10.0681 8.32088 10.0796 8.43205 10.0685 8.54212C10.0574 8.65219 10.024 8.75883 9.97025 8.85552C9.9165 8.95221 9.84358 9.0369 9.75594 9.10441C9.6683 9.17191 9.5678 9.22082 9.4606 9.24811C9.3534 9.27541 9.24175 9.28053 9.1325 9.26315C8.92102 9.24207 8.70747 9.26381 8.50458 9.3271C8.3017 9.39038 8.11365 9.49391 7.95167 9.63149C7.78714 9.7642 7.65068 9.92834 7.55024 10.1143C7.4498 10.3003 7.3874 10.5045 7.36667 10.7148C7.34427 10.9278 7.36448 11.1431 7.42612 11.3483C7.48777 11.5534 7.58962 11.7442 7.72574 11.9095C7.86185 12.0749 8.02952 12.2115 8.21896 12.3114C8.4084 12.4113 8.61583 12.4725 8.82917 12.4915C9.18183 12.5217 9.5349 12.4381 9.83667 12.2532C10.0206 12.1397 10.242 12.1039 10.4523 12.1536C10.6625 12.2034 10.8444 12.3347 10.9579 12.5186C11.0714 12.7025 11.1072 12.9239 11.0574 13.1342C11.0077 13.3444 10.8764 13.5263 10.6925 13.6398C10.19 13.9603 9.60915 14.1364 9.01333 14.149V14.149ZM3.25 20.0423C3.03538 20.0395 2.83035 19.953 2.67858 19.8012C2.52681 19.6495 2.44031 19.4444 2.4375 19.2298C2.4375 16.3048 3.2175 14.3548 7.04167 14.3548C7.25716 14.3548 7.46382 14.4404 7.61619 14.5928C7.76856 14.7452 7.85417 14.9518 7.85417 15.1673C7.85417 15.3828 7.76856 15.5895 7.61619 15.7418C7.46382 15.8942 7.25716 15.9798 7.04167 15.9798C4.49583 15.9798 4.0625 16.7923 4.0625 19.2298C4.05969 19.4444 3.97319 19.6495 3.82142 19.8012C3.66965 19.953 3.46462 20.0395 3.25 20.0423V20.0423Z"
                                                    fill="#ECB800" />
                                            </svg>


                                        </div>
                                    </div>
                                    <div>
                                        <div class="font-bold"><span>{{ @$consignee }}</span> </div>
                                        <div class="py-1 col-12 text-muted p-0 font-size">
                                            {{-- <span>Total Customers
                                            <b>{{ @$TotalCustomers }}</b>
                                        </span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan

                <div class="d-flex m-2">
                    <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">
                                        <div class="font-size"><span>New Order</span></div>
                                    </div>
                                    <div class="col-2 p-2 d-flex justify-content-center align-items-center roundeds"
                                        style="background: rgba(105, 108, 255, 0.16); !important">
                                        <img src="{{ asset('images/new_order.png') }}" alt="new order.png "
                                            style="width: 16px!important" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{ @$NewOrders }}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        {{-- <span>Total Vehicles
                                            <b>{{ @$TotalVehicles }}</b>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">
        
                                        <div class="font-size"><span>Posted</span></div>
                                    </div>
                                    <div class="col-2 p-2 d-flex justify-content-center align-items-center roundeds"
                                            style="background: rgba(105, 108, 255, 0.16); !important">
                                            <img src="{{ asset('images/posted.png') }}" alt="posted.png" style="width: 18px!important">
            
            
                                        </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{@$Posted}}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        <span>Total Vehicles
                                            <b>{{@$TotalVehicles}}</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">

                                        <div class="font-size"><span>Dispatched</span></div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center rounded"
                                        style="background: rgba(105, 108, 255, 0.16); !important">
                                        <img src="{{ asset('images/dispatched.png') }}" alt="dispatched.png"
                                            style="width: 34px!important">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{ @$Dispatched }}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        {{-- <span>Total Vehicles
                                            <b>{{ @$TotalVehicles }}</b>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">

                                        <div class="font-size"><span>On Hand</span></div>
                                    </div>
                                    <div class="col-2 p-2 d-flex justify-content-center align-items-center roundeds"
                                        style="background: rgba(105, 108, 255, 0.16); !important">
                                        <img src="{{ asset('images/on_hand.png') }}" alt="on hand.png"
                                            style="width:23px!important">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{ @$onHand }}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        {{-- <span>Total Vehicles
                                            <b>{{ @$TotalVehicles }}</b>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">
                                        <div class="font-size"><span>No Title</span></div>
                                    </div>
                                    <div class="col-2 p-2 d-flex justify-content-center align-items-center roundeds"
                                        style="background: rgba(105, 108, 255, 0.16); !important">
                                        <img src="{{ asset('images/no_titles.png') }}" alt="no titles.png"
                                            style="width:18px!important">
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{ @$no_titles }}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        {{-- <span>Total Vehicles
                                            <b>{{ @$TotalVehicles }}</b>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex m-2">
                    <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">

                                        <div class="font-size"><span>Booked</span></div>
                                    </div>
                                    <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                        style="background: rgba(105, 108, 255, 0.16); !important">
                                        <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.167 11.9165H23.8337V14.0832H15.167V11.9165ZM8.66699 4.33318C8.09428 4.31984 7.52482 4.42281 6.99304 4.63585C6.46127 4.8489 5.97823 5.1676 5.57316 5.57268C5.16808 5.97775 4.84938 6.46079 4.63633 6.99256C4.42328 7.52434 4.32032 8.0938 4.33366 8.66651C4.32032 9.23922 4.42328 9.80869 4.63633 10.3405C4.84938 10.8722 5.16808 11.3553 5.57316 11.7603C5.97823 12.1654 6.46127 12.4841 6.99304 12.6972C7.52482 12.9102 8.09428 13.0132 8.66699 12.9998C9.2397 13.0132 9.80917 12.9102 10.3409 12.6972C10.8727 12.4841 11.3558 12.1654 11.7608 11.7603C12.1659 11.3553 12.4846 10.8722 12.6977 10.3405C12.9107 9.80869 13.0137 9.23922 13.0003 8.66651C13.0137 8.0938 12.9107 7.52434 12.6977 6.99256C12.4846 6.46079 12.1659 5.97775 11.7608 5.57268C11.3558 5.1676 10.8727 4.8489 10.3409 4.63585C9.80917 4.42281 9.2397 4.31984 8.66699 4.33318V4.33318ZM8.66699 10.8332C8.37877 10.8471 8.09082 10.8006 7.82164 10.6967C7.55246 10.5927 7.308 10.4336 7.10396 10.2295C6.89992 10.0255 6.74081 9.78105 6.63685 9.51186C6.5329 9.24268 6.48639 8.95473 6.50033 8.66651C6.48639 8.37829 6.5329 8.09034 6.63685 7.82116C6.74081 7.55198 6.89992 7.30752 7.10396 7.10348C7.308 6.89944 7.55246 6.74033 7.82164 6.63637C8.09082 6.53242 8.37877 6.48591 8.66699 6.49985C8.95521 6.48591 9.24316 6.53242 9.51234 6.63637C9.78152 6.74033 10.026 6.89944 10.23 7.10348C10.4341 7.30752 10.5932 7.55198 10.6971 7.82116C10.8011 8.09034 10.8476 8.37829 10.8337 8.66651C10.8476 8.95473 10.8011 9.24268 10.6971 9.51186C10.5932 9.78105 10.4341 10.0255 10.23 10.2295C10.026 10.4336 9.78152 10.5927 9.51234 10.6967C9.24316 10.8006 8.95521 10.8471 8.66699 10.8332V10.8332ZM4.33366 19.4998C4.33366 18.6379 4.67607 17.8112 5.28556 17.2017C5.89505 16.5923 6.7217 16.2498 7.58366 16.2498H9.75032C10.6123 16.2498 11.4389 16.5923 12.0484 17.2017C12.6579 17.8112 13.0003 18.6379 13.0003 19.4998V20.5832H15.167V19.4998C15.167 18.7885 15.0269 18.0842 14.7547 17.427C14.4825 16.7698 14.0835 16.1727 13.5805 15.6697C13.0775 15.1667 12.4804 14.7677 11.8232 14.4955C11.166 14.2233 10.4617 14.0832 9.75032 14.0832H7.58366C6.14707 14.0832 4.76932 14.6539 3.7535 15.6697C2.73768 16.6855 2.16699 18.0633 2.16699 19.4998V20.5832H4.33366V19.4998Z"
                                                fill="#E41414" />
                                        </svg>

                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{ @$booked_count }}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        {{-- <span>Total Shipments
                                            <b>{{ @$booked_total }}</b>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">

                                        <div class="font-size"><span>Shipped</span></div>
                                    </div>
                                    <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                        style="background: rgba(239, 87, 87, 0.13);!important">
                                        <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.167 11.9165H23.8337V14.0832H15.167V11.9165ZM8.66699 4.33318C8.09428 4.31984 7.52482 4.42281 6.99304 4.63585C6.46127 4.8489 5.97823 5.1676 5.57316 5.57268C5.16808 5.97775 4.84938 6.46079 4.63633 6.99256C4.42328 7.52434 4.32032 8.0938 4.33366 8.66651C4.32032 9.23922 4.42328 9.80869 4.63633 10.3405C4.84938 10.8722 5.16808 11.3553 5.57316 11.7603C5.97823 12.1654 6.46127 12.4841 6.99304 12.6972C7.52482 12.9102 8.09428 13.0132 8.66699 12.9998C9.2397 13.0132 9.80917 12.9102 10.3409 12.6972C10.8727 12.4841 11.3558 12.1654 11.7608 11.7603C12.1659 11.3553 12.4846 10.8722 12.6977 10.3405C12.9107 9.80869 13.0137 9.23922 13.0003 8.66651C13.0137 8.0938 12.9107 7.52434 12.6977 6.99256C12.4846 6.46079 12.1659 5.97775 11.7608 5.57268C11.3558 5.1676 10.8727 4.8489 10.3409 4.63585C9.80917 4.42281 9.2397 4.31984 8.66699 4.33318V4.33318ZM8.66699 10.8332C8.37877 10.8471 8.09082 10.8006 7.82164 10.6967C7.55246 10.5927 7.308 10.4336 7.10396 10.2295C6.89992 10.0255 6.74081 9.78105 6.63685 9.51186C6.5329 9.24268 6.48639 8.95473 6.50033 8.66651C6.48639 8.37829 6.5329 8.09034 6.63685 7.82116C6.74081 7.55198 6.89992 7.30752 7.10396 7.10348C7.308 6.89944 7.55246 6.74033 7.82164 6.63637C8.09082 6.53242 8.37877 6.48591 8.66699 6.49985C8.95521 6.48591 9.24316 6.53242 9.51234 6.63637C9.78152 6.74033 10.026 6.89944 10.23 7.10348C10.4341 7.30752 10.5932 7.55198 10.6971 7.82116C10.8011 8.09034 10.8476 8.37829 10.8337 8.66651C10.8476 8.95473 10.8011 9.24268 10.6971 9.51186C10.5932 9.78105 10.4341 10.0255 10.23 10.2295C10.026 10.4336 9.78152 10.5927 9.51234 10.6967C9.24316 10.8006 8.95521 10.8471 8.66699 10.8332V10.8332ZM4.33366 19.4998C4.33366 18.6379 4.67607 17.8112 5.28556 17.2017C5.89505 16.5923 6.7217 16.2498 7.58366 16.2498H9.75032C10.6123 16.2498 11.4389 16.5923 12.0484 17.2017C12.6579 17.8112 13.0003 18.6379 13.0003 19.4998V20.5832H15.167V19.4998C15.167 18.7885 15.0269 18.0842 14.7547 17.427C14.4825 16.7698 14.0835 16.1727 13.5805 15.6697C13.0775 15.1667 12.4804 14.7677 11.8232 14.4955C11.166 14.2233 10.4617 14.0832 9.75032 14.0832H7.58366C6.14707 14.0832 4.76932 14.6539 3.7535 15.6697C2.73768 16.6855 2.16699 18.0633 2.16699 19.4998V20.5832H4.33366V19.4998Z"
                                                fill="#E41414" />
                                        </svg>

                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{ @$shipped_count }}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        {{-- <span>Total Shipments
                                            <b>{{ @$shipped_total }}</b>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">

                                        <div class="font-size"><span>Arrived</span></div>
                                    </div>
                                    <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                        style="background: rgba(236, 184, 0, 0.15); !important">
                                        <svg width="15" height="15" viewBox="0 0 26 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.1667 13.2715C14.3632 13.2715 13.5777 13.0332 12.9097 12.5868C12.2416 12.1404 11.7209 11.506 11.4134 10.7636C11.1059 10.0213 11.0255 9.20448 11.1822 8.41643C11.339 7.62838 11.7259 6.90452 12.294 6.33636C12.8622 5.76821 13.5861 5.3813 14.3741 5.22455C15.1622 5.06779 15.979 5.14824 16.7213 5.45573C17.4636 5.76321 18.0981 6.28391 18.5445 6.95198C18.9909 7.62006 19.2292 8.4055 19.2292 9.20899C19.2292 10.2864 18.8012 11.3197 18.0393 12.0816C17.2774 12.8435 16.2441 13.2715 15.1667 13.2715ZM15.1667 6.77149C14.6846 6.77149 14.2133 6.91444 13.8125 7.18228C13.4116 7.45011 13.0992 7.8308 12.9147 8.27619C12.7302 8.72159 12.682 9.21169 12.776 9.68452C12.8701 10.1573 13.1022 10.5917 13.4431 10.9326C13.784 11.2734 14.2183 11.5056 14.6911 11.5996C15.164 11.6937 15.6541 11.6454 16.0995 11.4609C16.5449 11.2765 16.9255 10.964 17.1934 10.5632C17.4612 10.1623 17.6042 9.69108 17.6042 9.20899C17.6042 8.56252 17.3474 7.94253 16.8902 7.48541C16.4331 7.02829 15.8131 6.77149 15.1667 6.77149V6.77149ZM22.75 20.8548C22.5354 20.852 22.3303 20.7655 22.1786 20.6137C22.0268 20.462 21.9403 20.2569 21.9375 20.0423C21.9375 17.9298 20.7892 16.5215 15.1667 16.5215C9.54417 16.5215 8.39583 17.9298 8.39583 20.0423C8.39583 20.2578 8.31023 20.4645 8.15786 20.6168C8.00548 20.7692 7.79882 20.8548 7.58333 20.8548C7.36785 20.8548 7.16118 20.7692 7.00881 20.6168C6.85644 20.4645 6.77083 20.2578 6.77083 20.0423C6.77083 14.8965 12.6533 14.8965 15.1667 14.8965C17.68 14.8965 23.5625 14.8965 23.5625 20.0423C23.5597 20.2569 23.4732 20.462 23.3214 20.6137C23.1697 20.7655 22.9646 20.852 22.75 20.8548V20.8548ZM9.01333 14.149H8.66667C7.80471 14.0657 7.01116 13.6433 6.46059 12.9749C5.91001 12.3065 5.64751 11.4468 5.73083 10.5848C5.81416 9.72287 6.23647 8.92931 6.90489 8.37874C7.5733 7.82816 8.43305 7.56566 9.295 7.64899C9.40552 7.65374 9.51391 7.68101 9.61352 7.72912C9.71313 7.77724 9.80187 7.84519 9.87429 7.92881C9.94671 8.01243 10.0013 8.10996 10.0347 8.21542C10.0681 8.32088 10.0796 8.43205 10.0685 8.54212C10.0574 8.65219 10.024 8.75883 9.97025 8.85552C9.9165 8.95221 9.84358 9.0369 9.75594 9.10441C9.6683 9.17191 9.5678 9.22082 9.4606 9.24811C9.3534 9.27541 9.24175 9.28053 9.1325 9.26315C8.92102 9.24207 8.70747 9.26381 8.50458 9.3271C8.3017 9.39038 8.11365 9.49391 7.95167 9.63149C7.78714 9.7642 7.65068 9.92834 7.55024 10.1143C7.4498 10.3003 7.3874 10.5045 7.36667 10.7148C7.34427 10.9278 7.36448 11.1431 7.42612 11.3483C7.48777 11.5534 7.58962 11.7442 7.72574 11.9095C7.86185 12.0749 8.02952 12.2115 8.21896 12.3114C8.4084 12.4113 8.61583 12.4725 8.82917 12.4915C9.18183 12.5217 9.5349 12.4381 9.83667 12.2532C10.0206 12.1397 10.242 12.1039 10.4523 12.1536C10.6625 12.2034 10.8444 12.3347 10.9579 12.5186C11.0714 12.7025 11.1072 12.9239 11.0574 13.1342C11.0077 13.3444 10.8764 13.5263 10.6925 13.6398C10.19 13.9603 9.60915 14.1364 9.01333 14.149V14.149ZM3.25 20.0423C3.03538 20.0395 2.83035 19.953 2.67858 19.8012C2.52681 19.6495 2.44031 19.4444 2.4375 19.2298C2.4375 16.3048 3.2175 14.3548 7.04167 14.3548C7.25716 14.3548 7.46382 14.4404 7.61619 14.5928C7.76856 14.7452 7.85417 14.9518 7.85417 15.1673C7.85417 15.3828 7.76856 15.5895 7.61619 15.7418C7.46382 15.8942 7.25716 15.9798 7.04167 15.9798C4.49583 15.9798 4.0625 16.7923 4.0625 19.2298C4.05969 19.4444 3.97319 19.6495 3.82142 19.8012C3.66965 19.953 3.46462 20.0395 3.25 20.0423V20.0423Z"
                                                fill="#ECB800" />
                                        </svg>

                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{ @$arrived_count }}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        {{-- <span>Total Shipments
                                            <b>{{ @$arrived_total }}</b>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">

                                        <div class="font-size"><span>Completed</span></div>
                                    </div>
                                    <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                        style="background: rgba(193, 23, 129, 0.12); !important">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.7134 6.6398C20.575 6.44229 20.391 6.28104 20.1771 6.16967C19.9632 6.0583 19.7256 6.0001 19.4845 6H15.75V3.75C15.7496 3.35231 15.5914 2.97104 15.3102 2.68983C15.029 2.40863 14.6477 2.25045 14.25 2.25H2.25C1.85231 2.25045 1.47104 2.40863 1.18983 2.68983C0.908625 2.97104 0.750447 3.35231 0.75 3.75V19.125H3.23822C3.37 19.8611 3.75642 20.5273 4.32986 21.0072C4.9033 21.4871 5.62725 21.7501 6.375 21.7501C7.12275 21.7501 7.8467 21.4871 8.42014 21.0072C8.99358 20.5273 9.38 19.8611 9.51178 19.125H14.4882C14.62 19.8611 15.0064 20.5273 15.5799 21.0072C16.1533 21.4871 16.8772 21.7501 17.625 21.7501C18.3728 21.7501 19.0967 21.4871 19.6701 21.0072C20.2436 20.5273 20.63 19.8611 20.7618 19.125H23.25V10.6182C23.2504 10.3873 23.1793 10.162 23.0467 9.97308L20.7134 6.6398ZM2.24906 3.75H14.25V12H2.25L2.24906 3.75ZM6.375 20.25C6.04124 20.25 5.71498 20.151 5.43748 19.9656C5.15997 19.7802 4.94368 19.5166 4.81595 19.2083C4.68823 18.8999 4.65481 18.5606 4.71992 18.2333C4.78504 17.9059 4.94576 17.6053 5.18176 17.3693C5.41776 17.1333 5.71844 16.9725 6.04578 16.9074C6.37313 16.8423 6.71243 16.8757 7.02078 17.0035C7.32913 17.1312 7.59268 17.3475 7.77811 17.625C7.96353 17.9025 8.0625 18.2287 8.0625 18.5625C8.062 19.0099 7.88405 19.4388 7.56769 19.7552C7.25133 20.0716 6.8224 20.2495 6.375 20.25V20.25ZM17.625 20.25C17.2912 20.25 16.965 20.151 16.6875 19.9656C16.41 19.7802 16.1937 19.5166 16.066 19.2083C15.9382 18.8999 15.9048 18.5606 15.9699 18.2333C16.035 17.9059 16.1958 17.6053 16.4318 17.3693C16.6678 17.1333 16.9684 16.9725 17.2958 16.9074C17.6231 16.8423 17.9624 16.8757 18.2708 17.0035C18.5791 17.1312 18.8427 17.3475 19.0281 17.625C19.2135 17.9025 19.3125 18.2287 19.3125 18.5625C19.312 19.0099 19.1341 19.4388 18.8177 19.7552C18.5013 20.0716 18.0724 20.2495 17.625 20.25V20.25ZM21.75 17.625H20.6716C20.4712 16.9734 20.0671 16.4033 19.5188 15.9983C18.9704 15.5933 18.3067 15.3747 17.625 15.3747C16.9433 15.3747 16.2796 15.5933 15.7312 15.9983C15.1829 16.4033 14.7788 16.9734 14.5784 17.625H9.42159C9.22115 16.9734 8.8171 16.4033 8.26877 15.9983C7.72043 15.5933 7.05669 15.3747 6.375 15.3747C5.69331 15.3747 5.02957 15.5933 4.48123 15.9983C3.9329 16.4033 3.52885 16.9734 3.32841 17.625H2.25V13.5H21.75V17.625ZM21.75 12H15.75V7.5H19.4845L21.75 10.7364V12Z"
                                                fill="#C11781" />
                                        </svg>

                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{ @$completed_count }}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        {{-- <span>Total Shipments
                                            <b>{{ @$completed_total }}</b>
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                {{-- <div class="d-flex m-2">
                    <div class="col-3 p-1">
                        <div class="col-12 py-0 px-1">
                            <div class="col-12 border-style card-rounded py-2 px-3">
                                <div class="d-flex">
                                    <div class="col-10 text-muted p-0 d-flex align-items-center">

                                        <div class="font-size"><span>Completed</span></div>
                                    </div>
                                    <div class="col-2 p-2 d-flex justify-content-center align-items-center rounded"
                                        style="background: rgba(105, 108, 255, 0.16); !important">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M20.7134 6.6398C20.575 6.44229 20.391 6.28104 20.1771 6.16967C19.9632 6.0583 19.7256 6.0001 19.4845 6H15.75V3.75C15.7496 3.35231 15.5914 2.97104 15.3102 2.68983C15.029 2.40863 14.6477 2.25045 14.25 2.25H2.25C1.85231 2.25045 1.47104 2.40863 1.18983 2.68983C0.908625 2.97104 0.750447 3.35231 0.75 3.75V19.125H3.23822C3.37 19.8611 3.75642 20.5273 4.32986 21.0072C4.9033 21.4871 5.62725 21.7501 6.375 21.7501C7.12275 21.7501 7.8467 21.4871 8.42014 21.0072C8.99358 20.5273 9.38 19.8611 9.51178 19.125H14.4882C14.62 19.8611 15.0064 20.5273 15.5799 21.0072C16.1533 21.4871 16.8772 21.7501 17.625 21.7501C18.3728 21.7501 19.0967 21.4871 19.6701 21.0072C20.2436 20.5273 20.63 19.8611 20.7618 19.125H23.25V10.6182C23.2504 10.3873 23.1793 10.162 23.0467 9.97308L20.7134 6.6398ZM2.24906 3.75H14.25V12H2.25L2.24906 3.75ZM6.375 20.25C6.04124 20.25 5.71498 20.151 5.43748 19.9656C5.15997 19.7802 4.94368 19.5166 4.81595 19.2083C4.68823 18.8999 4.65481 18.5606 4.71992 18.2333C4.78504 17.9059 4.94576 17.6053 5.18176 17.3693C5.41776 17.1333 5.71844 16.9725 6.04578 16.9074C6.37313 16.8423 6.71243 16.8757 7.02078 17.0035C7.32913 17.1312 7.59268 17.3475 7.77811 17.625C7.96353 17.9025 8.0625 18.2287 8.0625 18.5625C8.062 19.0099 7.88405 19.4388 7.56769 19.7552C7.25133 20.0716 6.8224 20.2495 6.375 20.25V20.25ZM17.625 20.25C17.2912 20.25 16.965 20.151 16.6875 19.9656C16.41 19.7802 16.1937 19.5166 16.066 19.2083C15.9382 18.8999 15.9048 18.5606 15.9699 18.2333C16.035 17.9059 16.1958 17.6053 16.4318 17.3693C16.6678 17.1333 16.9684 16.9725 17.2958 16.9074C17.6231 16.8423 17.9624 16.8757 18.2708 17.0035C18.5791 17.1312 18.8427 17.3475 19.0281 17.625C19.2135 17.9025 19.3125 18.2287 19.3125 18.5625C19.312 19.0099 19.1341 19.4388 18.8177 19.7552C18.5013 20.0716 18.0724 20.2495 17.625 20.25V20.25ZM21.75 17.625H20.6716C20.4712 16.9734 20.0671 16.4033 19.5188 15.9983C18.9704 15.5933 18.3067 15.3747 17.625 15.3747C16.9433 15.3747 16.2796 15.5933 15.7312 15.9983C15.1829 16.4033 14.7788 16.9734 14.5784 17.625H9.42159C9.22115 16.9734 8.8171 16.4033 8.26877 15.9983C7.72043 15.5933 7.05669 15.3747 6.375 15.3747C5.69331 15.3747 5.02957 15.5933 4.48123 15.9983C3.9329 16.4033 3.52885 16.9734 3.32841 17.625H2.25V13.5H21.75V17.625ZM21.75 12H15.75V7.5H19.4845L21.75 10.7364V12Z"
                                                fill="#C11781" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold"><span>{{ @$TotalCustomers }}</span> </div>
                                    <div class="py-1 col-12 text-muted p-0 font-size">
                                        <span>Total Customers
                                            <b>{{ @$TotalCustomers }}</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}






            </div>
            {{-- badges end --}}

            {{-- listing start --}}
            <div class="px-3 mt-5">
                <div class="border-style card-rounded">
                    <div class="px-3">



                        <div class="row">
                            <div class="col-12 dispatched_vehicles"
                                style="border-top-right-radius: 7px;
                            border-top-left-radius: 7px!important;">
                                <p>Shipments</p>
                            </div>
                        </div>
                        <br>
                        

                        <div class="row mt-2 mb-2">
                            <div style="width: -webkit-fill-available;">
                                <table id="dashboard_shipment" class="row-border" style="width:100%!important;">
                                    <thead class="bg-custom">
                                        <tr class="font-size" style="font-size:11px!important;font-weight:300!important">
                                            <th class="font-bold-tr">view</th>
                                            <th class="font-bold-tr">CONSIGNEE</th>
                                            <th class="font-bold-tr">BOOKING NO:</th>
                                            <th class="font-bold-tr">CONTAINER NO:</th>
                                            <th class="font-bold-tr">CONT SIZE</th>
                                            <th class="font-bold-tr">LINES</th>
                                            <th class="font-bold-tr">VEHICLES</th>
                                            <th class="font-bold-tr">LOAD DATE</th>
                                            <th class="font-bold-tr">EXPORT DATE</th>
                                            <th class="font-bold-tr">ARRIVAL DATE</th>
                                            <th class="font-bold-tr">P.O.L</th>
                                            <th class="font-bold-tr">P.O.D</th>
                                            <th class="font-bold-tr">SHIPPER</th>
                                            <th class="font-bold-tr">Action</th>
                                            <th>vin</th>
                                            <th>lot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>






                </div>

              


            </div>





        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                state = "{{ @$state }}";

                function format(d) {
                    console.log(d);
                    html =
                        '<table class="vehicle_shipment_table my-3" style="width:90%!important;"><thead style="background:#dbdbdb;color:#2c3e50;font-size:12px!important;"><th>ID</th><th>Customer Name</th><th>VIN</th><th>YEAR</th><th>MAKE</th><th>MODEL</th><th>VEHICLE TYPE</th><th>VALUE</th><th>Action</th></thead><tbody id="shipemt_vehicle">';
                    d.forEach(element => {
                        $url_view = 'vehicle/profile/' + element.id;
                        html += '<tr><td>' + element.id + '</td><td>' + element.user['company_name'] +
                            '</td><td>' +
                            element.vin + '</td><td>' + element.year + '</td><td>' + element.make +
                            '</td><td>' + element.model + '</td><td>' + element.vehicle_type + '</td><td>' +
                            element.value + '</td><td> <button class="profile-button"><a href=' + $url_view +
                            '><svg width="14" height="13" viewBox="0 0 16 14" fill="none"  xmlns="http://www.w3.org/2000/svg"> <path d="M16 7C16 7 13 2.1875 8 2.1875C3 2.1875 0 7 0 7C0 7 3 11.8125 8 11.8125C13 11.8125 16 7 16 7ZM1.173 7C1.65651 6.35698 2.21264 5.7581 2.833 5.21237C4.12 4.0845 5.88 3.0625 8 3.0625C10.12 3.0625 11.879 4.0845 13.168 5.21237C13.7884 5.7581 14.3445 6.35698 14.828 7C14.77 7.07613 14.706 7.16013 14.633 7.252C14.298 7.672 13.803 8.232 13.168 8.78763C11.879 9.9155 10.119 10.9375 8 10.9375C5.88 10.9375 4.121 9.9155 2.832 8.78763C2.21165 8.2419 1.65552 7.64301 1.172 7H1.173Z" fill="#048B52" /><path d="M8 4.8125C7.33696 4.8125 6.70107 5.04297 6.23223 5.4532C5.76339 5.86344 5.5 6.41984 5.5 7C5.5 7.58016 5.76339 8.13656 6.23223 8.5468C6.70107 8.95703 7.33696 9.1875 8 9.1875C8.66304 9.1875 9.29893 8.95703 9.76777 8.5468C10.2366 8.13656 10.5 7.58016 10.5 7C10.5 6.41984 10.2366 5.86344 9.76777 5.4532C9.29893 5.04297 8.66304 4.8125 8 4.8125ZM4.5 7C4.5 6.18777 4.86875 5.40882 5.52513 4.83449C6.1815 4.26016 7.07174 3.9375 8 3.9375C8.92826 3.9375 9.8185 4.26016 10.4749 4.83449C11.1313 5.40882 11.5 6.18777 11.5 7C11.5 7.81223 11.1313 8.59118 10.4749 9.16551C9.8185 9.73984 8.92826 10.0625 8 10.0625C7.07174 10.0625 6.1815 9.73984 5.52513 9.16551C4.86875 8.59118 4.5 7.81223 4.5 7Z" fill="#048B52" /></svg></a></button></td></tr>';
                    });
                    html += '</tbody></table>';
                    return html;
                }
                var table = $('#dashboard_shipment').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: {
                        details: {
                            type: 'column',
                            target: -1
                        }
                    },
                    columnDefs: [{
                     
                        orderable: false,
                        targets: '_all'
                    }],
                    'scrollX': true,
                    "lengthMenu": [
                        [50, 100, 500],
                        [50, 100, 500]
                    ],
                    language: {
                        search: "",
                        sLengthMenu: "_MENU_",
                        searchPlaceholder: "Search",
                        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> ',
                    },
                    ajax: "{{ route('dashboard.records') }}" + "/" + state,
                    columns: [{
                         
                            className: 'dt-control',
                            orderable: false,
                            data: null,
                            defaultContent: '',

                        },
                        
                        {
                            data: 'select_consignee'
                        },
                        {
                            data: 'booking_number'
                        },
                        {
                            data: 'container_no'
                        },
                        {
                            data: 'container_size'
                        },
                        {
                            data: 'shipping_line'
                        },
                        {
                            data: 'shipment_id'
                        },
                        {
                            data: 'loading_date'
                        },
                        {
                            data: 'sale_date'
                        },
                        {
                            data: 'est_arrival_date'
                        },
                        {
                            data: 'loading_port'
                        },
                        {
                            data: 'destination_port'
                        },
                        {
                            data: 'shipper'
                        },
                        {
                            data: 'action'
                        },
                        {
                            data: 'vin'
                        },
                        {
                            data: 'lot'
                        },
                    ],
                    order: [
                        [1, 'asc']
                    ],
                }).column(14).visible(false).column(15).visible(false);;
                $('#dashboard_shipment tbody').on('click', 'td.dt-control', function() {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    console.log(row.data()['vehicle']);
                    if (row.child.isShown()) {
                        row.child.hide();
                        tr.removeClass('dt-hasChild shown');
                    } else {
                        row.child(format(row.data()['vehicle'])).show();
                        tr.addClass('dt-hasChild shown');
                    }
                    $('.vehicle_shipment_table').DataTable({
                        "lengthChange": false,
                        "info": false,
                        "bPaginate": false,
                        searching: false,
                        "ordering": false,
                        language: {
                            search: "",
                            sLengthMenu: "_MENU_",
                            searchPlaceholder: "Search",
                            "emptyTable": "No Vehicle Available",
                        },
                    });
                });
            });

            function fetchCustomers(id) {
                $tab = $('#' + id).attr('tab');
                $value = $('#' + id).attr('value');
                $id = id;
                $.ajax({
                    type: 'post',
                    url: '{{ URL::to('admin/shipments/filterShipment') }}',
                    data: {
                        'tab': $tab,
                        'id': $id,
                        'state': $value,
                    },
                    success: function(data) {
                        // $('#shipment_tbody').html(data);
                        $('.shipment_table_body').html(data);

                    }
                });
            }
        </script>


        {{-- google chart --}}
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load google charts
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            // Draw the chart and set the chart values
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Booked', 10],
                    ['Shipped', 2],
                    ['Arrived', 4],
                    ['Completed', 2],
                ]);

                // Optional; add a title and set the width and height of the chart
                var options = {
                    '': '',
                    'width': 180,
                    'height': 96
                };

                // Display the chart inside the <div> element with id="piechart"
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
    @endsection
