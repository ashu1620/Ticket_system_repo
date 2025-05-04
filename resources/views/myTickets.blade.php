<head>
    <link rel="stylesheet" href="css/myTicket.css">
</head>
<div class="container">
    @auth
        <span >Hi there {{auth()->user()->name}}</span>
    @endauth
    <div class="navbar">
          <ul>
            <button onclick="window.location.href='dashboard'"><li>Dashboard</li></button>
            <button onclick="window.location.href='create'"><li>Create Ticket</li></button>
            <button id="ticket" onclick="window.location.href='myTickets';"><li>My Tickets</li></button>
            <button id="logout" onclick="window.location.href='logout';"><li>Log Out</li></button>
        </ul>
    </div>

    <table >
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Edit</th>
        </tr>
        @if($assignees->isNotEmpty())
            @foreach ($assignees as $data)
            <tr>
                <td>{{$data->title}}</td>
                <td>{{$data->description}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->created_at}}</td>
                <td><button onclick="window.location.href='{{route('assigneEdit', $data->id)}}'" >Edit</button></td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">There is no tickets assigned to you</td>
            </tr>
        @endif
    </table>
    
    <br><br><br>
    
<div>
    
</div>
