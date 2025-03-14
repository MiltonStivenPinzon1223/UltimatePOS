<div class="modal fade" id="credit_payment_modal" tabindex="-1" role="dialog"
        aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['url' => action([\App\Http\Controllers\LoanController::class, 'store']), 'contact' => $contact->id]) !!}
            <input type="hidden" name="type" value="2">
            <input type="hidden" name="contact_id" value="{{$contact->id}}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Abono de Creditos</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('amount', __( 'sale.amount' ) . ':*') !!}
                      {!! Form::text('amount', null, ['class' => 'form-control input_number sum_credits', 'required', 'placeholder' => __( 'sale.amount' ) ]); !!}
                </div>
                <div class="form-group">
                    {!! Form::label('note', __( 'brand.note' ) . ':') !!}
                      {!! Form::textarea('note', null, ['class' => 'form-control', 'placeholder' => __( 'brand.note'), 'rows' => 3 ]); !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="tw-dw-btn tw-dw-btn-primary tw-text-white">@lang( 'messages.submit' )</button>
                <button type="button" class="tw-dw-btn tw-dw-btn-neutral tw-text-white" data-dismiss="modal">@lang( 'messages.close' )</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->   
</div>