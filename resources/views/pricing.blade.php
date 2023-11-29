@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        @include('layouts.subscription')
    </div>
@endsection
@push('scripts')
<script>
    
    $(document).on('click','.changeDuration',function(){
        let months = $(this).attr('data-months');
        $(this).closest('.action').find('.quantity').val(months)
        let price = $(this).closest('.action').find('.price').first().val()
        let connection = $(this).closest('.action').find('.connections').first().val()
        let amount = parseInt(price) * parseInt(months) * parseInt(connection)
        let discounted = getDiscountedAmount(months,amount)
        $(this).closest('.action').find('.displayed_price').text(discounted)
    })
    $(document).on('input change','.quantity',function(){
        let months = $(this).val();
        let price = $(this).closest('.action').find('.price').first().val()
        let connection = $(this).closest('.action').find('.connections').first().val()
        let amount = parseInt(price) * parseInt(months) * parseInt(connection)
        let discounted = getDiscountedAmount(months,amount)
        $(this).closest('.action').find('.displayed_price').text(discounted)
    })
    $(document).on('click','.buy_plus',function(){
        let input = $(this).closest('.buyvalues').find('.quantity')
        let months = parseInt(input.val()) + 1
        input.val(months)
        let price = $(this).closest('.action').find('.price').first().val()
        let connection = $(this).closest('.action').find('.connections').first().val()
        let amount = parseInt(price) * parseInt(months) * parseInt(connection)
        let discounted = getDiscountedAmount(months,amount)
        $(this).closest('.action').find('.displayed_price').text(discounted)
    })

    $(document).on('click','.buy_minus',function(){
        let input = $(this).closest('.buyvalues').find('.quantity')
        let months = parseInt(input.val()) - 1
        input.val(months)
        let price = $(this).closest('.action').find('.price').first().val()
        let connection = $(this).closest('.action').find('.connections').first().val()
        let amount = parseInt(price) * parseInt(months) * parseInt(connection)
        let discounted = getDiscountedAmount(months,amount)
        $(this).closest('.action').find('.displayed_price').text(discounted)
        
    })
    $(document).on('change','.connections',function(){
        let connection = $(this).val();
        let price = $(this).closest('.action').find('.price').first().val()
        let months = $(this).closest('.action').find('.quantity').first().val()
        let amount = parseInt(price) * parseInt(months) * parseInt(connection)
        let discounted = getDiscountedAmount(months,amount)
        $(this).closest('.action').find('.displayed_price').text(discounted)
    })

    function getDiscountedAmount(duration, amount){
        var discounts = @json($discounts);
        if(duration >= 12){
            let key = discounts.find(k=> k.name === 'discount12');
            return (100 - parseInt(key.value)) * parseInt(amount) / 100;
        }else if(duration >= 6){
            let key = discounts.find(k=> k.name === 'discount6');
            return (100 - parseInt(key.value)) * parseInt(amount) / 100;
        }else if(duration >=3){
            let key = discounts.find(k=> k.name === 'discount3');
            return (100 - parseInt(key.value)) * parseInt(amount) / 100;
        }else{
            return amount;
        }
    }
 
</script>
@endpush
