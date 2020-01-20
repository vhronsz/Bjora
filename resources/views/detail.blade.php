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
    <div>
        @if($question->user_id === \Illuminate\Support\Facades\Session::get("user")->id)
         <div>
             <a href="{{url("/closeQuest?id=".$question->id)}}">
                 <button>Close</button>
             </a>
         </div>
        @endif
        <div>
            {{$question->title}}
        </div>
        <div>
            {{$user->name}}
        </div>
        <div>
            {{$question->date}}
        </div>
    </div>
    @foreach($answer as $a)
        <div>{{$a->responder}}</div>
        <div>{{$a->name}}</div>
        @if($a->user_id === \Illuminate\Support\Facades\Session::get("user")->id)
            <div>
                <a href="/deleteAnswer/{{$a->id}}">
                    <button>
                        delete
                    </button>
                </a>
            </div>
        @endif
    @endforeach

    @if(\Illuminate\Support\Facades\Session::get("user")!== null)
        @if($question->user_id !== \Illuminate\Support\Facades\Session::get("user")->id)
        <form method="post" action="/addAnswer">
            <textarea name="name"></textarea>
            <input type="submit"/>
        </form>
        @endif
    @endif

</div>

</body>
</html>
