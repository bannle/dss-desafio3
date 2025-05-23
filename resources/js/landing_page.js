//desvanecer mensaje
setTimeout(() => {
        const alerta = document.getElementById('alertaExito');
        if (alerta) {
            alerta.style.transition = "opacity 0.5s";
            alerta.style.opacity = "0";
            setTimeout(() => alerta.remove(), 500);
        }
    }, 3000);


//annimacion modal    
document.addEventListener('DOMContentLoaded', () => {
    // Abrir modal
    document.querySelectorAll('[data-open-modal]').forEach(btn => {
        btn.addEventListener('click', () => {
            const modalId = btn.getAttribute('data-open-modal');
            const modal = document.querySelector(`[data-modal-id="${modalId}"]`);
            if (modal) {
                modal.classList.remove('opacity-0', 'pointer-events-none');
                modal.classList.add('opacity-100', 'pointer-events-auto');
            }
        });
    });

    // Cerrar modal
    document.querySelectorAll('[data-close-modal]').forEach(btn => {
        btn.addEventListener('click', () => {
            const modal = btn.closest('[data-modal-id]');
            if (modal) {
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                modal.classList.add('opacity-0', 'pointer-events-none');
            }
        });
    });
});
