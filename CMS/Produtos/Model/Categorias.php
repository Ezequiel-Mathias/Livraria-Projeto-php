<?php 
    /***********************************************************************
     * Objetivo: Arquivo responsavel por manipular os dados dentro do BD 
     *      (select)
     * Autor: Ezequiel
     * Data: 02/06/2022
     * Versão: 1.0
    ************************************************************************/

    // import do arquivo que estabelece a conexão com o BD
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
           

            
            //select id from tblproduto order by id desc limit 1

            return $arrayDados;
        }

    }

?>