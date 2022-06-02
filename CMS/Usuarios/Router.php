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
               
              require_once('./Controller/ControllerUsuarios.php');

                        if($action == 'INSERIR'){


                         $resposta =  inserirUsuarios($_POST);                                // esta colocando o return do inserirContatos na variavel %resposta

                               if(is_bool($resposta)){                                       // verificando se o return é booleano 
                                  echo("<script>
                                         alert('REGISTRO INSIRIDO COM SUCESSO');
                                         window.location.href = 'index.php';
                                         </script>");

                               }elseif(is_array($resposta)){                                      // (se nao) / verificando se o return é um arrey

                                echo("<script>
                                alert('".$resposta['message']."');
                                window.history.back();
                                </script>");

                               } 
                        }if ($action == 'DELETAR') {
                            //Recebe o id do registro que devera ser excluido,
                            //que foi enviado pela url no link da imagem
                            //do excluir que foi acionado na index
                            $idusuarios = $_GET['idusuarios'];
  
                            $resposta = excluirContatos($idusuarios);
  
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
                           
  
                         
                        }elseif ($action == 'BUSCAR'){
                          //Recebe o id do registro que devera ser excluido,
                           //que foi enviado pela url no link da imagem
                           //do excluir que foi acionado na index
                           $idusuario = $_GET['idusuarios'];
                          
                           
                           //Chama a função de excluir na controller
                           $resposta = buscarUsuarios($idusuario);
                           
                          
                         //Ativando a utilização variavel de sessão no servidor
                         session_start();
                         //Guarda em uma variavel de sessao que o banco de dados retornou para buscar do id
                         //Obs(essa variavel de sessão sera utilizada na index.php, para colocar nas caixas de texto)
                         $_SESSION['dadosUsuarios'] = $resposta;
 
                       //Utilizando o require iremos apenas importar a tela da index,
                       //assim não  havera um novo carregamento da pagina
                         require_once('index.php');
 
                       }elseif($action == 'EDITAR'){
                        //recebe o id que foi emcaminhado no action do form pela URL
                        $idusuarios = $_GET['idusuarios'];

                        //Chama A função atualizarContato
                        $resposta =  atualizarUsuarios($_POST , $idusuarios);                                // esta colocando o return do inserirContatos na variavel %resposta

                        if(is_bool($resposta)){                                       // verificando se o return é booleano 
                           echo("<script>
                                  alert('REGISTRO ATUALIZADO COM SUCESSO');
                                  window.location.href = 'index.php';
                                  </script>");

                        }elseif(is_array($resposta)){                                      // (se nao) / verificando se o return é um arrey

                         echo("<script>
                         alert('".$resposta['message']."');
                         window.history.back();
                         </script>");

                        } 

                      }




                    break;

                    }
                }




?>