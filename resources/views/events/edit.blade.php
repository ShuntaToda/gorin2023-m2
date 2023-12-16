@include("header")

<div>
    <form action="{{ route('events.edit', $event->id) }}" method="post">
        @csrf
        <div>
            <span>name</span>
            <input type="text" name="name" value="{{ $event->name }}">
        </div>
        <div>
            <span>place</span>
            <input type="text" name="place" value="{{ $event->place }}">
        </div>
        <div>
            <span>day</span>
            <input type="text" name="day" value="{{ $event->day }}">
        </div>
        @if($errors->first())
        <div>エラーが発生しました</div>
        @endif
        <button type="submit">更新</button>
    </form>
</div>


@include("footer")