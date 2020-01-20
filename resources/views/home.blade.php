<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>Bjora</div>
    <div>{{\Illuminate\Support\Facades\Date::now()}}</div>
    <div>
        @if(\Illuminate\Support\Facades\Session::get("user")!==null)
            {{\Illuminate\Support\Facades\Session::get("user")->name}}
        @endif
    </div>
    @if(\Illuminate\Support\Facades\Session::get("user") !== null)
        <div>
            <a href="{{url("/addQuest")}}">Add Question</a>
        </div>
    @endif

        <div>
            <form action="/search" method="post">
                <input type="text" name="item"/>
                <input type="submit">
            </form>
        </div>

    @foreach($quest as $q)
        <div style="border: 1px solid black;">
            <div>
                @if($q->status === true)
                    Open
                @else
                    Close
                @endif
            </div>
            <div>
                {{$q->title}}
            </div>
            <div>
                created at {{$q->date}}
            </div>
            <div>

            </div>
            <a href="{{url("/detail?id=".$q->id)}}">
                <button>Answer</button>
            </a>
            @if($q->user_id === \Illuminate\Support\Facades\Session::get("user")->id)
                <a href="{{url("/updateQuest?id=".$q->id)}}">
                    <button>Update</button>
                </a>
            @endif
        </div>
    @endforeach
    {{$quest->links()}}
</body>
</html>
