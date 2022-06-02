<?php

/*validando se o metodo do index é post ou get*/  /* o post vai pegar so os dados do usuario */  /*o get chamar a controller que tem aver com os dados do user (se ele quer insiri/deletar/ comer kkkkkk etc...)*/
if($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ){

    $componente = strtoupper($_GET['componente']);       
    $action = strtoupper($_GET['action']);

    //estrura condicional para avalidar quem esta solicitando  algo
       switch($componente){

            case 'CONTATOS' ;
               
              require_once('../Contatos/Controller/ControllerContatos.php');

                        }if ($action == 'DELETAR') {
                          //Recebe o id do registro que devera ser excluido,
                          //que foi enviado pela url no link da imagem
                          //do excluir que foi acionado na index
                          $idcontato = $_GET['idcontatos'];

                          $resposta = excluirContatos($idcontato);

                          if (is_bool($resposta))
                          {
                            
                            echo("<script>
                            alert('REGISTRO excluido COM SUCESSO');
                            window.location.href = 'index.php';
                            </script>");
                            
                          }
                          elseif (is_array($resposta)){
                            echo("<script>
                            alert('".$resposta['message']."');
                            window.history.back();
                            </script>");
                          }
                         

                       
                      }

            }

        











?>