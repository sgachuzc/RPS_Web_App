@props([
  'title' => ''
])

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/formsScript.js'])
  <title>RPS - {{ $title }}</title>
</head>
<body class="forms_body">
  <main class="container">
    {{ $slot }}
  </main>
</body>
</html>