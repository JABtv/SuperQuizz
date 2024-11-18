//Définir les regex pour l'email et le mot de passe
const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const passwordRegex =
  /^(?=.*[a-z])(?=.*A-Z)(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

//Sélectionner le formulaire et les champs de saisie
const form = document.getElementById("registrationForm");
const emailInput = document.getElementById("email");
const passwordInput = document.getElementById("password");
const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");

// Function de validation
form.addEventListener("submit", function (event) {
  let valid = true;

  //Valider l'email
  if (!emailRegex.test(emailInput.value)) {
    emailError.textContent = "Addrese e-mail invalide.";
    valid = false;
  } else {
    emailError.textContent = "";
  }

  //Valider le mot de passe
  if (!passwordRegex.test(passwordInput.value)) {
    passwordError.textContent =
      "Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.";
    valid = false;
  } else {
    passwordError = "";
  }

  //Empêcher l' envoi du formulaire si des erreurs existent
  if (!valid) {
    event.preventDefault();
  }
});
