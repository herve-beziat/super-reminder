const urlParams = new URLSearchParams(window.location.search);
const form = urlParams.get('form');

// Afficher le formulaire correspondant
if (form === 'connexion') {
    // Charger le formulaire de connexion dans la div "container-form-signup"
    fetch('../viewer/connexion.php')
        .then(Response => Response.text())
        .then(data => {
            document.getElementById('container-form-sign').innerHTML = data;
        });
    } else if (form === 'inscription'){
        // Charger le formulaire d'inscription dans la div "container-form-signup"
        fetch('../viewer/inscription.php')
            .then(Response => Response.text())
            .then(data => {
                document.getElementById('container-form-sign').innerHTML = data;
            });
    }