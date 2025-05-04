<div>
    <head>
        <link rel="stylesheet" href="/css/assigneEdit.css">
    </head>
    <div class="container">
        @auth
            <span >Hi there {{auth()->user()->name}}</span>
        @endauth
        <div class="navbar">
              <ul>
                <button onclick="window.location.href='/dashboard'"><li>Dashboard</li></button>
                <button onclick="window.location.href='/create'"><li>Create Ticket</li></button>
                <button onclick="window.location.href='/myTickets';"><li>My Tickets</li></button>
                <button id="logout" onclick="window.location.href='logout';"><li>Log Out</li></button>
            </ul>
        </div>
    <div class="container">
        <h3>Edit Ticket</h3>
        <form action="subEdit-{{$ticket->id}}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Title</label>
            <p type="text" name="title" id="title">{{$ticket->title}}</p>
            <br><br>
            <label for="description">Description</label>
            <p name="description" id="description" >{{$ticket->description}}</p>
            <br><br>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option class="statusOptions" value="Pending" {{ $ticket->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option class="statusOptions" value="In progress" {{ $ticket->status == 'In progress' ? 'selected' : '' }}>In progress</option>
                <option class="statusOptions" value="On Hold" {{ $ticket->status == 'On Hold' ? 'selected' : '' }}>On Hold</option>
                <option class="statusOptions" value="Completed" {{ $ticket->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option class="statusOptions" value="Dropped" {{ $ticket->status == 'Dropped' ? 'selected' : '' }}>Dropped</option>
            </select>            
            @error('status')
                <div>{{$message}}</div>
            @enderror<br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
    
</div>
