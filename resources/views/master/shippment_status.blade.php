@extends('layouts.partials.mainlayout')
@section('body')
<style>
    .shipmentstatustable {
        background: #FFFFFF;
        box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);
        border-radius: 10px;
    }

    .table {
        border: none !important;
    }
    thead{
        color:#ffff;
    }

    .dt-buttons {
        float: right !important;
        margin-left: 20px !important;

    }

    .dt-buttons button {
        background: #3e5871 !important;
        box-shadow: 3px 3px 13px rgba(92, 174, 235, 0.55);
        border-radius: 10px;
        border: none !important;
        color: white !important;
        padding: 6px 10px 6px 10px;
    }
    .dataTables_wrapper {
    position: relative;
    clear: both;
    /* overflow-x: scroll !important; */
    border-top: none !important;
    }
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
        background: #1F689E;
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
    <table id="shipmentstatustable" class="display" style="width:100%">
        <thead style="background: #3e5871 ;shipmentstatus:#fff">
            <tr>
                <th>Sr#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i='1' ?>
            @foreach ($shipmentstatus as $data)
                <tr>
                    <td>{{ $i }}.</td>
                    <td>{{ $data['name'] }}</td>
                    <td>
                        @if($data['status']=='1')
                        <div class="font-size badge badge-success py-1 px-2 rounded">
                            <span>Active</span>
                        </div>
                        @endif
                        @if($data['status']=='0')
                        <div class="font-size badge badge-danger py-1 px-2 rounded">
                            <span>Inactive</span>
                        </div>
                        @endif
                    </td>
                    <td style="text-center">
                        <input class="form-check-input status_change"
                        id="{{$data['id']}}" tab="shipmentstatus"
                        {{$data['status']==1 ?'checked':''}} type="checkbox"
                        value="{{$data['status']}}">
                        <input type="hidden" value="{{ $data['id'] }}" class="current_id">
                        <button class="edit-button" id="{{ $data['id'] }}"
                            onclick="updatemaster(this.id,this.value)" value="shipmentstatus"
                            style="cursor: pointer !important;">
                            <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                    fill="#2C77E7"></path>
                            </svg>
                        </button>
                        <button class="delete-button" id="{{ $data['id'] }}"
                            onclick="deletemaster(this.id,this.value)" value="shipmentstatus"
                            style="cursor: pointer !important;margin-left:5px !important">

                            <svg width="10" height="10" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 3H7C7 2.73478 6.89464 2.48043 6.70711 2.29289C6.51957 2.10536 6.26522 2 6 2C5.73478 2 5.48043 2.10536 5.29289 2.29289C5.10536 2.48043 5 2.73478 5 3V3ZM4 3C4 2.46957 4.21071 1.96086 4.58579 1.58579C4.96086 1.21071 5.46957 1 6 1C6.53043 1 7.03914 1.21071 7.41421 1.58579C7.78929 1.96086 8 2.46957 8 3H10.5C10.6326 3 10.7598 3.05268 10.8536 3.14645C10.9473 3.24021 11 3.36739 11 3.5C11 3.63261 10.9473 3.75979 10.8536 3.85355C10.7598 3.94732 10.6326 4 10.5 4H10.059L9.616 9.17C9.57341 9.66923 9.34499 10.1343 8.97593 10.4732C8.60686 10.8121 8.12405 11.0001 7.623 11H4.377C3.87595 11.0001 3.39314 10.8121 3.02407 10.4732C2.65501 10.1343 2.42659 9.66923 2.384 9.17L1.941 4H1.5C1.36739 4 1.24021 3.94732 1.14645 3.85355C1.05268 3.75979 1 3.63261 1 3.5C1 3.36739 1.05268 3.24021 1.14645 3.14645C1.24021 3.05268 1.36739 3 1.5 3H4ZM7.5 6C7.5 5.86739 7.44732 5.74021 7.35355 5.64645C7.25979 5.55268 7.13261 5.5 7 5.5C6.86739 5.5 6.74021 5.55268 6.64645 5.64645C6.55268 5.74021 6.5 5.86739 6.5 6V8C6.5 8.13261 6.55268 8.25979 6.64645 8.35355C6.74021 8.44732 6.86739 8.5 7 8.5C7.13261 8.5 7.25979 8.44732 7.35355 8.35355C7.44732 8.25979 7.5 8.13261 7.5 8V6ZM5 5.5C5.13261 5.5 5.25979 5.55268 5.35355 5.64645C5.44732 5.74021 5.5 5.86739 5.5 6V8C5.5 8.13261 5.44732 8.25979 5.35355 8.35355C5.25979 8.44732 5.13261 8.5 5 8.5C4.86739 8.5 4.74021 8.44732 4.64645 8.35355C4.55268 8.25979 4.5 8.13261 4.5 8V6C4.5 5.86739 4.55268 5.74021 4.64645 5.64645C4.74021 5.55268 4.86739 5.5 5 5.5V5.5ZM3.38 9.085C3.4013 9.3347 3.51558 9.5673 3.70022 9.73676C3.88486 9.90621 4.12639 10.0002 4.377 10H7.623C7.87344 9.9999 8.11472 9.90584 8.29915 9.73642C8.48357 9.56699 8.59771 9.33453 8.619 9.085L9.055 4H2.945L3.381 9.085H3.38Z"
                                    fill="#EF5757"></path>
                            </svg>
                        </button>
                    </td>
                </tr>
                <?php $i++?>
            @endforeach
        </tbody>
    </table>
    <!-- compnay modal -->
<div class="modal fade" id="commonmodal" tabindex="-1" role="dialog" aria-labelledby="commonmodalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content" id="common_body">

    </div>
</div>
</div>
<script>
    // $(document).ready(function() {
    $('#shipmentstatustable').DataTable({
        select: true,
        dom: 'Blfrtip',
        lengthMenu: [
            [10, 25, 50],
            ['10', '25', '50']
        ],
        language: {
            search: "",
            sLengthMenu: "_MENU_",
            searchPlaceholder: "Search"
        },
        buttons: [{
            text: 'Add New Record',
            attr: {
                id: 'popup_button',
                class:'shipmentstatuspopup',
                'data-toggle':'modal',
                'data-target':'shipmentstatusmodal',
                'tab':'shipmentstatus',
                },
        }],
    });
    // });
</script>
    @endsection