<?php
require_once 'includes/config.php';

$cotacaoDolar = getCotacaoDolar();
$compraDolar = $cotacaoDolar ? number_format($cotacaoDolar['cotacaoCompra'], 4, ',', '.') : 'N/A';
$vendaDolar = $cotacaoDolar ? number_format($cotacaoDolar['cotacaoVenda'], 4, ',', '.') : 'N/A';
$dataCotacao = $cotacaoDolar ? date('d/m/Y', strtotime($cotacaoDolar['dataHoraCotacao'])) : 'N/A';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Financeira</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-20">Calculadora Financeira</h1>
        
        <!-- Informações de Mercado -->
        <div class="card mb-20">
            <h3>Informações de Mercado</h3>
            <p>Dólar Compra: R$ <?php echo $compraDolar; ?></p>
            <p>Dólar Venda: R$ <?php echo $vendaDolar; ?></p>
            <p>Data Cotação: <?php echo $dataCotacao; ?></p>
        </div>
        
        <!-- Formulário Principal -->
        <div class="card">
            <form id="calculadora-form">
                <div class="form-group">
                    <label for="rendaTributavel">Renda Anual Tributável (R$):</label>
                    <input type="number" id="rendaTributavel" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="aporteInicial">Aporte Inicial (R$):</label>
                    <input type="number" id="aporteInicial" class="form-control" value="0">
                </div>

                <div class="form-group">
                    <label for="anos">Período (anos):</label>
                    <input type="number" id="anos" class="form-control" required min="1">
                </div>

                <div class="form-group">
                    <label for="cdi">Taxa CDI Anual (%):</label>
                    <input type="number" id="cdi" class="form-control" value="10" step="0.01" required>
                </div>

                <button type="submit" class="btn">Calcular</button>
            </form>
        </div>

        <!-- Resultados -->
        <div id="resultados" class="card results">
            <h2>Resultados da Simulação</h2>
            
            <!-- PGBL -->
            <div class="card mb-20">
                <h3>Resultados PGBL</h3>
                <table class="table">
                    <tr>
                        <td>Valor Total Acumulado:</td>
                        <td id="pgblAcumulado" class="text-right">-</td>
                    </tr>
                    <tr>
                        <td>Desembolso Efetivo:</td>
                        <td id="pgblDesembolso" class="text-right">-</td>
                    </tr>
                    <tr>
                        <td>IR no Resgate:</td>
                        <td id="pgblIR" class="text-right">-</td>
                    </tr>
                    <tr>
                        <td>Valor Líquido:</td>
                        <td id="pgblLiquido" class="text-right">-</td>
                    </tr>
                </table>
            </div>

            <!-- CDB -->
            <div class="card mb-20">
                <h3>Resultados CDB</h3>
                <table class="table">
                    <tr>
                        <td>Valor Total Acumulado:</td>
                        <td id="cdbAcumulado" class="text-right">-</td>
                    </tr>
                    <tr>
                        <td>Desembolso Efetivo:</td>
                        <td id="cdbDesembolso" class="text-right">-</td>
                    </tr>
                    <tr>
                        <td>IR no Resgate:</td>
                        <td id="cdbIR" class="text-right">-</td>
                    </tr>
                    <tr>
                        <td>Valor Líquido:</td>
                        <td id="cdbLiquido" class="text-right">-</td>
                    </tr>
                </table>
            </div>

            <!-- Detalhamento Anual -->
            <div class="card mb-20">
                <h3>Detalhamento Anual</h3>
                <div class="table-responsive">
                    <table class="table" id="tabelaDetalhes">
                        <thead>
                            <tr>
                                <th>Ano</th>
                                <th>Aporte PGBL</th>
                                <th>Restituição PGBL</th>
                                <th>Saldo PGBL</th>
                                <th>Aporte CDB</th>
                                <th>Saldo CDB</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Preenchido via JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Gráfico de Evolução -->
            <div class="card">
                <h3>Evolução do Investimento</h3>
                <canvas id="graficoEvolucao"></canvas>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p><strong>Luciana Araujo</strong> - Telefone: <strong>(61) 98342-6774</strong></p>
    </footer>

    <script src="assets/js/calculadora.js"></script>
</body>
</html>
