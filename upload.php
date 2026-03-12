<?php
include("conexao.php");

if(isset($_FILES['arquivo'])){

    $arquivo = $_FILES['arquivo'];
    $descricao = $_POST['descricao'];

    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $tipo = $arquivo['type'];

    $permitidos = ["image/jpeg", "image/png", "image/jpg", "video/mp4", "video/webm"];

    if(!in_array($tipo, $permitidos)){
        die("Tipo de arquivo não permitido!");
    }

    $novo_nome = time() . "_" . $nome;
    $pasta = "uploads/";
    $caminho = $pasta . $novo_nome;

    if(move_uploaded_file($tmp, $caminho)){

        $sql = "INSERT INTO uploads (nome_arquivo, descricao, tipo)
                VALUES ('$novo_nome', '$descricao', '$tipo')";

        $conn->query($sql);

        header("Location: index.php");
        exit;

    } else {
        echo "Erro ao enviar arquivo.";
    }
}
?>
