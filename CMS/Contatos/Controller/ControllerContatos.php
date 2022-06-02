<?php
/*******
 * objetivo : arquivo responsavel pela manipulacao de dados de contatos 
 * obs(esse arquivo fara a ponte entre a view e a model);
 * 
 * autor : Ezequiel
 * 
 * Data : 04/03/22
 * 
 * versao : 1.0
 */


function listarContatos(){
     
    require_once('Model/contato.php');
    
    $dados = listagem();
 
    if(!empty($dados)){  
        return $dados;
    }else{
        return false;
    }
}

function excluirContatos($id){
    if($id != 0 && !empty($id) && is_numeric($id)){
        require_once('Model/contato.php');

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


 ?>