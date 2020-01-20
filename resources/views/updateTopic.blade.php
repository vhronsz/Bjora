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
    <form method="post" action="/updateTopicData" class="formLogin">

        <div id="formContainer">
            <div>Topic</div>
            <input name="name" type="text" id="inputStyle" value="{{$topic->name}}"/>
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
