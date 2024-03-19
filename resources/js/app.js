import './bootstrap';

document.addEventListener('DOMContentLoaded', function (){


    mostrarFechaActual();


});

function mostrarFechaActual(){
    const year = document.querySelector('#year');
    if(year){
        const fecha = new Date();
        const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        // Pasando algunas opciones y el locale como español de españa
        const fechaFormateada = fecha.toLocaleDateString('es-ES', opciones);
        // fechaFormateada vale "martes, 25 de abr de 2023"
        year.textContent = fechaFormateada;
    }
}
