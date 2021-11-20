<!DOCTYPE html>
<html>
    <head>
        <title>Report Data Pembayaran</title>
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
            <h5>Report Data Pembayaran</h5>
        </center>
        <table class='table table-bordered'>
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Admin</th>
                <th>Nama Grup</th>
                <th>Jumlah Pembayaran</th>
                <th>Bukti Transfer</th>
                <th>Status Pembayaran</th>
            </tr>
            </thead>
        <tbody>
        @php 
            $no=1 
        @endphp
        @foreach($Payment as $item)
        @php $image = $item->transfer_slip != null ? str_replace('storage/','',$item->transfer_slip):null @endphp
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->admin_name}}</td>
                <td>{{$item->group_name}}</td>
                <td>{{$item->payment_amount}}</td>
                <td>
                    @if($image != null)
                        <img src="{{storage_path('app/public/' . $image)}}" width="100px"></td>
                    @endif
                <td>{{$item->payment_status}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </body>
</html>