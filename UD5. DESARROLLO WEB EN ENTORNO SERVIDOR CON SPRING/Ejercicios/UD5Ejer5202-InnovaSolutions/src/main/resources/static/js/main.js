// Puedes agregar aquí funcionalidades adicionales con jQuery

$(document).ready(function() {
    // Efecto de scroll en el navbar
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('nav').addClass('navbar-scrolled');
        } else {
            $('nav').removeClass('navbar-scrolled');
        }
    });
    
    // Validación del formulario de contacto
    $('#contactForm').submit(function(e) {
        e.preventDefault();
        
        // Aquí puedes agregar la lógica para enviar el formulario
        alert('Formulario enviado correctamente. Nos pondremos en contacto contigo pronto.');
        this.reset();
    });
    
    // Inicializar tooltips
    $('[data-toggle="tooltip"]').tooltip();
});