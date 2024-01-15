<div class="menu-item">
    <a class="menu-link py-3" href="{{route('dashboard')}}">
        <span class="menu-title">Dashboard</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link py-3"  href="{{route('transactions')}}">
        <span class="menu-title">Transactions</span>
        
    </a>
    
</div>
<div class="menu-item">
    <a class="menu-link py-3" href="{{route('notifications')}}">
        <span class="menu-title">Notifications</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3"  href="{{route('referrals')}}">
        <span class="menu-title">Referrals</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3" href="{{route('withdrawals')}}">
        <span class="menu-title">Withdrawals</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3" href="{{route('freetrials')}}">
        <span class="menu-title">Free Trials</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3" href="{{route('subscription')}}">
        <span class="menu-title">Subscription</span>
    </a>
</div>
@if($show_sports)
<div class="menu-item">
    <a class="menu-link  py-3" href="{{route('sports')}}">
        <span class="menu-title">Sport Guide</span>
    </a>
</div>
@endif
