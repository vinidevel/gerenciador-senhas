let formToDelete = null;

document.querySelectorAll('.delete-form button[type="button"]').forEach(btn => {
    btn.addEventListener('click', function(e) {
        formToDelete = btn.closest('form');
        document.getElementById('delete-modal').classList.remove('hidden');
    });
});

document.getElementById('cancel-delete').onclick = function() {
    document.getElementById('delete-modal').classList.add('hidden');
    formToDelete = null;
};

document.getElementById('confirm-delete').onclick = function() {
    if (formToDelete) formToDelete.submit();
};
