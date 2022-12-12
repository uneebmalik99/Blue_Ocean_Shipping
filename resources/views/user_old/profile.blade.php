@extends('layouts.partials.mainlayout')
@section('body')
    {{-- <div class="row unknow p-5">
            <div class="col-12 ms-5 mb-4">
                <button type="button" class="btn"><i><svg width="16" height="17" viewBox="0 0 16 23" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.25 4.41797C4.25 6.48547 5.9325 8.16797 8 8.16797C10.0675 8.16797 11.75 6.48547 11.75 4.41797C11.75 2.35047 10.0675 0.667969 8 0.667969C5.9325 0.667969 4.25 2.35047 4.25 4.41797ZM14.6667 16.5013H15.5V15.668C15.5 12.4521 12.8825 9.83463 9.66667 9.83463H6.33333C3.11667 9.83463 0.5 12.4521 0.5 15.668V16.5013H14.6667Z"
                                fill="#1F689E" />
                        </svg>
            </div>
        </div> --}}
    <div class="container">
        <div class="row py-5 mt-2">
            <div class="col-lg-4 d-block profile-div">
                <div class="text d-flex justify-content-center ps-5 py-5" style="position:relative">
                    <div>
                        <img src="{{ asset('images/user.png') }}" alt="profile_image" class="profile_img"
                            style="position:absolute;top: -21%;  right: 28.5%; width: 120px;">
                    </div>
                    <div class="p-5">
                        {{-- @dd() --}}
                        <h3 class="pt-4 pb-1 text-center text-dark">
                            {{ strtoupper(@$records['username']) }}
                        </h3>
                        <h5 class="py-2 d-flex align-items-center">
                            <i>
                                <svg width="28" height="32" viewBox="0 0 28 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_533_78)">
                                        <path
                                            d="M13.0006 0C9.07635 0 5.86035 3.2064 5.86035 7.11984C5.86035 8.63616 6.34467 10.0454 7.16427 11.2037L12.1292 19.7868C12.8244 20.6952 13.2867 20.5226 13.8648 19.7388L19.3412 10.4196C19.4516 10.2194 19.5384 10.0063 19.614 9.78864C19.9615 8.9418 20.1402 8.03521 20.1401 7.11984C20.1404 3.2064 16.9253 0 13.0006 0ZM13.0006 3.336C15.114 3.336 16.7945 5.01264 16.7945 7.11984C16.7945 9.22704 15.114 10.903 13.0006 10.903C10.8874 10.903 9.20619 9.22728 9.20619 7.11984C9.20619 5.01264 10.8874 3.33624 13.0006 3.33624V3.336Z"
                                            fill="#214986" />
                                        <path
                                            d="M17.5395 11.7383L17.528 11.7685C17.5316 11.7594 17.5345 11.75 17.5381 11.7409L17.5395 11.7383ZM9.16183 16.574C5.77159 17.0531 3.40039 18.1991 3.40039 19.886C3.40039 22.1584 7.36231 24.0004 13.0004 24.0004C18.6385 24.0004 22.6004 22.1584 22.6004 19.886C22.6004 18.1991 20.2294 17.0531 16.8394 16.574L16.3698 17.3737C18.9248 17.7282 20.6804 18.4732 20.6804 19.3376C20.6804 20.5496 17.2419 21.532 13.0004 21.532C8.75887 21.532 5.32039 20.5496 5.32039 19.3376C5.32015 18.476 7.06423 17.7318 9.62719 17.3759C9.47239 17.1085 9.31663 16.8416 9.16159 16.574H9.16183Z"
                                            fill="#214986" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_533_78" x="-2" y="0" width="32"
                                            height="32" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dx="1" dy="4" />
                                            <feGaussianBlur stdDeviation="2" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0.12158 0 0 0 0 0.406867 0 0 0 0 0.620833 0 0 0 1 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_533_78" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_533_78"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </i>
                            <span class="text-dark px-2">{{ @$records['address_line_1'] }}HA8 7NT, London, Greater
                                London</span>
                        </h5>
                        <h5 class="py-2 d-flex align-items-center">
                            <i>
                                <svg width="16" height="20" viewBox="0 0 16 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14 1.09997L2 5.89997C0.9 6.29997 0 7.69997 0 8.89997V17.6C0 18.8 0.9 19.4 2 19L14 14.2C15.1 13.8 16 12.4 16 11.2V2.49997C16 1.29997 15.1 0.699971 14 1.09997ZM14.6 3.69997L8.6 13L1.9 8.49997C1.8 8.39997 1.5 8.09997 1.7 7.79997C1.9 7.39997 2.4 7.59997 2.4 7.59997L8.7 9.89997C8.7 9.89997 13.5 3.59997 13.8 3.19997C13.9 2.99997 14.2 2.89997 14.5 3.09997C14.8 3.29997 14.7 3.59997 14.6 3.69997Z"
                                        fill="#214986" />
                                </svg>
                            </i>
                            <span class="text-dark px-2">{{ $records['email'] }}</span>
                        </h5>
                        <h5 class="py-2 d-flex align-items-center">
                            <i>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5348 0.80699C13.1594 0.432781 12.6509 0.222656 12.1208 0.222656C11.5907 0.222656 11.0823 0.432781 10.7068 0.80699L0.807816 10.706C0.433118 11.0812 0.222656 11.5897 0.222656 12.12C0.222656 12.6502 0.433118 13.1588 0.807816 13.534L6.46482 19.191C6.85482 19.581 7.36682 19.776 7.87882 19.776C8.39081 19.776 8.90282 19.581 9.29282 19.191L19.1918 9.29199C19.9718 8.51299 19.9718 7.24299 19.1918 6.46399L13.5348 0.80699ZM6.70682 14.706C6.61397 14.7988 6.50375 14.8725 6.38244 14.9227C6.26113 14.973 6.13112 14.9988 5.99982 14.9988C5.86851 14.9988 5.7385 14.973 5.61719 14.9227C5.49588 14.8725 5.38566 14.7988 5.29282 14.706C5.19997 14.6131 5.12632 14.5029 5.07608 14.3816C5.02583 14.2603 4.99997 14.1303 4.99997 13.999C4.99997 13.8677 5.02583 13.7377 5.07608 13.6164C5.12632 13.4951 5.19997 13.3848 5.29282 13.292C5.48032 13.1045 5.73464 12.9991 5.99982 12.9991C6.26499 12.9991 6.51931 13.1045 6.70682 13.292C6.89432 13.4795 6.99966 13.7338 6.99966 13.999C6.99966 14.2642 6.89432 14.5185 6.70682 14.706ZM13.7068 19.706L12.2928 18.292L18.2928 12.292L19.7068 13.707L13.7068 19.706ZM6.29282 0.29199L7.70682 1.70599L1.70682 7.70599L0.292815 6.29099L6.29282 0.29199Z"
                                        fill="#214986" />
                                </svg>
                            </i>
                            <span class="text-dark px-2">{{ @$records['phone'] }}</span>
                        </h5>
                    </div>

                </div>

            </div>
            <div class="col-lg-8">
                <form action="" method="" class="px-3">
                    <div class="row">
                        <div class="d-flex justify-content-between col-12">
                            <label class="col-6 profile_style">USERNAME
                                <input type="text" name="username" class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['username'] }}"></label>
                            <label class="col-6 profile_style">NAME
                                <input type="text" name="name" class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['username'] }}"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between col-12">
                            <label class="col-6 profile_style">EMAIL
                                <input type="email" name="email" class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['email'] }}"></label>
                            <label class="col-6 profile_style">STATUS
                                <input type="text" name="status" class="form-control mt-1 profile_input col-12"
                                    value="{{ @$records['status'] }}"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between col-12">
                            <label class="col-6 profile_style">RIDE
                                <input type="text" name="user_ride"
                                    class="form-control mt-1 profile_input col-12"></label>
                            <label class="col-6 profile_style">COMPANY
                                <input type="text" name="company"
                                    class="form-control mt-1 profile_input col-12"></label>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="row">
            <!-- <div class="col-6 col-lg-1 d-flex justify-content-end"></div> -->
            <div class="d-flex permisson-color mb-2 p-0">
                <i class="p-1"><svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11 0C9.96501 0 8.23551 0.3975 6.60801 0.84C4.94301 1.29 3.26451 1.8225 2.27751 2.145C1.86485 2.28128 1.49899 2.5312 1.22198 2.86605C0.944973 3.20091 0.768039 3.60711 0.711508 4.038C-0.182492 10.7535 1.89201 15.7305 4.40901 19.023C5.47638 20.4314 6.74905 21.6717 8.18451 22.7025C8.76351 23.112 9.30051 23.4255 9.75651 23.64C10.1765 23.838 10.628 24 11 24C11.372 24 11.822 23.838 12.2435 23.64C12.7932 23.3728 13.3191 23.0592 13.8155 22.7025C15.251 21.6718 16.5237 20.4315 17.591 19.023C20.108 15.7305 22.1825 10.7535 21.2885 4.038C21.2321 3.6069 21.0552 3.20046 20.7782 2.86535C20.5012 2.53024 20.1353 2.28004 19.7225 2.1435C18.2897 1.67372 16.8458 1.23859 15.392 0.8385C13.7645 0.399 12.035 0 11 0ZM11 7.5C11.5314 7.49921 12.0459 7.6865 12.4524 8.02869C12.8589 8.37089 13.1311 8.84591 13.221 9.36962C13.3108 9.89333 13.2124 10.4319 12.9432 10.89C12.6739 11.3481 12.2513 11.6962 11.75 11.8725L12.3275 14.8575C12.3485 14.9661 12.3453 15.0779 12.318 15.1851C12.2907 15.2923 12.24 15.3921 12.1696 15.4774C12.0993 15.5627 12.0109 15.6313 11.9108 15.6785C11.8108 15.7256 11.7016 15.75 11.591 15.75H10.409C10.2986 15.7498 10.1895 15.7252 10.0897 15.678C9.9898 15.6307 9.90162 15.562 9.8314 15.4768C9.76118 15.3915 9.71066 15.2918 9.68345 15.1847C9.65625 15.0777 9.65302 14.9659 9.67401 14.8575L10.25 11.8725C9.74876 11.6962 9.32609 11.3481 9.05686 10.89C8.78763 10.4319 8.68921 9.89333 8.77904 9.36962C8.86887 8.84591 9.14115 8.37089 9.54765 8.02869C9.95416 7.6865 10.4686 7.49921 11 7.5Z"
                            fill="#1F689E" />
                    </svg>
                </i>
                <h3>Permission</h3>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead class="thead text-white" style="color:#fff!important;">
                    <td class="p-3 col-4" style="color:#fff">Role</td>
                    <td class="p-3 text-center col-2" style="color:#fff">READ</td>
                    <td class="p-3 text-center col-2" style="color:#fff">WRITE</td>
                    <td class="p-3 text-center col-2" style="color:#fff">CREATE</td>
                    <td class="p-3 text-center col-2" style="color:#fff">DELETE</td>
                </thead>
            </table>
            <table class="my-3 table">
                <tbody>
                    <tr class="profile_row">
                        <td class="p-3 SPY col-4 text-dark">Super Admin</td>
                        <td class="p-3 text-center col-2"><input type="checkbox" value="" class="check-box">
                        </td>
                        <td class="p-3 text-center col-2"><input type="checkbox" value="" class="check-box">
                        </td>
                        <td class="p-3 text-center col-2"><input type="checkbox" value="" class="check-box">
                        </td>
                        <td class="p-3 text-center col-2"><input type="checkbox" value="" class="check-box">
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- <table class="my-3">
                <tr>
                    <td class="p-3 SPY col-4">AUTHOR</td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                </tr>
            </table>
            <table class="my-3">
                <tr>
                    <td class="p-3 SPY col-4">STAFF</td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                </tr>
            </table>
            <table class="my-3">
                <tr>
                    <td class="p-3 SPY col-4">CONTRIBUTOR</td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                </tr>
            </table>
            <table class="my-3">
                <tr>
                    <td class="p-3 SPY col-4">USER</td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                    <td class="p-3 text-center col-2"><input class="check-box" type="checkbox" value=""></td>
                </tr>
            </table> --}}


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
@endsection
