document.getElementById('signup-form').addEventListener('submit', function(event) {
    event.preventDefault();  // Empêche le formulaire de se soumettre normalement
    const form = event.target;
    const data = new FormData(form);  // Crée un FormData à partir du formulaire

    // Envoie la requête AJAX
    fetch(form.action, {
        method: 'POST',
        body: data,
    })
    .then(response => response.text())
    .then(text => {
        document.getElementById('message').textContent = text;
        if (text.includes('Inscription réussie!')) {
            window.location.href = "../../index.php";
        }
    });
});
