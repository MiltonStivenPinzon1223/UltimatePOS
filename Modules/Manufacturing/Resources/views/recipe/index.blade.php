@extends('layouts.app')
@section('title', __('manufacturing::lang.recipe'))

@section('content')
@include('manufacturing::layouts.nav')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang('manufacturing::lang.recipe')
     &nbsp; <button style='font-size:36px;color:red'><i class='fab fa-youtube id='modal-video-tutorial' data-toggle="modal" data-target="#stack"></i></button>
					

	    </h4>
       
       
    <div data-width="500" tabindex="-1" class="modal fade" id="stack" style="display: none;">
     <div class="modal-dialog">
        <div class="modal-content" style="padding-bottom: 40px">
               <div class="modal-header">
                  <button type="button" id='close-modal' class="close" data-dismiss="modal" rel=0;aria-hidden="true"></button>
                <div id="title-tutorial">
                Modulo Fabricacion           
                </div>
        </div>
            <div class="modal-body">
                <div id="video-tutorial">
                    
                <iframe width="560" height="315" src="https://www.youtube.com/embed/HBV8Mn4lCyk?si=kYkTV6AbRGAX_cZd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                
                </div>
                <p id="description-tutorial">Cree Recetas</p>

                
            </div>
        </div>
      </div>
    
    </h1>
</section>

<!-- Main content -->
<section class="content">
    @component('components.widget', ['class' => 'box-solid'])
        @can("manufacturing.add_recipe")
        @slot('tool')
            <div class="box-tools">
                <button class="btn btn-block btn-primary btn-modal" data-container="#recipe_modal" data-href="{{action([\Modules\Manufacturing\Http\Controllers\RecipeController::class, 'create'])}}">
                    <i class="fa fa-plus"></i> @lang( 'messages.add' )</button>
            </div>
        @endslot
        @endcan
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="recipe_table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all-row" data-table-id="recipe_table"></th>
                        <th>@lang( 'manufacturing::lang.recipe' )</th>
                        <th>@lang( 'product.category' )</th>
                        <th>@lang( 'product.sub_category' )</th>
                        <th>@lang( 'lang_v1.quantity' )</th>
                        <th>@lang( 'lang_v1.price' ) @show_tooltip(__('manufacturing::lang.price_updated_live'))</th>
                        <th>@lang( 'sale.unit_price' )</th>
                        <th>@lang( 'messages.action' )</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="8">
                            <button type="button" class="btn btn-xs btn-danger" id="mass_update_product_price" >@lang('manufacturing::lang.update_product_price')</button> @show_tooltip(__('manufacturing::lang.update_product_price_help'))
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    @endcomponent
</section>
<!-- /.content -->
<div class="modal fade" id="recipe_modal" role="dialog" 
    aria-labelledby="gridSystemModalLabel">
</div>
@stop
@section('javascript')
    @include('manufacturing::layouts.partials.common_script')
@endsection
