<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<header class="bg-primary" style="height: 75px;">
    <div class="container text-center m-auto">
        <h4 style="line-height: 75px; color: whitesmoke;">Tank Management System</h4>
    </div>
</header>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mt-5">
            <h5 class="mb-4">Main Tank</h5>
            <div class="progress bg-primary" style="height: 180px; border: 1px solid black; border-radius: 20%;">
                <div class="progress-bar bg-light" role="progressbar"
                     style="width: 100%; height: {{180 - ($systemDevices->where('name' , 'Main Tank Sensor')->first()->value)}}px;"
                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><h6
                        style="position: absolute; color: #1a202c;">{{$systemDevices->where('name' , 'Main Tank Sensor')->first()->value}} CM</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5">
            <h5 class="mb-4">Sub Tank</h5>
            <div class="progress bg-primary" style="height: 180px; border: 1px solid black; border-radius: 20%;">
                <div class="progress-bar bg-light" role="progressbar"
                     style="width: 100%; height: {{180 - ($systemDevices->where('name' , 'Sub Tank Sensor')->first()->value)}}px;"
                     aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><h6
                        style="position: absolute; color: #1a202c;">{{$systemDevices->where('name' , 'Sub Tank Sensor')->first()->value}} CM</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <img src="{{\Illuminate\Support\Facades\URL::asset('images/download.png')}}">
        @if($systemDevices->where('name' , 'Relay')->first()->relay_command)
            <span class="bg-success d-inline-block" style="color: whitesmoke; width: 50px;">ON</span>
        @else
            <span class="bg-danger d-inline-block" style="color: whitesmoke; width: 50px;">OFF</span>
        @endif
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</html>
