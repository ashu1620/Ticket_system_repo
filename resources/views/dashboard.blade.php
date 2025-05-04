<head>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<div class="container">
    @auth
        <span >Hi there {{auth()->user()->name}}</span>
    @endauth
    <div class="navbar">
          <ul>
            <button id ="dashboard" onclick="window.location.href='dashboard'"><li>Dashboard</li></button>
            <button onclick="window.location.href='create'"><li>Create Ticket</li></button>
            <button onclick="window.location.href='myTickets';"><li>My Tickets</li></button>
            <button id="logout" onclick="window.location.href='logout';"><li>Log Out</li></button>
        </ul>
    </div>
    
    <table >
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Assigned To</th>
            <th>Status</th>
            <th>Created at</th>
            <th>Edit</th>
        </tr>
        @if($dash->isNotEmpty())
            @foreach ($dash as $data)
            <tr>
                <td>{{$data->title}}</td>
                <td>{{$data->description}}</td>
                <td>{{$data->assigned_to}}</td>
                <td>{{$data->status}}</td>
                <td>{{$data->created_at}}</td>
                <td><button onclick="window.location.href='{{route('editData',$data->id)}}'">Edit</button></td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">You have no Tikcets</td>
            </tr>
        @endif
    </table>
    
    <br><br><br>
    

</div>
