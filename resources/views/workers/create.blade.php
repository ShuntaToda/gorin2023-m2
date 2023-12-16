@include("header")

<div>
    <form action="{{ route('workers.create') }}" method="post">
        @csrf
        <div>
            <span>name</span>
            <input type="text" name="name">
        </div>
        <div>
            <span>email</span>
            <input type="text" name="email">
        </div>
        <div>
            <span>memo</span>
            <input type="text" name="memo">
        </div>
        <div>
            <span>password</span>
            <input type="password" name="password">
        </div>
        
        @if($errors->first())
        <div>エラーが発生しました</div>
        @endif
        <button type="submit">登録</button>
    </form>
</div>


@include("footer")