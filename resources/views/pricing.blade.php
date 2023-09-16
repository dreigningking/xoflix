@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        @include('layouts.subscription')
    </div>
@endsection
@push('scripts')
<script>
    $(document).on('click','.buy',function(){
        $(this).closest('.action').find('.quantity').first().val(1)
        $(this).closest('.action').find('.amount').first().val($(this).closest('.action').find('.price').first().val())
        $(this).closest('.action').find('.buyvalues').fadeIn();
        // let name = $(this).closest('.action').find('.plan_name').val();
        // $('#selected_plans').append(`<p>${name} x 1 </p>`)
        $(this).hide();

        getAmount();
    })

    $(document).on('click','.buy_plus',function(){
        let input = $(this).closest('.buyvalues').find('.quantity')
        let price = $(this).closest('.action').find('.price').first().val()
        let amount = $(this).closest('.action').find('.amount').first()
        let new_quantity = parseInt(input.val()) + 1
        input.val(new_quantity)
        amount.val(new_quantity * parseInt(price))
        getAmount();
    })

    $(document).on('click','.buy_minus',function(){
        let input = $(this).closest('.buyvalues').find('.quantity')
        let price = $(this).closest('.action').find('.price').first().val()
        let amount = $(this).closest('.action').find('.amount').first()
        let new_quantity = parseInt(input.val()) - 1
        input.val(new_quantity)
        amount.val(new_quantity * parseInt(price))
        if(input.val() < 1){
            $(this).closest('.action').find('.buy').fadeIn();
            $(this).closest('.action').find('.buyvalues').hide()
        }
        getAmount();
        
    })
    function getAmount(){
        let amount = 0;
        $('.amount').each(function(index,vals){
            amount += parseInt(vals.value)
        })
        if(amount > 0){
            $('.total_area').show()
            $('#grandtotal').text(amount);
        }else{
            $('.total_area').hide()
        }
        
    }
</script>
@endpush
