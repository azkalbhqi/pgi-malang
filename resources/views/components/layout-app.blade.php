<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Official PGI Kota Malang</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="{!! asset('img/logo_pgi.png') !!}"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="min-h-screen bg-slate-50 text-slate-950 text-bold font-sans">

    <!-- Navbar -->
    <div class="sticky top-0 z-50 shadow-md w-full">
        <x-navbar></x-navbar>
    </div>

    <!-- Main Content -->
    <main class="min-h-screen"> <!-- Added padding-top to prevent overlap with sticky navbar -->
        {{ $slot }}
    </main>

    <!-- Footer -->
    <div class="relative bottom-0 left-0 right-0 w-full z-50 bg-white shadow-md">
        <x-footer></x-footer>
    </div>

    <!-- Flowbite Script -->
    @vite(['resources/js/flowbite.min.js'])
</body>
</html>
