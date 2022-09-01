<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>

<body>
    <div style="border:solid 0.5px black;">
        <div style="background-color: #FFBA08;border-bottom:solid 0.5px black;">
            <img src="http://localhost:8000/image/logo1.png" alt=""
                style="height: 60px;margin-left:5vw;margin-top:20px;">
        </div>
        <div style="background-color: #f2f2f2;height:60vh;border-radius:10px;box-shadow:black 10px">
            <div style="margin-left:5vw;margin-right:40vw;">
                <br>
                <p>da: presto.it - AdminMail</p>
                <hr>
                <h2>Un utente ha richiesto di lavorare con noi</h2>
                <h3>Ecco i suoi dati:</h3>
                <hr>
                <ul>
                    <li>Nome: {{ $user->name }}</li>
                    <li>Email: {{ $user->email }}</li>
                </ul>
                <hr>
                <p>Se vuoi renderlo revisore clicca qui:</p>
                <button class="btn" type="submit" style="background-color:#FFBA08;border:solid 0px;border-radius:5px;padding:8px;margin-left:4vw;margin-top:15px;"><a style="font-weight: bold;text-decoration:none;color:black;" href="{{ route('makeRevisor', compact('user')) }}">Rendi revisore</a></button>
            </div>
        </div>
        <div style="background-color: #f4c550;height:40vh;border-top:solid 0.5px black;">
            <div style="margin-left:5vw;margin-top:10px">
                <p>presto@noreplay.it</p>
                <p>M: +39 3509130628</p>
        
                <p style="font-weight:bolder;">presto.it</p>
                <p style="font-size:8px;line-height:10px;font-style:italic;font-family:Arial;padding-top:10px;">
                    Strada S. Giorgio Martire, 2D • 70124 Bari (BA)
                    T. +39 392 602 46 21 | aulab.it
                    The information transmitted through this e-mail and its attachments is directed exclusively at the recipient and must be considered confidential with the prohibition of dissemination and use in judgments unless expressly authorized, according to the terms of d. L.vo n. 196/03 on privacy and E. R. EU 679/2016 - GDPR . The dissemination and communication by a subject different from the recipient is prohibited by art. 616 and ss. c.p.. If this e-mail and its attachments were received by mistake from a different person from the recipient, please destroy all that received and inform the sender with the same mean.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
