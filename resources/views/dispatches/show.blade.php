@include("header")
    <div>
        <div>
            <span>id</span>
            <span>{{ $worker->id }}</span>
        </div>
        <div>
            <span>name</span>
            <span>{{ $worker->name }}</span>
        </div>
        <div>
            <span>email</span>
            <span>{{ $worker->email }}</span>
        </div>
        <div>
            <span>memo</span>
            <span>{{ $worker->memo }}</span>
        </div>
    </div>

@include("footer")