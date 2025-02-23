<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Omni Panel</title>
        <meta content="" name="description">
        <meta content="" name="keywords">  
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        @vite('resources/css/app.css')        

        <!-- Google Fonts -->
        <link href="{{ asset("https://fonts.gstatic.com") }}" rel="preconnect">
        <link href="{{ asset("https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i") }}" rel="stylesheet">
        <link href="{{ asset("https://fonts.googleapis.com/css?family=Karla:400,700&display=swap") }}" rel="stylesheet">                
        <link href="{{ asset("https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300;400;500;600;700&display=swap") }}" rel="stylesheet">
        <link href={{ asset("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css") }} rel="stylesheet">
           
    </head>
    <body class="flex min-h-screen">        

        @if (!request()->routeIs(['login', 'register', 'forgot-password']))
            <!-- ======= Sidebar ======= -->
            <x-navbar></x-navbar  >
            <!-- End Sidebar-->
        @endif
        
        
        <!-- ======= Main Content ======= -->
        <main class="flex-1 flex flex-col h-screen overflow-auto ">
            <main class="flex-1 bg-white">
                {{ $slot }}
            </main>                    

            @if (!request()->routeIs(['login', 'register', 'forgot-password']))
                <!-- ======= Footer ======= -->
                <footer id="footer" class="p-4 bg-gray-700 text-white text-center">
                    <div class="copyright">
                    &copy; Copyright <strong><span>zan-dev</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">Zan-Dev</a>
                    </div>
                </footer>
                <!-- End Footer -->
            @endif
        </main>
        <!-- End Sidebar-->        

        {{-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> --}}

        <!-- Template Main JS File -->   
        <script src="{{ asset("https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js") }}" defer></script>         
        <script src="{{ asset("https://cdn.tailwindcss.com") }}"></script>    
    </body>   
</html>