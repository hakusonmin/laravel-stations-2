<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
  </head>
  <body>

    <header id="header">
      <h1 class="site-title">
        <a href="#">映画館サイト</a> 
      </h1>
      <nav>
        <ul>
          <li><a href="#gadgets">映画一覧</a></li>
          <li><a href="#about">シート一覧</a></li>
          <li><a href="#about">座席一覧</a></li>
          <li><a href="#news">管理者画面</a></li>            
        </ul>
      </nav>
    </header>

    <main>
        @yield('content') <!-- 各ページの内容がここに入る -->
    </main>

  </body>
</html>