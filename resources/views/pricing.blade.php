@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        @include('layouts.subscription')
    </div>
@endsection
@push('scripts')
<script>
    
    $(document).on('input change','.quantity',function(){
        let months = $(this).val();
        let price = $(this).closest('.action').find('.price').first().val()
        let connection = $(this).closest('.action').find('.connections').first().val()
        let amount = parseInt(price) * parseInt(months) * parseInt(connection)
        $(this).closest('.action').find('.displayed_price').text(amount)
    })
    $(document).on('click','.buy_plus',function(){
        let input = $(this).closest('.buyvalues').find('.quantity')
        let months = parseInt(input.val()) + 1
        input.val(months)
        let price = $(this).closest('.action').find('.price').first().val()
        let connection = $(this).closest('.action').find('.connections').first().val()
        let amount = parseInt(price) * parseInt(months) * parseInt(connection)
        $(this).closest('.action').find('.displayed_price').text(amount)
    })

    $(document).on('click','.buy_minus',function(){
        let input = $(this).closest('.buyvalues').find('.quantity')
        let months = parseInt(input.val()) - 1
        input.val(months)
        let price = $(this).closest('.action').find('.price').first().val()
        let connection = $(this).closest('.action').find('.connections').first().val()
        let amount = parseInt(price) * parseInt(months) * parseInt(connection)
        $(this).closest('.action').find('.displayed_price').text(amount)
        
    })
    $(document).on('change','.connections',function(){
        let connection = $(this).val();
        let price = $(this).closest('.action').find('.price').first().val()
        let months = $(this).closest('.action').find('.quantity').first().val()
        let amount = parseInt(price) * parseInt(months) * parseInt(connection)
        $(this).closest('.action').find('.displayed_price').text(amount)
    })
 
</script>
@endpush
