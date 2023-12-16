@include("header")

<div>
    <form action="{{ route('dispatch.edit', $event->id) }}" method="post">
        @csrf
        {{dd($events)}}
        <div>
            <span>name</span>
            <input type="text" name="name" value="{{ $dispatch->name }}">
        </div>
        <div>
            <span>place</span>
            <input type="text" name="place" value="{{ $dispatch->place }}">
        </div>
        <div>
            <span>day</span>
            <input type="text" name="day" value="{{ $dispatch->day }}">
        </div>
        @if($errors->first())
        <div>エラーが発生しました</div>
        @endif
        <button type="submit">更新</button>
    </form>
</div>


@include("footer")