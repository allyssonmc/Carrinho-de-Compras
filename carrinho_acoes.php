<?php
session_start(); //Avisando o PHP que essa página trabalha com sessoes.

/** 
 * Verificando se a variável de acoes existe, para entao verificar qual acao o usuario ordenou.
*/
if(isset($_GET['acao_carrinho'])) {

    switch($GET['acao_carrinho']) {

        case 'limpar':// na URL do navegador: carrinho_acoes.php?acao_carrinho-limpar
            $_SESSION['carrinho'] = array(); //Ao definir o carrinho como array novamente, limpamos ele.
        break;

        case 'add': //Adicionar um produto no carrinho.
            //Pegando as variaveis da URL com os dados do produto (isso nao é o ideal, apenas didatico)
            $produto =  $_GET ['carr_produto'];
            $preco = $_GET['carr_preco'];
            $qnt = $_GET['carr_qnt'];
            $total = $preco * $qnt;

            $dados_produtos_a_ser_add = array("produto" => $produto,"preco" => $preco, "quantidade" => $qnt, "total" => $total);

            $_SESSION['carinho'][] = $dados_produtos_a_ser_add; // Adicionando os dados estruturados do produto
        break;

        case 'remover':
            $item_carrinho = $_GET['item'];
        break;

        case 'atualizar qnt':
           $item_carrinho = $_GET['item']; //pegando qual item o usuario quer atualizar a qnt.

           if(isset($_SESSION['carrinho'][$item_carrinho])) { //Vefiricando se o item existe
             $qnt = (int)$_GET['carr_qnt']; //pegando a quantidade que ele deseja.
             $total = $_SESSION['CARRINHO'][$item_carrinho]['preco'] * $qnt; //atualizando o total

             $_SESSION['carrinho'][$item_carrinho]['quantidade'] = $qnt; // definindo novamente a quantidade.
             $_SESSION['carrinho'][$item_carrinho]['total'] = $total; // definindo o total.
           }
        break;
    
        
    } //fim do switch
}// fim do if do isset

?>