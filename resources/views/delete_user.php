<?php
require_once 'conexao.php'; // Ou a conexão que você estiver utilizando

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Query para deletar o usuário
    DB::table('exemplo_tabela')->where('id', $id)->delete();

    // Redireciona de volta para a página de listagem
    header('Location: list_users.php');
    exit();
}
?>
