document.addEventListener('DOMContentLoaded', function () {
    // Editar comentario
    document.querySelectorAll('.edit-comment').forEach(button => {
        button.addEventListener('click', function () {
            const commentId = this.dataset.id;
            const newBody = prompt("Edita tu comentario:"); // Muestra un prompt para editar
            if (newBody) {
                fetch(`/comments/${commentId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ body: newBody }),
                })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        // Actualiza el comentario en el DOM, si es necesario
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    });

    // Borrar comentario
    document.querySelectorAll('.delete-comment').forEach(button => {
        button.addEventListener('click', function () {
            const commentId = this.dataset.id;
            if (confirm("¿Estás seguro de que deseas borrar este comentario?")) {
                fetch(`/comments/${commentId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        // Eliminar el comentario del DOM, si es necesario
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    });
});
