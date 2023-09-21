const connexionLink = document.querySelector('#connexion');
const formContainer = document.querySelector('#container-form-sign');

async function getFormCo(url) {
    try {
        const response = await fetch(url);
        const data = await response.text();
        formContainer.innerHTML = data;

        const formConnexion = document.querySelector('#form-connexion');

        formConnexion.addEventListener('submit', async (e) => {
            const dataForm = new FormData(formConnexion);
            e.preventDefault();
            getDataCo(dataForm);
            console.log("cooooo");
    });
    } catch (error) {
    console.log(error);
    }
}

async function getDataCo(data) {
    const response = await fetch("../viewer/signup.php", {
        method: "POST",
        body: data
    });
    const coresponse = await response.text();
    console.log(coresponse);
    const messForm = document.querySelector('#message-form');
    const formConnexion = document.querySelector('#form-connexion');

    if (
        coresponse === "Veuillez saisir tout les champs" ||
        coresponse === "Mot de passe incorrect" ||
        coresponse === "Login incorrect"
    ) {
        formConnexion.style.display = "none";
        messForm.textContent = coresponse;
    } else {
        window.location.href = "../index.php";
    }
}

connexionLink.addEventListener('click', (e) => {
    e.preventDefault();
    getFormCo('../viewer/connexion.php');
    console.log("tonton");
});