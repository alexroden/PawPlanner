<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li class="menu-text">{{ trans('site.name') }} 🐶</li>
            <li><a href="#">One</a></li>
            <li><a href="#">Two</a></li>
        </ul>
    </div>
    <div class="top-bar-right">
        <ul class="menu">
            @if(Auth::user())
            <li><a href="#">My Account</a></li>
            <li><a href="#">{{ trans('auth.logout') }}</a></li>
            @else
            <li><a href="{{ route('auth.register') }}">{{ trans('auth.register') }}</a></li>
            <li><a href="#">{{ trans('auth.login') }}</a></li>
            @endif
        </ul>
    </div>
</div>