<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>MoneyMate - {{ $title ? $title : 'Home' }}</title>

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link href="https://fonts.bunny.net/css?family=lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />

  @vite('resources/css/app.css')
</head>

<body class="antialiased" x-data="helpers" :data-mode="$store.darkMode.on ? 'dark' : 'light'">
  {{ $slot }}

  <x-shared.notification></x-shared.notification>

  {{-- Ion Icons --}}
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  {{-- Ion Icons --}}

  @vite('resources/js/app.js')

</body>

</html>
