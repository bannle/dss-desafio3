
document.addEventListener("DOMContentLoaded", function () {
    //es para agregar un guion al dui
    const duiInput = document.querySelector('input[name="dui"]');
    const vencimientoInput = document.querySelector('input[name="fecha_vencimiento"]');

    duiInput.addEventListener("input", function () {
        let valor = this.value.replace(/\D/g, "");
        if (valor.length > 8) {
            valor = valor.slice(0, 8) + "-" + valor.slice(8, 9);
        }
        this.value = valor.slice(0, 10);
    });
    // agrega espacios en la trajeta automaticamente
    const tarjetaInput = document.querySelector('input[name="tarjeta"]');

    tarjetaInput.addEventListener("input", function () {
        let valor = this.value.replace(/\D/g, "");
        valor = valor.substring(0, 16); // solo se pueden escribir 16 nums
        let formateado = valor.replace(/(.{4})/g, "$1 ").trim(); // agrega esapcio cada 4 nums
        this.value = formateado;
    });

    //agrga una / automaticamente
    vencimientoInput.addEventListener("input", function () {
        let valor = this.value.replace(/\D/g, "");
        if (valor.length > 2) {
            valor = valor.slice(0, 2) + "/" + valor.slice(2, 4);
        }
        this.value = valor.slice(0, 5);
    });
});

setTimeout(() => {
            const alerta = document.getElementById('alertaExito');
            if (alerta) {
                alerta.style.transition = "opacity 0.5s";
                alerta.style.opacity = "0";
                setTimeout(() => alerta.remove(), 500);
            }
        }, 3000);