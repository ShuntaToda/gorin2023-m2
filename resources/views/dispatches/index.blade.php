@include("header")
<a href="{{ route('dispatches.create') }}">create</a>

@if(session("message"))
<div>{{ session("message") }}</div>
@endif
<div></div>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($dispatches as $dispatch)
        <tr>
            <td>{{$dispatch->id}}</td>
            <td>{{App\Models\Dispatch::getEvent($dispatch->id)}}</td>
            <td>{{App\Models\Dispatch::getWorker($dispatch->id)}}</td>
            <td>
                <div>
                    <button>編集</button>
                    <form action="{{ route('dispatches.delete', $dispatch->id) }}" method="post">
                        @csrf
                        @method("delete")
                        <button  type="submit">削除</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include("footer")