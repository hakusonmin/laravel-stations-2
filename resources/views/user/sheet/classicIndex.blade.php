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

    /* 予約済みの席の背景をグレーにする */
    .reserved {
      background-color: gray;
      color: white;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <table>
    @foreach ($sheets->chunk(5) as $row)
      <tr>
        @foreach ($row as $sheet)
          <td class="{{ $sheet->is_reserved ? 'reserved' : '' }}">
            {{ $sheet->row . '-' . $sheet->column }}
          </td>
        @endforeach
      </tr>
    @endforeach
  </table>

  @if ($errors->any())
    <div class="error">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if (session('message'))
    <div class="message">
      {{ session('message') }}
    </div>
  @endif
</body>

</html>
