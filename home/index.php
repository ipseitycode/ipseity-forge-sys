<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// CONFIGURATION
require 'configuration/IpseityForgeConfiguration.php';

// WIDGET
require 'widget/IpseityForgePageWidget.php';

$configuration = new IpseityForgeConfiguration();

$status = $_GET['status'] ?? null;
$sistema = $_GET['sistema'] ?? null;

if ($status) {
    $sistemaLista = $configuration->filtrarPorStatus($status);
} elseif ($sistema) {
    $sistemaLista = $configuration->filtrarPorBusca($sistema);
} else {
    $sistemaLista = $configuration->configurarSistema();
}

$page = new IpseityForgePageWidget();
$page->page($sistemaLista);