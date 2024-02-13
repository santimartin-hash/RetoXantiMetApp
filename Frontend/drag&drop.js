function handleDragStart(event) {

    var idElementoAgarrado = event.target.id;
    event.dataTransfer.setData("idElementoAgarrado", idElementoAgarrado); // Almacenar el ID en el evento de arrastre

    console.log("ID del elemento agarrado:", idElementoAgarrado);
    event.currentTarget.style.cursor = "grabbing";
}

function handleDragOver(event) {
    event.preventDefault();

}


// Obtener el ID del usuario actual desde sessionStorage
const userId = sessionStorage.getItem('userId');

// Obtener el array de usuarios del localStorage
const arrayDeUsuarios = JSON.parse(localStorage.getItem('usuarios')) || [];

// Buscar el usuario correspondiente en el array de usuarios
const usuario = arrayDeUsuarios.find(user => user.id === userId);

console.log(usuario);

function handleDrop(event, cartaId) {
    var idElementoAgarrado = event.dataTransfer.getData("idElementoAgarrado");
    console.log("Elemento soltado en la carta con ID:", cartaId);
    // Extraer los dígitos de la cadena cartaId y guardarlos en una variable aparte
    var numerosCarta = cartaId.match(/\d+/g);
    console.log(numerosCarta)

    // Encontrar el elemento en la carta con el mismo ID que idElementoAgarrado
    var elementoCarta = document.querySelector(`#${cartaId} #${idElementoAgarrado}`);
    if (elementoCarta) {
        elementoCarta.style.display = "block"
    } else {
        console.log("No se encontró ningún elemento en la carta con el ID:", idElementoAgarrado);
    }

}


function EliminarItem(NombreItem) {
    var elementos = document.querySelectorAll('.cartitas div[id="' + NombreItem + '"]');
    elementos.forEach(function (elemento) {
        elemento.style.display = "none";
    });

}

function DropHandler(event) {
    var idElementoAgarrado = event.dataTransfer.getData("idElementoAgarrado");
    EliminarItem(idElementoAgarrado);
}

document.addEventListener("dragend", function (event) {
    event.target.style.cursor = "pointer";
    console.log("Elemento soltado:", event.target.id);
});
