@extends('layouts.partials.mainlayout')
@section('body')
<style>
        /* display: flex;
        justify-content: start;
        background: #92c9e8;
        border-radius: 9px;
        justify-content: space-between;
        margin-left: 20% !important;
        margin-top: 2px !important;
        color: white; */
    .card{

    }
    .top_section {
        padding: 5px;
    }

    .form-check-input {
        position: relative !important;
        margin-top: 0.25rem;
        margin-left: -1.25rem;
    }

    .px-2 {
        /* padding-right: 0.5rem!important; */
        padding-left: 0.5rem !important;
    }

    .modal-header{
        background: #3e5871;
    }
    .modal {
        position: fixed;
        top: 50px;
        right: 0;
        bottom: 0;
        left: 370px;
        z-index: 1050;
        display: none;
        overflow: hidden;
        outline: 0;
    }
    .title_cards {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        /* line-height: 19px; */
        color: #FFFFFF;
        margin-left: 15px;
        margin-top: 20px;
    }

    .card-body {
        /* -ms-flex: 1 1 auto !important; */
        flex: 1 1 auto !important;
        padding: 0px !important;
    }

    input:focus {
        border: 1px solid rgba(31, 104, 158, 0.26);
        filter: drop-shadow(2px 2px 2px rgba(92, 174, 235, 0.55));
        border-radius: 7px;
    }

    .title_modal {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 19px;
        color:#fff;
    }

    .save_btn {
        background: #297FBF;
        border-radius: 5px;
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 13px;
        line-height: 16px;
        color: #FFFFFF;
    }

    .popup_button:focus {
        outline: none !important;
        background: none !important;
    }

    .popup_button {
        outline: none !important;
        border: none !important;
        background: none !important;
    }

    svg {
        cursor: pointer;
    }

    .card {
        height: 320px !important;
        /* max-height: 425px; */
        overflow: scroll;
    }

    .bodydetails {
        /* height: 225px !important; */
        overflow: scroll;
        /* max-height: 425px; */
    }

    .list_details {
        font-family: 'Inter';
        font-style: normal;
        font-weight: 600;
        font-size: 11px;
        line-height: 19px;
        color: #6D8DA6;
    }

    .serial {
        padding: 7.5px;
    }

    @media only screen and (max-width: 600px) {
        .title_cards {
            font-size: 15px !important;
        }
    }

    @media only screen and (max-width: 1024px) and (min-width: 992px) {
        .title_cards {
            font-size: 8px !important;
        }
    }

    @media only screen and (max-width: 1190px) and (min-width: 1024px) {
        .title_cards {
            font-size: 10px !important;
        }
    }
