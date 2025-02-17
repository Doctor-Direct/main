
const loginForm = document.getElementById("login-form");
const signupForm = document.getElementById("signup-form");
const showSignup = document.getElementById("show-signup");
const showLogin = document.getElementById("show-login");

// Toggle between login and signup forms
showSignup.addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.classList.remove("active");
    signupForm.classList.add("active");
});

showLogin.addEventListener("click", (e) => {
    e.preventDefault();
    signupForm.classList.remove("active");
    loginForm.classList.add("active");
});

// Form submission event handler (for demonstration purposes)
loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const userType = document.getElementById("login-user-type").value;
    const username = document.getElementById("login-username").value;
    alert(`Login successful! User type: ${userType}, Username: ${username}`);
});
