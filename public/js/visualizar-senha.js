document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-senha').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const input = btn.closest('div').querySelector('.senha-input');
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    });
});
