


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


 
    <table class="table">
                        <thead
                            style="background: #DAEFFE;
                    box-shadow: 0px 0px 0px rgba(92, 174, 235, 0.55);
                    border-radius: 10px;">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Create At</th>
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

