<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/logo/favicon.png')}}" type="image/png">
</head>

<body>
@include('template.partialsvert.sidebar')
@include('template.partialsvert.navbar')
            <div id="main-content">
@include('template.partialsvert.judul')
@include('template.partialsvert.content')
</div>

@include('template.partialsvert.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('mazer/assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset('mazer/assets/js/app.js')}}"></script>
    
    
    
</body>

</html>
