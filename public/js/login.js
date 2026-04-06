const form = document.getElementById("loginForm");
const email = document.getElementById("email");
const password = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", () => {
    password.type = password.type === "password" ? "text" : "password";
});

form.addEventListener("submit", function (e) {
    clearErrors();

    let valid = true;

    if (email.value.trim() === "") {
        showError(email, "Please fill the email");
        valid = false;
    } else if (!validateEmail(email.value.trim())) {
        showError(email, "Enter a valid email");
        valid = false;
    }

    if (valid) {
        if (password.value.trim() === "") {
            showError(password, "Please fill the password");
            valid = false;
        } else if (password.value.length < 6) {
            showError(password, "Password must be at least 6 characters");
            valid = false;
        }
    }

    if (!valid) {
        e.preventDefault();

        const firstErrorInput = document.querySelector(".error-message:not(:empty)");
        if (firstErrorInput) {
            firstErrorInput.previousElementSibling.focus();
        }
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
