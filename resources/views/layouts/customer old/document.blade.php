{{-- {{dd(@$documents[0]['id'])}} --}}
<div class="card user-card rounded mt-3">
    <div class="px-3 d-flex justify-cotent">
        <h6 class="text-muted"><b>Documents Information</b></h6>
    </div>
    <div class="col-12">
        <div class="card-body border border-info rounded mt-3 py-2   r">
            <div class="my-2">
                @if (@$documents)
                {{-- <img src="{{ asset('/'.@$documents[0]['file']) }}" alt=""> --}}
                <a href="{{ asset('/'.@$documents[0]['file']) }}" class="text-muted" style="font-size:15px" download="Customer_Documents">Download Documents</a>
                @else
                <a class="text-muted" style="font-size:15px">Documents Not Found</a>
                @endif
            </div>
            <br>

        </div>
    </div>
</div>
