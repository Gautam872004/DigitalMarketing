<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital-View</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    
    <center>
        <h1>
            Digital-View
        </h1>

        @if ($message = Session::get('message'))
            <h2>{{$message}}</h2>       
        @endif
    </center>

    <center>

        <table border="5" cellpadding="2" cellspcaing="5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>stock-Photo</th>
                    <th>Rate</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                    <tr>
                        <td class="view">{{$row->dm_id}}</td>
                        <td class="view">{{$row->name}}</td>
                        <td class="view">
                            {{-- (1)   --}}<img src="{{ url('/uploads/'.$row->photo) }}" width="100"/>
                            {{-- (2)  <img src="{{ asset('/uploads/')."/".$row->photo }}" width="100"/> --}}
                        </td>
                        <td class="view">{{$row->rate}}</td>
                        <td class="view">{{$row->category}}</td>
                        <td class="view">{{$row->quantity}}</td>
                        <td class="edit">
                            <a href="{{ route('digitalmarkating.edit',$row->dm_id) }}">EDIT</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('digitalmarkating.destroy',$row->dm_id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dlt" >DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>

</body>
</html>