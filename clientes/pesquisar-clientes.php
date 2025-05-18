<?php
include "../verificar-autenticacao.php";

// Verifica se foi passado um parâmetro 'clientName' na URL
if (isset($_GET['clientName'])) {
    $nomeBuscado = $_GET['clientName']; // Pega o valor do parâmetro GET
    
    // Verifica se existe clientes na sessão
    if (!empty($_SESSION["clientes"])) {
        $clienteEncontrado = null;
        
        // Procura o cliente com o nome correspondente
        foreach ($_SESSION["clientes"] as $key => $client) {
            if (strcasecmp($client["clientName"], $nomeBuscado) == 0) { // Comparação case-insensitive
                $clienteEncontrado = $client;
                break; // Sai do loop quando encontrar
            }
        }
        
        // Se encontrou o cliente, exibe apenas ele
        if ($clienteEncontrado) {
            echo '
            <tr>
                <th scope="row">' . ($key + 1) . '</th>
                <td><img src="imagens/' . $clienteEncontrado["clientImage"] . '" width="55"></td>
                <td>' . $clienteEncontrado["clientName"] . '</td>
                <td>' . $clienteEncontrado["clientCPF"] . '</td>
                <td>' . $clienteEncontrado["clientEmail"] . '</td>
                <td>' . $clienteEncontrado["clientWhatsapp"] . '</td>
                <td>' . $clienteEncontrado["clientCEP"] . '</td>
                <td>' . $clienteEncontrado["clientLogradouro"] . '</td>
                <td>' . $clienteEncontrado["clientNumero"] . '</td>
                <td>' . $clienteEncontrado["clientComplemento"] . '</td>
                <td>' . $clienteEncontrado["clientBairro"] . '</td>
                <td>' . $clienteEncontrado["clientCidade"] . '</td>
                <td>' . $clienteEncontrado["clientEstado"] . '</td>
                <td>
                    <a href="../clientes/detalhe-cliente.php?key=' . $key . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="../clientes/remover.php?key=' . $key . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Excluir</a>
                </td>
            </tr>';
        } else {
            echo '<tr><td colspan="14" class="text-center">Cliente não encontrado!</td></tr>';
        }
    } else {
        echo '<tr><td colspan="14" class="text-center">Nenhum cliente cadastrado!</td></tr>';
    }
} else {
    // Se não foi passado clientName, mostra todos os clientes
    if (!empty($_SESSION["clientes"])) {
        foreach ($_SESSION["clientes"] as $key => $client) {
            echo '
            <tr>
                <th scope="row">' . ($key + 1) . '</th>
                <td><img src="imagens/' . $client["clientImage"] . '" width="55"></td>
                <td>' . $client["clientName"] . '</td>
                <td>' . $client["clientCPF"] . '</td>
                <td>' . $client["clientEmail"] . '</td>
                <td>' . $client["clientWhatsapp"] . '</td>
                <td>' . $client["clientCEP"] . '</td>
                <td>' . $client["clientLogradouro"] . '</td>
                <td>' . $client["clientNumero"] . '</td>
                <td>' . $client["clientComplemento"] . '</td>
                <td>' . $client["clientBairro"] . '</td>
                <td>' . $client["clientCidade"] . '</td>
                <td>' . $client["clientEstado"] . '</td>
                <td>
                    <a href="../clientes/detalhe-cliente.php?key=' . $key . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editar</a>
                    <a href="../clientes/remover.php?key=' . $key . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Excluir</a>
                </td>
            </tr>';
        }
    } else {
        echo '<tr><td colspan="14" class="text-center">Nenhum cliente cadastrado!</td></tr>';
    }
}
?>