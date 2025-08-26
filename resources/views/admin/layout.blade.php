<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #FFF9F7;
            font-family: 'Segoe UI', sans-serif;
        }
        .sidebar {
            height: 100vh;
            background: #F4C7C3;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #5C3A3A;
            text-decoration: none;
            font-weight: 500;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #F28C8C;
            color: white;
            border-radius: 8px;
        }
        .topbar {
            background: #F28C8C;
            color: white;
            padding: 12px 20px;
            font-weight: bold;
        }
        .table-hover tbody tr:hover {
            background-color: #FDE2E0;
        }
    </style>
</head>
<body>
<div class="d-flex">
    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    {{-- Main Content --}}
    <div class="flex-grow-1">
        <div class="topbar">
            @yield('page_title', 'Dashboard')
        </div>

        <div class="container py-4">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
