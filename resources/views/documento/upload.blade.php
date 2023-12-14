<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI Solucions</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="antialiased">
    <!-- resources/views/upload.blade.php -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('upload.post') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="file">Choose a file:</label>
        <input type="file" name="file" id="file">

        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
    <button class="btn btn-success process">Processar Fila</button>
    <script>
        $(document).ready(function() {

            $('.process').click(function(e) {
                $.ajax({
                    url: "{{ route('queue.start') }}",
                    type: "GET",
                    dataType: "json",
                    async: false,
                    success: function() {
                        swal.fire("Sucesso!", "Produto editado com sucesso", "success")
                            .then((result) => {
                                location.reload();
                            });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal.fire("Ops!", "Não vou possível editar o Produto", "error")
                            .then((result) => {
                                location.reload();
                            });
                    }
                });
            });

        });
    </script>
</body>


</html>
