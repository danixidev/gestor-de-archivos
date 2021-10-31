<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de archivos</title>

    <style>
        section {
            margin-top: 15px;
        }

        img {
            height: 50px;
            margin-right: 10px;
        }

        .elementoLista {
            display: flex;
            align-items: flex-end;
            height: 50px;
            margin: 5px;
            font-family: sans-serif;
            font-size: 1.1rem;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid black;
        }
    </style>

</head>
<body>
    <form action="{{route('inicio')}}">
    
        @csrf
        <input type="submit" value="Volver a inicio">
    </form>

    <section>

        @for ($i = 0; $i < count($listado); $i++)

            @if(explode('/',Storage::disk('local')->mimeType('\public\archivos\\'.$listado[$i]))[0] == 'image')
                <div class="elementoLista"><a href={{$archivo[$i]}}><img src={{$archivo[$i]}}>{{ $listado[$i] }}</a></div>
            @else
                <div class="elementoLista"><a href={{$archivo[$i]}}>{{ $listado[$i] }}</a></div>
            @endif
        @endfor

    </section>
</body>
</html>