<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>test</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  @yield('css')
  <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
  @livewireStyles
</head>

<body>
  @yield('content')
</body>

</html>