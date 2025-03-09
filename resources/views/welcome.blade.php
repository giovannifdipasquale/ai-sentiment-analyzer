<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ai API test</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                @livewire('sentiment-analyzer')
            </div>
            <div class="col-6 ">
                @livewire('chat-api')
            </div>
        </div>
    </div>
</body>

</html>