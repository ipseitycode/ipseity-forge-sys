document.addEventListener('DOMContentLoaded', function () {
    // Pega o parâmetro status da URL
    const urlParams = new URLSearchParams(window.location.search);
    const currentStatus = urlParams.get('status');

    // Se houver status, marca a aba correspondente
    if (currentStatus) {
        const activeLink = document.querySelector(`[data-status="${currentStatus}"]`);
        if (activeLink) {
            activeLink.classList.add('tabs-widget__link--active');
        }
    } else {
        // Se não houver parâmetro, marca "Todos" como padrão
        const todosLink = document.querySelector('[data-status="todos"]');
        if (todosLink) {
            todosLink.classList.add('tabs-widget__link--active');
        }
    }
});