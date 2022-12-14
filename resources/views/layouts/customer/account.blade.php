<div style="overflow-x:auto;" class="card user-card rounded  mt-lg-4 mt-md-4 mt-sm-4 mt-4">
    <div class="px-3 d-flex">
        <h6 class="text-muted"><b> <svg width="15" height="18" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M16.9337 12.9769C16.4915 12.0843 15.8499 11.2735 15.0446 10.5897C14.2417 9.9039 13.2906 9.35713 12.2438 8.97956C12.2344 8.97556 12.2251 8.97356 12.2157 8.96957C13.6758 8.07061 14.6251 6.60632 14.6251 4.95424C14.6251 2.21742 12.0235 0 8.81256 0C5.60162 0 3.00006 2.21742 3.00006 4.95424C3.00006 6.60632 3.94928 8.07061 5.40943 8.97157C5.40006 8.97556 5.39068 8.97756 5.38131 8.98155C4.33131 9.35912 3.38912 9.90049 2.58053 10.5917C1.77594 11.276 1.13444 12.0867 0.691465 12.9789C0.256282 13.8524 0.0215788 14.7889 5.86078e-05 15.7377C-0.000566951 15.759 0.00382061 15.7802 0.0129629 15.8001C0.0221052 15.8199 0.0358171 15.838 0.0532908 15.8533C0.0707645 15.8686 0.0916463 15.8807 0.114706 15.889C0.137765 15.8973 0.162536 15.9015 0.187559 15.9015H1.59381C1.69693 15.9015 1.77896 15.8316 1.78131 15.7457C1.82818 14.2035 2.55475 12.7592 3.83912 11.6644C5.16803 10.5318 6.93287 9.90848 8.81256 9.90848C10.6922 9.90848 12.4571 10.5318 13.786 11.6644C15.0704 12.7592 15.7969 14.2035 15.8438 15.7457C15.8462 15.8336 15.9282 15.9015 16.0313 15.9015H17.4376C17.4626 15.9015 17.4874 15.8973 17.5104 15.889C17.5335 15.8807 17.5544 15.8686 17.5718 15.8533C17.5893 15.838 17.603 15.8199 17.6122 15.8001C17.6213 15.7802 17.6257 15.759 17.6251 15.7377C17.6016 14.7828 17.3696 13.8539 16.9337 12.9769ZM8.81256 8.39024C7.73678 8.39024 6.72428 8.03266 5.96256 7.38341C5.20084 6.73417 4.78131 5.87117 4.78131 4.95424C4.78131 4.0373 5.20084 3.17431 5.96256 2.52506C6.72428 1.87582 7.73678 1.51823 8.81256 1.51823C9.88834 1.51823 10.9008 1.87582 11.6626 2.52506C12.4243 3.17431 12.8438 4.0373 12.8438 4.95424C12.8438 5.87117 12.4243 6.73417 11.6626 7.38341C10.9008 8.03266 9.88834 8.39024 8.81256 8.39024Z"
                fill="#B5B5B5" />
        </svg> User's Projects List</b></h6>
    </div>
    <div>
        <br>
    </div>
    <div>
        <table class="table font-size">
            <thead class="text-muted bg-white">
                <tr>
                    <th class="col-3 pl-5">PROJECT</th>
                    <th class="col-3 pl-4" style="text-align: start!important;">TOTAL</th>
                    <th class="col-3 pl-5">PROGREE</th>
                </tr>
            </thead>
            <tbody>
                {{-- projects list --}}
                <tr>
                    <td class="pl-5 d-flex align-items-center">
                        <div>
                            <svg class="icon-circle p-1" width="22" height="22" viewBox="0 0 11 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.64177 5.78884C9.8312 5.71511 9.99176 5.59651 10.1043 5.44719C10.2169 5.29787 10.2768 5.12411 10.2767 4.94661V4.30489C10.2768 4.01342 10.1639 3.7301 9.95555 3.49896C9.74723 3.26782 9.45516 3.10181 9.12474 3.02673L7.82563 2.73152L6.86853 1.26238C6.73412 1.05613 6.53743 0.884291 6.29885 0.764664C6.06028 0.645037 5.7885 0.58198 5.5117 0.582031H3.41315C3.0874 0.58202 2.7699 0.66939 2.50565 0.831759C2.24141 0.994129 2.04381 1.22326 1.94088 1.48669L1.43005 2.79236C1.11549 2.87705 0.840778 3.04498 0.645792 3.27177C0.450806 3.49857 0.34569 3.77242 0.345703 4.05359V4.94661C0.345703 5.32064 0.606393 5.64283 0.980669 5.78884C1.03037 6.09837 1.20703 6.38291 1.47932 6.59204C1.75162 6.80117 2.10198 6.92139 2.46832 6.9314C2.83467 6.94142 3.19335 6.84057 3.4808 6.64674C3.76826 6.45291 3.96594 6.17861 4.03881 5.87243H6.58363C6.65651 6.17861 6.85418 6.45291 7.14164 6.64674C7.4291 6.84057 7.78777 6.94142 8.15412 6.9314C8.52046 6.92139 8.87082 6.80117 9.14312 6.59204C9.41542 6.38291 9.59207 6.09837 9.64177 5.78884ZM3.41315 1.11107H4.06984V2.69819H2.12088L2.52929 1.65387C2.59108 1.49574 2.70971 1.35821 2.86836 1.26078C3.027 1.16336 3.21761 1.11098 3.41315 1.11107ZM6.32543 1.51949L7.09446 2.69819H4.69053V1.11107H5.5117C5.67774 1.11112 5.84075 1.14901 5.98382 1.22082C6.1269 1.29263 6.24484 1.39575 6.32543 1.51949ZM1.58708 5.60791C1.58708 5.5037 1.61116 5.40051 1.65795 5.30423C1.70474 5.20795 1.77332 5.12047 1.85978 5.04678C1.94623 4.97309 2.04887 4.91464 2.16183 4.87476C2.27478 4.83488 2.39585 4.81435 2.51812 4.81435C2.64038 4.81435 2.76145 4.83488 2.87441 4.87476C2.98737 4.91464 3.09 4.97309 3.17646 5.04678C3.26291 5.12047 3.33149 5.20795 3.37828 5.30423C3.42507 5.40051 3.44915 5.5037 3.44915 5.60791C3.44915 5.81838 3.35106 6.02022 3.17646 6.16904C3.00186 6.31786 2.76504 6.40147 2.51812 6.40147C2.27119 6.40147 2.03438 6.31786 1.85978 6.16904C1.68517 6.02022 1.58708 5.81838 1.58708 5.60791ZM7.17329 5.60791C7.17329 5.39745 7.27138 5.1956 7.44598 5.04678C7.62059 4.89796 7.8574 4.81435 8.10432 4.81435C8.35125 4.81435 8.58806 4.89796 8.76266 5.04678C8.93727 5.1956 9.03536 5.39745 9.03536 5.60791C9.03536 5.81838 8.93727 6.02022 8.76266 6.16904C8.58806 6.31786 8.35125 6.40147 8.10432 6.40147C7.8574 6.40147 7.62059 6.31786 7.44598 6.16904C7.27138 6.02022 7.17329 5.81838 7.17329 5.60791Z"
                                    fill="#4E9842" />
                            </svg>
                        </div>
                        <span class="px-2" style="font-size:14px!important">
                            New Orders
                        </span>
                    </td>
                    <td style="text-align: start!important;" class="pl-5">{{ @$customer_vehicles }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                aria-valuemax="100" style="width:{{ @$customer_vehicles_percentage }}%">
                                {{ @$customer_vehicles_percentage }} %
                            </div>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td class="pl-5 d-flex align-items-center">
                        <div>
                            <svg class="icon-circle p-1" width="22" height="22" viewBox="0 0 13 13"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1214_122)">
                                    <path
                                        d="M10.1294 4.4648L10.126 4.46427L1.17948 3.23628C1.10416 3.22569 1.02739 3.23394 0.956046 3.26029C0.884697 3.28663 0.82099 3.33026 0.770626 3.38725C0.717164 3.44651 0.679275 3.51814 0.660368 3.59568C0.64146 3.67322 0.642127 3.75425 0.662309 3.83147L1.22424 5.97162C1.25198 6.07715 1.31567 6.16969 1.40432 6.23329C1.49298 6.2969 1.60105 6.32758 1.7099 6.32006L6.32379 5.97834C6.34194 5.97708 6.35997 5.98219 6.37475 5.9928C6.38954 6.0034 6.40015 6.01884 6.40477 6.03644C6.4094 6.05404 6.40773 6.0727 6.40006 6.0892C6.3924 6.1057 6.37921 6.119 6.36278 6.12682L2.17633 8.09576C2.07784 8.14262 1.99878 8.22236 1.95275 8.32125C1.90673 8.42014 1.89664 8.53198 1.9242 8.63751L2.48623 10.778C2.50553 10.8518 2.54284 10.9196 2.59481 10.9753C2.64677 11.0311 2.71176 11.073 2.78395 11.0975C2.87088 11.1272 2.96464 11.1307 3.05353 11.1075C3.11529 11.0912 3.17318 11.0627 3.2238 11.0238L10.4179 5.57823L10.4211 5.57558C10.5174 5.5004 10.5896 5.39862 10.6287 5.28283C10.6678 5.16705 10.6721 5.04234 10.6411 4.92414C10.61 4.80594 10.545 4.69942 10.4541 4.61778C10.3631 4.53614 10.2503 4.48295 10.1294 4.4648Z"
                                        fill="#64A2FF" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1214_122">
                                        <rect width="10" height="10" fill="white"
                                            transform="translate(0 2.53906) rotate(-14.7117)" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        <span class="px-2" style="font-size:14px!important">
                            Dispatched
                        </span>
                    </td>
                    <td style="text-align: start!important;" class="pl-5">{{ @$dispatch_count }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                aria-valuemax="100"
                                style="width:{{ @$dispatch_count_percentage }}%;line-height:1.7!important;">
                                {{ @$dispatch_count_percentage }}%
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="pl-5 d-flex align-items-center">
                        <div>
                            <svg class="icon-circle p-1" width="22" height="22" viewBox="0 0 12 12"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1214_127)">
                                    <path
                                        d="M11.7771 7.68984C11.5312 7.43906 11.1479 7.45547 10.8896 7.68984L8.96458 9.42188C8.72917 9.63516 8.43542 9.75 8.13125 9.75H5.66667C5.48333 9.75 5.33333 9.58125 5.33333 9.375C5.33333 9.16875 5.48333 9 5.66667 9H7.29792C7.62917 9 7.9375 8.74453 7.99167 8.37656C8.06042 7.90781 7.73958 7.5 7.33333 7.5H4C3.4375 7.5 2.89375 7.71797 2.45625 8.11641L1.4875 9H0.333333C0.15 9 0 9.16875 0 9.375V11.625C0 11.8313 0.15 12 0.333333 12H7.76667C8.06875 12 8.3625 11.8852 8.6 11.6719L11.75 8.83594C12.0667 8.55234 12.0917 8.00859 11.7771 7.68984Z"
                                        fill="#ECB800" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1214_127">
                                        <rect width="12" height="12" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <span class="px-2" style="font-size:14px!important">
                            On Hand
                        </span>
                    <td style="text-align: start!important;" class="pl-5">{{ @$onhand_count }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-waring" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100"
                                style="width:{{ @$onhand_count_percentage }}%">
                                {{ @$onhand_count_percentage }}%
                            </div>
                        </div>
                    </td>
                    </td>
                </tr>

                <tr>
                    <td class="pl-5 d-flex align-items-center">
                        <div>
                            <svg class="icon-circle p-1" width="22" height="22" viewBox="0 0 10 10"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1214_125)">
                                    <path
                                        d="M0.833328 7.91732C0.833328 8.62565 1.37499 9.16732 2.08333 9.16732H7.91666C8.62499 9.16732 9.16666 8.62565 9.16666 7.91732V4.58398H0.833328V7.91732ZM7.91666 1.66732H7.08333V1.25065C7.08333 1.00065 6.91666 0.833984 6.66666 0.833984C6.41666 0.833984 6.24999 1.00065 6.24999 1.25065V1.66732H3.74999V1.25065C3.74999 1.00065 3.58333 0.833984 3.33333 0.833984C3.08333 0.833984 2.91666 1.00065 2.91666 1.25065V1.66732H2.08333C1.37499 1.66732 0.833328 2.20898 0.833328 2.91732V3.75065H9.16666V2.91732C9.16666 2.20898 8.62499 1.66732 7.91666 1.66732Z"
                                        fill="#5DB2F2" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1214_125">
                                        <rect width="10" height="10" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        <span class="px-2" style="font-size:14px!important">
                           No Titles
                        </span>
                    </td>
                    <td style="text-align: start!important;" class="pl-5">{{ @$posted_count }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                aria-valuemax="100" style="width:{{ @$posted_count_percentage }}%">
                                {{ @$posted_count_percentage }}%
                            </div>
                        </div>
                    </td>

                </tr>


                <tr>
                    <td class="pl-5 d-flex align-items-center">
                        <div><svg class="icon-circle p-1" width="22" height="22" viewBox="0 0 12 12"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.4985 10C8.049 10 7.8545 9.8445 7.5605 9.6095C7.2205 9.338 6.798 9 5.997 9C5.1965 9 4.774 9.338 4.4345 9.61C4.141 9.8445 3.947 10 3.4975 10C3.049 10 2.855 9.8445 2.5615 9.61C2.222 9.338 1.8005 9 1 9V10C1.449 10 1.643 10.1555 1.9365 10.39C2.276 10.662 2.698 11 3.4975 11C4.298 11 4.72 10.662 5.0595 10.3905C5.3535 10.1555 5.5475 10 5.997 10C6.447 10 6.6525 10.164 6.936 10.3905C7.2755 10.662 7.698 11 8.4985 11C9.299 11 9.7215 10.662 10.061 10.3905C10.3445 10.164 10.55 10 11 10V9C10.199 9 9.7765 9.338 9.4365 9.6095C9.1425 9.8445 8.948 10 8.4985 10ZM3 4.25L2 4.5L3 8.5H3.4975C4.298 8.5 4.72 8.162 5.0595 7.8905C5.3535 7.6555 5.5475 7.5 5.997 7.5C6.447 7.5 6.6525 7.664 6.936 7.8905C7.2755 8.162 7.698 8.5 8.4985 8.5H9L9.0135 8.4465L9.17 7.8205L10 4.5L9 4.25V2.5005C9.00005 2.38487 8.96001 2.27279 8.88671 2.18336C8.81342 2.09393 8.71139 2.03266 8.598 2.01L6.5 1.5905V1H5.5V1.5905L3.402 2.01C3.28861 2.03266 3.18658 2.09393 3.11328 2.18336C3.03999 2.27279 2.99995 2.38487 3 2.5005V4.25ZM4 2.9095L6 2.5095L8 2.9095V4L6 3.5L4 4V2.9095Z"
                                    fill="#75CF02" />
                            </svg>

                        </div>
                        <span class="px-2" style="font-size:14px!important">
                            Towing
                        </span>
                    </td>
                    <td style="text-align: start!important;" class="pl-5">{{ @$shipped_count }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar-success" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100"
                                style="width:{{ @$shipped_count_percentage }}%">
                                {{ @$shipped_count_percentage }}%
                            </div>
                        </div>
                    </td>
                </tr>


                <tr>
                    <td class="pl-5 d-flex align-items-center">
                        <div>
                            <svg class="icon-circle p-1" width="22" height="22" viewBox="0 0 11 8"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.6876 7.32269C10.6876 7.40471 10.648 7.48336 10.5777 7.54136C10.5074 7.59935 10.412 7.63193 10.3126 7.63193H3.56255C3.4631 7.63193 3.36771 7.59935 3.29739 7.54136C3.22706 7.48336 3.18755 7.40471 3.18755 7.32269C3.18755 7.24068 3.22706 7.16202 3.29739 7.10403C3.36771 7.04604 3.4631 7.01346 3.56255 7.01346H10.3126C10.412 7.01346 10.5074 7.04604 10.5777 7.10403C10.648 7.16202 10.6876 7.24068 10.6876 7.32269ZM9.56255 6.24036C9.60307 6.24009 9.64244 6.22927 9.67505 6.20944C9.69834 6.19504 9.71724 6.17636 9.73026 6.15489C9.74327 6.13342 9.75005 6.10975 9.75005 6.08575V4.70578C9.74931 4.40152 9.628 4.1058 9.4046 3.86366C9.1812 3.62152 8.86794 3.44622 8.51255 3.36447L6.31411 2.86196L4.85161 0.751418C4.8278 0.719255 4.79144 0.694721 4.74849 0.68184L4.11568 0.507894C4.03107 0.484683 3.94094 0.478536 3.85286 0.48997C3.76477 0.501403 3.6813 0.530084 3.60943 0.573607C3.53606 0.615455 3.4763 0.671546 3.43543 0.736934C3.39456 0.802323 3.37382 0.874999 3.37505 0.948556V2.16617L2.1938 1.8608L1.47661 0.755283C1.45427 0.721237 1.41759 0.695113 1.37349 0.68184L0.740677 0.507894C0.656067 0.484683 0.565943 0.478536 0.477859 0.48997C0.389774 0.501403 0.306298 0.530084 0.234427 0.573607C0.161059 0.615455 0.101305 0.671546 0.0604316 0.736934C0.0195584 0.802323 -0.00117764 0.874999 5.16368e-05 0.948556V2.98179C0.00050427 3.28554 0.121137 3.58088 0.343635 3.82296C0.566133 4.06504 0.878344 4.24064 1.23286 4.3231L9.51099 6.2365L9.56255 6.24036Z"
                                    fill="#19B0D1" />
                            </svg>
                        </div>
                        <span class="px-2" style="font-size:14px!important">
                            Inventory
                        </span>
                    </td>
                    <td style="text-align: start!important;" class="pl-5">{{ @$arrived_count }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                                aria-valuemax="100" style="width:{{ @$arrived_count_percentage }}%">
                                {{ @$arrived_count_percentage }}%
                            </div>
                        </div>
                    </td>
                </tr>



                <tr>
                    <td class="pl-5 d-flex align-items-center">
                        <div>
                            <svg class="icon-circle p-1" width="22" height="22" viewBox="0 0 12 12"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1214_129)">
                                    <path
                                        d="M6 10.5C8.48528 10.5 10.5 8.48528 10.5 6C10.5 3.51472 8.48528 1.5 6 1.5C3.51472 1.5 1.5 3.51472 1.5 6C1.5 8.48528 3.51472 10.5 6 10.5Z"
                                        stroke="#B54F4F" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M4 6L5.5 7.5L8 5" stroke="#B54F4F" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1214_129">
                                        <rect width="12" height="12" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>

                        </div>
                        <span class="px-2" style="font-size:14px!important">
                            Booked
                        </span>
                    </td>
                    <td style="text-align: start!important;" class="pl-5">{{ @$booked_count }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100"
                                style="width:{{ @$booked_count_percentage }}%">
                                {{ @$booked_count_percentage }}%
                            </div>
                        </div>
                    </td>
                </tr>
                
                
            </tbody>
        </table>
    </div>
</div>
