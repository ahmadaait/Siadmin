<!DOCTYPE html>
<html>
    <head>
        <title>Report Data Pemasangan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>Report Data Pemasangan</h5>
        </center>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Admin</th>
                <th>Nama Grup</th>
                <th>Tanggal Pemasangan</th>
            </tr>
            </thead>
        <tbody>
        @php 
            $no=1 
        @endphp
        @foreach($Installation as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->admin_name}}</td>
                <td>{{$item->group_name}}</td>
                <td>{{date('Y-m-d', strtotime($item->installation_date))}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </body>
</html>