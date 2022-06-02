
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

    <div id="consultaDeDados">
        <table id="tblConsulta" >
            <tr>
                <td id="tblTitulo" colspan="6">
                    <h1> Consulta de Dados.</h1>
                </td>
            </tr>
            <tr id="tblLinhas">
                <td class="tblColunas destaque"> Nome </td>
                <td class="tblColunas destaque"> Celular </td>
                <td class="tblColunas destaque"> Email </td>
                <td class="tblColunas destaque"> Opções </td>
            </tr>


            <?php
               
                 require_once('../Contatos/Controller/ControllerContatos.php');
            
                 $listcontatos = listarContatos();
                  
                 foreach($listcontatos as $item){
                 ?>

            <tr id="tblLinhas">
                <td class="tblColunas registros"><?=$item['Nome']?></td>
                <td class="tblColunas registros"><?=$item['Mensagem']?></td>
                <td class="tblColunas registros"><?=$item['Email']?></td>
            </td>

            <td class="tblColunas registros">
                <a href="">
                    <img src="../../iconesCMS/edit.png" alt="Editar" title="Editar" class="editar">
                </a>
                    <a onclick="return confirm('Deseja realmente excluir este item ?')" href="router.php?componente=contatos&action=deletar&idcontatos=<?=$item['idcontatos']?>">
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