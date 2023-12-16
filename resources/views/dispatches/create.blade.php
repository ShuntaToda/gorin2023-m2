@include("header")

<div>
    <form action="{{ route('dispatches.create') }}" method="post">
        @csrf
        <div>
            <span>memo</span>
            <input type="text" name="memo">
        </div>
        <div>
            <span>イベント情報</span>
            <select name="event" id="">
                @foreach($events as $event)
                <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <span>人材情報</span>
            <select multiple name="workers[]" id="">
                @foreach($workers as $worker)
                <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                @endforeach
            </select>
        </div>
        
        @if($errors->first())
        <div>エラーが発生しました</div>
        @endif
        <button type="submit">登録</button>
    </form>
</div>


@include("footer")