<div class="col-lg-3 h-100 p-0">
    <div class="col-lg-12 p-0">
        <div class="card user-card rounded" style="text-align: start!important;">
            <div class="card-header-img">
                @if (@$user['user_image'])
                    <img class="rounded-circle"
                        style="height:175px !important;width:175px !important;border:3px solid #2c3e50"
                        src="{{ asset(@$user['user_image']) }}" alt="card-img" />
                @else
                    <img class="rounded-circle"
                        style="height:175px !important;width:175px !important;border:3px solid #2c3e50"
                        src="{{ asset('assets/images/user.png') }}" alt="card-img" />
                @endif

                <div>
                    <h6 class="mx-0 my-2 text-muted"><b>{{ strtoupper(@$user['customer_name']) }}</b></h6>
                    <span class="font-size">{{ @$user['customer_email'] }}</span>
                </div>
            </div>
            {{-- <p>
                Lorem ipsum dolor sit amet, consectet ur
                adipisicing elit, sed do eiusmod temp or
                incidi dunt ut labore et.
            </p> --}}
            {{-- {{dd(@$user['status'])}} --}}
            <div>
                {{-- <br> --}}
                <div class="">
                    <span class="text-muted py-1 px-3">
                        <b>Username:</b> {{ @$user['name'] }}
                    </span>

                </div>
                <div class="p-3">

                    <div class="d-flex justify-content-start">
                        <span class="text-muted"><b>Details</b></span>
                    </div>
                    <hr class="m-0" style="border:1px solid #555454">
                </div>
                <div class="d-flex flex-column align-items-start">
                    <span class="text-muted py-1 px-3">
                        <b>Email:</b> {{ @$user['email'] }}
                    </span>
                    {{-- <span class="text-muted py-1 px-3">
                        <b>Email:</b> {{ @$user['email'] }}
                        </span> --}}
                    <span class="text-muted py-1 px-3">
                        <b>Status:</b>
                        {{-- {{dd(@$val['status'])}} --}}
                        @if (@$user['status'] == '1')
                            <div class="badge badge-success py-1 px-2 rounded">Active</div>
                        @endif

                        @if (@$user['status'] == '0')
                            <div class="badge badge-danger py-1 px-2 rounded">In Active</div>
                        @endif
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>Role:</b> Customer
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>Contact:</b> {{ @$user['phone'] }}
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>Country:</b> {{ @$user['country'] }}
                    </span>
                    <span class="text-muted py-1 px-3">
                        <b>State:</b> {{ @$user['state'] }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
