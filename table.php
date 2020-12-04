<?php
include_once 'desafio.php';
$data = Desafio::index();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title> Desafio</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

    <div class="top">
        <div class="row align-items-center">
            <div class="col" >
                <img src="logo.png" alt="..." class="img">
            </div>
        </div>

    </div>
    
    
    <div class="container">
        <div class="row">

            <div class="input-group col-md-4">
                <input type="text" class="form-control" placeholder="Digite ao menos 3 caracteres...">
                <div class="input-group-append">
                <button class="btn btn-secondary" type="button">
                    <i class="fa fa-search"></i>
                </button>
                </div>
            </div>
        </div>
    

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">Perfil</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data['all'] as $user): ?>
                    <tr>
                        <td scope="row"><?= $user['name']  ?></td>
                        <td scope="row"><?= $user['email']  ?></td>
                        <td scope="row"><?= $user['empresa']  ?></td>
                        <td scope="row"><?= $user['perfil'] ?></td>
                        <td scope="row"><?= $user['status'] ?></td>
                        
                    </tr>

                    <?php endforeach ?>
                </tbody>
            </table>

    </div>

       

</body>
</html>
