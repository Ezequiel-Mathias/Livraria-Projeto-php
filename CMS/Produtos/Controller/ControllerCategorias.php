<?php 
    /***********************************************************************
     * Objetivo: Arquivo responsavel pela maniupulação de dados de estados
     *  Obs(Este arquivo fará a ponte entre a View e a Model)
     * Autor: Ezequiel
     * Data: 10/05/2022
     * Versão: 1.0
    ************************************************************************/

        //import do arquivo de configuração do projeto
        require_once('modulo/config.php');


        //Função para solicitar os dados da model e encaminhar a lista 
        //de estados para a View
        function listarProdutos()
        {
            //import do arquivo que vai buscar os dados no DB
            require_once('Model/Categorias.php');
            
            //chama a função que vai buscar os dados no BD
            $dados = selectAllCategorias();

            if(!empty($dados))
                return $dados;
            else
                return false;
        }

?>