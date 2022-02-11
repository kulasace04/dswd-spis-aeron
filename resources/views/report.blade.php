<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <style type="text/css">
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
          text-align: center;
          padding: 1em;
        }
        .no-border{
            border: 0 !important;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Social Pension Report of 2019</h1>
    <h1>Number of Benificiaries per Barangay in Boliney,Abra</h1>
    <center>
    <table>
        <thead>
            <tr>
                <th class="no-border"></th>
                <th>Barangay</th>
                <th>Number of Benificiaries</th>
                <th>Number of Male</th>
                <th>Number of Female</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pensions->groupBy('barangay') as $grpPensions )
                <tr >
                    <td class="no-border"></td>
                    <td>{{ $grpPensions->first()->barangay_value }}</td>
                    <td>{{ $grpPensions->count() }}</td>
                    <td>{{ $grpPensions->where('sex', 'M')->count() }}</td>
                    <td>{{ $grpPensions->where('sex', 'F')->count() }}</td>
                </tr>
            @endforeach
            <tr>
                <td>Total</td>
                <td class="no-border"></td>
                <td>{{ $pensions->count() }}</td>
                <td>{{ $pensions->where('sex', 'M')->count() }}</td>
                <td>{{ $pensions->where('sex', 'F')->count() }}</td>
            </tr>
        </tbody>
    </table>
    </center>
</body>
</html>