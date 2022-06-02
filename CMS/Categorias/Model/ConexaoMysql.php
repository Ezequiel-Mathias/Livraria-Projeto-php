<?php /**********************************************************************************
 * Objetivo: Arquivo para criar a conexão com o BD Mysql
 * Autor: Ezequiel
 * Data: 07/04/2022
 * Versão: 1.0
 ***********************************************************************************/

 const SERVER = 'localhost';
 const USER = 'root';
 const PASSWORD = 'bcd127';
 const DATABASE = 'dbProdutos';


 function conexaoMysql() {
    $conexao = array();
    
    $conexao = mysqli_connect(SERVER,USER, PASSWORD,DATABASE);

    if($conexao){
        return $conexao;
    }else
        return false;    
 }

