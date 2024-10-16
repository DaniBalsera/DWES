const alumnos = ["Bermúdez González, Raúl", "Cañas González, Álvaro", "Carmona Cicchetti, Miguel", 
    "Carrasco Castellano, Alejandro", "Cherif Mouaki Almabouada, Mostafa",
    "Coronado Ortega, Alejandro", "Delgado Morente, Juan Diego", "Escoto García, Marlon Jafet", 
    "Fernández Ariza, Ángel", "Fernández Arrayás, Alejandro", "Fernández Balsera, Daniel", 
    "Ferrer López, Jesús", "Frías Rojas, Jesús", "Galán Navas, Manuel", "García Báez, Víctor", 
    "García Díaz, Lucía", "González Martínez, Adrián", "Mariño Jiménez, Enrique", 
    "Martín-Castaño Carrillo, Oscar", "Mayén Pérez, José María", "Mérida Velasco, Pablo", 
    "Mora Sánchez, Héctor", "Pérez Cantarero, Luis", "Romero Romero, Carlos", "Ruiz Molero, Javier", 
    "Vaquero Abad, Alejandro", "Villén Moyano, Luís Miguel"];


//Funcion seleccionarNombreAleatorio


function seleccionarNombreAleatorio()
{
    const indiceAleatorio = Math.floor(Math.random() * alumnos.length);
    return alumnos[indiceAleatorio];
}

//Referencias a los elementos html que usamos


const palanca = document.getElementById('palanca');
const resultado = document.getElementById('resultado');

//Agregamos el evento click a la palanca

palanca.addEventListener('click', () => {

    
    const nombreSeleccionado = seleccionarNombreAleatorio();
    resultado.textContent = nombreSeleccionado;
});

