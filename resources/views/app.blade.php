<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title inertia>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Open+Sans&display=swap"
        rel="stylesheet">

  <!-- Scripts -->
  @routes
  @vite('resources/js/app.js')
  @viteReactRefresh
  @vite(['resources/js/app.tsx', "resources/js/Pages/{$page['component']}.tsx"])
  @inertiaHead
</head>
  <body class="font-sans antialiased">
    @inertia
  </body>
</html>