</style>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12 p-3" style="background: #1F689E;box-shadow: inset 10px 14px 28px rgba(0, 0, 0, 0.25);">
            <h2
                style="color:#fff;ont-family:'Inter';font-style: normal;font-weight: 500; font-size: 25px;line-height: 30px;">
                Master</h2>
        </div>
    </div>
    <br>
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- loading Countries  --}}
        <div class="col-xl-6
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="height: 400px !important;border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Loading Countries
                            </p>
                            {{-- <button id="companypopup" tab="company" class="popup_button" data-toggle="modal"
                                data-target="#companymodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button> --}}


                        </div>
                    </div>
                    <div class="bodydetails" style="height: 350px !important;
                    overflow: scroll;">

                        @foreach ($loading_countries as $loading_country)
                        <div class="serial mx-3 my-2"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#state{{@$loading_country['id']}}">
                            <div class="num_name_section">
                                <span class="list_details">{{$loading_country['id']}}.</span>
                                <span class="list_details">{{$loading_country['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $loading_country['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$loading_country['id']}}" tab="country"
                                        {{$loading_country['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$loading_country['status']}}">
                                    {{-- <button class="edit-button" id="{{ $loading_country['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="country"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button> --}}
                                    {{-- <button class="delete-button" id="{{ $loading_country['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="company"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        <div class="bodydetails collapse" id="state{{@$loading_country['id']}}">
                            @foreach (@$loading_country['state'] as $lState)
                            <span style="display:flex;justify-content:start;margin-left:19%!important;"><small>City</small></span>

                            <div class="serial mx-3 my-1" id="state_port{{@$lState['id']}}"
                            style="display: flex;
                            justify-content: start;
                            background: #92c9e8;
                            border-radius: 9px;
                            justify-content: space-between;
                            margin-left: 20% !important;
                            margin-top: 2px !important;
                            color: white;" data-toggle="collapse" data-target="#state{{@$lState['id']}}">
                            <div class="num_name_section">
                                <span class="list_details">{{$lState['id']}}.</span>
                                <span class="list_details">{{$lState['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $lState['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$lState['id']}}" tab="loading_state"
                                        {{$lState['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$lState['status']}}">
                                    {{-- <button class="edit-button" id="{{ $lState['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="loading_state"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button> --}}
                                    {{-- <button class="delete-button" id="{{ $lState['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="company"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button> --}}
                                </div>
                            </div>
                            </div>


                            {{-- <div class="bodydetails" > --}}
                                @foreach(@$lState['loading_ports'] as $lPorts)
                                <span style="display:flex;justify-content:start;margin-left:30%!important;"><small>Ports</small></span>
                                <div class="serial mx-3"
                            style="     display: flex;
                            justify-content: start;
                            background: #e7f0f5;
                            border-radius: 9px;
                            justify-content: space-between;
                            margin-left: 30% !important;
                            margin-top: 2px !important;
                            color: white;" data-toggle="collapse" data-target="#state_port{{@$lPorts['id']}}">
                            <div class="num_name_section">
                                <span class="list_details">{{$lPorts['id']}}.</span>
                                <span class="list_details">{{$lPorts['destination']}}</span>
                            </div>
                            <input type="hidden" value="{{ $lPorts['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$lPorts['id']}}" tab="loading_ports"
                                        {{$lPorts['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$lPorts['status']}}">
                                    {{-- <button class="edit-button" id="{{ $lPorts['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="loading_ports"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button> --}}
                                    {{-- <button class="delete-button" id="{{ $lPorts['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="company"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button> --}}
                                </div>
                            </div>
                            </div>
                            @endforeach

                            {{-- </div> --}}







                        @endforeach


                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>


        {{-- Destination Countries  --}}
        <div class="col-xl-6
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="height: 400px !important;border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Destination Countries
                            </p>
                            {{-- <button id="companypopup" tab="company" class="popup_button" data-toggle="modal"
                                data-target="#companymodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button> --}}


                        </div>
                    </div>
                    <div class="bodydetails" style="height: 350px !important;
                    overflow: scroll;">

                        @foreach ($destination_countries as $destination_country)
                        <div class="serial mx-3 my-2"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#desti_state{{@$destination_country['id']}}">
                            <div class="num_name_section">
                                <span class="list_details">{{$destination_country['id']}}.</span>
                                <span class="list_details">{{$destination_country['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $destination_country['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$destination_country['id']}}" tab="dcountry"
                                        {{$destination_country['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$destination_country['status']}}">
                                    {{-- <button class="edit-button" id="{{ $loading_country['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="country"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button> --}}
                                    {{-- <button class="delete-button" id="{{ $loading_country['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="company"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        <div class="bodydetails collapse" id="desti_state{{@$destination_country['id']}}">
                            @foreach (@$destination_country['state'] as $dState)
                            <span style="display:flex;justify-content:start;margin-left:19%!important;"><small>City</small></span>

                            <div class="serial mx-3 my-1" id="dstate_port{{@$dState['id']}}"
                            style="display: flex;
                            justify-content: start;
                            background: #92c9e8;
                            border-radius: 9px;
                            justify-content: space-between;
                            margin-left: 20% !important;
                            margin-top: 2px !important;
                            color: white;" data-toggle="collapse" data-target="#desti_state{{@$dState['id']}}">
                            <div class="num_name_section">
                                <span class="list_details">{{$dState['id']}}.</span>
                                <span class="list_details">{{$dState['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $dState['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$dState['id']}}" tab="destination_state"
                                        {{$dState['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$dState['status']}}">
                                    {{-- <button class="edit-button" id="{{ $lState['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="loading_state"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button> --}}
                                    {{-- <button class="delete-button" id="{{ $lState['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="company"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button> --}}
                                </div>
                            </div>
                            </div>


                            {{-- <div class="bodydetails" > --}}
                            @foreach(@$dState['destination_port'] as $dPorts)
                            <span style="display:flex;justify-content:start;margin-left:30%!important;"><small>Ports</small></span>
                                <div class="serial mx-3 my-1"
                            style="     display: flex;
                            justify-content: start;
                            background: #e7f0f5;
                            border-radius: 9px;
                            justify-content: space-between;
                            margin-left: 30% !important;
                            margin-top: 2px !important;
                            color: white;" data-toggle="collapse" data-target="#dstate_port{{@$dPorts['id']}}">
                            <div class="num_name_section">
                                <span class="list_details">{{$dPorts['id']}}.</span>
                                <span class="list_details">{{$dPorts['destination']}}</span>
                            </div>
                            <input type="hidden" value="{{ $dPorts['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$dPorts['id']}}" tab="destination_ports"
                                        {{$dPorts['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$dPorts['status']}}">
                                    {{-- <button class="edit-button" id="{{ $lPorts['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="loading_ports"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button> --}}
                                    {{-- <button class="delete-button" id="{{ $lPorts['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="company"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button> --}}
                                </div>
                            </div>
                            </div>
                            @endforeach

                            {{-- </div> --}}







                        @endforeach


                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>


        {{-- Make Model Series (MMS)  --}}
        <div class="col-xl-6
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card"
                style="height: 400px !important;border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Make Model Series
                            </p>
                                {{-- <button id="companypopup" tab="company" class="popup_button" data-toggle="modal"
                                    data-target="#companymodal">
                                    <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter0_d_2119_8)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                <feColorMatrix in="SourceAlpha" type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                                <feOffset dy="2" />
                                                <feGaussianBlur stdDeviation="5" />
                                                <feComposite in2="hardAlpha" operator="out" />
                                                <feColorMatrix type="matrix"
                                                    values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                                <feBlend mode="normal" in2="BackgroundImageFix"
                                                    result="effect1_dropShadow_2119_8" />
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                    result="shape" />
                                            </filter>
                                        </defs>
                                    </svg>
                                </button> --}}


                        </div>
                    </div>
                    <div class="bodydetails"  style="height: 350px !important;
                    overflow: scroll;">

                        @foreach ($Vehicle_mms as $mms)
                        <div class="serial mx-3 my-2"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;" data-toggle="collapse" data-target="#make{{@$mms['id']}}">
                            <div class="num_name_section">
                                <span class="list_details">{{$mms['id']}}.</span>
                                <span class="list_details">{{$mms['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $mms['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$mms['id']}}" tab="mmake"
                                        {{$mms['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$mms['status']}}">
                                    {{-- <button class="edit-button" id="{{ $mms['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="mmake"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button> --}}
                                    {{-- <button class="delete-button" id="{{ $mms['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="mmake"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        <div class="bodydetails collapse" id="make{{@$mms['id']}}">
                            @foreach (@$mms['model'] as $mModel)

                            <span style="display:flex;justify-content:start;margin-left:19%!important;"><small>Model</small></span>
                            <div class="serial mx-3 my-1" id="make_series{{@$mModel['id']}}"
                            style="display: flex;
                            justify-content: start;
                            background: #92c9e8;
                            border-radius: 9px;
                            justify-content: space-between;
                            margin-left: 20% !important;
                            margin-top: 2px !important;
                            color: white;" data-toggle="collapse" data-target="#state{{@$mModel['id']}}">
                            <div class="num_name_section">
                                <span class="list_details">{{$mModel['id']}}.</span>
                                <span class="list_details">{{$mModel['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $mModel['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$mModel['id']}}" tab="mmodel"
                                        {{$mModel['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$mModel['status']}}">
                                    {{-- <button class="edit-button" id="{{ $mModel['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="mmodel"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button> --}}
                                    {{-- <button class="delete-button" id="{{ $mModel['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="mmodel"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button> --}}
                                </div>
                            </div>
                            </div>


                            {{-- <div class="bodydetails" > --}}
                            @foreach(@$mModel['series'] as $mSeries)
                            <span style="display:flex;justify-content:start;margin-left:30%!important;"><small>Series</small></span>
                                <div class="serial mx-3"
                            style="    display: flex;
                            justify-content: start;
                            background: #e7f0f5;
                            border-radius: 9px;
                            justify-content: space-between;
                            margin-left: 30% !important;
                            margin-top: 2px !important;
                            color: white;" data-toggle="collapse" data-target="#make_series{{@$lPorts['id']}}">
                            <div class="num_name_section">
                                <span class="list_details">{{$mSeries['id']}}.</span>
                                <span class="list_details">{{$mSeries['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $mSeries['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$mSeries['id']}}" tab="mseries"
                                        {{$mSeries['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$mSeries['status']}}">
                                    {{-- <button class="edit-button" id="{{ $mSeries['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="mseries"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button> --}}
                                    {{-- <button class="delete-button" id="{{ $mSeries['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="mseries"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button> --}}
                                </div>
                            </div>
                            </div>
                            @endforeach

                            {{-- </div> --}}







                        @endforeach


                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>



        {{-- new companies data --}}
        <div class="col-xl-6
        col-lg-4 col-md-6 col-12 mt-3">
        <div class="card"
                style="height: 400px !important;border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Company
                            </p>
                            <button id="companiespopup" tab="companies" class="popup_button" data-toggle="modal"
                                data-target="#companiesmodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails" >
                        <?php $i = 1 ?>
                        @foreach ($companies as $companiesdata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$companiesdata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $companiesdata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$companiesdata['id']}}" tab="companies" {{$companiesdata['status']==1
                                        ?'checked':''}} type="checkbox" value="{{$companiesdata['status']}}">
                                    <button class="edit-button" id="{{ $companiesdata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="companies"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $companiesdata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="companies"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {{-- shipping countries data --}}
        {{-- <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Shipping Countries
                            </p>
                            <button id="shippingcountriespopup" tab="shippingcountries" class="popup_button"
                                data-toggle="modal" data-target="#shippingcountriesmodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($shippingcountry as $shippingcountrydata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$shippingcountrydata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $shippingcountrydata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$shippingcountrydata['id']}}" tab="shippingcountries"
                                        {{$shippingcountrydata['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$shippingcountrydata['status']}}">
                                    <button class="edit-button" id="{{ $shippingcountrydata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="shippingcountries"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $shippingcountrydata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="shippingcountries"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- shipping states data --}}
        {{-- <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Shipping States
                            </p>
                            <button id="shippingstatespopup" tab="shippingstates" class="popup_button"
                                data-toggle="modal" data-target="#shippingstatesmodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($shippingstates as $shippingstatesdata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$shippingstatesdata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $shippingstatesdata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$shippingstatesdata['id']}}" tab="state"
                                        {{$shippingstatesdata['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$shippingstatesdata['status']}}">
                                    <button class="edit-button" id="{{ $shippingstatesdata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="shippingstates"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $shippingstatesdata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="shippingstates"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- loading ports data --}}
        {{-- <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Loading Ports
                            </p>
                            <button id="loadingportpopup" tab="loadingport" class="popup_button" data-toggle="modal"
                                data-target="#loadingportmodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($loadingport as $loadingportdata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$loadingportdata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $loadingportdata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$loadingportdata['id']}}" tab="loadingport"
                                        {{$loadingportdata['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$loadingportdata['status']}}">
                                    <button class="edit-button" id="{{ $loadingportdata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="loadingport"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $loadingportdata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="loadingport"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}



        {{-- destination countries data --}}
        {{-- <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Destination countries
                            </p>
                            <button id="destinationcountriespopup" tab="destinationcountries" class="popup_button"
                                data-toggle="modal" data-target="#destinationcountriesmodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($destinationcountry as $destinationcountrydata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$destinationcountrydata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $destinationcountrydata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$destinationcountrydata['id']}}" tab="destinationcountries"
                                        {{$destinationcountrydata['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$destinationcountrydata['status']}}">
                                    <button class="edit-button" id="{{ $destinationcountrydata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="destinationcountries"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $destinationcountrydata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="destinationcountries"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- destination port data --}}
        {{-- <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Destination Port
                            </p>
                            <button id="destinationportpopup" tab="destinationport" class="popup_button"
                                data-toggle="modal" data-target="#destinationportmodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($destinationport as $destinationportdata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$destinationportdata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $destinationportdata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$destinationportdata['id']}}" tab="destinationport"
                                        {{$destinationportdata['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$destinationportdata['status']}}">
                                    <button class="edit-button" id="{{ $destinationportdata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="destinationport"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $destinationportdata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="destinationport"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- color data --}}
        <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Color
                            </p>
                            <button id="colorpopup" tab="color" class="popup_button" data-toggle="modal"
                                data-target="#colormodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($color as $colordata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$colordata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $colordata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$colordata['id']}}" tab="color" {{$colordata['status']==1 ?'checked':''}}
                                        type="checkbox" value="{{$colordata['status']}}">
                                    <button class="edit-button" id="{{ $colordata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="color"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $colordata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="color"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {{-- title data --}}
        <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Title
                            </p>
                            <button id="titlepopup" tab="title" class="popup_button" data-toggle="modal"
                                data-target="#titlemodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($title as $titledata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$titledata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $titledata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$titledata['id']}}" tab="title" {{$titledata['status']==1 ?'checked':''}}
                                        type="checkbox" value="{{$titledata['status']}}">
                                    <button class="edit-button" id="{{ $titledata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="title"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $titledata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="title"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {{-- key data --}}
        <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Key
                            </p>
                            <button id="keypopup" tab="key" class="popup_button" data-toggle="modal"
                                data-target="#keymodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($key as $keydata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$keydata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $keydata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$keydata['id']}}" tab="key" {{$keydata['status']==1 ?'checked':''}}
                                        type="checkbox" value="{{$keydata['status']}}">
                                    <button class="edit-button" id="{{ $keydata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="key"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $keydata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="key"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

         {{-- vehicle types data --}}
         <div class="col-xl-3
         col-lg-4 col-md-6 col-12 mt-3">
             <div class="card h-100"
                 style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                 <div class="top_section">
                     <div class="px-2"
                         style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                         <p class="title_cards">
                             Vehicle Types
                         </p>
                         <button id="vehicletypepopup" tab="vehicletype" class="popup_button" data-toggle="modal"
                             data-target="#vehicletypemodal">
                             <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <g filter="url(#filter0_d_2119_8)">
                                     <path fill-rule="evenodd" clip-rule="evenodd"
                                         d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                         fill="white" />
                                 </g>
                                 <defs>
                                     <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                         filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                         <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                         <feColorMatrix in="SourceAlpha" type="matrix"
                                             values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                         <feOffset dy="2" />
                                         <feGaussianBlur stdDeviation="5" />
                                         <feComposite in2="hardAlpha" operator="out" />
                                         <feColorMatrix type="matrix"
                                             values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                         <feBlend mode="normal" in2="BackgroundImageFix"
                                             result="effect1_dropShadow_2119_8" />
                                         <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                             result="shape" />
                                     </filter>
                                 </defs>
                             </svg>
                         </button>


                     </div>
                 </div>
                 <div class="bodydetails">
                    <?php $i = 1 ?>
                    @foreach ($vehicletype as $vehicletypedata)
                    <div class="serial mx-3 my-4"
                        style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                        <div class="num_name_section">
                            <span class="list_details">{{$i}}.</span>
                            <span class="list_details">{{$vehicletypedata['vehicle_type']}}</span>
                        </div>
                        <input type="hidden" value="{{ $vehicletypedata['id'] }}" class="current_id">
                        <div class="button_secton" style="margin-left:19px !important">
                            <div class="option_section" style="margin-top:3px;">
                                <input style="margin-right: 5px !important" class="form-check-input status_change"
                                    id="{{$vehicletypedata['id']}}" tab="vehicletype" {{$vehicletypedata['status']==1 ?'checked':''}}
                                    type="checkbox" value="{{$vehicletypedata['status']}}">
                                <button class="edit-button" id="{{ $vehicletypedata['id'] }}"
                                    onclick="updatemaster(this.id,this.value)" value="vehicletype"
                                    style="cursor: pointer !important;">
                                    <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                            fill="#2C77E7"></path>
                                    </svg>
                                </button>
                                <button class="delete-button" id="{{ $vehicletypedata['id'] }}"
                                    onclick="deletemaster(this.id,this.value)" value="vehicletype"
                                    style="cursor: pointer !important;margin-left:5px !important">

                                    <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                            fill="#EF5757"></path>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                </div>
             </div>
         </div>

        {{-- auction data --}}
        <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="top_section">
                    <div class="px-2"
                        style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                        <p class="title_cards">
                            Auction
                        </p>
                        <button id="auctionpopup" tab="auction" class="popup_button" data-toggle="modal"
                            data-target="#auctionmodal">
                            <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g filter="url(#filter0_d_2119_8)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset dy="2" />
                                        <feGaussianBlur stdDeviation="5" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_2119_8" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </button>


                    </div>
                </div>
                <div class="bodydetails">
                    <?php $i = 1 ?>
                    @foreach ($auction as $auctiondata)
                    <div class="serial mx-3 my-4"
                        style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                        <div class="num_name_section">
                            <span class="list_details">{{$i}}.</span>
                            <span class="list_details">{{$auctiondata['name']}}</span>
                        </div>
                        <input type="hidden" value="{{ $auctiondata['id'] }}" class="current_id">
                        <div class="button_secton" style="margin-left:19px !important">
                            <div class="option_section" style="margin-top:3px;">
                                <input style="margin-right: 5px !important" class="form-check-input status_change"
                                    id="{{$auctiondata['id']}}" tab="auction" {{$auctiondata['status']==1
                                    ?'checked':''}} type="checkbox" value="{{$auctiondata['status']}}">
                                <button class="edit-button" id="{{ $auctiondata['id'] }}"
                                    onclick="updatemaster(this.id,this.value)" value="auction"
                                    style="cursor: pointer !important;">
                                    <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                            fill="#2C77E7"></path>
                                    </svg>
                                </button>
                                <button class="delete-button" id="{{ $auctiondata['id'] }}"
                                    onclick="deletemaster(this.id,this.value)" value="auction"
                                    style="cursor: pointer !important;margin-left:5px !important">

                                    <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                            fill="#EF5757"></path>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                </div>
            </div>
        </div>


        {{-- vehicle data --}}
        <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Vehicle
                            </p>
                            <button id="vehiclepopup" tab="vehicle" class="popup_button" data-toggle="modal"
                                data-target="#vehiclemodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">1.</span>
                                <span class="list_details">Shippping 1st</span>
                            </div>
                            <input type="hidden" value="" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="" tab="vehicle" type="checkbox" value="">
                                    <button class="edit-button" id="" onclick="updatemaster(this.id,this.value)"
                                        value="vehicle" style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="" onclick="deletemaster(this.id,this.value)"
                                        value="vehicle" style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- Shippment data --}}
        {{-- <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                shippment
                            </p>
                            <button id="shippmentpopup" tab="shippment" class="popup_button" data-toggle="modal"
                                data-target="#shippmentmodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">1.</span>
                                <span class="list_details">Shippping 1st</span>
                            </div>
                            <input type="hidden" value="" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="" tab="shippment" type="checkbox" value="">
                                    <button class="edit-button" id="" onclick="updatemaster(this.id,this.value)"
                                        value="shippment" style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="" onclick="deletemaster(this.id,this.value)"
                                        value="shippment" style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}



        {{-- Shipment Status --}}

        <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Shipment Status
                            </p>
                            <button id="shipmentstatus" tab="shipmentstatus" class="popup_button" data-toggle="modal"
                                data-target="#containertypemodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($shipmentstatus as $shipmentstatusdata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$shipmentstatusdata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $shipmentstatusdata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$shipmentstatusdata['id']}}" tab="shipmentstatus" {{$shipmentstatusdata['status']==1
                                        ?'checked':''}} type="checkbox" value="{{$shipmentstatusdata['status']}}">
                                    <button class="edit-button" id="{{ $shipmentstatusdata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="shipmentstatus"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $shipmentstatusdata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="shipmentstatus"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        {{-- Shipment lines --}}

        <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Shipment Lines
                            </p>
                            <button id="shipmentlines" tab="shipmentlines" class="popup_button" data-toggle="modal"
                                data-target="#containertypemodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($shipmentlines as $shipmentlinesdata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$shipmentlinesdata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $shipmentlinesdata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$shipmentlinesdata['id']}}" tab="shipmentlines" {{$shipmentlinesdata['status']==1
                                        ?'checked':''}} type="checkbox" value="{{$shipmentlinesdata['status']}}">
                                    <button class="edit-button" id="{{ $shipmentlinesdata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="shipmentlines"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $shipmentlinesdata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="shipmentlines"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>



        {{-- Container Type --}}

        <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Container Type
                            </p>
                            <button id="containertype" tab="containertype" class="popup_button" data-toggle="modal"
                                data-target="#containertypemodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($containertype as $containertypedata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$containertypedata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $containertypedata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$containertypedata['id']}}" tab="containertype" {{$containertypedata['status']==1
                                        ?'checked':''}} type="checkbox" value="{{$containertypedata['status']}}">
                                    <button class="edit-button" id="{{ $containertypedata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="containertype"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $containertypedata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="containertype"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {{-- Container Size --}}

        <div class="col-xl-3
        col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">
                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Container Size
                            </p>
                            <button id="containersize" tab="containersize" class="popup_button" data-toggle="modal"
                                data-target="#containersizemodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($containersize as $containersizedata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$containersizedata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $containersizedata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$containersizedata['id']}}" tab="containersize" {{$containersizedata['status']==1
                                        ?'checked':''}} type="checkbox" value="{{$containersizedata['status']}}">
                                    <button class="edit-button" id="{{ $containersizedata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="containersize"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $containersizedata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="containersize"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {{-- title types data --}}
        <div class="col-xl-3
            col-lg-4 col-md-6 col-12 mt-3">
                        <div class="card h-100"
                            style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <div class="card-body">

                                <div class="top_section">
                                    <div class="px-2"
                                        style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                                        <p class="title_cards">
                                            Title Types
                                        </p>
                                        <button id="titletypes" tab="titletypes" class="popup_button" data-toggle="modal"
                                            data-target="#titletypesmodal">
                                            <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g filter="url(#filter0_d_2119_8)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                                        fill="white" />
                                                </g>
                                                <defs>
                                                    <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                                        <feOffset dy="2" />
                                                        <feGaussianBlur stdDeviation="5" />
                                                        <feComposite in2="hardAlpha" operator="out" />
                                                        <feColorMatrix type="matrix"
                                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                                            result="effect1_dropShadow_2119_8" />
                                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                            result="shape" />
                                                    </filter>
                                                </defs>
                                            </svg>
                                        </button>


                                    </div>
                                </div>
                                <div class="bodydetails">
                                    <?php $i = 1 ?>
                                    @foreach ($titletypes as $titletypedata)
                                    <div class="serial mx-3 my-4"
                                        style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                                        <div class="num_name_section">
                                            <span class="list_details">{{$i}}.</span>
                                            <span class="list_details">{{$titletypedata['name']}}</span>
                                        </div>
                                        <input type="hidden" value="{{ $titletypedata['id'] }}" class="current_id">
                                        <div class="button_secton" style="margin-left:19px !important">
                                            <div class="option_section" style="margin-top:3px;">
                                                <input style="margin-right: 5px !important" class="form-check-input status_change"
                                                    id="{{$titletypedata['id']}}" tab="titletype" {{$titletypedata['status']==1
                                                    ?'checked':''}} type="checkbox" value="{{$titletypedata['status']}}">
                                                <button class="edit-button" id="{{ $titletypedata['id'] }}"
                                                    onclick="updatemaster(this.id,this.value)" value="titletype"
                                                    style="cursor: pointer !important;">
                                                    <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                            fill="#2C77E7"></path>
                                                    </svg>
                                                </button>
                                                <button class="delete-button" id="{{ $titletypedata['id'] }}"
                                                    onclick="deletemaster(this.id,this.value)" value="titletype"
                                                    style="cursor: pointer !important;margin-left:5px !important">

                                                    <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                            fill="#EF5757"></path>
                                                    </svg>

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++ ?>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- shippper name data --}}
                    <div class="col-xl-3
            col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Shippername
                            </p>
                            <button id="shippername" tab="shippername" class="popup_button" data-toggle="modal"
                                data-target="#shippernamemodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($shippername as $shippernamedata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$shippernamedata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $shippernamedata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$shippernamedata['id']}}" tab="shippername"
                                        {{$shippernamedata['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$shippernamedata['status']}}">
                                    <button class="edit-button" id="{{ $shippernamedata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="shippername"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $shippernamedata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="shippername"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {{-- vehiclestatus data --}}
        <div class="col-xl-3
            col-lg-4 col-md-6 col-12 mt-3 vehiclestatus">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Vehicle Status
                            </p>
                            <button id="vehiclestatus" tab="vehiclestatus" class="popup_button" data-toggle="modal"
                                data-target="#vehiclestatusmodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($vehiclestatus as $vehiclestatusdata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$vehiclestatusdata['status_name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $vehiclestatusdata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$vehiclestatusdata['id']}}" tab="vehiclestatus"
                                        {{$vehiclestatusdata['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$vehiclestatusdata['status']}}">
                                    <button class="edit-button" id="{{ $vehiclestatusdata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="vehiclestatus"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $vehiclestatusdata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="vehiclestatus"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {{-- pickup location name data --}}
        <div class="col-xl-3
            col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Pickup Location
                            </p>
                            <button id="pickuplocation" tab="pickuplocation" class="popup_button" data-toggle="modal"
                                data-target="#pickuplocationmodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($pickuplocation as $pickuplocationdata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$pickuplocationdata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $pickuplocationdata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$pickuplocationdata['id']}}" tab="pickuplocation"
                                        {{$pickuplocationdata['status']==1 ?'checked':''}} type="checkbox"
                                        value="{{$pickuplocationdata['status']}}">
                                    <button class="edit-button" id="{{ $pickuplocationdata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="pickuplocation"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $pickuplocationdata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="pickuplocation"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Site name data --}}
        <div class="col-xl-3
            col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Site
                            </p>
                            <button id="site" tab="site" class="popup_button" data-toggle="modal"
                                data-target="#sitemodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($site as $sitedata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$sitedata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $sitedata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$sitedata['id']}}" tab="site" {{$sitedata['status']==1 ?'checked':''}}
                                        type="checkbox" value="{{$sitedata['status']}}">
                                    <button class="edit-button" id="{{ $sitedata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="site"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $sitedata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="site"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- warehouse name data --}}
        <div class="col-xl-3
            col-lg-4 col-md-6 col-12 mt-3">
            <div class="card h-100"
                style="border-top:none;background: #FFFFFF;box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                <div class="card-body">

                    <div class="top_section">
                        <div class="px-2"
                            style="display: flex; justify-content: space-between;background: #285CAB;box-shadow: 2px 2px 2px rgba(92, 174, 235, 0.55);border-radius: 10px;">
                            <p class="title_cards">
                                Warehouse
                            </p>
                            <button id="warehouse" tab="warehouse" class="popup_button" data-toggle="modal"
                                data-target="#warehousemodal">
                                <svg style="margin-top: 7px" width="50" height="50" viewBox="0 0 42 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d_2119_8)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21 8C14.925 8 10 12.925 10 19C10 25.075 14.925 30 21 30C27.075 30 32 25.075 32 19C32 12.925 27.075 8 21 8ZM22 23C22 23.2652 21.8946 23.5196 21.7071 23.7071C21.5196 23.8946 21.2652 24 21 24C20.7348 24 20.4804 23.8946 20.2929 23.7071C20.1054 23.5196 20 23.2652 20 23V20H17C16.7348 20 16.4804 19.8946 16.2929 19.7071C16.1054 19.5196 16 19.2652 16 19C16 18.7348 16.1054 18.4804 16.2929 18.2929C16.4804 18.1054 16.7348 18 17 18H20V15C20 14.7348 20.1054 14.4804 20.2929 14.2929C20.4804 14.1054 20.7348 14 21 14C21.2652 14 21.5196 14.1054 21.7071 14.2929C21.8946 14.4804 22 14.7348 22 15V18H25C25.2652 18 25.5196 18.1054 25.7071 18.2929C25.8946 18.4804 26 18.7348 26 19C26 19.2652 25.8946 19.5196 25.7071 19.7071C25.5196 19.8946 25.2652 20 25 20H22V23Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <filter id="filter0_d_2119_8" x="0" y="0" width="42" height="42"
                                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset dy="2" />
                                            <feGaussianBlur stdDeviation="5" />
                                            <feComposite in2="hardAlpha" operator="out" />
                                            <feColorMatrix type="matrix"
                                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.58 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix"
                                                result="effect1_dropShadow_2119_8" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2119_8"
                                                result="shape" />
                                        </filter>
                                    </defs>
                                </svg>
                            </button>


                        </div>
                    </div>
                    <div class="bodydetails">
                        <?php $i = 1 ?>
                        @foreach ($warehouse as $warehousedata)
                        <div class="serial mx-3 my-4"
                            style="background: #E7F0F5; border-radius: 9px;display: flex; justify-content: space-between;">
                            <div class="num_name_section">
                                <span class="list_details">{{$i}}.</span>
                                <span class="list_details">{{$warehousedata['name']}}</span>
                            </div>
                            <input type="hidden" value="{{ $warehousedata['id'] }}" class="current_id">
                            <div class="button_secton" style="margin-left:19px !important">
                                <div class="option_section" style="margin-top:3px;">
                                    <input style="margin-right: 5px !important" class="form-check-input status_change"
                                        id="{{$warehousedata['id']}}" tab="warehouse" {{$warehousedata['status']==1
                                        ?'checked':''}} type="checkbox" value="{{$warehousedata['status']}}">
                                    <button class="edit-button" id="{{ $warehousedata['id'] }}"
                                        onclick="updatemaster(this.id,this.value)" value="warehouse"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{ $warehousedata['id'] }}"
                                        onclick="deletemaster(this.id,this.value)" value="warehouse"
                                        style="cursor: pointer !important;margin-left:5px !important">

                                        <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                                fill="#EF5757"></path>
                                        </svg>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


</div>
<!-- compnay modal -->
<div class="modal fade" id="commonmodal" tabindex="-1" role="dialog" aria-labelledby="commonmodalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content" id="common_body">

      </div>
  </div>
</div>
<br>
@endsection
