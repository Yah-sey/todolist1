// Recherche en temps réel dans la liste des tâches
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const tableRows = document.querySelectorAll('#taskTable tbody tr');

    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const value = this.value.toLowerCase();

            tableRows.forEach(row => {
                const title = row.querySelector('td:first-child')?.textContent.toLowerCase();
                row.style.display = title.includes(value) ? '' : 'none';
            });
        });
    }

    // Confirmation SweetAlert2 lors de la suppression
    const deleteForms = document.querySelectorAll('form[action*="destroy"]');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Supprimer ?',
                text: "Cette action est irréversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Message flash avec SweetAlert2 si session 'success' est présente
    const flashSuccess = document.querySelector('meta[name="flash-success"]');
    if (flashSuccess && flashSuccess.content) {
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: flashSuccess.content,
            confirmButtonColor: '#28a745'
        });
    }
});
