document.addEventListener('DOMContentLoaded', function () {
    // Manejador para mostrar u ocultar el dropdown de notificaciones
    function toggleDropdown() {
        var dropdown = document.getElementById('notificationDropdown');
        dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
    }

    // Llamar a la función de mostrar/ocultar el dropdown cuando se hace clic en el botón
    const notificationButton = document.querySelector('.dropdown-toggle');
    if (notificationButton) {
        notificationButton.addEventListener('click', function (event) {
            event.preventDefault(); // Evita redirección cuando se hace clic en el botón de notificaciones
            toggleDropdown(); // Mostrar u ocultar el dropdown
        });
    }

    function markAsRead(notificationId, event) {
        event.preventDefault();  // Prevenir el comportamiento predeterminado (como el enlace normal)

        // Realizar la petición para marcar la notificación como leída
        fetch(`/notifications/${notificationId}/read`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        }).then(response => {
            if (response.ok) {
                // Actualizar el contador de notificaciones
                let notificationCount = document.getElementById("notificationCount");
                notificationCount.innerText = (parseInt(notificationCount.innerText) - 1);  // Restar 1 al contador

                // Marcar la notificación como leída en la interfaz (opcionalmente, ocultándola)
                event.target.closest('li').style.display = 'none';  // Ocultar la notificación en la lista

                // Si ya no hay más notificaciones no leídas, ocultamos el dropdown o hacemos algo adicional
                if (parseInt(notificationCount.innerText) === 0) {
                    // Opcional: cerrar el dropdown si no hay más notificaciones no leídas
                    document.getElementById("notificationDropdown").style.display = "none";
                }
            }
        }).catch(error => {
            console.error("Error al marcar la notificación como leída:", error);
        });
    }


    // Añadir la lógica de marcado como leída a las notificaciones
    const notificationLinks = document.querySelectorAll('.notification-link');
    notificationLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            const notificationId = event.target.getAttribute('data-notification-id');
            markAsRead(notificationId, event);
        });
    });
});