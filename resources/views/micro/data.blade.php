<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>ini adalah data</h1>
<h2>ggg</h2>
<h3>gg</h3>
    @foreach ($data as $a)
        <ul>
            <li>{{ $a->id }}</li>
        </ul>
    @endforeach
</body>
</html>
