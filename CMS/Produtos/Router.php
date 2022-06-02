<?php


$action = (string)null;
$componente = (string)null;

/*validando se o metodo do index é post ou get*/  /* o post vai pegar so os dados do usuario */  /*o get chamar a controller que tem aver com os dados do user (se ele quer insiri/deletar/ comer kkkkkk etc...)*/
if($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET' ){

    $componente = strtoupper($_GET['componente']);       
    $action = strtoupper($_GET['action']);

    //estrura condicional para avalidar quem esta solicitando  algo
       switch($componente){

            case 'CONTATOS' ;
               
              require_once('Controller/ControllerProdutos.php');

              if($action == 'INSERIR')
                    {
                        if(isset($_FILES) && !empty($_FILES))
                        {
                            //Chama a função de inserir na controller
                            $resposta = inserirProduto($_POST, $_FILES);
                        }else{
                            $resposta = inserirProduto($_POST, null);
                        }    
                        //Valida o tipo de dados que a controller retornou
                        if(is_bool($resposta)) //Se for booleano
                        {
                            //Verificar se o retorno foi verdadeiro
                            if($resposta) 
                                echo("<script>
                                        alert('Registro Inserido com sucesso!');
                                        window.location.href = 'index.php'; 
                                    </script> ");
                        //Se o retorno for um array significa houve erro no processo de inserção           
                        }elseif (is_array($resposta)) 
                            echo("<script>
                                    alert('".$resposta['message']."');
                                    window.history.back(); 
                                </script> ");   
                    }elseif ($action == 'DELETAR') {
                //Recebe o id do registro que devera ser excluido,
                //que foi enviado pela url no link da imagem
                //do excluir que foi acionado na index
                $idprodutos = $_GET['idprodutos'];
                $foto = $_GET['foto'];

                $arrayDados = array (
                  "id"     =>  $idprodutos,
                  "foto"   =>  $foto 
               );

                $resposta = excluirProduto($arrayDados);

                if (is_bool($resposta))
                {
                  if($resposta)
                  {
                      echo("<script>
                              alert('Registro Excluído com sucesso!');
                              window.location.href = 'index.php'; 
                          </script> ");
                  }
                }
                elseif (is_array($resposta)){
                  echo("<script>
                  alert('".$resposta['message']."');
                  window.history.back();
                  </script>");
                }
               

             
            }elseif ($action == 'BUSCAR'){
              //Recebe o id do registro que devera ser excluido,
               //que foi enviado pela url no link da imagem
               //do excluir que foi acionado na index
               $idprodutos = $_GET['idprodutos'];
              
               
               //Chama a função de excluir na controller
               $resposta = buscarProduto($idprodutos);
               
              
             //Ativando a utilização variavel de sessão no servidor
             session_start();
             //Guarda em uma variavel de sessao que o banco de dados retornou para buscar do id
             //Obs(essa variavel de sessão sera utilizada na index.php, para colocar nas caixas de texto)
             $_SESSION['dadosProdutos'] = $resposta;

           //Utilizando o require iremos apenas importar a tela da index,
           //assim não  havera um novo carregamento da pagina
             require_once('index.php');

           }elseif($action == 'EDITAR'){
            //Recebe o id que foi encaminhado no action do form pela URL
            $idprodutos = $_GET['idprodutos'];

            //Recebe o nome da foto que foi enviada pelo GET do form
            $foto = $_GET['foto'];

            //Cria um array contendo o id e o nome da foto para enviar a controller
            $arrayDados = array (
                "id"    =>  $idprodutos,
                "foto"  =>  $foto,
                "file"  =>  $_FILES 
            );

            //Chama a função de editar na controller
            $resposta = atualizarProduto($_POST, $arrayDados);
            //Valida o tipo de dados que a controller retornou
            if(is_bool($resposta)) //Se for booleano
            {
                //Verificar se o retorno foi verdadeiro
                if($resposta) 
                    echo("<script>
                            alert('Registro Atualizado com sucesso!');
                            window.location.href = 'index.php'; 
                        </script> ");
            //Se o retorno for um array significa houve erro no processo de inserção           
            }elseif (is_array($resposta)) 
                echo("<script>
                        alert('".$resposta['message']."');
                        window.history.back(); 
                    </script> ");  
        }
          break;
       }
    }


?>