<?php



include('ConexaoMysql.php');


 function insertUsuarios($dadosusuarios){
         

    $statusResposta = (boolean) false;

      // conexao esta recebendo o retorn na fuction conexaoMysql(); // abrindo conexao com o bds
     $conexao = conexaoMysql();

    $sql = "insert into tblusuarios
       (usuario,
       email,
       senha
       )

    value 

       ('".$dadosusuarios{'usuario'}."',
       '".$dadosusuarios{'email'}."',
       '".$dadosusuarios{'senha'}."');";

    //se deu certo ou se deu erro no script
    if(mysqli_query($conexao,$sql)){// executa o escrip no bds , mysqli_query(QUALBANCODEDADOS,QUAISDADOS);  
            
    if(mysqli_affected_rows($conexao))         //se teve uma linha afetada ou nao no bds = linha afeteda = se o banco recusou ou add a linha 'script';
    $statusResposta = true;
    }
    return $statusResposta;

}



function listagem(){
    $conetion = conexaoMysql();            //abrindo conexao com bds
 
        // script paralistar todos os dados do BD, tbm serve para fazer em ordem decrecente (order by idcontato desc)
        $slq = "select * from tblusuarios order by idusuarios desc" ;
 
        $result = mysqli_query($conetion,$slq);
         if($result){
            $cont = 0;
               while($rsdados = mysqli_fetch_assoc($result)){
                       
                $arreydados[$cont] = array(
                   "idusuarios" =>$rsdados['idusuarios'],
                   "Usuario"  =>$rsdados['usuario'],
                   "Email"  =>$rsdados['email'],
                   "Senha"  =>$rsdados['senha']
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
        $sql = "delete from tblusuarios where idusuarios = ".$id;
      //Valida se o script esta correto, sem erro de sintaxe e executa no BD
        if (mysqli_query($conexao, $sql)){

         //Valida se o BD teve sucesso na execução do script
         if(mysqli_affected_rows($conexao))
            $statusresposta = true;
        }

        return $statusresposta;
    }



    function selecionarporid($id){

      $conetion = conexaoMysql();
   
      $sql = "select * from tblusuarios where idusuarios = ".$id;
     
      $result = mysqli_query($conetion,$sql);
   
      if($result){
   
         if($rsdados = mysqli_fetch_assoc($result)){
         $arreydados = array(
            "id" => $rsdados['idusuarios'],
            "Usuario" => $rsdados['usuario'],
            "Email" => $rsdados['email'],
            "Senha" => $rsdados['senha']
         );
      }
   
      return $arreydados;
   
      }
   
   }

   function updateUsuarios($dadosusuarios){

      $statusResposta = (boolean) false;
   
       // conexao esta recebendo o retorn na fuction conexaoMysql(); // abrindo conexao com o bds
       $conexao = conexaoMysql();
   
      $sql = "update tblusuarios set
         usuario = '".$dadosusuarios{'usuario'}."',
         email = '".$dadosusuarios{'email'}."',
         senha = '".$dadosusuarios{'senha'}."'
         where idusuarios =" . $dadosusuarios['id'];
    
   
      //se deu certo ou se deu erro no script
      if(mysqli_query($conexao,$sql)){// executa o escrip no bds , mysqli_query(QUALBANCODEDADOS,QUAISDADOS);  
              
      if(mysqli_affected_rows($conexao))         //se teve uma linha afetada ou nao no bds = linha afeteda = se o banco recusou ou add a linha 'script';
      $statusResposta = true;
      }
     
       return $statusResposta;
        
    }
   



?>