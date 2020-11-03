<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Relatório | TaggingRepository</title>
</head>

<body>

    <div class="container border mt-4">
        <div class="row">
            <div class="col-md-12 align-self-center mt-4">
                <div class="text-center">
                    <h1>Repositórios</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 align-self-center mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Linguagem</th>
                            <th scope="col">Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($repositoriesResult as $repository)
                        <tr>
                            <th scope="row">{{ $repository['id'] }}</th>
                            <td>{{ $repository['full_name'] }}</td>
                            <td>{{ $repository['language'] }}</td>
                            <td>
                                <a href="{{ $repository['html_url'] }}">
                                    {{ $repository['html_url'] }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center mt-4">
                <a class="btn btn-primary d-print-none" onclick="window.print()">Imprimir</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
</body>

</html>