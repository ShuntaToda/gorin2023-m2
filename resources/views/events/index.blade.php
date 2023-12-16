@include("header")

<a href="{{ route('events.create') }}">create</a>

@if(session("message"))
<div>{{ session("message") }}</div>
@endif
<div></div>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>place</th>
            <th>day</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
        <tr>
            <td>{{$event->id}}</td>
            <td>{{$event->name}}</td>
            <td>{{$event->place}}</td>
            <td>{{$event->day}}</td>
            <td>
                <div>
                    <a href="{{ route('events.edit', $event->id) }}">編集</a>
                    <form action="{{ route('events.delete', $event->id) }}" method="post">
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