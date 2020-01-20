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
    <form method="post" action="/addQuestion" class="formLogin">

        <div id="formContainer">
            <div>question</div>
            <textarea name="title" id="inputStyle"></textarea>
        </div>

        <div>
            <div>Topic</div>
            <select>
                <option value="a">a</option>
                @foreach($topic as $t)
                    <option value="{{$t->name}}">{{$t->name}}</option>
                @endforeach
            </select>
        </div>

        @if($errors->any())
            {{$errors->first()}}
        @endif

        <div id="formContainer">
            <input type="submit"/>
        </div>
    </form>

</body>
</html>
