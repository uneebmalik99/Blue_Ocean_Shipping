@extends('layouts.partials.mainlayout')
@section('body')
    <form action="" method="POST">
        @csrf
        <div class="p-3">
            <label for="">subject</label>
            <input type="text" name="subject">
        </div>
        <div class="p-3">
            <label for="">message</label>
            <input type="text" name="message">
        </div>
        <div class="p-3">
            <label for="">is_read</label>
            <input type="text" name="is_read">
        </div>
        <div class="p-3">
            <label for="">status</label>
            <input type="text" name="status">
        </div>
        <div class="p-3">
            <label for="">user_id</label>
            <input type="text" name="user_id">
        </div>
        <div class="p-3">
            <label for="">expiry date</label>
            <input type="date" name="expiry_date">
        </div>
        <div class="p-3">
            <label for="">added_by_role</label>
            <input type="text" name="added_by_role" value="1">
        </div>
        <input type="submit" value="Submit">
    </form>
@endsection
