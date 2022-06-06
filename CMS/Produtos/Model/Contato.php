<?php

require_once('ConexaoMysql.php');


//Função para listar todos as categorias do BD
function selectAllCategorias()
{
    //Abre a conexão com o BD
    $conexao = conexaoMysql();

    //script para listar todos os dados do BD
    $sql = "select * from tblcategorias order by nome asc";
    
    //Executa o scrip sql no BD e guarda o retorno dos dados, se houver
    $result = mysqli_query($conexao, $sql);

    //Valida se o BD retornou registros
    if($result)
    {
        //mysqli_fetch_assoc() - permite converter os dados do BD 
        //em um array para manipulação no PHP
        //Nesta repetição estamos, convertendo os dados do BD em um array ($rsDados), além de
        //o próprio while conseguir gerenciar a qtde de vezes que deverá ser feita a repetição
        $cont = 0;
        while ($rsDados = mysqli_fetch_assoc($result))
        {
            //Cria um array com os dados do BD
            $arrayDados[$cont] = array (
                "idcategorias"  =>  $rsDados['idcategorias'],
                "nome"      =>  $rsDados['nome'],
            );
            $cont++;
        }

        //Solicta o fechamento da conexão com o BD
       
        fecharConexaoMysql($conexao);
        
        //select id from tblproduto order by id desc limit 1

        return $arrayDados;
    }

}



//Função para realizar o insert no BD
function insertProduto($dadosprodutos)
{
    //declaração de variavel para utilizar no return desta função
    $statusResposta = (boolean) false;

    //Abre aconexão com o BD
    $conexao = conexaoMysql();

    //Monta o script para enviar para o BD
    $sql = "insert into tblProdutos 
                (nome, 
                 valor, 
                 destaque, 
                 percentualdedesconto, 
                 descricao,
                 foto,
                 idCategorias)
            values 
                ('".$dadosprodutos['Nome']."', 
                '".$dadosprodutos['Valor']."', 
                '".$dadosprodutos['destaque']."', 
                '".$dadosprodutos['percentualdeDesconto']."', 
                '".$dadosprodutos['descricao']."',
                '".$dadosprodutos['foto']."',
                '".$dadosprodutos['idCategorias']."'
            );";

    //Executa o scriipt no BD
        //Validação para veririficar se o script sql esta correto
    if (mysqli_query($conexao, $sql))
    {   
        //Validação para verificar se uma linha foi acrescentada no DB
        if(mysqli_affected_rows($conexao))
            $statusResposta = true;
    }

    return $statusResposta;
   
    
    

}


function listagem(){
    $conetion = conexaoMysql();            //abrindo conexao com bds
 
        // script paralistar todos os dados do BD, tbm serve para fazer em ordem decrecente (order by idcontato desc)
        $slq = "select * from tblProdutos order by idprodutos desc" ;
 
        $result = mysqli_query($conetion,$slq);

         if($result){
            $cont = 0;
               while($rsdados = mysqli_fetch_assoc($result)){
                       
                $arreydados[$cont] = array(
                   "idprodutos" =>$rsdados['idprodutos'],
                   "Nome"  =>$rsdados['nome'],
                   "Valor"  =>$rsdados['valor'],
                   "Destaque"  =>$rsdados['destaque'],
                   "PercentualdeDesconto"  =>$rsdados['percentualdedesconto'],
                   "ValorComDesconto"  =>$rsdados['valorComDesconto'],
                   "Descricao"  =>$rsdados['descricao'],
                   "Idcategorias"  =>$rsdados['idCategorias'],
                   "foto"  =>$rsdados['foto']
                   
                );
                $cont++;
             } 

             fecharConexaoMysql($conetion);

              if(isset($arreydados))
              return $arreydados;
                else
                return false;
             
         }
 
     
     }



     function deleteProduto($id){

      //declaração da variavel para return desta função 
      $statusresposta = (boolean) false;

      //Abre a conexao com o BD 
      $conexao = conexaoMysql();
        //script para deletar um registro no BD
        $sql = "delete from tblProdutos where idprodutos = ".$id;
      //Valida se o script esta correto, sem erro de sintaxe e executa no BD
        if (mysqli_query($conexao, $sql)){

         //Valida se o BD teve sucesso na execução do script
         if(mysqli_affected_rows($conexao))
            $statusresposta = true;
        }

        fecharConexaoMysql($conexao);

        return $statusresposta;
    }


    function selecionarporid($id){

        $conetion = conexaoMysql();
     
        $sql = "select * from tblProdutos where idprodutos = ".$id;
       
        $result = mysqli_query($conetion,$sql);
     
        if($result){
            
           if($rsdados = mysqli_fetch_assoc($result)){
           $arreydados = array(
            "idprodutos" =>$rsdados['idprodutos'],
            "Nome"  =>$rsdados['nome'],
            "Valor"  =>$rsdados['valor'],
            "Destaque"  =>$rsdados['destaque'],
            "PercentualdeDesconto"  =>$rsdados['percentualdedesconto'],
            "Descricao"  =>$rsdados['descricao'],
            "idCategorias"  =>$rsdados['idCategorias'],
            "foto"  =>$rsdados['foto']
           );
        } 
        }

        return $arreydados;
     
     }


     function updateProdutos($dadosprodutos){

      $statusResposta = (boolean) false;
   
       // conexao esta recebendo o retorn na fuction conexaoMysql(); // abrindo conexao com o bds
       $conexao = conexaoMysql();
   
      $sql = "update tblProdutos set
         nome = '".$dadosprodutos['nome']."',
         valor = '".$dadosprodutos['valor']."',
         destaque = '".$dadosprodutos['destaque']."',
         percentualdedesconto = '".$dadosprodutos['percentualdedesconto']."',
         descricao = '".$dadosprodutos['descricao']."',
         idCategorias = '".$dadosprodutos['idCategorias']."',
         foto = '".$dadosprodutos['foto']."'
         where idprodutos =" . $dadosprodutos['idprodutos'];
   
      //se deu certo ou se deu erro no script
      if(mysqli_query($conexao,$sql)){// executa o escrip no bds , mysqli_query(QUALBANCODEDADOS,QUAISDADOS);  
              
      if(mysqli_affected_rows($conexao))         //se teve uma linha afetada ou nao no bds = linha afeteda = se o banco recusou ou add a linha 'script';
      $statusResposta = true;
      }
     
      fecharConexaoMysql($conexao);
       return $statusResposta;
        
    }


?>