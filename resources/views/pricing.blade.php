@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        @include('layouts.subscription')
    </div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.buyvalues').css("display", "none")
    })
    $('.buy').click(function(){
        $(this).closest('.action').find('.buyinput').val(1)
        $(this).closest('.action').find('.buyvalues').fadeIn();
        $(this).hide();
    })
    $(document).on('click','.buy_plus',function(){
        let input = $(this).closest('.buyvalues').find('.buyinput')
        input.val(parseInt(input.val()) + 1)
    })
    $(document).on('click','.buy_minus',function(){
        let input = $(this).closest('.buyvalues').find('.buyinput')
        input.val(parseInt(input.val()) - 1)
        if(input.val() < 1){
            $(this).closest('.action').find('.buy').fadeIn();
            $(this).closest('.action').find('.buyvalues').hide()
        }
        
    })
</script>
@endpush
