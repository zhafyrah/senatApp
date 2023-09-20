<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Senat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            padding: 20px;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{asset('/img/logopolindra.png')}}" alt="polindra" style="width: 100px;">
            <h1>Website Senat</h1>
        </div>
        <div class="content">
            <p>Halo {{$komentar['receiver']->nama}},</p>
            <p>Komentar Dokumen Komisi: </p>
            <p>{{$komentar['komentar']}}</p>

            <p>Silahkan tinjau lebih lanjut di Website Senat Polindra</p>
            <p>Tertanda,</p>
            <p>{{$komentar['user']->nama}}</p>
        </div>
    </div>
</body>

</html>