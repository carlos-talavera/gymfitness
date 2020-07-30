jQuery(document).ready(() => {

    // Menú móvil

    $(function () {
        $('.site-header .menu-principal .menu').slicknav({ // Ojo con el site-header, para no tener que hacer tantos arreglos en el footer
            label: '',
            appendTo: '.site-header' // Pa' indicar dónde colocarlo
        });
    });

    if($('.listado-testimoniales').length > 0) {

        // Agregar slider

        $('.listado-testimoniales').bxSlider({
            auto: true,
            mode: 'fade',
            controls: false
        });

    }

    if(document.querySelector('#lat')) { 

        const lat = document.querySelector('#lat').value,
            long = document.querySelector('#long').value,
            ubicacion = document.querySelector('#ubicacion').value;

        if (lat && long && ubicacion) {

            const map = L.map('mapa').setView([lat, long], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([lat, long]).addTo(map)
                .bindPopup(`<b>GymFitness</b><br>${ubicacion}`)
                .openPopup();

        }

    }

});

// Agrega posición fija en el header al hacer scroll

window.onscroll = () => {

    const scroll = window.scrollY;

    const headerNav = document.querySelector('.barra-navegacion');
    const documentBody = document.querySelector('body');

    // Si la cantidad de scroll es mayor a, agregar una clase

    if(scroll > 300) {

        headerNav.classList.add('fixed-top');
        documentBody.classList.add('ft-activo'); // Para eliminar el brinco que causa la barra de navegación al fijarse

    } else {

        headerNav.classList.remove('fixed-top');
        documentBody.classList.remove('ft-activo');

    }

};