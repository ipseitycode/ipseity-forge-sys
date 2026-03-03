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
$layout = $_GET['layout'] ?? null;

if ($status) {
    $layoutLista = $configuration->filtrarPorStatus($status);
} elseif ($layout) {
    $layoutLista = $configuration->filtrarPorBusca($layout);
} else {
    $layoutLista = $configuration->configurarLayout();
}

$page = new IpseityForgePageWidget();
$page->page($layoutLista);