<?php
include "../verificar-autenticacao.php";
//dDEFINE TIMEZONE para brasil
date_default_timezone_set('America/Sao_Paulo');
$filename = "fornecedores_" . date('YmdHis') . ".xls";

//CABECALHO PARA EXPORTAR O ARQUIVO em excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
?>

<head>
    <meta charset="UTF-8">
</head>

<body>

    <div class="col-md-6">
        <!-- Tabela de fornecedores cadastrados -->
        <h2>Fornecedores Cadastrados</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="background:gray;font-weight:bold;border:1px solid black" scope="col">#</th>
                        <th style="background:gray;font-weight:bold;border:1px solid black;width:300px" scope="col">Razão Social</th>
                        <th style="background:gray;font-weight:bold;border:1px solid black;width:200px" scope="col">CNPJ</th>
                        <th style="background:gray;font-weight:bold;border:1px solid black;width:250px" scope="col">E-mail</th>
                        <th style="background:gray;font-weight:bold;border:1px solid black;width:120px" scope="col">Whatsapp</th>
                    </tr>
                </thead>
                <tbody id="providerTableBody">
                    <!-- Os fornecedores serão carregados aqui via PHP -->
                    <?php
                    // SE HOUVER FORNECEDORES NA SESSÃO, EXIBIR
                    if (!empty($_SESSION["fornecedores"])) {
                        foreach ($_SESSION["fornecedores"] as $key => $provider) {
                            echo '
                                <tr>
                                    <th scope="row">' . ($key + 1) . '</th>
                                    <td>' . $provider["providerName"] . '</td>
                                    <td>' . $provider["providerCNPJ"] . '</td>
                                    <td>' . $provider["providerEmail"] . '</td>
                                    <td>' . $provider["providerWhatsapp"] . '</td>
                                </tr>
                                ';
                        }
                    } else {
                        echo '
                            <tr>
                                <td colspan="5">Nenhum fornecedor cadastrado</td>
                            </tr>
                            ';
                    }
                    ?>
                </tbody>
            </table>
    </div>

</body>