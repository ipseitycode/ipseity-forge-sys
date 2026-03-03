<?php

class IpseityForgePageWidget {


    public function page($sistemaLista) {
    ?>
        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="refresh" content="">

	        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

            <link rel="stylesheet" type="text/css" href="assets/css/style.css?<?=time() ?>">
            <link rel="stylesheet" type="text/css" href="assets/css/IpseityForgeSearchStyle.css?<?=time() ?>">
            <link rel="stylesheet" type="text/css" href="assets/css/IpseityForgeTabsStyle.css?<?=time() ?>">
            <link rel="stylesheet" type="text/css" href="assets/css/IpseityForgeBridgecardStyle.css?<?=time() ?>">

            <script src="assets/js/IpseityForgeTabsScript.js?v1<?=time() ?>"></script>

            <title>Home</title>
        </head>
        <body>
            <div class="page">
                <div class="page__header">
                <?
                    include 'IpseityForgeSearchWidget.php';
                ?>
                </div>
                <div class="page__body">
                <?
                    $this->tabs($sistemaLista);
                    $this->card($sistemaLista);
                ?>
                </div>
                <div class="page__footer">
                
                </div>
            </div>
        </body>
    <?
    }

    public function card($sistemaLista) { 

        $mapStatus = [
            1 => 'danger',    // cancelado
            2 => 'success',   // fazendo
            3 => 'warning',   // atrasado
            4 => 'primary',   // concluido
            5 => 'secondary', // indefinido
        ];

        foreach (range('A', 'Z') as $letra) {

            $itensDaLetra = array_filter($sistemaLista, function($item) use ($letra) {
                return strtoupper(substr($item['nome'], 0, 1)) === $letra
                    && $item['publicar'] != 0;
            });
            ?>

            <div class="bridgecard-widget">

                <div class="bridgecard-widget__letter">
                    <div class="bridgecard-widget__main-title">
                        Letra - <?= $letra ?>
                    </div>

                    <?php if (empty($itensDaLetra)): ?>
                        <div class="bridgecard-widget__main-subtitle">
                            Nenhum sistema foi encontrado com essa letra
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (!empty($itensDaLetra)): ?>
                    <div class="bridgecard-widget__area">

                        <?php foreach ($itensDaLetra as $item): 
                            $classeCor = $mapStatus[$item['status']] ?? 'light';
                        ?>

                            <div class="bridgecard-widget__small <?= $classeCor ?>">
                                <a href="../<?= $item['url'] ?>" class="bridgecard-widget__small_area">

                                    <div class="bridgecard-widget__small_icon">
                                        <div class="bridgecard-widget__small_icon-wrapper">
                                            <img src="https://busqe.com/ximages/widget/icons/icon-form-hash.png"
                                                draggable="false"
                                                alt="<?= $item['nome'] ?>">
                                        </div>
                                    </div>

                                    <div class="bridgecard-widget__small-description">
                                        <div class="bridgecard-widget__small-description_name">
                                            <?= $item['nome'] ?>
                                        </div>
                                        <div class="bridgecard-widget__small-description_info">
                                            <?= $item['url'] ?>
                                        </div>
                                    </div>

                                </a>
                            </div>

                        <?php endforeach; ?>

                    </div>
                <?php endif; ?>

            </div>

            <?php
        }
    }

    public function tabs($sistemaLista) { 
    ?>
        <nav class="tabs-widget">
            <ul class="tabs-widget__list">
                <li class="tabs-widget__item">
                    <a href="?" class="tabs-widget__link" data-status="todos">
                        Todos
                    </a>
                </li>
                <li class="tabs-widget__item">
                    <a href="?status=cancelado" class="tabs-widget__link" data-status="cancelado">
                        Cancelado
                    </a>
                </li>
                <li class="tabs-widget__item">
                    <a href="?status=fazendo" class="tabs-widget__link" data-status="fazendo">
                        Fazendo
                    </a>
                </li>
                <li class="tabs-widget__item">
                    <a href="?status=atrasado" class="tabs-widget__link" data-status="atrasado">
                        Atrasado
                    </a>
                </li>
                <li class="tabs-widget__item">
                    <a href="?status=concluido" class="tabs-widget__link" data-status="concluido">
                        Concluído
                    </a>
                </li>
                <li class="tabs-widget__item">
                    <a href="?status=indefinido" class="tabs-widget__link" data-status="indefinido">
                        Indefinido
                    </a>
                </li>
            </ul>
        </nav>
    <?php
    }
}