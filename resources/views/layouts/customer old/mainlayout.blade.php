<div class="card simple-cards border-white">
    {{-- <div class="card-header">
        <h5>Simple Cards</h5>
        <div class="card-header-right">
            <i class="icofont icofont-rounded-down"></i>
            <i class="icofont icofont-refresh"></i>
            <i class="icofont icofont-close-circled"></i>
        </div>
    </div> --}}
    <div class="card-block d-flex">
        {{-- Sidebar start --}}
        @include('layouts.customer.sidebar')
        {{-- Sidebar end --}}
        {{-- Project list start --}}
        <div class="col-9 px-2">
            @include('layouts.customer.navbar')
            <div id="tab_body">
                @include('layouts.customer.account')
            </div>
        </div>
        <!-- end of row -->
    </div>
</div>
