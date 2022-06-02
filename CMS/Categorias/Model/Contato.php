<?php

/**********************************************************************************
 * Objetivo: Arquivo resposavel por manipular os dados dentro do bd
 * Autor: Ezequiel
 * Data: 07/03/2022
 * Versão: 1.0
 ***********************************************************************************/

 include('ConexaoMysql.php');


 function insertCategorias($dadocontatos){
         

    $statusResposta = (boolean) false;

      // conexao esta recebendo o retorn na fuction conexaoMysql(); // abrindo conexao com o bds
     $conexao = conexaoMysql();

    $sql = "insert into tblcategorias
       (nome
       )

    value 

       ('".$dadocontatos{'nome'}."');";

    //se deu certo ou se deu erro no script
    if(mysqli_query($conexao,$sql)){// executa o escrip no bds , mysqli_query(QUALBANCODEDADOS,QUAISDADOS);  
            
    if(mysqli_affected_rows($conexao))         //se teve uma linha afetada ou nao no bds = linha afeteda = se o banco recusou ou add a linha 'script';
    $statusResposta = true;
    }
    return $statusResposta;

}


function deleteContato($id){

   //declaração da variavel para return desta função 
   $statusresposta = (boolean) false;

   //Abre a conexao com o BD 
   $conexao = conexaoMysql();
     //script para deletar um registro no BD
     $sql = "delete from tblcategorias where idcategorias = ".$id;
   //Valida se o script esta correto, sem erro de sintaxe e executa no BD
     if (mysqli_query($conexao, $sql)){

      //Valida se o BD teve sucesso na execução do script
      if(mysqli_affected_rows($conexao))
         $statusresposta = true;
     }
     
     return $statusresposta;
 }

 function listagem(){
   $conetion = conexaoMysql();            //abrindo conexao com bds

       // script paralistar todos os dados do BD, tbm serve para fazer em ordem decrecente (order by idcontato desc)
       $slq = "select * from tblcategorias order by idcategorias desc" ;

       $result = mysqli_query($conetion,$slq);
        if($result){
           $cont = 0;
              while($rsdados = mysqli_fetch_assoc($result)){
                      
               $arreydados[$cont] = array(
                  "id" =>  $rsdados['idcategorias'],
                  "Nome"  =>$rsdados['nome'],

               );
               $cont++;
            } 
            
            return $arreydados;
        }

    
}


function updateCategoria($dadoscategorias){

   $statusResposta = (boolean) false;

    // conexao esta recebendo o retorn na fuction conexaoMysql(); // abrindo conexao com o bds
    $conexao = conexaoMysql();

   $sql = "update tblcategorias set
      nome = '".$dadoscategorias{'nome'}."'
      where idcategorias =" . $dadoscategorias['id'];
 

   //se deu certo ou se deu erro no script
   if(mysqli_query($conexao,$sql)){// executa o escrip no bds , mysqli_query(QUALBANCODEDADOS,QUAISDADOS);  
           
   if(mysqli_affected_rows($conexao))         //se teve uma linha afetada ou nao no bds = linha afeteda = se o banco recusou ou add a linha 'script';
   $statusResposta = true;
   }
  
    return $statusResposta;
     
 }



function selecionarporid($id){

   $conetion = conexaoMysql();

   $sql = "select * from tblcategorias where idcategorias = ".$id;
  
   $result = mysqli_query($conetion,$sql);

   if($result){

      if($rsdados = mysqli_fetch_assoc($result)){
      $arreydados = array(
         "id" => $rsdados['idcategorias'],
         "Nome" => $rsdados['nome']
      );
   }

   return $arreydados;

   }

}


?>