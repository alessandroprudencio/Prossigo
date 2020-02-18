<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensagem De Contato Realizado</title>
    <style>
        body{
            background-color: #F5F5F5;
        }
    </style>
</head>
<body>
    <div class="row">
    <div class="col-12"><h1>Dados do remetente</h1></div>
        <div class="col-6"><h4>Nome : <i>{{ucfirst($details['name'])}}</i></h4></div>
        <div class="col-6"><h4>Email : <i>{{$details['email']}}</i></h4></div>
        <div class="col-12"><h4>Telefone : <i>{{"(".substr($details['phone'],1,2).") ".substr($details['phone'],4,-5)." - ".substr($details['phone'],-4)}} </i></h4></div>
        <div class="col-12"><h4>Data do envio : <i>{{ date('d/m/Y H:m:s', strtotime($details['created_at'])) }}   </i>     </h4></div>
        <div class="col-12"><h4>Ip do remetente : <i>{{$details['sender_ip']}}   </i>     </h4></div>
        <div class="col-12"><h4>Mensagem :  <blockquote> <h3><i>{{$details['message']}}</i></h3> </blockquote></h4></div>
    </div>
    
</body>
</html>