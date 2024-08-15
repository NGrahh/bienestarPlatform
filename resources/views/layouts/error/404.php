<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=w, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            background-color: red;
            font-family:monospace;
        }

        .conten{
            display: grid;
            place-items: center;
        }

        h1{
            font-size: 20rem;
            margin-top: 2rem;
            font-weight: bold;
            color: white;
        }
        h2{
            color: white;
            font-size: 3rem;
            margin-top: -25rem;
        }
        h3{
            color: white;
            margin-top: -21rem;
        }
        button{
            background: black;
            color: white;
            border: 3px solid black;
            width: 9rem;
            height: 3rem;
            font-size: 22px;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.50s;
            
        }

        button:hover{
            background: transparent;
            border: 3px solid black;
            color: black;
            transition: all 0.50s ease;
        }

        a{
            margin-top: -15rem;
        }
    </style>
</head>
<body>
    <div class="conten">
        <h1>404</h1>
        <h2>Página no encontrada</h2>
        <h3>¡Lo sentimos! La pagina no se pudo encontrar, por favor regresa al inicio he intenta en otro lado</h3>
        <a href="{{route('pagina-principal')}}"><button>Regresar</button></a>
    </div>
</body>
</html>