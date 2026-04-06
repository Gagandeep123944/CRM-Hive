document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById("registerForm");
    const nameInput = document.getElementById("name");
    const email = document.getElementById("email");
    const password = document.querySelector('#password');
    const passwordConfirmation = document.getElementById("password_confirmation");

    const togglePassword = document.querySelector('#togglePasswordReg');

    if (togglePassword && password) {
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🙈';
        });
    } else {
        console.error("Eye icon NOT found. Check your HTML ID.");
    }

    if (form) {
        form.addEventListener("submit", function (e) {
            clearErrors();

            if (nameInput.value.trim() === "") {
                e.preventDefault();
                showError(nameInput, "Please fill the full name");
                nameInput.focus();
                return;
            }

            if (email.value.trim() === "") {
                e.preventDefault();
                showError(email, "Please fill the email");
                email.focus();
                return;
            } else if (!validateEmail(email.value.trim())) {
                e.preventDefault();
                showError(email, "Enter a valid email");
                email.focus();
                return;
            }

            if (password.value.trim() === "") {
                e.preventDefault();
                showError(password, "Please fill the password");
                password.focus();
                return;
            } else if (password.value.length < 6) {
                e.preventDefault();
                showError(password, "Password must be at least 6 characters");
                password.focus();
                return;
            }

            if (passwordConfirmation.value.trim() === "") {
                e.preventDefault();
                showError(passwordConfirmation, "Please confirm your password");
                passwordConfirmation.focus();
                return;
            } else if (password.value !== passwordConfirmation.value) {
                e.preventDefault();
                showError(passwordConfirmation, "Passwords do not match");
                passwordConfirmation.focus();
                return;
            }
        });
    }
});

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function showError(input, message) {
    const formGroup = input.parentElement;
    const error = formGroup.querySelector(".error-message");
    if (error) {
        error.innerText = message;
    }
}

function clearErrors() {
    document.querySelectorAll(".error-message").forEach(el => (el.innerText = ""));
}
