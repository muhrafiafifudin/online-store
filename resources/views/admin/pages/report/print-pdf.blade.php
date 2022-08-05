<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            padding-left: 30px;
            padding-right: 30px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2 class="text-center">PT. DIVA METAL MANDIRI</h2>
    <h3 class="text-center">Sales Report</h3>
    <p class="text-center">From : {{ date('d M Y', strtotime($fromDate)) }} To : {{ date('d M Y', strtotime($toDate)) }}</p>

    <table width="100%">
        <tr>
            <th>No.</th>
            <th>Transaction Code</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
        @php $no=1; @endphp
        @foreach ($transactions as $transaction)
            <tr class="text-center">
                <td>{{ $no++ }}</td>
                <td>{{ $transaction->order_number }}</td>
                <td>{{ date('d M Y', strtotime($transaction->created_at)) }}</td>
                <td>{{ $transaction->name }}</td>
                <td>IDR. {{ number_format($transaction->total, 2, ',', '.') }}</td>
                <td>
                    @php
                        switch ($transaction->process) {
                        case 0:
                            echo 'Order';
                            break;
                        case 1:
                            echo 'Process';
                            break;
                        case 2:
                            echo 'Delivery';
                            break;
                        default:
                            echo 'Finish';
                        }
                    @endphp
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
