<ul class="d-none d-md-flex nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 @if(Route::is('dashboard')) active @endif" @if(Route::is('dashboard')) data-bs-toggle="tab" href="#dashboard" @else href="{{route('dashboard')}}" @endif >
            Overview 
        </a>
        
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab"  href="#transactions">
            Transactions
        </a>
    </li>
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab"  href="#notifications">
            Notifications </a>
    </li>
    
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab" href="#referrals">
            Referrals </a>
    </li>
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 "data-bs-toggle="tab" 
            href="#withdrawals">
            Withdrawals </a>
    </li>
    
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab" 
            href="#freetrials">
            Free Trials </a>
    </li>
    @if($show_sports)
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="{{route('sports')}}">
            Sports Guide </a>
    </li>
    @endif


</ul>