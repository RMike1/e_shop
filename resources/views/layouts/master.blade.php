<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="{{asset('assets/fonts/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/vanilla-zoom.min.css')}}">
   





</head>

<body>

    {{-- header --}}
  
        {{View::make('layouts.header')}}

    {{-- endheader` --}}

    {{-- content --}}

    @yield('content')

    {{-- endcontent --}}


    {{View::make('layouts.footer')}}

    <script>
        document.addEventListener("DOMContentLoaded", function(event){
            
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });
    
        window.onbeforeunload = function(e){
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>


    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="{{asset('assets/js/vanilla-zoom.js')}}"></script>
    <script src="{{asset('assets/js/theme.js')}}"></script>



</body>

</html>