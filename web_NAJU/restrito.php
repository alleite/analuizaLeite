<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

// Defina o caminho da pasta de imagens
$imageDir = 'images/';

// Inicializar o vetor de imagens na sessão, se ainda não existir
if (!isset($_SESSION['images'])) {
    // Crie um array para armazenar as imagens existentes
    $_SESSION['images'] = [];

    // Liste as imagens na pasta
    $files = scandir($imageDir);
    foreach ($files as $file) {
        // Verifique se é um arquivo de imagem (pode ajustar os tipos conforme necessário)
        if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
            $_SESSION['images'][] = $file; // Adicione o arquivo ao array
        }
    }

    // Se não houver imagens na pasta, adicione imagens padrão
    if (empty($_SESSION['images'])) {
        $_SESSION['images'] = ['img1.png', 'img2.png', 'img3.png', 'img4.png', 'img5.png'];
    }
}

// Função que manipula a galeria de imagens
function imageGallery($action = null, $imageDir) {
    // Acessar o vetor de imagens da sessão
    $images = &$_SESSION['images'];

    // Ações com base no botão clicado
    switch ($action) {
        case 'sort':
            // Ordenar o array de imagens
            sort($images);
            break;
            case 'add':
                array_push($images, 'img6.png');
                break;
            case 'duplicate':
                if (!empty($images)) {
                    $last_image = end($images);
                    array_push($images, $last_image);
                }
                break;
        case 'remove':
            // Remover a primeira imagem do array, se existir
            if (count($images) > 0) {
                array_shift($images);
            }
            break;
        case 'reverse':
            // Inverter a ordem do array de imagens
            $images = array_reverse($images);
            break;
    }

    // Contar a quantidade de imagens
    $image_count = count($images);

    // Exibir as imagens
    echo "<div class='galeria'>";
    if ($image_count > 0) {
        foreach ($images as $image) {
            echo "<img src='{$imageDir}$image' alt='Image' class='img-fluid' style='max-width: 250px; max-height: 250px; margin-right: 10px; margin-bottom: 10px; margin-top: 50px'>";
        }
    } else {
        echo "<p class='text-center text-dark fs-5'>Não há imagens na galeria.</p>";
    }
    echo "</div>";

    echo "<p class='text-center text-dark mt-5 fs-5'>Total de imagens: $image_count</p>";
}

// Capturar a ação via botão    
$action = isset($_POST['action']) ? $_POST['action'] : null;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Restrita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<div class="main container-fluid">
        <div id="div-textos"><br>
        <h2 class="text-center fs-1">Bem-vindo de volta!</h2>
        <p class="text-center fs-4">Manipule as novas imagens da galeria abaixo:</p>
        </div>
        <!-- Formulário com botões para manipular a galeria -->
        <div class="div-botoes">
        <form method="POST" class="mb-3 text-center">
        <button type="submit" name="action" value="sort" class="btn  text-center me-3">Ordenar Imagens</button>
            <button type="submit" name="action" value="add" class="btn text-center me-3">Adicionar Imagem</button>
            <button type="submit" name="action" value="duplicate" class="btn text-center">Duplicar Última Imagem</button>
            <button type="submit" name="action" value="remove" class="btn text-center ms-3">Remover a Primeira Imagem</button>
            <button type="submit" name="action" value="reverse" class="btn text-center ms-3">Inverter Ordem das Imagens</button>
        </form>
        </div>
        <!-- Exibir a galeria -->
        <div class="div-images">
        <?php imageGallery($action, $imageDir); ?>
        </div>
</div>
</body>
</html>
