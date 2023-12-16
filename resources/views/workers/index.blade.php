@include("header")

<a href="{{ route('workers.create') }}">create</a>

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
        @foreach($workers as $worker)
        <tr>
            <td>{{$worker->id}}</td>
            <td>{{$worker->name}}</td>
            <td>{{$worker->email}}</td>
            <td>
                <div>
                    <button>編集</button>
                    <form action="{{ route('workers.delete', $worker->id) }}" method="post">
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