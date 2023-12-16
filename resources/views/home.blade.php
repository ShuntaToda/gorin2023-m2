@include("header")

<div>
    <div>
        @if(Auth::check())
        <a href="{{ route('logout') }}">logout</a>
        @else
        <a href="{{ route('login') }}">login</a>
        @endif
    </div>
    <div>
        <a href="{{ route('events.index') }}">events</a>
        <a href="{{ route('workers.index') }}">wokers</a>
        <a href="{{ route('dispatches.index') }}">dispatches</a>
    </div>
</div>

@include("footer")