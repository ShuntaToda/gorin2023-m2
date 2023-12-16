@include("header")
    <div>
        <div>
            <span>id</span>
            <span>{{ $event->id }}</span>
        </div>
        <div>
            <span>name</span>
            <span>{{ $event->name }}</span>
        </div>
        <div>
            <span>place</span>
            <span>{{ $event->place }}</span>
        </div>
        <div>
            <span>day</span>
            <span>{{ $event->day }}</span>
        </div>
    </div>

@include("footer")