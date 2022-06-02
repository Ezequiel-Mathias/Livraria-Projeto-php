<?php
$form = (string) "Router.php?componente=contatos&action=inserir";

if(session_status()){
    //Valida se a variavel de sessão dadosContato
    //Não esta vazia
    if(!empty($_SESSION['dadosUsuarios']))
    {    
    $idprodutos         =$_SESSION['dadosUsuarios']['id'];
    $valor       =$_SESSION['dadosUsuarios']['Usuario'];
    $email      =$_SESSION['dadosUsuarios']['Email'];
    $senha        =$_SESSION['dadosUsuarios']['Senha'];

    //Mudamos a ação do form para edita o registro no click do botão salvar
$form = "Router.php?componente=contatos&action=editar&idusuarios=".$idusuarios;

//Destroi uma variavel da memoria do servidor 
unset($_SESSION['dadosUsuarios']);
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../PastaCSS/ContatosTableCMS.css">
    <title>Document</title>
</head>
<body>

<div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Usuarios </h1>
                
            </div>
            <div id="cadastroInformacoes">
                <form  action="<?=$form?>" name="frmCadastro" method="post" >
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Usuario: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtUsuarios" placeholder="Digite a Categoria" maxlength="100" value="<?=isset($usuario)?$usuario:null?>">
                        </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Email: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtEmail" value="<?=isset($email)?$email:null?>">
                        </div>
                    </div>

                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Senha: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="tel" name="txtSenha" value="<?=isset($senha)?$senha:null?>">
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
                <td class="tblColunas destaque"> Email </td>
                <td class="tblColunas destaque"> Senha </td>
            </tr>

            <?php
               
                 require_once('Controller/ControllerUsuarios.php');
            
                 $listusuarios = listarUsuarios();
                  
                 foreach($listusuarios as $item){
                 ?>
           
            <tr id="tblLinhas">
               
                <td class="tblColunas registros"><?=$item['Usuario']?></td>
                <td class="tblColunas registros"><?=$item['Email']?></td>
                <td class="tblColunas registros"><?=$item['Senha']?></td>
                
            </td>

            <td class="tblColunas registros">
                <a href="Router.php?componente=contatos&action=buscar&idusuarios=<?=$item['idusuarios']?>">
                    <img src="../../iconesCMS/edit.png" alt="Editar" title="Editar" class="editar">
                </a>
                    <a onclick="return confirm('Deseja realmente excluir este item ?')" href="Router.php?componente=contatos&action=deletar&idusuarios=<?=$item['idusuarios']?>">
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