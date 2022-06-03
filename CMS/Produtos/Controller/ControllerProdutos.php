<?php

function listarProdutos(){
     
    require_once('Model/Contato.php');
    
    $dados = listagem();
 
    if(!empty($dados)){  
        return $dados;
    }else{
        return false;
    }
}




function excluirProduto($arrayDados){

    //Recebe o id do registro que será excluído
    $id = $arrayDados['id'];

    //Recebe o nome da foto que será excluída da pasta do servidor
    $foto = $arrayDados['foto'];    


    if($id != 0 && !empty($id) && is_numeric($id)){
        require_once('Model/Contato.php');

        //Chama a função da model e valida se o retorno foi verdadeiro ou false
        if (deleteProduto($id)){
            if($foto!=null)
            {
                //unlink() - função para apagar um arquivo de um diretório
                //Permite apagar a foto fisicamente do diretório no servidor
                if(unlink(DIRETORIO_FILE_UPLOAD.$foto))
                    return true;
                else
                    return array('idErro'   => 5,
                        'message'  => 'O registro do Banco de Dados foi excluído com sucesso, 
                                    porém a imagem não foi excluída do diretório do servidor!'
                        );
            }else
                return true; 
        }else
            return array(
                'idErro' => 3,
                'message' => 'O banco de dados não pode excluir o registro.'
            );
    }else{
        return array(
            'idErro' => 4,
            'message' => 'Não é possivel excluir um registro sem imformar um id valido.'
        );
    }
 }


 
 function buscarProduto($id){

    if($id != 0 && !empty($id) && is_numeric($id)){
        //import do arquivo de contato
        require_once('Model/Contato.php');

       $dados = selecionarporid($id);
        

       //Valida se existem dados para serem devolvidos
       if(!empty($dados)){
        return $dados;
       }
       else{
        return false;
       }
       

 } else{
    return array(
        'idErro' => 4,
        'message' => 'Não é possivel buscar um registro sem imformar um id valido.'
    );
   }

 }


 function inserirProduto ($dadosprodutos, $file){
    $nomeFoto = (string) null;
    $checkbox = (int) 0;
    if(!empty($produtos['checkprodutos'])){
        $checkbox = $dadosprodutos['checkprodutos'];
    }else{
        $checkbox;
      }


    //Validação para verificar se o objeto esta vazio
    if(!empty($dadosprodutos)){

        //Validação de caixa vazia dos elementos nome, celular e email, 
        //pois são obrigatórios no BD
        if(!empty($dadosprodutos['caixapercentual']) && !empty($dadosprodutos['caixavalor']) && !empty($dadosprodutos['caixadetexto']) && !empty($dadosprodutos['caixadescricao']) && !empty($dadosprodutos['sltCategoria']) && $checkbox >= 0)
            {
                //Validação para identificar se chegou um arquivo para upload
                if ($file['fleFoto']['name'] != null)
                {
                    //import da função de upload
                    require_once('modulo/upload.php');
                    
                    //Chama a função de upload
                    $nomeFoto = uploadFile($file['fleFoto']);

                    if(is_array($nomeFoto))
                    {
                        //Caso aconteça algum erro no processo de upload, a função irá retornar
                        //um array com a possivel mensagem de erro. Esse array será retornado para
                        //a router e ela irá exibir a mensagem para o usuário
                        return $nomeFoto;
                    }

                }

                //uploadFile($dadosContato['fleFoto']);

                //Criação do array de dados que será encaminhado a model
                //para inserir no BD, é importante criar este array conforme
                //as necessidades de manipulação do BD.
                //OBS: criar as chaves do array conforme os nomes dos atributos
                    //do BD
                    $arreyDados = array(
                        "Nome" => $dadosprodutos['caixadetexto'],
                        "Valor" => $dadosprodutos['caixavalor'],
                        "destaque" => $checkbox,
                        "percentualdeDesconto" => $dadosprodutos['caixapercentual'],
                        "descricao" => $dadosprodutos['caixadescricao'],
                        "idCategorias" => $dadosprodutos['sltCategoria'],
                        "foto" => $nomeFoto
        
                         );
                         
                    
                   
                //import do arquivo de modelagem para manipular o BD
                require_once('Model/Contato.php');
                //Chama a função que fará o insert no BD (esta função esta na model)
                if(insertProduto($arreyDados))
                    return true;
                else
                    return array('idErro'  => 1, 
                                 'message' => 'Não foi possivel inserir os dados no Banco de Dados');
            }
            
        else
            return array('idErro'   => 2,
                         'message'  => 'Existem campos obrigatório que não foram preenchidos.');
    }
}

