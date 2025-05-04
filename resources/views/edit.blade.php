<div>
    <head>
        <link rel="stylesheet" href="css/myTicketEdit.css">
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
        <h5>Edit Ticket</h5>
        <form action="myEdit-{{$ticket->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title" id="title" placeholder="Title" value="{{$ticket->title}}">
            @error('title')
                <div>{{$message}}</div>
            @enderror<br><br>
            <textarea name="description" id="description" placeholder="Description">{{$ticket->description}}</textarea>
            @error('description')
                <div>{{$message}}</div>
            @enderror<br><br>
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
            <label for="assign">Assign to:</label>
            <select name="assign" id="assign">
                <option value="" selected disabled hidden>--select from here--</option>
                @foreach ($userData as $users)
                    @if($users->username == $ticket->assignee_username)
                        <option selected value="{{$users->id}}" >{{$users->name}}(-{{$users->email}}-)</option>
                    @else
                        <option value="{{$users->id}}" >{{$users->name}}(-{{$users->email}}-)</option>
                    @endif
                @endforeach
            </select>
            @error('assign')
                <div>{{$message}}</div>
            @enderror<br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
    
</div>
