var loadTasksLink = document.getElementById('load-tasks');
var addTasksLink = document.getElementById('addTasksLink');
var contentContainer = document.getElementById('container-profil');

loadTasksLink.addEventListener('click', function (event) {
    event.preventDefault();
    loadContent('../viewer/displayTask.php');
});

addTasksLink.addEventListener('click', function (event) {
    event.preventDefault();
    loadContent('../viewer/addTask.php');
});

function loadContent(url) {
    fetch(url)
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Erreur réseau.');
            }
            return response.text();
        })
        .then(function (data) {
            contentContainer.innerHTML = data;
        })
        .catch(function (error) {
            alert(error.message);
        });
}

// const form = document.getElementById("form-addTask");
// const message = document.getElementById("message-form");

// form.addEventListener("submit", function (event) {
//     event.preventDefault();

//     const title = document.getElementById("title").value;
//     const description = document.getElementById("description").value;

//     const formData = new FormData();
//     formData.append("title", title);
//     formData.append("description", description);

    

    async function postData(data) {
        try {
            const response = await fetch("../viewer/profil.php", {
                method: "POST",
                body: data
            });
    
            if (!response.ok) {
                throw new Error('Erreur réseau.');
            }
    
            const result = await response.text();
            console.log("test1");
    
            // Vous pouvez afficher le résultat si nécessaire
            console.log(result);
    
            // Redirection en JavaScript vers la page spécifiée
            window.location.href = "../index.php"; // Changez le chemin selon votre besoin
        } catch (error) {
            console.error("Erreur lors de la soumission du formulaire : ", error);
        }
    }
    
    const form = document.getElementById("form-addTask");
    
    form.addEventListener("submit", async function (event) {
        event.preventDefault();
    
        const title = document.getElementById("title").value;
        const description = document.getElementById("description").value;
    
        const formData = new FormData();
        formData.append("title", title);
        formData.append("description", description);
    
        await postData(formData);
    });
    

