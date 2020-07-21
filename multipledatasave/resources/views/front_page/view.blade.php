<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <title>Multiple Data Save</title>
</head>
<body>
    <div class="container">
        <br/>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Customer Name</th>
                    <th>Order Id</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                ?>
                @foreach($orders as $data)
                @php ($no++)
                <tr>
                    <td><?php echo $no;?></td>
                    <td>{{$data->customer_name}}</td>
                    <td><a href="items/{{$data->id}}"> {{$data->id}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
     
</body>
</html>