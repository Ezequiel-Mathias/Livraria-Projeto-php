<?php

/**********************************************************************************
 * Objetivo: Arquivo resposavel por manipular os dados dentro do bd
 * Autor: Ezequiel
 * Data: 07/03/2022
 * Versão: 1.0
 ***********************************************************************************/

 include('ConexaoMysql.php');


 function listagem(){
   $conetion = conexaoMysql();            //abrindo conexao com bds

       // script paralistar todos os dados do BD, tbm serve para fazer em ordem decrecente (order by idcontato desc)
       $slq = "select * from tblcontatos order by idcontatos desc" ;

       $result = mysqli_query($conetion,$slq);
        if($result){
           $cont = 0;
              while($rsdados = mysqli_fetch_assoc($result)){
                      
               $arreydados[$cont] = array(
                  "idcontatos" =>  $rsdados['idcontatos'],
                  "Nome"  =>$rsdados['nome'],
                  "Mensagem"  =>$rsdados['mensagem'],
                  "Email"  =>$rsdados['email']
               );
               $cont++;
            } 
            
            return $arreydados;
        }

    
    }

    function deleteContato($id){

      //declaração da variavel para return desta função 
      $statusresposta = (boolean) false;

      //Abre a conexao com o BD 
      $conexao = conexaoMysql();
        //script para deletar um registro no BD
        $sql = "delete from tblcontatos where idcontatos = ".$id;
      //Valida se o script esta correto, sem erro de sintaxe e executa no BD
        if (mysqli_query($conexao, $sql)){

         //Valida se o BD teve sucesso na execução do script
         if(mysqli_affected_rows($conexao))
            $statusresposta = true;
        }

        return $statusresposta;
    }



 ?>