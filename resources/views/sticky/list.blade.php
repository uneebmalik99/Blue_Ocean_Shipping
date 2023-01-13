@extends('layouts.partials.mainlayout')
@section('body')
<style>
   #the_notes .PIApostit{
     z-index: 99999999999999;
   }
   #myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
</style>
    <div class="page-body p-4">
        <div class="col-12 p-3">
            <!-- Sticky Notes card start -->
            <div class="card border border-info rounded">
               
                <div class="card-header d-flex justify-content-between py-2">
                   
                    <div>
                        <h5>Sticky Notes</h5>
                        <span>Click <code>Add Note</code> button to add new sticky notes</span>
                       
                    </div>
                    
                    <div class="d-flex">
                        <i class="fa fa-times-circle-o"onclick=" hidebutton()" aria-hidden="true"></i>
                        
                     
                    
                    </div>
                </div>
                <div class="card-block sticky-card"  id="myDiIV">
                    <button type="button" id="idRunTheCode" class="btn btn-primary rounded waves-effect waves-light"
                        data-toggle="tooltip" data-placement="top" title="Add note">
                        <i class="icofont icofont-ui-add"></i><span class="m-l-10">Add notes</span>
                    </button>
                </div>
            </div>
            <div id="sticky-body">
                <div class="row">
                    @isset($records)
                        
                    @foreach ($records as $record )
                    
                    <div class="previous_notes" style="margin-right: 180px!important;">
                        <div style=" width:150%!important;margin-left:20px; height: 230px; background-color: rgb(26, 188, 156); color: rgb(255, 255, 255); font-family: &quot;Open Sans&quot;; font-size: small; border-color: rgb(26, 188, 156); display: block; z-index: 999999;"
                        id=""
                        class="PIApostit PIApanel arrow_box tresd ui-draggable ui-draggable-handle ui-resizable">
                        <div id=""
                            data-id="">
                            <div class="PIAfront" dir="ltr">
                                <div id="" class="PIAtoolbar"
                                    style="cursor: move;">
                                    <div id="" class="PIAIconBottom"><a
                                            href="#" id="pia_new"
                                            class="icofont icofont-copy-alt PIAicon"
                                            style="opacity: 1; display: inline;"></a></div>
                                    <div id="{{ $record['sticky_id'] }}"
                                        class="PIAdelete icofont icofont-close PIAicon" style="opacity: 1; display: block;" onclick="deleteSticky(this.id)">
                                        
                                    </div>
                                    <div id=""
                                        class="icofont icofont-minus PIAicon" style="opacity: 1; display: block;"></div>
                                    <div id=""
                                        class="icofont icofont-plus PIAicon" style="opacity: 1; display: block;"></div>
                                </div>
                                <div id="{{ $record['sticky_id'] }}"
                                    class="Sticky PIAeditable PIAcontent"
                                    style="width: auto;height: auto;padding: 10px;border-color: transparent;min-width:160px;box-shadow:none;min-height:100px;"
                                    contenteditable="false">
                                    {{ $record['notes'] }}
                                </div>
                            </div>
                            <div class="PIAback PIAback1 PIAback2" style="visibility: hidden;">
                                <div class="PIAtoolbarBack">
                                    <div id="" class="PIAclose PIAicon"
                                        style="display:block;"></div><span
                                        id="idDateBackToolbar"
                                        class="PIAdateBackToolbar">{{ Carbon\Carbon::now() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div>
                        <div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div>
                        <div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se"
                            style="z-index: 90;">
                        </div>
                    </div> 
                </div>
                    @endforeach
                    
                    @endisset
                    
                    </div>
                    
                    <div class="col-sm-2">
                        <p id="notes" class="notes">

                        </p>
                    </div>
                    <div class="col-sm-2">
                        <p id="notes1" class="notes1"></p>
                    </div>
                </div>

            </div>
            <!-- Sticky Notes card end -->
        </div>
    </div>
   





<script>
function hidebutton() {
  var x = document.getElementById("myDiIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

        //Delete Sticky notes from the pages
        function deleteSticky(id){
            var $id = id;
            $.ajax({
            type: 'GET',
            url: '{{ route('sticky.delete') }}',
            data: {
                id: $id
            },
            success: function(data) {

                if (data == "Deleted") {
                    iziToast.success({
                        timeout: 1000,
                        icon: 'fa fa-check',
                        title: 'OK',
                        message: 'Successfully Assigned Route'
                    });

                    setTimeout(function() {
                        location.reload(true);
                    }, 1000);
                }
            }
        });
        }
    </script>
@endsection
