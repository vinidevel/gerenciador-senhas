document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('input[name="search_nome"]');
    if (searchInput) {
        const indexUrl = searchInput.getAttribute('data-index-url');
        searchInput.addEventListener('input', function () {
            if (this.value.trim() === '') {
                window.location.href = indexUrl;
            }
        });
    }
});