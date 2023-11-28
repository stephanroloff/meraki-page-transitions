export default function redirection(element, time){
    // Espera 2 segundos (2000 milisegundos) antes de redirigir
    setTimeout(function() {
        // Obtiene la URL de destino del atributo "href" del enlace
        var destino = element.getAttribute('href');
        // Redirige a la página de destino después de la animación
        window.location.href = destino;
    }, time); 
}