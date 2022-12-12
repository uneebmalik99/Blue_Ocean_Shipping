<div class="modal-header">
    <h5 class="modal-title title_modal">{{@$title}}</h5>
    <button type="button" id="close_modal" class="close" data-dismiss="modal" aria-label="Close">
        <svg width="30" height="30" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d_2121_78)">
                <path
                    d="M10.3222 0.289225L8.00008 2.61138C7.22609 1.83766 6.45186 1.06319 5.67775 0.289225C4.78224 -0.606264 3.39414 0.782306 4.2889 1.67805C5.06313 2.45151 5.83762 3.22611 6.61098 4.00007C5.83726 4.77439 5.06324 5.5484 4.2889 6.3221C3.39414 7.21734 4.78236 8.60554 5.67775 7.71092C6.45173 6.9367 7.22597 6.16236 7.99995 5.38864L10.322 7.71092C11.2175 8.60616 12.606 7.21747 11.7109 6.3221C10.9367 5.54788 10.1627 4.77392 9.38818 3.99982C10.1625 3.22561 10.9365 2.45139 11.7109 1.6773C12.6061 0.782306 11.2178 -0.606764 10.3222 0.289225Z"
                    fill="#EC1C24" />
            </g>
            <defs>
                <filter id="filter0_d_2121_78" x="0" y="0" width="16" height="16" filterUnits="userSpaceOnUse"
                    color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                        result="hardAlpha" />
                    <feOffset dy="4" />
                    <feGaussianBlur stdDeviation="2" />
                    <feComposite in2="hardAlpha" operator="out" />
                    <feColorMatrix type="matrix"
                        values="0 0 0 0 0.0416667 0 0 0 0 0.0416667 0 0 0 0 0.0416667 0 0 0 0.35 0" />
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2121_78" />
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2121_78" result="shape" />
                </filter>
            </defs>
        </svg>

    </button>
</div>
<div class="modal-body">
    <form method="POST" id="common_fields">
        <div class="common_section">
            <div class="add_data_section">
                {{-- {{ dd($placeholder) }} --}}
                {{-- @foreach ($company as $companydata) --}}
                <div class="input-group mb-3 after-add-more" style="border: 1px solid rgba(31, 104, 158, 0.26);
                    filter: drop-shadow(2px 2px 2px rgba(92, 174, 235, 0.55));display:flex;">
                    <input type="text" name="make" value="{{ @$record[0]['make'] }}" class="form-control common_input" placeholder="{{@$placeholder['make']}}"
                        id="make" required>
                </div>
                <div class="input-group mb-3 after-add-more" style="border: 1px solid rgba(31, 104, 158, 0.26);
                    filter: drop-shadow(2px 2px 2px rgba(92, 174, 235, 0.55));display:flex;">
                    <input type="text" name="model" value="{{ @$record[0]['model'] }}" class="form-control common_input" placeholder="{{@$placeholder['model']}}"
                        id="model" required>
                </div>
                <div class="input-group mb-3 after-add-more" style="border: 1px solid rgba(31, 104, 158, 0.26);
                    filter: drop-shadow(2px 2px 2px rgba(92, 174, 235, 0.55));display:flex;">
                    <input type="text" name="series" value="{{ @$record[0]['series'] }}" class="form-control common_input" placeholder="{{@$placeholder['series']}}"
                    id="series" required>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" style="background: #3e5871 !imortant" class="btn save_btn update_mms" id="save_mms" value="{{ @$record[0]['id'] }}" tab="{{@$tab}}">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.11111 10H8.88888C9.18357 10 9.46618 9.88294 9.67455 9.67456C9.88293 9.46619 9.99999 9.18357 9.99999 8.88889V2.77778C10.0004 2.70467 9.9864 2.63219 9.95875 2.5645C9.93111 2.49682 9.89037 2.43525 9.83888 2.38334L7.61666 0.16112C7.56475 0.109631 7.50318 0.0688944 7.4355 0.0412474C7.36781 0.0136005 7.29533 -0.000413432 7.22222 9.28571e-06H1.11111C0.816425 9.28571e-06 0.53381 0.117072 0.325437 0.325446C0.117063 0.533819 0 0.816435 0 1.11112V8.88889C0 9.18357 0.117063 9.46619 0.325437 9.67456C0.53381 9.88294 0.816425 10 1.11111 10ZM6.66666 8.88889H3.33333V6.11111H6.66666V8.88889ZM5.55555 2.22223H4.44444V1.11112H5.55555V2.22223ZM1.11111 1.11112H2.22222V3.33334H6.66666V1.11112H6.99444L8.88888 3.00556V8.88889H7.77777V6.11111C7.77777 5.81643 7.66071 5.53382 7.45233 5.32544C7.24396 5.11707 6.96135 5 6.66666 5H3.33333C3.03865 5 2.75603 5.11707 2.54766 5.32544C2.33928 5.53382 2.22222 5.81643 2.22222 6.11111V8.88889H1.11111V1.11112Z"
                        fill="white" />
                </svg>
                {{ @$common_btn }}
            </button>
        </div>
    </form>
</div>
