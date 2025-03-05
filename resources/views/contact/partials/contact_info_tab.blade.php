<span id="view_contact_page"></span>
<div class="row">
    <div class="col-md-12">
        <div class="col-sm-3">
            @include('contact.contact_basic_info')
        </div>
        <div class="col-sm-3 mt-56">
            @include('contact.contact_more_info')
        </div>
        @if ($contact->type != 'customer')
            <div class="col-sm-3 mt-56">
                @include('contact.contact_tax_info')
            </div>
        @endif
        {{--
        <div class="col-sm-3 mt-56">
            @include('contact.contact_payment_info') 
        </div>
        @if ($contact->type == 'customer' || $contact->type == 'both')
            <div class="col-sm-3 @if ($contact->type != 'both') mt-56 @endif">
                <strong>@lang('lang_v1.total_sell_return')</strong>
                <p class="text-muted">
                    <span class="display_currency" data-currency_symbol="true">
                    {{ $contact->total_sell_return }}</span>
                </p>
                <strong>@lang('lang_v1.total_sell_return_due')</strong>
                <p class="text-muted">
                    <span class="display_currency" data-currency_symbol="true">
                    {{ $contact->total_sell_return -  $contact->total_sell_return_paid }}</span>
                </p>
            </div>
        @endif
        --}}

        @if ($contact->type == 'supplier' || $contact->type == 'both')
            <div class="clearfix"></div>
            <div class="col-sm-12">
                @if ($contact->total_purchase - $contact->purchase_paid > 0)
                    <a href="{{ action([\App\Http\Controllers\TransactionPaymentController::class, 'getPayContactDue'], [$contact->id]) }}?type=purchase"
                        class="pay_purchase_due tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm pull-right"><i
                            class="fas fa-money-bill-alt" aria-hidden="true"></i> @lang('contact.pay_due_amount')</a>
                @endif
            </div>
        @endif
        <div class="col-sm-12">
            {{-- <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm pull-right tw-m-2" data-toggle="modal" data-target="#add_discount_modal">@lang('lang_v1.add_discount')</button> --}}
            <div class="btn-group">
                <button type="button" class="tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm pull-right tw-m-2"
                    data-toggle="dropdown" aria-expanded="false">Abonos de Creditos<span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                <ul class="dropdown-menu dropdown-menu-left" role="menu">
                    <li>
                        <a href="javascript:" data-target="#credit_index_modal" data-toggle="modal" class="credit_payments_index_btn" data-url="{{route('loan.payments.show', $contact->id)}}"><i class="fas fa-eye" aria-hidden="true"></i>Ver</a>
                    </li>
                    <li>
                        <a href="javascript:" data-target="#credit_payment_modal" data-toggle="modal" class="edit_contact_button" id="credit_payment_btn" data-url="{{route('loan.payments.sum', $contact->id)}}"><i class="glyphicon glyphicon-edit"></i>Crear</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('postPayContactDue'). '/' . $contact->id }}?type=sell" class="pay_sale_due tw-dw-btn tw-dw-btn-primary tw-text-white tw-dw-btn-sm pull-right tw-m-2"><i class="" aria-hidden="true"></i>@lang('lang_v1.purchase_payment')</a>
        </div>
    </div>
</div>
