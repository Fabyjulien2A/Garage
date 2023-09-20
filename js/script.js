document.addEventListener("DOMContentLoaded", function () {

    const modalContainer = document.createElement('div');
    modalContainer.classList.add('modal-container');
    document.body.appendChild(modalContainer);
    
    const container = document.getElementById("cartes-container");

    //Requête XMLHttpRequest pour récupérer les données des véhicules
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "recupInfoCar.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);

            data.forEach((item, i) => {
                const carte = document.createElement("div");
                carte.classList.add("carte");

                const image = document.createElement("img");
                image.src = item.photos;
                carte.appendChild(image);

                const titre = document.createElement("h3");
                titre.textContent = item.modele;
                carte.appendChild(titre);

                const description = document.createElement("p");
                description.innerHTML = `
                    Année : ${item.annee}<br>
                    Énergie : ${item.energie}<br>
                    Kilométrage : ${item.kilometrage} km<br>
                    Prix : ${item.prix} €`;
                carte.appendChild(description);

                const bouton = document.createElement("button");
                bouton.textContent = "Détails";
                carte.appendChild(bouton);

                bouton.addEventListener('click', function () {
                    afficherDetails(i); 
                });

                container.appendChild(carte);
            });
        } else {
            console.error("Erreur lors de la récupération des données des voitures");
        }
    };
    xhr.send();

    // Fonction pour afficher les détails du véhicule en tant que modale
    function afficherDetails(index) {
        const modalContainer = document.querySelector('.modal-container'); // Obtenir l'élément modal-container
    
        modalContainer.innerHTML = ''; // Efface le contenu précédent de la modale
        const modalContent = document.createElement('div');
        modalContent.classList.add('modal-content');
         

        //Nouvelle requête XMLHttpRequest pour récupérer les détails du véhicule
        const modalXHR = new XMLHttpRequest();
        modalXHR.open("GET", `recupInfoModale.php?index=${index}`, true);
        modalXHR.onload = function () {
            if (modalXHR.status === 200) {
                const modalData = JSON.parse(modalXHR.responseText);
    
                modalData.forEach(item => {
                    const modalText = document.createElement('p');
                    modalText.innerHTML = `
                        Equipements : ${item.equipements}<br>
                        Equipements conduite : ${item.equipements_conduite}<br>
                        Nom du moteur : ${item.nom_du_moteur}<br>
                        Puissance : ${item.puissance}<br>
                        Transmission : ${item.transmission}<br>`;
                    modalContent.appendChild(modalText);
    
                    const closeButton = document.createElement('span');
                    closeButton.classList.add('close');
                    closeButton.textContent = 'X';
                    modalContent.appendChild(closeButton);
    
                    modalContainer.appendChild(modalContent);
                    modalContainer.style.display = 'block';
    
                    const photosGalerie1 = item.photos_galerie;
                    if (photosGalerie1) {
                        const photoUrls = photosGalerie1.split(' ');
                        photoUrls.forEach(photoUrl => {
                            const modalImage = document.createElement('img');
                            modalImage.src = photoUrl;
                            modalContent.appendChild(modalImage);
                        });
                    }

                    const contactButton = document.createElement('a');
                    contactButton.href = '../contact/formulaireContact.php';
                    const contactButtonInner = document.createElement('button');
                    contactButtonInner.textContent = 'Formulaire de contact';
                    contactButton.appendChild(contactButtonInner);
                    modalContent.appendChild(contactButton);
    
                    closeButton.addEventListener('click', function () {
                        modalContainer.style.display = 'none';
                    });

                    modalContainer.appendChild(modalContent);
                    modalContainer.style.display = 'block';



                });
            } else {
                console.error("Erreur lors de la récupération des données pour la modale");
            }
        };
        modalXHR.send();
    }
});

//filtre véhicules
// Écouteurs d'événements pour les éléments de filtrage
const yearFilter = document.getElementById("year-filter");
const priceFilter = document.getElementById("price-filter");
const mileageFilter = document.getElementById("mileage-filter");

yearFilter.addEventListener("change", applyFilters);
priceFilter.addEventListener("change", applyFilters);
mileageFilter.addEventListener("change", applyFilters);

const filterButton = document.getElementById("filter-button");
filterButton.addEventListener("click", applyFilters);

// Fonction pour appliquer les filtres
function applyFilters() {
    const selectedYear = yearFilter.value;
    const selectedPrice = priceFilter.value;
    const selectedMileage = mileageFilter.value;

    // Effectuer la requête XMLHttpRequest avec les paramètres de filtrage
    const filteredXHR = new XMLHttpRequest();
    const url = `filtre.php?year=${selectedYear}&price=${selectedPrice}&mileage=${selectedMileage}`;

    filteredXHR.open("GET", url, true);
    filteredXHR.onload = function () {
        if (filteredXHR.status === 200) {
            const filteredData = JSON.parse(filteredXHR.responseText);

            // Mettre à jour l'affichage avec les données filtrées
            const cartesContainer = document.getElementById("cartes-container");
            cartesContainer.innerHTML = ""; // Effacer le contenu actuel

            // Boucle à travers les données filtrées et créer les éléments de carte correspondants
            filteredData.forEach(item => {
                const carte = document.createElement("div");
                carte.classList.add("carte");

                const image = document.createElement("img");
                image.src = item.photos;
                carte.appendChild(image);

                const titre = document.createElement("h3");
                titre.textContent = item.modele;
                carte.appendChild(titre);

                const description = document.createElement("p");
                description.innerHTML = `
                    Année : ${item.annee}<br>
                    Énergie : ${item.energie}<br>
                    Kilométrage : ${item.kilometrage} km<br>
                    Prix : ${item.prix} €`;
                carte.appendChild(description);

                cartesContainer.appendChild(carte);
            });

        } else {
            console.error("Erreur lors de la récupération des données filtrées");
        }
    };
    
    filteredXHR.send();
}

