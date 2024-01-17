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

// Excluir o curso com confirmação
function confirmDelete(courseId) {
    if (confirm("Tem certeza que deseja excluir o curso?")) {
        deleteCourse(courseId);
    }
}

function deleteCourse(courseId) {
    fetch(`/curso/${courseId}`, { method: 'DELETE' })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            window.location.href = '/cursos';
        })
        .catch(error => console.error('Erro ao excluir o curso:', error));
}

