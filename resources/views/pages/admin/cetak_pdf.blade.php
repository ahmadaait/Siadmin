<!DOCTYPE html>
<html>
    <head>
        <title>Report Data Admin</title>
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
            <h5>Report Data Admin</h5>
        </center>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Admin</th>
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
                <th>A/N Bank</th>
            </tr>
            </thead>
        <tbody>
        @php 
            $no=1 
        @endphp
        @foreach($Admin as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->admin_name}}</td>
                <td>{{$item->bank_name}}</td>
                <td>{{$item->rekening_number}}</td>
                <td>{{$item->bank_personal_name}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </body>
</html>