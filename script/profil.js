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

    
    async function postData(data) {
        try {
            const response = await fetch("../viewer/addTask.php", {
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
    
// document.addEventListener("DOMContentLoaded", function() { 
//     const form = document.getElementById("form-addTask");
    
//     form.addEventListener("submit", async function (event) {
//         event.preventDefault();
    
//         const title = document.getElementById("title").value;
//         const description = document.getElementById("description").value;
    
//         const formData = new FormData();
//         formData.append("title", title);
//         formData.append("description", description);
    
//         await postData(formData);
//     });

// });


document.addEventListener("DOMContentLoaded", function () {
    const statusDropdowns = document.querySelectorAll(".status-dropdown");

    statusDropdowns.forEach(function (dropdown) {
       dropdown.addEventListener("change", function () {
          const selectedOption = dropdown.options[dropdown.selectedIndex];
          const selectedStatus = selectedOption.value;
          const taskId = dropdown.closest("tr").dataset.id;

          fetch("../controller/profil.php", {
             method: "POST",
             body: JSON.stringify({ id: taskId, state: selectedStatus }),
             headers: {
                "Content-Type": "application/json",
             },
          })
             .then(function (response) {
                if (response.ok) {
                   return response.text();
                }
                throw new Error("La requête a échoué.");
             })
             .then(function (message) {
                console.log(message); // Affichez un message de confirmation ou faites autre chose si nécessaire
             })
             .catch(function (error) {
                console.error(error);
             });
       });
    });
 });

