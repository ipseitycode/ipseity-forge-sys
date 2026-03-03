<?php

if (php_sapi_name() !== 'cli') {
    exit("Este script deve ser executado via linha de comando.\n");
}

// Recebe o nome como argumento
$nome = $argv[1] ?? null;

if (empty($nome)) {
    echo "Erro: informe o nome do layout.\n";
    echo "Uso: php create-layout.php nome-do-layout\n";
    exit(1);
}

// Normaliza nome
$nome = strtolower($nome);
$Nome = ucfirst($nome);

// Caminho base
$basePath = "{$nome}-layout";

// Criar estrutura de pastas
$directories = [
    "$basePath/assets/html",
    "$basePath/assets/css",
    "$basePath/configuration",
    "$basePath/widget"
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Criar arquivos HTML e CSS
$files = [
    "$basePath/assets/html/ipseity-{$nome}.html",
    "$basePath/assets/css/ipseity-{$nome}.css"
];

foreach ($files as $file) {
    if (!file_exists($file)) {
        file_put_contents($file, '');
    }
}

// copiar e substituir
function copyWithReplace($source, $destination, $Nome, $nome)
{
    if (!file_exists($source)) {
        echo "Erro: Arquivo fonte não encontrado: {$source}\n";
        exit(1);
    }

    $content = file_get_contents($source);
    $content = str_replace("Example", $Nome, $content);
    $content = str_replace("example", $nome, $content);

    file_put_contents($destination, $content);
}

copyWithReplace(
    "home/model/example-layout/configuration/IpseityForgeExampleConfiguration.php",
    "$basePath/configuration/IpseityForge{$Nome}Configuration.php",
    $Nome,
    $nome
);

copyWithReplace(
    "home/model/example-layout/widget/IpseityForgeExampleWidget.php",
    "$basePath/widget/IpseityForge{$Nome}Widget.php",
    $Nome,
    $nome
);

copyWithReplace(
    "home/model/example-layout/index.php",
    "$basePath/index.php",
    $Nome,
    $nome
);

echo "Sucesso: Layout '{$nome}' criado com sucesso.\n";
exit(0);