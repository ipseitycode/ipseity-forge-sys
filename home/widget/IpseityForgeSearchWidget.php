<?php
$layoutValue = $_GET['layout'] ?? null;
?>

<div class="search-widget">
    <div class="search-widget__area">

        <div class="search-widget__sidebar">
            <a class="search-widget__sidebar_link">
                <div class="search-widget__sidebar_wrapper">
                    <img 
                    src="https://busqe.com/ximages/widget/icons/icon-form-justify-left.png" 
                    XXXsrc="https://busqe.com/ximages/widget/icons/icon-galery.png" 
                    alt="home" 
                    draggable="false">
                </div>
            </a> 
        </div>

        <a href="https://busqe.com/sites-dev/labs/ipseitystudios/sistemas/ipseity-Forge-sys/home/" class="search-widget__logo">
            <div class="search-widget__logo_text">
                IPSEITY-Forge-SYS
            </div>
        </a>  

        <div class="search-widget__search">
            <form 
            class="search-widget__search_bar" 
            action="https://busqe.com/sites-dev/labs/ipseitystudios/sistemas/ipseity-Forge-sys/home/" 
            method="GET">

                <input 
                class="search-widget__search_input" 
                type="text" 
                name="layout" 
                id="search-hidden-input"

                <?php if (!empty($layoutValue)): ?>
                    value="<?= htmlspecialchars($layoutValue) ?>"
                <?php else: ?>
                    placeholder="Buscar Layout"
                <?php endif; ?>
                >

                <button class="search-widget__search_button" type="submit">
                    <img 
                    src="/ximages/images/widget/medium//icon-search.svg"
                    draggable="false"  
                    alt="Botao Pesquisar">
                </button>
            </form>
        </div>

    </div>
</div>