<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">
  <title>SSMS</title>

  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.2.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
  <header class="breadcrumbs flex select-none justify-between px-12 pt-8 pb-4 text-sm">
    {{ $breadcrumb }}

    <div>
      <label class="swap swap-rotate">
        <input type="checkbox" />

        <x-heroicon-o-sun class="swap-on h-7 w-7" />
        <x-heroicon-o-moon class="swap-off h-7 w-7" />
      </label>
    </div>
  </header>
  <main class="relative flex min-h-screen flex-col" id='root'>
    {{ $slot }}
  </main>
</body>

</html>
