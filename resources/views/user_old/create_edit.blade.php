@extends('layouts.partials.mainlayout')
@section('body')
    <div class="d-flex justify-content-center mt-3">
        <div class="col-10 card border-light rounded mt-3">
            {{-- @dd($user) --}}
            <form action={{ $action }} method="POST">
                @csrf
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="username" class="col-4">Username:</label>
                                <input type="text" class="form-control col-8" name="username" id="username"
                                    value="{{ $user['username'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="email" class="col-4">Email:</label>
                                <input type="email" class="form-control col-8" name="email" id="email"
                                    value="{{ $user['email'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="status" class="col-4">Status:</label>
                                <input type="number" class="form-control col-8" name="status" id="status"
                                    value="{{ $user['status'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-center">
                            <label for="city" class="col-4">City:</label>
                            <input type="text" class="form-control col-8" name="city" id="city"
                                value="{{ $user['city'] }}">
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6 d-flex align-items-center">
                            <label for="state" class="col-4">State:</label>
                            <input type="text" class="form-control col-8" name="state" id="state"
                                value="{{ $user['state'] }}">
                        </div>
                    </div>
                    <div class="d-flex py-3">
                        <div class="col-6">
                            <div class=" d-flex align-items-center">
                                <label for="phone" class="col-4">Phone:</label>
                                <input type="number" class="form-control col-8" name="phone" id="phone"
                                    value="{{ $user['phone'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <label for="customer_name" class="col-4">Customer Name:</label>
                                <input type="text" class="form-control col-8" name="customer_name" id="customer_name"
                                    value="{{ $user['customer_name'] }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <span class="text-danger">
                                    @error('customer_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 py-2">
                        <input type="submit" value="Update" class="btn btn-primary rounded" name="update">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
