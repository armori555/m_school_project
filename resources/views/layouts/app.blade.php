<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'My Website') }}</title>
    {{-- Bootstrap 5 for quick styling --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        header {
            background: #0d6efd;
            color: white;
            padding: 10px 20px;
        }
        header .logo {
            font-weight: bold;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
        }
        header .logo img {
            height: 35px;
            margin-right: 10px;
        }
        .content-wrapper {
            padding: 20px;
        }
    </style>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
<header style="padding: 7px;">
    <div class="logo" style="display: flex; align-items: center; gap: 0px;">
        <a href="{{ '/' }}" style="color:black; text-decoration:none; display:flex; align-items:center; gap:0px;">
            <img src="{{ asset('https://media.discordapp.net/attachments/707690229305180272/1411760598877999104/image2.png?ex=68b5d404&is=68b48284&hm=c5cec56b5a7e8d1923401daebb5c1c3e2def4247da52d73523b89eea08076a00&=&format=webp&quality=lossless') }}" 
                 alt="Logo" 
                 style="width:50px; height:auto;">
            <span style="font-size:20px; font-weight:bold;">
                {{ config('app.name', 'Student Management') }}
            </span>
        </a>
    </div>
</header>


    <main class="content-wrapper">
        @yield('content')
    </main>

    {{-- Bootstrap JS (optional) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
