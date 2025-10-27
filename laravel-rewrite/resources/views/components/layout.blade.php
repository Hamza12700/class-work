<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/htmx.org@2.0.7/dist/htmx.min.js"></script>

    <title>{{ $title }}</title>
    <link rel="icon" href="{{ config('app.icon') }}" type="image/x-icon">
    @vite('resources/css/app.css')
  </head>
  <body @if($background) style="background: url('/texture2.png');" @endif>
    {{ $slot }}
  </body>
</html>
