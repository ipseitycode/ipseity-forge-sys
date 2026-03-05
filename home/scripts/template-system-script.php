<?php

if (php_sapi_name() !== 'cli') {
    exit("Este script deve ser executado via linha de comando.\n");
}

// Recebe o nome como argumento
$prefixo = $argv[1] ?? null;
$infixo = $argv[2] ?? null;
$sufixo = $argv[3] ?? null;

// Normaliza
$prefixo = strtolower($prefixo);
$Prefixo = ucfirst($prefixo);

$infixo = strtolower($infixo);
$Infixo = ucfirst($infixo);

$sufixo = strtolower($sufixo);
$Sufixo = ucfirst($sufixo);

// Caminho base
$basePath = "{$prefixo}-{$infixo}-{$sufixo}";

// Criar estrutura de pastas
$directories = [
    "$basePath/configuration",
    "$basePath/controller",
    "$basePath/exception",
    "$basePath/mockup",
    "$basePath/repository",
    "$basePath/request",
    "$basePath/response",
    "$basePath/service",
    "$basePath/validator",
    "$basePath/view",
    "$basePath/widget",
    "$basePath/includes"
];

foreach ($directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// copiar e substituir
function copyWithReplace($source, $destination, $Infixo, $infixo, $Prefixo, $prefixo)
{
    if (!file_exists($source)) {
        echo "Erro: Arquivo fonte não encontrado: {$source}\n";
        exit(1);
    }

    $content = file_get_contents($source);
    $content = str_replace("Example", $Infixo, $content);
    $content = str_replace("example", $infixo, $content);

    $content = str_replace("Ipseity", $Prefixo, $content);
    $content = str_replace("ipseity", $prefixo, $content);

    file_put_contents($destination, $content);
}

copyWithReplace(
    "home/model/example-system/configuration/IpseityExampleConfiguration.php",
    "$basePath/configuration/{$Prefixo}{$Infixo}Configuration.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/controller/IpseityExampleController.php",
    "$basePath/controller/{$Prefixo}{$Infixo}Controller.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/exception/IpseityExampleException.php",
    "$basePath/exception/{$Prefixo}{$Infixo}Exception.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/mockup/IpseityExampleMockup.php",
    "$basePath/mockup/{$Prefixo}{$Infixo}Mockup.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/repository/IpseityExampleRepository.php",
    "$basePath/repository/{$Prefixo}{$Infixo}Repository.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/request/IpseityExampleRequest.php",
    "$basePath/request/{$Prefixo}{$Infixo}Request.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/response/IpseityExampleResponse.php",
    "$basePath/response/{$Prefixo}{$Infixo}Response.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/service/IpseityExampleService.php",
    "$basePath/service/{$Prefixo}{$Infixo}Service.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/validator/IpseityExampleValidator.php",
    "$basePath/validator/{$Prefixo}{$Infixo}Validator.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/view/IpseityExampleView.php",
    "$basePath/view/{$Prefixo}{$Infixo}View.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/widget/IpseityExampleWidget.php",
    "$basePath/widget/{$Prefixo}{$Infixo}Widget.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

copyWithReplace(
    "home/model/example-system/index.php",
    "$basePath/index.php",
    $Infixo,
    $infixo,
    $Prefixo,
    $prefixo
);

echo "Sucesso: System '{$prefixo}-{$infixo}-{$sufixo}' criado com sucesso.\n";
exit(0);