<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste Home</title>
</head>

<body>
    <h1>Teste Home</h1>
    @if (session('user'))
        <pre>{{ json_encode(session('user'), JSON_PRETTY_PRINT) }}</pre>
    @else
        <pre>nada aqui</pre>
    @endif
</body>

</html>