
@extends('layouts.partials.mainlayout')
@section('body')
<style>
    .loading_countries {
        background: #FFFFFF;
        box-shadow: 3px 5px 16px rgba(92, 174, 235, 0.55);
        border-radius: 10px;
    }

    .table {
        border: none !important;
    }

    .dt-buttons {
        float: right !important;
        margin-left: 20px !important;

    }

    .dt-buttons button {
        background: #0065B1 !important;
        box-shadow: 3px 3px 13px rgba(92, 174, 235, 0.55);
        border-radius: 10px;
        border: none !important;
        color: white !important;
        padding: 6px 10px 6px 10px;
    }
</style> 

{{-- {{dd($loading_countries)}} --}}
{{-- @for ($i = 0; $i < count($loading_countrie); $i++) --}}
    {{-- {{$loading_countries[$i]['id']}} --}}
{{-- @endfor --}}
<div class="container">
        <div class="row">
            <div class="col-11 mx-auto loading_countries">
                <div class="p-3">
                    <table class="table" id="loading_country">
                        <thead style="background:#3e5871;color:white">
                            <th>S.NO</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>Port</th>
                            <th>Terminals</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach ($loading_countries as $country)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{@$country['country']}}</td>
                                <td>{{@$country['state']}}</td>
                                <td>{{@$country['port']}}</td>
                                <td>{{@$country['terminal']}}</td>
                                <td>
                                    <button class="edit-button" id="{{@$country['id']}}"
                                        onclick="updatemaster(this.id,this.value)" value="warehouse"
                                        style="cursor: pointer !important;">
                                        <svg width="10" height="10" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.66708 14.0004C2.72022 14.0068 2.77394 14.0068 2.82708 14.0004L5.49375 13.3338C5.61205 13.3056 5.7204 13.2457 5.80708 13.1604L14.0004 4.94042C14.2488 4.69061 14.3881 4.35267 14.3881 4.00042C14.3881 3.64818 14.2488 3.31024 14.0004 3.06042L12.9471 2.00042C12.8233 1.87646 12.6762 1.77811 12.5143 1.71101C12.3525 1.64391 12.179 1.60938 12.0037 1.60938C11.8285 1.60938 11.655 1.64391 11.4932 1.71101C11.3313 1.77811 11.1842 1.87646 11.0604 2.00042L2.86708 10.1938C2.78094 10.2808 2.71891 10.3888 2.68708 10.5071L2.02042 13.1738C1.99645 13.26 1.99011 13.3502 2.00177 13.439C2.01342 13.5277 2.04284 13.6133 2.08826 13.6904C2.13368 13.7676 2.19417 13.8348 2.26613 13.888C2.33808 13.9413 2.42003 13.9795 2.50708 14.0004C2.56022 14.0068 2.61394 14.0068 2.66708 14.0004ZM12.0004 2.94042L13.0604 4.00042L12.0004 5.06042L10.9471 4.00042L12.0004 2.94042ZM3.94042 11.0071L10.0004 4.94042L11.0604 6.00042L4.99375 12.0671L3.58708 12.4138L3.94042 11.0071Z"
                                                fill="#2C77E7"></path>
                                        </svg>
                                    </button>
                                    <button class="delete-button" id="{{@$country['id']}}"
                                        onclick="deletemaster(this.id,this.value)" value="loading_country"
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
                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        $('#loading_country').DataTable({
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
                id: '{{@$id}}',
                class:'{{@$class}}',
                'data-toggle':'{{@$data_toggle}}',
                'data-target':'{{@$data_target}}',
                'tab':'{{@$tab}}',
                },
        }],
        });
        // });
    </script>
@endsection
