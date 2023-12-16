@include("header")

<div>
    <h2>Login</h2>
    <div>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div>
                <span>id</span>
                <input type="text" name="id">
            </div>
            <div>
                <span>pass</span>
                <input type="password" name="pass">
            </div>
            @if(session("message"))
            <div>{{ session("message") }}</div>
            @endif
            @if($errors->first())
            <div>idとpasswordを入力してください</div>
            @endif
            <button type="submit">submit</button>
        </form>
    </div>
</div>

@include("footer")