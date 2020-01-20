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
    <div>
        <a href="{{url("/addQuest")}}">Add Question</a>
    </div>

    @foreach($question as $q)
        <div style="border: 1px solid black;">
            <div>
                {{$q->title}}
            </div>
            <div>
                @if($q->status === true)
                    Open
                @else
                    Close
                @endif
            </div>
            <a href="{{url("/closeQuest?id=".$u->id)}}">
                <button>Close</button>
            </a>
            <a href="{{url("/updateQuest?id=".$u->id)}}">
                <button>Update</button>
            </a>
            <a href="{{url("/deleteQuest?id=".$u->id)}}">
                <button>Delete</button>
            </a>

        </div>
    @endforeach
    {{$question->links()}}
</body>
</html>
