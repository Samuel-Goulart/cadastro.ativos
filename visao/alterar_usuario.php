<?php
include_once('../controle/controle_session.php');
include('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');
$idrequerido = $_GET['id_usuario'];
include('cabecalho.php');
include('menu_superior.php');
$info_bd = busca_info_bd($conexao, 'usuario', 'idUsuario', $idrequerido);
$cargos = busca_info_bd($conexao, 'cargo');
foreach ($info_bd as $user) {
  $nome = $user['nomeUsuario'];
  $turma = $user['turmaUsuario'];
  $idUsuario = $user['idUsuario'];
  $idCargo = $user['idCargo'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alteração de Usuário</title>
  <!-- Adicionando o link do Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 30px;
      background-color: #f8f9fa;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #007bff;
      margin-bottom: 20px;
    }
    .form-control {
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <!-- Formulário de alteração de usuário -->
    <div class="form-container">
      <h2>Alterar Informações do Usuário</h2>
      <form action="../controle/altera_usuario_controle.php" method="POST">
        <input type="hidden" name="idUsuario" value="<?php echo $idUsuario ?>">

        <div class="mb-3">
          <label for="turma" class="form-label">Turma</label>
          <input type="text" required name='turma' class="form-control" value="<?php echo $turma ?>" id="turma">
        </div>

        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" required name='nome' class="form-control" value="<?php echo $nome ?>" id="nome">
        </div>

        <div class="mb-3">
          <label for="cargo" class="form-label">Cargo</label>
          <select name="cargo" class="form-control">
            <option value="">Selecione o Cargo</option>
            <?php
            foreach ($cargos as $value) {
              $selected = ($value['idCargo'] == $idCargo) ? 'selected' : '';
              echo '<option value="' . $value['idCargo'] . '" ' . $selected . '>' . $value['descricaoCargo'] . '</option>';
            }
            ?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">Enviar</button>
      </form>
    </div>
  </div>

  <!-- Adicionando o JS do Bootstrap para funcionalidade -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
