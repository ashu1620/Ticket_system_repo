<head>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div id="container">
        <h5>Welcome</h5>
        <div  id="form_container">
            <form action="dashboard" method="POST" id="data">
                @csrf
                <input type="text" name="username" id="username" placeholder="Enter username" value="{{old('username')}}">
                @error('psw')
                    <div>{{$message}}</div>
                @enderror
                @error('usr')
                    <div>{{$message}}</div>
                @enderror<br><br>
                <input type="password" name="psw" id="psw" placeholder="Enter passwrod"><br><br>
                <button type="submit" id="sub">Login</button><br>
            </form>
        </div>
        <a href="/signup">Do not have an account!!! Sign up here >//<</a>
    </div>
</body>