<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign Up - FioRio Tourism</title>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: url('http://127.0.0.1:8000/upload/bg.png') no-repeat center center/cover;
}

.overlay {
    background: rgba(0,0,0,0.7);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-box {
    background: rgba(0,0,0,0.85);
    padding: 40px;
    border-radius: 10px;
    width: 320px;
    text-align: center;
    color: white;
}

.form-box h2 {
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: none;
    border-radius: 5px;
}

button {
    background: red;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: darkred;
}

a {
    color: red;
    text-decoration: none;
}
</style>
</head>

<body>
<div class="overlay">
    <div class="form-box">
        <h2>Sign Up</h2>
        <form>
            <input type="text" placeholder="Full Name" required>
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Password" required>
            <input type="password" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="/login">Login</a></p>
    </div>
</div>
</body>
</html>