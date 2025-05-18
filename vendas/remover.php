<?php

// CHAMA O ARQUIVO ABAIXO NESTA TELA
include "../verificar-autenticacao.php";

if (isset($_GET["key"])) {
    $key = $_GET["key"];
    // UNSET = REMOVE UM ITEM DE UM ARRAY
    unset($_SESSION["vendas"][$key]);
    // ARRAY_VALUES = REORGANIZA OS ÍNDICES DO ARRAY
    $_SESSION["vendas"] = array_values($_SESSION["vendas"]);
    $_SESSION["msg"] = "Venda removida com sucesso!";
}
header("Location: ./");
exit;



// CHAMA O ARQUIVO ABAIXO NESTA TELA
// include "verificar-autenticacao.php";

// if(isset($_GET["key"])) {
//     $key = $_GET["key"];
//     // UNSET = REMOVE UM ITEM DE UM ARRAY
//     unset($_SESSION["vendas"][$key]);
//     // ARRAY_VALUES = REORGANIZA OS ÍNDICES DO ARRAY
//     $_SESSION["vendas"] = array_values($_SESSION["vendas"]);
//     $_SESSION["msg"] = "Venda removida com sucesso!";
// }

// try {
//     if(!$_GET){
//         throw new Exception("Acesso indevido ! Tente novamente.");
//     }

//     if(isset($_GET["key"])) {
//     $key = $_GET["key"];
//     // UNSET = REMOVE UM ITEM DE UM ARRAY
//     unset($_SESSION["vendas"][$key]);
//     // ARRAY_VALUES = REORGANIZA OS ÍNDICES DO ARRAY
//     $_SESSION["vendas"] = array_values($_SESSION["vendas"]);
//     $_SESSION["msg"] = "Venda removida com sucesso!";
// }
// $_SESSION["msg"] = $msg;

// }catch(Esception $e){
//     $_SESSION["msg"] = $e->getMessage();

// }finally{
//     header("Location: clientes.php");
//     exit;
// }
// header("Location: clientes.php");
// exit;