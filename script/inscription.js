const inscriptionLink = document.querySelector('#inscription');
const containerForm = document.querySelector('#container-form-sign');

//Une fonction asynchrone retourne une promesse cela permet d'attendre
//que la promesse soit résolue avant de continuer l'éxécution du code


async function getForm(url) {
    try {
        const response = await fetch(url);
        const data = await response.text();
        containerForm.innerHTML = data;
        console.log(data);
        const formSubscribe = document.querySelector('#form-subscribe');

        formSubscribe.addEventListener('submit', async (e) => {
            const data = new FormData(formSubscribe);
            e.preventDefault();
            getData(data);
        });
    } catch (error) {
        console.log(error);
    }
}

async function getData(formData) {
    const response = await fetch("../viewer/signup.php", {
        method: "POST",
        body: formData
    });

    const subresponse = await response.text();
    console.log(subresponse);
    const messForm = document.querySelector('#mess_form');
    const formInscription = document.querySelector('#form-subscribe');

    if (subresponse === "Inscription réussie") {
        formInscription.style.display = "none";
        messForm.textContent = subresponse;
    }else{
        messForm.textContent = subresponse;
    }
}

inscriptionLink.addEventListener('click', (e) => {
    e.preventDefault();
    const url = "../viewer/inscription.php";
    getForm(url);
    console.log("tata");
});