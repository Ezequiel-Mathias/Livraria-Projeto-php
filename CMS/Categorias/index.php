<?php
$form = (string) "Router.php?componente=contatos&action=inserir";


if(session_status()){
    
    if(!empty($_SESSION['dadosCategoria']))
    {    
    $id         =$_SESSION['dadosCategoria']['id'];
    $nome       =$_SESSION['dadosCategoria']['Nome'];
    

    //Mudamos a ação do form para edita o registro no click do botão salvar
$form = "Router.php?componente=contatos&action=editar&id=".$id;

//Destroi uma variavel da memoria do servidor 
unset($_SESSION['dadosCategoria']);
    }

}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../PastaCSS/CMS.css">
    <link rel="stylesheet" href="../../PastaCSS/ContatosTableCMS.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav>  
    <div id="divmenucms">
        <div id="conteudo">
        <h1>C M S </h1> 
        <h3> << Livraria Universal >></h3>
        <p>Gerenciamento do conteudo do site</p>
        </div>
    </div>
    </nav>
    

    <div id="categoriascms">
     <p id="nomedousuario">Bem vindo << nome do usuario >></p>
     <img src="../../icones/produtoscms.png" alt=""> 
     <img src="../../icones/categorias.png" alt=""> 
     <img src="../../icones/contatos.png" alt="">
     <img id="usuarioimg" src="../../icones/usuarios.png" alt=""> 
     <img src="../../icones/logout.png" alt="">  
     <div id="opçoesdeescolha">
    <p>Adm. de Produtos</p>
    <p>Adm. de Categorias</p>
    <p id="contatotxt">Contatos</p>
    <p id="usuariotxt">Usuários</p>
   
    </div>
    </div>
</header>


<div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Categorias </h1>
                
            </div>
            <div id="cadastroInformacoes">
                <form  action="<?=$form?>" name="frmCadastro" method="post" >
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome da categoria: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" placeholder="Digite a Categoria" maxlength="100" value="<?=isset($nome)?$nome:null?>">
                        </div>
                    </div>
                                     
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>
                    </form>
            </div>
        </div>






    <div id="consultaDeDados">
        <table id="tblConsulta" >
            <tr>
                <td id="tblTitulo" colspan="6">
                    <h1> Consulta de Dados.</h1>
                </td>
            </tr>
            <tr id="tblLinhas">
                <td class="tblColunas destaque"> Nome </td>
                
            </tr>


            <?php
               
                //import do arquivo daq controller para solicitar a listagem dos dados 
                require_once('Controller/ControllerCategorias.php');
                //chama a funçao que vai retornar os dados de contatos
                $listcontatos = listarContatos();
                //estrutura de repetição para retorar os dados do array 
                // e printar na tela  
                foreach($listcontatos as $item)
                
                {
                 ?>

            <tr id="tblLinhas">
               
                <td class="tblColunas registros"><?=$item['Nome']?></td>
                
            </td>

            <td class="tblColunas registros">
                <a href="Router.php?componente=contatos&action=buscar&id=<?=$item['id']?>">
                    <img src="../../iconesCMS/edit.png" alt="Editar" title="Editar" class="editar">
                </a>
                    <a onclick="return confirm('Deseja realmente excluir este item ?')" href="Router.php?componente=contatos&action=deletar&id=<?=$item['id']?>">
                    <img src="../../iconesCMS/trash.png" alt="Excluir" title="Excluir" class="excluir" id="excluir">
                    </a>
                    <img src="../../iconesCMS/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
            </td>
        </tr>
        <?php
                }
        ?>
</body>
</html> 