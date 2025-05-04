<head>
    <link rel="stylesheet" href="/css/signup.css">
</head>
<div id="container">
    <h5>Sign up here</h5>
    <form id="for_input" action="login" method="post">
        @csrf
        <input type="text" id="name" name="name" placeholder="Enter your name">
        @error('name')
            <div>{{$message}}</div>
        @enderror<br><br>
        <input type="text" id="usr" name="usr" placeholder="Enter Username">
        @error('usr')
            <div>{{$message}}</div>
        @enderror<br><br>
        <input type="email" id="em" name="em" placeholder="Enter email">
        @error('em')
            <div>{{$message}}</div>
        @enderror<br><br>
        <input type="password" id="password" name="password" placeholder="Enter password">
        @error('password')
            <div>{{$message}}</div>
        @enderror<br><br>
        <input type="password" id="password" name="password_confirmation" placeholder="Confirm Password">
        @error('password_confirmation')
            <div>{{$message}}</div>
        @enderror<br><br>
        <button id="but" type="submit">Signup</button>
    </form>
    <a href="/login">Alredy have an account Login here</a>
</div>
