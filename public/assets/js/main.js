// Limpar a mensagem de erro e sucesso
setTimeout(function() {
    var errorMessageElement = document.getElementById("errorMessage");

    if (errorMessageElement) {
        errorMessageElement.classList.remove("error-message");
        errorMessageElement.classList.add("hidden");
    }

    var successMessageElement = document.getElementById("successMessage");

    if (successMessageElement) {
        successMessageElement.classList.remove("success-message");
        successMessageElement.classList.add("hidden");
    }
}, 10000);
