<?php 
    /***********************************************************************
     * Objetivo: Arquivo responsavel pela maniupulação de dados de estados
     *  Obs(Este arquivo fará a ponte entre a View e a Model)
     * Autor: Ezequiel
     * Data: 10/05/2022
     * Versão: 1.0
    ************************************************************************/



        //Função para solicitar os dados da model e encaminhar a lista 
        //de estados para a View
        function listarCategorias()
        {
            
            //import do arquivo que vai buscar os dados no DB
            require_once('Model/Contato.php');
            
            //chama a função que vai buscar os dados no BD
            $categoria = selectAllCategorias();

            if(!empty($categoria))
                return $categoria;
            else
                return false;
        }

?>