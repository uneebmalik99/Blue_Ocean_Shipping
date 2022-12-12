@extends('layouts.partials.mainlayout')
@section('body')
                                        {{-- @dd($user) --}}

    <div class="contaier my-5">
        <div class="row">
            <div class="col-sm-10 col-md-6 col-lg-6 mx-auto">

                {{-- === notification heading and search start ========= --}}
                <div class="row">
                    <div class="col-12 d-flex justify-content-between notification_heading">
                        <div class="notificaion">
                            <p>Notification</p>
                        </div>
                        <div class="search">
                            <i class="fa fa-search"></i>
                            <input type="text" placeholder="Search" id="search" name="search"
                                onkeyup="search_notification()">
                        </div>
                    </div>
                </div>
                {{-- === notification heading and search end ========= --}}

                <div id="main_notification_box">


                    @foreach ($notification as $value)
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="notification_box">

                                    <div class="row">
                                        <div class="col-7 col-sm-7 col-md-8 col-lg-8">
                                            <div class="row">
                                                <div class="col-12 d-flex notification_title">
                                                    <div class="mt-2 px-2">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="mt-2">
                                                        <h4>{{ substr($value->subject, 0, 18) }}...</h4>
                                                        <div class="lessText">
                                                            <p>{!! substr($value->message, 0 , 22) !!}...</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5 col-sm-5 col-md-4 col-lg-4">
                                            <div class="row">
                                                <div class="col-7 col-sm-7 col-md-7 col-lg-8 notification_expiry mt-2">
                                                    <div>
                                                        <p>Expiry Date <br>{{ $value->expiry_date }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-5 col-sm-5 col-md-5 col-lg-4 mt-2 notification_number">
                                                    <div class="noti_box">
                                                        <p>1</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-9 col-sm-10 col-md-9 col-lg-10"></div>
                                        <div class="col-3 col-sm-2 col-md-3 col-lg-2 notification_action d-flex px-1">
                                            {{-- <div class="edit"> --}}
                                            <button id="{{ $value->id }}" onclick="edit_record(this.id)" class="edit"
                                                style="border:none!important;outline:none!important;cursor:pointer">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            {{-- </div> --}}
                                            <div class="px-1"></div>
                                            <div class="del">
                                                <a href="{{ route('notification.del', $value->id) }}">
                                                    <i class="fa fa-trash del text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mx-auto text-center">
                                            <div class="notification_icon mb-3">
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    @endforeach

                </div>




            </div>
            <div class="col-sm-10 col-md-6 col-lg-6 mx-auto">
                <div class="row">
                    <div class="col-12 create_notication_heading">
                        <p>Create Notification</p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="create_notification">
                            <form action="{{ route('notification.creates') }}" method="POST">

                                @csrf

                                <input type="hidden" id="id" name="id">

                                <div class="subject">
                                    <label for="subject">Subject</label><br>
                                    <input type="text" id="subject" class="form-control" name="subject">
                                    @error('subject')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div><br>
                                <div class="message">
                                    <label for="message">Message</label><br>
                                    <textarea type="textarea" id="editor1" class="form-control" name="editor1"></textarea>
                                    @error('editor1')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <br>
                                <div class="expirydate">
                                    <label for="expirydate">Expiry Date</label><br>
                                    <input type="date" id="expirydate" class="form-control" name="expirydate">
                                    @error('expirydate')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="user_id py-2">
                                    <label for="user_id">Assign To</label>
                                <select name="user_id" id="user_id" class="mx-auto form-control">
                                        @foreach ($user as $users)
                                            <option value="{{ $users['id'] }}">{{ $users['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="is_read" id="is_read" value="0">
                                <br>
                                <div class="row save_notificatio_button">
                                    <div class="col-8"></div>
                                    <div class="col-3">
                                        <button type="submit" id="save_button"
                                            style="outline:none!important;border:none!important;color: #FFFFFF;"
                                            class="px-3 py-1">Save</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <script>
            iziToast.success({
                position: 'topRight',
                message: '{{ Session::get('success') }}',
            });
        </script>
    @endif

    <script>
        CKEDITOR.replace('editor1');

        function edit_record(id) {
            $.ajax({
                method: 'post',
                data: {
                    'id': id
                },
                url: '{{ route('notification_update') }}',
                success: function(result) {
                    $('#id').val(result['id']);
                    $('#subject').val(result['subject']);
                    $('#expirydate').val(result['expiry_date']);
                    CKEDITOR.instances.editor1.setData(result['message']);
                    $('#save_button').text('Update');
                }
            });
        }

        function search_notification() {
            search = document.getElementById('search').value;

            $.ajax({
                method: 'post',
                data: {
                    'search': search
                },
                url: '{{ route('notification_search') }}',
                success: function(result) {

                    if (result.length > 0) {

                        $('#main_notification_box').html(' ');
                        result.forEach(myFunction)

                        function myFunction(item, index, arr) {

                            var notification =
                                "<div class='row mb-3'><div class='col-12'><div class='notification_box'><div class='row'><div class='col-8'><div class='row'><div class='col-12 d-flex notification_title'><div class='mt-2 px-2'><i class='fa fa-clock-o' aria-hidden='true'></i></div><div class='mt-2'><h4>" +
                                item['subject'] + "</h4><p>" + item['message'] +
                                "</p></div></div></div></div><div class='col-4'><div class='row'><div class='col-8 notification_expiry mt-2'><div><p>Expiry Date <br>" +
                                item['expiry_date'] +
                                "</p></div></div><div class='col-2 mt-2 notification_number'><div class='noti_box'><p>1</p></div></div></div></div></div><div class='row mb-2'><div class='col-10'></div><div class='col-2 notification_action d-flex px-1'><button id=" +
                                item['id'] + " onclick='edit_record(" + item['id'] +
                                ")' class='edit' style='border:none!important;outline:none!important;cursor:pointer'><i class='fa fa-edit'></i></button><div class='px-1'></div><div class='del'><a href='{{ route('notification.del', "+item['id']+") }}'><i class='fa fa-trash del text-danger'></i></a></div></div></div><div class='row'><div class='col-12 mx-auto text-center'><div class='notification_icon mb-3'><i class='fa fa-caret-down' aria-hidden='true'></i></div></div></div></div></div></div>";
                            $('#main_notification_box').append(notification);

                        }
                    } else {

                        $('#main_notification_box').html(' ');

                        notification = '<div class="alert alert-danger text-center">No items to display</div>';
                        $('#main_notification_box').append(notification);
                    }




                    // alert(result);
                    // $('#id').val(result['id']);
                    // $('#subject').val(result['subject']);
                    // $('#expirydate').val(result['expiry_date']);
                    // CKEDITOR.instances.editor1.setData(result['message']);
                    // $('#save_button').text('Update');
                }
            });


        }
    </script>
@endsection
