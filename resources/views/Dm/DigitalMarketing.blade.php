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
            Digital-Marketing
        </h1>

        @if ($message = Session::get('message'))
            <h2>{{$message}}</h2>       
        @endif

    </center>

    <center>
        <form action="{{route('digitalmarkating.store')}}" method="post" enctype="multipart/form-data" id="form">
            @csrf
            <table>
                <tr>
                    <th>
                        Name:
                    </th>
                    <td>
                        <input type="text" name="name" placeholder="Enter Name" class="txt" />
                    </td>
                </tr>
                <tr>
                    <th>
                        Stock-Photo:
                    </th>
                    <td>
                        <input type="file" name="photo" class="txt"/>
                    </td>
                </tr>
                <tr>
                    <th>
                        Rate:
                    </th>
                    <td>
                        <input type="text" name="rate" placeholder="Enter Rate" class="txt"  />
                    </td>
                </tr>
                <tr>
                    <th>
                        Category:
                    </th>
                    <td>
                        <select name="category">
                            <option>AAPL</option>
                            <option>BA</option>
                            <option>DIS</option>
                            <option>GE</option>
                            <option>HD</option>
                            <option>NKE</option>
                            <option>SBUX</option>
                            <option>BRK-B</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>
                        Quantity:
                    </th>
                    <td>
                        <input type="text" name="quantity" placeholder="Enter Quentity" class="txt" />
                    </td>
                </tr>
                <tr>
                    <th colspan="2">
                        <button type="submit">Submit</button>
                    </th>
                </tr>
            </table>
        </form>
    </center>

</body>
</html>