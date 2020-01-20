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
    <form method="post" action="/updateUserData" class="formLogin"  enctype="multipart/form-data">
        <div id="formContainer">
            <div>Fullname</div>
            <input type="name" name="name" id="inputStyle" value="{{$u->name}}"/>
        </div>

        <div id="formContainer">
            <div>Email</div>
            <input type="email" name="email" id="inputStyle" value="{{$u->email}}"/>
        </div>

        <div id="formContainer">
            <div>Password</div>
            <input type="password" name="password" id="inputStyle"/>
        </div>

        <div id="formContainer">
            <div>Password confirmation</div>
            <input type="password" name="password_confirmation" id="inputStyle"/>
        </div>

        <div id="formContainer">
            <div>Gender</div>
            <input type="radio" name="gender" value="male" id="inputStyle"/>Male
            <input type="radio" name="gender" value="female" id="inputStyle"/>Female
        </div>

        <div id="formContainer">
            <div>Address</div>
            <input type="text" name="address" id="inputStyle" value="{{$u->address}}"/>
        </div>

        <div id="formContainer">
            <div>DOB</div>
            <input type="date" name="dob" id="inputStyle" value="{{$u->dob}}"/>
        </div>

        <div id="formContainer">
            <div>Profile Picture</div>
            <input type="file" name="image" accept=".jpeg,.jpg,.png" id="inputStyle"/>
        </div>

        <input type="hidden" value="{{$u->id}}" name="id">
        @if($errors->any())
            {{$errors->first()}}
        @endif

        <div id="formContainer">
            <input type="submit"/>
        </div>
    </form>

</body>
</html>
