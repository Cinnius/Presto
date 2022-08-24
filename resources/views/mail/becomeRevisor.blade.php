<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <h1>Un utente ha richiesto di lavorare con noi</h1>
    <h2>Ecco i suoi dati:</h2>
    <ul>
        <li>Nome: {{$user->name}}</li>
        <li>Email: {{$user->email}}</li>
    </ul>
    <p>Se vuoi renderlo revisore clicca qui:</p>
    <a href="{{route('makeRevisor',compact('user'))}}">Rendi revisore</a>

</body>
</html>
