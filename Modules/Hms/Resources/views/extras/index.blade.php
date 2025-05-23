@extends('layouts.app')
@section('title', __('hms::lang.extras'))
@section('content')
@include('hms::layouts.nav')
    <section class="content-header">
        <h1> @lang('hms::lang.extras')
        </h1>
        <p><i class="fa fa-info-circle"></i> @lang('hms::lang.extra_help_text')
        
                     &nbsp; <button style='font-size:36px;color:red'><i class='fab fa-youtube id='modal-video-tutorial' data-toggle="modal" data-target="#stack"></i></button>
					

	    </h4>
       
       
    <div data-width="500" tabindex="-1" class="modal fade" id="stack" style="display: none;">
     <div class="modal-dialog">
        <div class="modal-content" style="padding-bottom: 40px">
               <div class="modal-header">
                  <button type="button" id='close-modal' class="close" data-dismiss="modal" rel=0;aria-hidden="true"></button>
                <div id="title-tutorial">
                Modulo Hoteles
                </div>
        </div>
            <div class="modal-body">
                <div id="video-tutorial">
                    
                <iframe width="560" height="315" src="https://www.youtube.com/embed/HBV8Mn4lCyk?si=kYkTV6AbRGAX_cZd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                
                </div>
                <p id="description-tutorial">Cree servicios extras y administrelas para sus huespedes</p>

                
            </div>
        </div>
      </div>


        
        
        </p>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">&nbsp;</h3>
                <div class="box-tools">
                    <a href="{{ action([\Modules\Hms\Http\Controllers\ExtraController::class, 'create']) }}"
                        class="btn btn-block btn-primary btn-modal-extra" data-container=".view_modal">
                        <i class="fa fa-plus"></i> @lang('messages.add')</a>
                </div>
            </div>
            <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="extras_table">
                            <thead>
                                <tr>
                                    <th>
                                        @lang('hms::lang.name')
                                    </th>
                                    <th>
                                        @lang('hms::lang.price')
                                    </th>
                                    <th>
                                        @lang('lang_v1.created_at')
                                    </th>
                                    <th>
                                        @lang('messages.action')
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>

        <!-- Add HMS Extra Modal -->
        <div class="modal fade view_modal_extra" tabindex="-1" role="dialog" 
        aria-labelledby="gridSystemModalLabel"></div>
        </div>

    </section>
    <!-- /.content -->

@endsection

@section('javascript')

    <script type="text/javascript">
        $(document).ready(function() {
            superadmin_business_table = $('#extras_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ action([\Modules\Hms\Http\Controllers\ExtraController::class, 'index']) }}",
                },
                aaSorting: [
                    [2, 'desc']
                ],
                columns: [
                    {
                        data: 'name',
                        name: 'hms_extras.name'
                    },
                    {
                        data: 'price',
                        name: 'hms_extras.price'
                    },
                    {
                        data: 'created_at',
                        name: 'hms_extras.created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        sorting:false, 
                    }
                ],
            });

            $(document).on('click', '.btn-modal-extra', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('href'),
                    dataType: 'html',
                    success: function(result) {
                        $('.view_modal_extra')
                            .html(result)
                            .modal('show');
                    },
                });
            });

            $(document).on('click', 'a.delete_extra_confirmation', function(e) {
                e.preventDefault();
                swal({
                    title: LANG.sure,
                    text: "Once deleted, you will not be able to recover this Extra !",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((confirmed) => {
                    if (confirmed) {
                        window.location.href = $(this).attr('href');
                    }
                });
            });
        });
    </script>
@endsection

