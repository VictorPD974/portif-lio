<?php
include("conexao.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Galeria de Upload</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Enviar Imagem ou Vídeo</h2>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="arquivo" required>
    <textarea name="descricao" placeholder="Digite uma descrição" required></textarea>
    <button type="submit">Enviar</button>
</form>

<hr>

<h2>Arquivos Enviados</h2>

<div class="galeria">
<?php
$sql = "SELECT * FROM uploads ORDER BY id DESC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $caminho = "uploads/" . $row['nome_arquivo'];
    $tipo = $row['tipo'];

    echo "<div class='item'>";
    echo "<p>".$row['descricao']."</p>";

    if(strpos($tipo, "image") !== false){
        echo "<img src='$caminho' width='200'>";
    } elseif(strpos($tipo, "video") !== false){
        echo "<video width='300' controls>
                <source src='$caminho' type='$tipo'>
              </video>";
    }

    echo "</div>";
}
?>
</div>

</body>
</html>
