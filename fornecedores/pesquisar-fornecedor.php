<?php
include "../verificar-autenticacao.php";

// Verifica se foi passado um parâmetro 'id' na URL
if(isset($_GET['providerName'])) {
    $idBuscado = $_GET['providerName']; // Pega o valor do parâmetro GET
    // Verifica se existe fornecedores na sessão
    if (!empty($_SESSION["fornecedores"])) {
        $fornecedorEncontrado = null;

        // Procura o fornecedor com ID correspondente
        foreach ($_SESSION["fornecedores"] as $key => $fornecedor) {
            if($key == $idBuscado) {
                $fornecedorEncontrado = $fornecedor;
                break; // Sai do loop quando encontrar
            }
        }

        // Se encontrou o fornecedor, exibe apenas ele
        if($fornecedorEncontrado) {
            echo '
            <tr>
                <th scope="row">' . ($idBuscado + 1) . '</th>
                <td>' . $fornecedorEncontrado["providerName"] . '</td>
                <td>' . $fornecedorEncontrado["providerCNPJ"] . '</td>
                <td>' . $fornecedorEncontrado["providerEmail"] . '</td>
                <td>' . $fornecedorEncontrado["providerWhatsapp"] . '</td>
           
                <td>
                    <a href="../fornecedores/detalhe-provider.php?key=' . $idBuscado . '" class="btn btn-sm btn-outline-primary btn-sm me-2 mb-2"><i class="fas fa-edit"></i> Editar</a>
                    <a href="../fornecedores/remover.php?key=' . $idBuscado . '" class="btn btn-sm btn-outline-danger btn-sm me-2"><i class="fas fa-trash"><i class="fas fa-trash"></i> Excluir</a>
                </td>
            </tr>';
        } else {
            echo '<tr><td colspan="7" class="text-center">Provider não encontrado!</td></tr>';
        }
    } else {
        echo '<tr><td colspan="7" class="text-center">Nenhum provider cadastrado!</td></tr>';
    }
} else {
    // Se não foi passado ID, mostra todos os providers (código original)
    if (!empty($_SESSION["fornecedores"])) {
        foreach ($_SESSION["fornecedores"] as $key => $fornecedor) {
            echo '
         <tr>
                <th scope="row">' . ($idBuscado + 1) . '</th>
                <td>' . $fornecedorEncontrado["providerName"] . '</td>
                <td>' . $fornecedorEncontrado["providerCNPJ"] . '</td>
                <td>' . $fornecedorEncontrado["providerEmail"] . '</td>
                <td>' . $fornecedorEncontrado["providerWhatsapp"] . '</td>
           
                <td>
                    <a href="../fornecedores/detalhe-provider.php?key=' . $idBuscado . '" class="btn btn-sm btn-outline-primary btn-sm me-2 mb-2"><i class="fas fa-edit"></i> Editar</a>
                    <a href="../fornecedores/remover.php?key=' . $idBuscado . '" class="btn btn-sm btn-outline-danger btn-sm me-2"><i class="fas fa-trash"><i class="fas fa-trash"></i> Excluir</a>
                </td>
            </tr>';
        }
    } else {
        echo '<tr><td colspan="7" class="text-center">Nenhum provider cadastrado!</td></tr>';
    }
}
?>