<!DOCTYPE html>
<html>
    <head>
        <title>Report Data Grup</title>
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
            <h5>Report Data Grup</h5>
        </center>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Admin</th>
                <th>Nama Grup</th>
                <th>Link Grup</th>
                <th>Jumlah Member</th>
                <th>Harga Pembayaran</th>
            </tr>
            </thead>
        <tbody>
        @php 
            $no=1 
        @endphp
        @foreach($Group as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->admin_name}}</td>
                <td>{{$item->group_name}}</td>
                <td>{{$item->group_link}}</td>
                <td>{{$item->total_member}}</td>
                <td>{{$item->payment_price}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </body>
</html>