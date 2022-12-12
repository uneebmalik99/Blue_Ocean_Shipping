<style>
    .text-color {
        margin-bottom: 24px;
    }

    .row div {
        margin: 10px 0px;
    }

    .unskew {
        transform: skew(30deg);
    }


    .tab_card {
        background: rgba(213, 213, 213, 0.17) !important;
        box-shadow: 2px 5px 3px rgba(31, 104, 158, 0.08) !important;
        border-radius: 32px !important;
    }
</style>

<div>
    <div class="col-4 d-flex">
        <div class="col-6 px-0 py-0 pl-1 billing">
            <button class="text-center form-control border navbar_tab next-style" style="cursor: pointer;"
                id="general_customer_tab">
                <div class="unskew">
                    General
                </div>
            </button>
        </div>
        <div class="col-6 px-0 py-0 pl-1 billing">
            <button class="text-center form-control border navbar_tab tab_style" style="cursor: pointer;"
                id="billing_customer_tab">
                <div class="unskew">Billing
                    Party</div>
            </button>
        </div>
        <div class="col-6 px-0 py-0 pl-1">
            <button class="text-center form-control border navbar_tab  tab_style" style="cursor: pointer;"
                id="shipper_customer_tab">
                <div class="unskew">
                    Shipper
                </div>
            </button>
        </div>
        <div class="col-6 px-0 py-0 pl-1">
            <button class="text-center form-control border navbar_tab  tab_style" style="cursor: pointer;"
                id="quotation_customer_tab">
                <div class="unskew">
                    Quotation

                </div>
            </button>
        </div>
    </div>
</div>
