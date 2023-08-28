<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    @vite(['resources/css/style.css', 
    'resources/js/main.js' ,
    'resources/js/lib/owlcarousel/assets/owl.carousel.min.css' 
    ,'resources/js/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css'  ])
    <title>Darna</title>
    @livewireStyles
</head>
<body>
    @include('partials.nav')
        @yield('container')
    @include('partials.footer')
  @livewireScripts
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>