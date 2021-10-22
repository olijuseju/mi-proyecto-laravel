<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<input type="text" name="name" value="{{old('num')}}">
<a type="submit" href="{{route('lecturas.show', $num)}}">Buscar</a>
<ul>
    @foreach($lecturas as $lectura)
        <li><a href="">{{$lectura}}</a></li>
    @endforeach
</ul>


</body>
</html>
