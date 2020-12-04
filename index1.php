<?php
    include_once 'desafio.php';
    $data = Desafio::index();
    $start = 0;
    $end = 102;
    for ($i = 1; $i <= 10; $i++) {
        $cURLConnection = curl_init('https://api.moskitcrm.com/v1/deals/?start=' . $start . '&limit=100');
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
            'apikey: a4ca266a-ef70-462f-a5bd-abc6340928b0',
        ));

        $apiResponse = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        $jsonObj = json_decode($apiResponse);
        // $respostas = $jsonObj->results;
        // print_r($jsonObj);
        // print_r($jsonObj->results)
        // foreach ($jsonObj->results as $user){
        //     print_r($user->id);
        // }
        $end = $jsonObj->metadata->pagination->total;
        $start = $start + 100;
        $result = $jsonObj->results;
        // print_r($result)
    }
    
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title> Desafio</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>  
    <div class="top">
        <div class="row align-items-center">
            <div class="col" >
                <img src="index.png" alt="..." class="img">
            </div>
        </div>

    </div>
    
    
    <div class="container-fluid">
    Pesquisar
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
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">Negócio</th>
                        <th scope="col">Empreendimento</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Origem</th>
                        <th scope="col">Qualificação</th>
                        <th scope="col">Horário Adicionado</th>
                        <th scope="col">Mensagem</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($result as $user):
                        $date = new DateTime();    
                        $date->setTimestamp($user->dateCreated);
                        $finalDate = $date->format('d-m-Y H:i:s') . "\n";
                    ?>
                    <tr>
                        <td scope="row"><?= $user->name  ?></td>
                        <?php foreach ($user->customFieldValues as $values): 
                            $Empreendimento = '';
                            $Bairro = '';
                            $Origem = '';
                            $Qualificação = '';
                            $Mensagem = '';
                            if ($values->customField->name == 'Empreendimento'){
                                $Empreendimento = $values->label;
                            }
                            if ($values->customField->name == 'Bairro'){
                                $Bairro = $values->label;
                            }
                            if ($values->customField->name == 'Origem'){
                                $Origem = $values->label;
                            }
                            if ($values->customField->name == 'Qualificação'){
                                $Qualificação = $values->label;
                            }
                            if ($values->customField->name == 'Mensagem'){
                                $Mensagem = $values->label;
                            }
                        ?>
                        <?php endforeach ?>
                        <td scope="row"><?= $Empreendimento  ?></td>
                        <td scope="row"><?= $Bairro  ?></td>
                        <td scope="row"><?= $Origem  ?></td>
                        <td scope="row"><?= $Qualificação  ?></td>
                        <td scope="row"><?= $finalDate ?></td>
                        <td scope="row"><?= $Mensagem  ?></td>
                        <!-- <td> <i class="material-icons">more_vert</i></td> -->
                        
                        
                        
                    </tr>

                    <?php endforeach ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
            </ul>
            </nav>

    </div>

       

</body>
</html>
