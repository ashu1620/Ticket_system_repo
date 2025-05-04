<head>
    <link rel="stylesheet" href="/css/create.css">
</head>
<div class="container">
    @auth
        <span >Hi there {{auth()->user()->name}}</span>
    @endauth
    <div class="navbar">
          <ul>
            <button onclick="window.location.href='dashboard'"><li>Dashboard</li></button>
            <button id="create" onclick="window.location.href='create'"><li>Create Ticket</li></button>
            <button onclick="window.location.href='myTickets';"><li>My Tickets</li></button>
            <button id="logout" onclick="window.location.href='logout';"><li>Log Out</li></button>
        </ul>
    </div>
<div class="container">
    <h3>Create Ticket</h3>
    <form action="daash" method="POST">
        @csrf
        <input type="text" name="title" id="title" placeholder="Title" value="{{old('title')}}">
        @error('title')
            <div>{{$message}}</div>
        @enderror<br><br>
        <textarea name="description" id="description" placeholder="Description">{{old('description')}}</textarea>
        @error('description')
            <div>{{$message}}</div>
        @enderror<br><br>
        <label for="status">Status</label>
        <select name="status" id="status">
            <option class="statusOptions" value="Pending" selected>Pending</option>
            <option class="statusOptions" value="In Progress">In progress</option>
            <option class="statusOptions" value="On Hold">On Hold</option>
            <option class="statusOptions" value="Completed">Completed</option>
            <option class="statusOptions" value="Dropped">Dropped</option>
        </select>
        @error('status')
            <div>{{$message}}</div>
        @enderror<br><br>
        <label for="assign">Assign to:</label>
        <select name="assign" id="assign">
            <option value="" selected disabled hidden>--select from here--</option>
            @foreach ($userData as $users)
                <option value="{{$users->id}}" >{{$users->name}}(-{{$users->email}}-)</option>
            @endforeach
        </select>
        @error('assign')
            <div>{{$message}}</div>
        @enderror<br><br>
        <button type="submit">Create</button>
    </form>
</div>
