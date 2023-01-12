<style>
    .createRole button {
        background: linear-gradient(113.15deg, #88CDFF 31.68%, #205CB5 124.3%);
        box-shadow: 5px 5px 5px rgba(57, 116, 205, 0.33);
        border-radius: 10px;
        color: #fff;
        outline: none;
        border: none;
        padding: 5px 10px;
    }

    .showRole {
        background: rgba(255, 255, 255, 0.76);
        box-shadow: 3px 5px 3px #8DC6EF;
        border-radius: 10px;
    }

    .createroles label {
        color: #1F689E;
    }

    .createroles input,
    .createroles textarea {
        border: 1px solid #2C77E7;
        filter: drop-shadow(3px 5px 16px rgba(92, 174, 235, 0.55));
        border-radius: 10px;
    }
</style>
<div class="px-3 mt-3">
    <div class="border-style card-rounded">
        <div class="px-4 pt-2 mt-4">
            <div class="d-flex justify-content-between">
                <div class="col-4 p-0">
                    <span class="h5 text-muted">
                        {{-- <b>Search Filter</b> --}}
                    </span>
                </div>
            </div>
        </div>


        <table class="row-border" id="permission_table" style="width:100%!important;overflow-x:scroll!important;">
            <thead class="bg-custom">
                <tr class="font-size">
                    <th class="font-bold-tr">#</th>
                    <th class="font-bold-tr">Name</th>
                    <th class="font-bold-tr">Create At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permisson)
                    <tr>
                        <td>{{ @$permisson['id'] }}</td>
                        <td>{{ @$permisson['name'] }}</td>
                        <td>{{ date('d-m-y H:m', strtotime(@$permisson['created_at'])) }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>

@if (Session::has('delete'))
    <script>
        iziToast.success({
            position: 'topRight',
            message: '{{ Session::get('delete') }}',
            color: "red",
            theme: "dark",
            messageColor: 'black'
        });
    </script>
@endif

<script>
    $('#permission_table').DataTable({
        scrollX: true,
        "lengthMenu": [
            [50, 100, 500],
            [50, 100, 500]
        ],
        language: {
            search: "",
            sLengthMenu: "_MENU_",
            searchPlaceholder: "Search"
        },

    });
</script>
