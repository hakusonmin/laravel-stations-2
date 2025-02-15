<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #000;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>
    <table>
        @foreach ($sheets->chunk(5) as $row) 
            <tr>
                @foreach ($row as $sheet)
                    <td>{{ $sheet->row . '-' . $sheet->column }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>