//Função para receber dados da View e encaminhar para a model (Atualizar)
function atualizarProduto ($dadosContato, $arrayDados)
{
    $statusUpload = (boolean) false;

    //Recebe o id enviado pelo arrayDados
    $id = $arrayDados['id'];

    //Recebe a foto enviada pelo arrayDados (Nome da foto que já existe no BD)
    $foto = $arrayDados['foto'];

    //Recebe o objeto de array referente a nova foto que poderá ser enviada ao servidor
    $file = $arrayDados['file'];

    //Validação para verificar se o objeto esta vazio
    if(!empty($dadosContato))
    {
        //Validação de caixa vazia dos elementos nome, celular e email, 
        //pois são obrigatórios no BD
        if(!empty($dadosprodutos['caixapercentual']) && !empty($dadosprodutos['caixavalor']) && !empty($dadosprodutos['caixadetexto']) && !empty($dadosprodutos['caixadescricao']) && !empty($dadosprodutos['sltCategoria']))
            {
                //Validação para garantir que id seja válido
                if(!empty($id) && $id != 0 && is_numeric($id))
                {
                    //Validação para identificar se será enviado ao servidor uma nova foto
                    if($file['fleFoto']['name'] != null)
                    {
                        //import da função de upload
                        require_once('modulo/upload.php');
                    
                        //Chama a função de upload para enviar a nova foto ao servidor
                        $novaFoto = uploadFile($file['fleFoto']);
                        $statusUpload = true;
                    }else
                    {
                        //Permance a mesma foto no BD
                        $novaFoto = $foto;
                    }

                    //Criação do array de dados que será encaminhado a model
                    //para inserir no BD, é importante criar este array conforme
                    //as necessidades de manipulação do BD.
                    //OBS: criar as chaves do array conforme os nomes dos atributos
                        //do BD
                    $arrayDados = array (
                        "idprodutos" => $id,
                        "nome" => $dadosprodutos['caixadetexto'],
                        "valor" => $dadosprodutos['caixavalor'],
                        "destaque" => $dadosprodutos['rdocalc'],
                        "percentualdedesconto" => $dadosprodutos['caixapercentual'],
                        "valorComDesconto" => $dadosprodutos['txtvalorComDesconto'],
                        "descricao" => $dadosprodutos['caixadescricao'],
                        "idCategorias" => $dadosprodutos['sltCategoria'],
                        "foto" => $novaFoto
                    );

                    //import do arquivo de modelagem para manipular o BD
                    require_once('Model/Contato.php');
                    //Chama a função que fará o insert no BD (esta função esta na model)
                    if(updateProdutos($arrayDados))
                    {
                        //validação para verificar se será necessário apagar a foto antiga
                        //Esta variavel foi ativada em true na linha 105, quando realizamos
                        //o upload de uma nova foto para o servidor 
                        if($statusUpload)
                        {
                            //Apaga a foto antiga da pasta do servidor
                            unlink(DIRETORIO_FILE_UPLOAD.$foto);
                        }
                        return true;
                    }
                    else
                        return array('idErro'  => 1, 
                                    'message' => 'Não foi possivel atualizar os dados no Banco de Dados');
                }else
                    return array('idErro'   => 4,
                                 'message'  => 'Não é possível editar um registro sem informar um id válido.'
                            );
            }
                
        else
            return array('idErro'   => 2,
                         'message'  => 'Existem campos obrigatório que não foram preenchidos.');
    }
}

 



 


?>