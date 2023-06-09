// Récupération de la case à cocher
const checkbox = document.getElementById('livraison');

// Récupération du div contenant les nouveaux champs
const autresInfosDiv = document.getElementById('livraisonInfo');

// Fonction pour afficher ou masquer les nouveaux champs en fonction de l'état de la case à cocher
function toggleAutresInfos() {
    if (checkbox.checked) {
        autresInfosDiv.style.display = 'block';
    } else {
        autresInfosDiv.style.display = 'none';
    }
}

// Appel de la fonction au chargement de la page pour initialiser l'état des champs
toggleAutresInfos();

// Écoute de l'événement "change" sur la case à cocher pour mettre à jour l'affichage des champs
checkbox.addEventListener('change', toggleAutresInfos);