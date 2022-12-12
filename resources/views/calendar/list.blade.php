@extends('layouts.partials.mainlayout')
@section('body')
<style>
    
</style>
    <div class="card-block">
        <div class="row">
            <div class="col-xl-2 col-md-12">
                <div id="external-events">
                    <h6 class="m-b-30 m-t-20">Events</h6>
                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 1</div>
                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 2</div>
                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 3</div>
                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 4</div>
                    <div class="fc-event ui-draggable ui-draggable-handle">My Event 5</div>
                    <div class="checkbox-fade fade-in-primary m-t-10">
                        <label>
                            <input type="checkbox" value="">
                            <span class="cr">
                                <i class="cr-icon icofont icofont-ui-check txt-primary"></i>
                            </span>
                            <span>Remove After Drop</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-md-12">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection
