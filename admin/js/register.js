document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPassword = document.getElementById('confirm-password');

    console.log(toggleConfirmPassword);
    console.log(confirmPassword);
    togglePassword.addEventListener('click', function() {
        // Toggle the type attribute for the password field
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Toggle the eye / eye-slash icon for the password field
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    toggleConfirmPassword.addEventListener('click', function() {
        // Toggle the type attribute for the confirm password field
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        
        // Toggle the eye / eye-slash icon for the confirm password field
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});
