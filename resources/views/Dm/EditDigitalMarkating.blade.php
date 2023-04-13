<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital-Marketing</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    
    <center>
        <h1>
            Edit-Digital-Marketing
        </h1>

        @if ($message = Session::get('message'))
            <h2>{{$message}}</h2>       
        @endif

    </center>

    <center>
        <form enctype="multipart/form-data" action="{{route('digitalmarkating.update',$digitalmarkating->dm_id)}}" method="post">
            @method('PUT')
            @csrf
            <table>
                <tr>
                    <th>
                        Name:
                    </th>
                    <td>
                        <input type="text" name="name" placeholder="Enter Name" class="txt" value="{{$digitalmarkating->name}}" />
                    </td>
                </tr>
                <tr>
                    <th>
                        Stock-Photo:
                    </th>
                    <td>
                        <input type="file" name="photo" class="txt"/>
                        <input type="hidden" name="oldphoto" value="{{$digitalmarkating->photo}}"/>
                        <img src="{{ url('/uploads/'.$digitalmarkating->photo) }}" width="100"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        Rate:
                    </th>
                    <td>
                        <input type="text" name="rate" placeholder="Enter Rate" class="txt" value="{{$digitalmarkating->rate}}" />
                    </td>
                </tr>
                <tr>
                    <th>
                        Category:
                    </th>
                    <td>
                        <select name="category">
                            <option @if ($digitalmarkating ->category == "AAPL") selected @endif >AAPL</option>
                            <option @if ($digitalmarkating ->category == "BA") selected @endif>BA</option>
                            <option @if ($digitalmarkating ->category == "DIS") selected @endif>DIS</option>
                            <option @if ($digitalmarkating ->category == "GE") selected @endif>GE</option>
                            <option @if ($digitalmarkating ->category == "HD") selected @endif>HD</option>
                            <option @if ($digitalmarkating ->category == "NKE") selected @endif>NKE</option>
                            <option @if ($digitalmarkating ->category == "SBUX") selected @endif>SBUX</option>
                            <option @if ($digitalmarkating ->category == "BRK-B") selected @endif>BRK-B</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>
                        Quantity:
                    </th>
                    <td>
                        <input type="text" name="quantity" placeholder="Enter Quentity" class="txt" value="{{$digitalmarkating->quantity}}" />
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button type="submit">Updated</button>
                    </th>
                </tr>
            </table>
        </form>
    </center>

</body>
</html>