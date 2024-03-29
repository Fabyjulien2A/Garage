document.addEventListener("DOMContentLoaded", function () {
    const modalContainer = document.createElement('div');
    modalContainer.classList.add('modal-container');
    document.body.appendChild(modalContainer);

    const container = document.getElementById("cartes-container");
    let originalData; // Garde une copie des données d'origine

    // Requête XMLHttpRequest pour récupérer les données des véhicules
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "recupInfoCar.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            originalData = JSON.parse(xhr.responseText);
            updateCards(originalData);
        } else {
            console.error("Erreur lors de la récupération des données des voitures");
        }
    };
    xhr.send();

    // Fonction pour afficher les détails du véhicule en tant que modale
    function afficherDetails(index, filteredData) {
        const modalContainer = document.querySelector('.modal-container');
        modalContainer.innerHTML = '';
        const modalContent = document.createElement('div');
        modalContent.classList.add('modal-content');

        const item = filteredData[index];

        // Nouvelle requête XMLHttpRequest pour récupérer les détails du véhicule
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

    // Filtre véhicules
    const yearFilter = document.getElementById("year-filter");
    const priceFilter = document.getElementById("price-filter");
    const mileageFilter = document.getElementById("mileage-filter");

    yearFilter.addEventListener("change", applyFilters);
    priceFilter.addEventListener("change", applyFilters);
    mileageFilter.addEventListener("change", applyFilters);

    const filterButton = document.getElementById("filter-button");
    filterButton.addEventListener("click", applyFilters);

    function applyFilters() {
        const selectedYear = yearFilter.value;
        const selectedPrice = priceFilter.value;
        const selectedMileage = mileageFilter.value;

        const url = `filtre.php?year=${selectedYear}&price=${selectedPrice}&mileage=${selectedMileage}`;

        const filteredXHR = new XMLHttpRequest();
        filteredXHR.open("GET", url, true);
        filteredXHR.onload = function () {
            if (filteredXHR.status === 200) {
                const filteredData = JSON.parse(filteredXHR.responseText);
                updateCards(filteredData);
            } else {
                console.error("Erreur lors de la récupération des données filtrées");
            }
        };

        filteredXHR.send();
    }

    // Fonction pour mettre à jour les cartes
    function updateCards(data) {
        const cartesContainer = document.getElementById("cartes-container");
        cartesContainer.innerHTML = "";
    
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
    
            const detailsButton = document.createElement("button");
            detailsButton.textContent = "Détails";
            detailsButton.addEventListener("click", function () {
                // Utilisez le bon index avec les données filtrées
                const index = originalData.findIndex(originalItem => originalItem.modele === item.modele);
                afficherDetails(index, originalData);
            });
            carte.appendChild(detailsButton);
    
            cartesContainer.appendChild(carte);
        });
    }
});