<?php
$form = (string) "Router.php?componente=contatos&action=inserir";

if(session_status()){
    //Valida se a variavel de sessão dadosContato
    //Não esta vazia
    if(!empty($_SESSION['dadosProdutos']))
    {    
    $idprodutos         =$_SESSION['dadosProdutos']['idprodutos'];
    $nome       =$_SESSION['dadosProdutos']['Nome'];
    $valor      =$_SESSION['dadosProdutos']['Valor'];
    $destaque      =$_SESSION['dadosProdutos']['Destaque'];
    $percentualdedesconto     =$_SESSION['dadosProdutos']['PercentualdeDesconto'];
    $valorcomdestaque       =$_SESSION['dadosProdutos']['ValorComDesconto'];
    $descricao       =$_SESSION['dadosProdutos']['Descricao'];
    $idcategoria       =$_SESSION['dadosProdutos']['idCategorias'];
    $foto       =$_SESSION['dadosProdutos']['foto'];



    //Mudamos a ação do form para edita o registro no click do botão salvar
$form = "Router.php?componente=contatos&action=editar&idprodutos=".$idprodutos."&foto=".$foto;

//Destroi uma variavel da memoria do servidor 
unset($_SESSION['dadosProdutos']);
    }

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../PastaCSS/ProdutosCrud.css">
    <link rel="stylesheet" href="../../PastaCSS/ProdutosTable.css">
</head>
<body>
<form  action="<?=$form?>" name="frmCadastro" method="post" enctype="multipart/form-data">
    <h2 id="nomedoproduto">Nome:</h2>
    <input type="text" name="caixadetexto" id="caixadetexto" value ="<?=isset($nome)?$nome:null?>">

    <div class="cadastroEntradaDeDados">
    <input id="teste" type="file" name="fleFoto" accept=".jpg, .png, .jpeg, .gif">
    <img src="<?=DIRETORIO_FILE_UPLOAD.$foto?>" class="foto">
    </div>
    

        <h2 id="valordoproduto">Valor:</h2>
        <input type="number" name="caixavalor" id="caixavalor" value = "<?=isset($valor)?$valor:null?>">
            
        <h2 id="destaquedoproduto">Destaque:</h2> 

        <input type="checkbox" id="radiosim" value="true" name="checkprodutos">
          <p id="simradiotxt">Sim</p> 
          
          <h2 id="percentualdoproduto">Percentual de desconto:</h2> 
          <input type="number" name="caixapercentual" id="caixapercentual"  value="<?=isset($percentualdedesconto)?$percentualdedesconto:null?>">


          <h2 id="categoria">Categoria:</h2> 
          
        <select name="sltCategoria" id="raca">
        
        <option>Selecione um item</option>
       
                     <?php 
                        //import da controller de estados
                        require_once('Controller/ControllerCategorias.php');
                        //chama a função para carregar todos os estados do BD
                        $listarcategorias = listarCategorias();
                        
                                    
                        foreach ($listarcategorias as $categorias)
                              {
                        ?>
                <option  value="<?=$categorias['idCategorias']?>"><?=$categorias['nome']?></option>
                         <?php
                             }
                        ?>                             

       
        </select>

          <h2 id="descricaodoproduto">Descrição:</h2> 
          <textarea type="text" name="caixadescricao" id="caixadescricao"><?=isset($descricao)?$descricao:null?></textarea>

          <div class="enviar">
            <div class="enviar">
                <input type="submit" name="btnEnviar" value="Salvar">
            </div>
        </div>
        </form>

          <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Dados.</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Valor </td>
                    <td class="tblColunas destaque"> Destaque </td>
                    <td class="tblColunas destaque"> Percentual De Desconto </td>
                    <td class="tblColunas destaque"> Preço com Desconto </td>
                    <td class="tblColunas destaque"> Descrição </td>
                    <td class="tblColunas destaque"> ID Categoria </td>
                    <td class="tblColunas destaque"> Foto </td>
                </tr>
    
                <?php
               
                 require_once('Controller/ControllerProdutos.php');
            
                 $listprodutos = listarProdutos();
                 
                 foreach($listprodutos as $item){
                    $foto = $item['foto'];
                 ?>
                <tr id="tblLinhas">
                   
                    <td class="tblColunas registros"><?=$item['Nome']?></td>
                    <td class="tblColunas registros"><?=$item['Valor']?></td>
                    <td class="tblColunas registros"><?=$item['Destaque']?></td>
                    <td class="tblColunas registros"><?=$item['PercentualdeDesconto']?></td>
                    <td class="tblColunas registros"><?=$item['ValorComDesconto']?></td>
                    <td class="tblColunas registros"><?=$item['Descricao']?></td>
                    <td class="tblColunas registros"><?=$item['Idcategorias']?></td>
                    <td class="tblColunas registros"><img src="<?=DIRETORIO_FILE_UPLOAD.$foto?>" class="foto"></td>
                </td>
    
                <td class="tblColunas registros">
                    <a href="Router.php?componente=contatos&action=buscar&idprodutos=<?=$item['idprodutos']?>">
                        <img src="../../iconesCMS/edit.png" alt="Editar" title="Editar" class="editar">
                    </a>
                        <a onclick="return confirm('Deseja realmente excluir este item ?')" href="Router.php?componente=contatos&action=deletar&idprodutos=<?=$item['idprodutos']?>&foto=<?=$foto?>">
                        <img src="../../iconesCMS/trash.png" alt="Excluir" title="Excluir" class="excluir" id="excluir">
                        </a>
                        <img src="../../iconesCMS/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                </td>
            </tr>
                <?php
                 }
                ?>
            </div>
            
            
                

</body>
</html>