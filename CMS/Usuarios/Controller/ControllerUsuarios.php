<?php

function listarUsuarios(){
     
    require_once('Model/Contato.php');
    
    $dados = listagem();
 
    if(!empty($dados)){  
        return $dados;
    }else{
        return false;
    }
}

function inserirUsuarios($dadoscontatos){
      
    if(!empty($dadoscontatos)){              //verificando se a caixa esta vazia     //empty = serve para verificar se o elemento esta vazio 


       if(!empty($dadoscontatos['txtUsuarios']) && !empty($dadoscontatos['txtEmail']) && !empty($dadoscontatos['txtSenha'])){
  
     $arreyDados = array(
           
     "usuario" => $dadoscontatos['txtUsuarios'],
     "email" => $dadoscontatos['txtEmail'],
    "senha" => $dadoscontatos['txtSenha']
           
 );


       require_once('Model/Contato.php');         //chamanda e mandando para a funcao insert la na model
        if(insertUsuarios($arreyDados)){

            return true;

        }else{

               return array('idErro ' => 1, 
               'message' => 'nao foi possivel inserir os dados' );     
        }

        
            }else {

             return array('idErro ' => 2,  'message' => 'existem campos obrigatorios que nao foram preenchidos');

            }



   }

       
}


function excluirContatos($id){
    if($id != 0 && !empty($id) && is_numeric($id)){
        require_once('Model/Contato.php');

        //Chama a função da model e valida se o retorno foi verdadeiro ou false
        if (deleteContato($id))
            return true;
        else
            return array(
                'idErro' => 3,
                'message' => 'O banco de dados não pode excluir o registro.'
            );
    }else{
        return array(
            'idErro' => 4,
            'message' => 'Não é possivel excluir um registro sem imformar um id valido.'
        );
    }
 }


 function buscarUsuarios($id){

    if($id != 0 && !empty($id) && is_numeric($id)){
        //import do arquivo de contato
        require_once('Model/Contato.php');

       $dados = selecionarporid($id);
        

       //Valida se existem dados para serem devolvidos
       if(!empty($dados)){
        return $dados;
       }
       else{
        return false;
       }
       

 } else{
    return array(
        'idErro' => 4,
        'message' => 'Não é possivel buscar um registro sem imformar um id valido.'
    );
   }

 }

 
function atualizarUsuarios($dadosusuarios, $id){
      
    if(!empty($dadosusuarios)){              //verificando se a caixa esta vazia     //empty = serve para verificar se o elemento esta vazio 


        if(!empty($dadosusuarios['txtUsuarios']) && !empty($dadosusuarios['txtEmail']) && !empty($dadosusuarios['txtSenha'])){

            if(!empty($id) && $id != 0 && is_numeric($id)){ 
   
                $arreyDados = array(
                "id" => $id,
                "usuario" => $dadosusuarios['txtUsuarios'],
                "email" => $dadosusuarios['txtEmail'],
                "senha" => $dadosusuarios['txtSenha']
                 );


                    require_once('Model/Contato.php');         //chamanda e mandando para a funcao insert la na model
                    if(updateUsuarios($arreyDados)){
                        return true;
                    }else{

                            return array('idErro ' => 1, 
                            'message' => 'nao foi possivel Atualizar os dados Os dados no banco' );     
                    }

                }else{
                    return array(
                        'idErro' => 4,
                        'message' => 'Não é possivel excluir um registro sem imformar um id valido.'
                    );
                 }    

             }
             
             else {

              return array('idErro ' => 2,  'message' => 'existe campos obrigatorios que nao foram preenchidos');

             }



    }

     
 }










?>