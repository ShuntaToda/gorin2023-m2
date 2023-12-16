@include("header")

<div>
    <form action="{{ route('events.create') }}" method="post">
        @csrf
        <div>
            <span>name</span>
            <input type="text" name="name">
        </div>
        <div>
            <span>place</span>
            <input type="text" name="place">
        </div>
        <div>
            <span>day</span>
            <input type="text" name="day">
        </div>
        
        @if($errors->first())
        <div>エラーが発生しました</div>
        @endif
        <button type="submit">登録</button>
    </form>
</div>


@include("footer")