<?php

function inserirCategoria($dadoscontatos){
      
    if(!empty($dadoscontatos)){              //verificando se a caixa esta vazia     //empty = serve para verificar se o elemento esta vazio 


       if(!empty($dadoscontatos['txtNome'])){
  
     $arreyDados = array(
           
     "nome" => $dadoscontatos['txtNome']
           
 );


       require_once('Model/Contato.php');         //chamanda e mandando para a funcao insert la na model
        if(insertCategorias($arreyDados)){

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


function atualizarCategoria($dadoscontatos, $id){
      
    if(!empty($dadoscontatos)){              //verificando se a caixa esta vazia     //empty = serve para verificar se o elemento esta vazio 


        if(!empty($dadoscontatos['txtNome'])){

            if(!empty($id) && $id != 0 && is_numeric($id)){
   
                $arreyDados = array(
                "id" => $id,      
                "nome" => $dadoscontatos['txtNome']     
                 );


                    require_once('Model/Contato.php');         //chamanda e mandando para a funcao insert la na model
                    if(updateCategoria($arreyDados)){
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

 function buscarContato($id){

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

 function listarContatos(){
     
    require_once('Model/Contato.php');
    
    $dados = listagem();
 
    if(!empty($dados)){  
        return $dados;
    }else{
        return false;
    }
}




?>