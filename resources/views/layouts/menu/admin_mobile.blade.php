<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.dashboard')) active @endif" href="{{route('admin.dashboard')}}">
        <span class="menu-title">Dashboard</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.subscriptions')) active @endif" href="{{route('admin.subscriptions')}}">
        <span class="menu-title">Subscriptions</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.trials')) active @endif" href="{{route('admin.trials')}}">
        <span class="menu-title">Trials</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.users')) active @endif" href="{{route('admin.users')}}">
        <span class="menu-title">Users</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.payments')) active @endif" href="{{route('admin.payments')}}">
        <span class="menu-title">Payments</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.withdrawals')) active @endif" href="{{route('admin.withdrawals')}}">
        <span class="menu-title">Withdrawals</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.notifications')) active @endif" href="{{route('admin.notifications')}}">
        <span class="menu-title">Notifications</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.activities')) active @endif" href="{{route('admin.activities')}}">
        <span class="menu-title">Activities</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.plans.index')) active @endif" href="{{route('admin.plans.index')}}">
        <span class="menu-title">Plans</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.settings')) active @endif" href="{{route('admin.settings')}}">
        <span class="menu-title">Settings</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.sports')) active @endif" href="{{route('admin.sports')}}">
        <span class="menu-title">Sports</span>
    </a>
</div>

<div class="menu-item">
    <a class="menu-link  py-3 @if(Route::is('admin.support')) active @endif" href="{{route('admin.support')}}">
        <span class="menu-title">Support</span>
    </a>
</div>