<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - FioRio Tourism</title>
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
    background: rgba(0,0,0,0.8);
    padding: 40px;
    border-radius: 10px;
    width: 300px;
    text-align: center;
    color: white;
}

.form-box h2 {
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
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
        <h2>Login</h2>
        <form>
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="/register">Sign Up</a></p>
    </div>
</div>
</body>
</html>