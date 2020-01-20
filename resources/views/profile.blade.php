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
        @if(\Illuminate\Support\Facades\Storage::disk("public")->exists($user->image))
            <img id="" src="/storage/{{$user->image}}" style="width: 200px;height: 200px;"/>
        @else
            <img id="" src=""/>
        @endif
        <div>{{$user->name}}</div>
        <div>{{$user->email}}</div>
        <div>{{$user->address}}</div>
        <div>{{$user->dob}}</div>
    </div>
    <div>
        @if(\Illuminate\Support\Facades\Session::get("user"))
            @if(\Illuminate\Support\Facades\Session::get("user")->id === $user->id)
                <a href="{{url("/updateProfile?id=".$user->id)}}">
                    <button>Edit Profile</button>
                </a>
            @else
                <div>
                    <form method="post" action="/sendMessage">
                        <textarea name="name"></textarea>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button type="submit"></button>
                    </form>
                </div>
            @endif
        @endif
    </div>
</body>
</html>
