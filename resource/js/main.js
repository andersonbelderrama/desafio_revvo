setTimeout(function () {
    document.getElementById('errorMessage').classList.remove('error-message');
    document.getElementById('errorMessage').classList.add('hidden');
    document.getElementById('successMessage').classList.remove('success-message');
    document.getElementById('successMessage').classList.add('hidden');
}, 5000);