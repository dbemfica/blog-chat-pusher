<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .screen{
            border: 1px solid #ccc;
            min-height: 400px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chat</h1>
        <div class="row">
            <div class="col-md-12">
                <div id="screen" class="screen"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input id="nome" type="text" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group">
                    <textarea id="mensagem" class="form-control" rows="5" placeholder="Mensagem"></textarea>
                </div>
                <div class="form-group">
                    <button id="btn" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-1.12.4.js"
        integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
        crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
    <script>
        $("document").ready(function(){
            $("#btn").click(function(){
                var nome = $("#nome").val();
                var mensagem = $("#mensagem").val();
                console.log(nome);
                console.log(mensagem);
                $("#mensagem").val('');

                $.ajax({
                    url: "post.php",
                    method:'post',
                    dataType: 'json',
                    data: {
                        nome: nome,
                        mensagem:mensagem
                    }
                });
            })

            Pusher.logToConsole = true;

            var pusher = new Pusher('YOUR_APP_ID');

            var channel = pusher.subscribe('canal');
            channel.bind('enviar-mensagem', function(data) {
                $("#screen").append("<p><b>"+data.nome+"</b>: "+data.mensagem+"</p>");
            });
        })
    </script>
</body>