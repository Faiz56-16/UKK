<div class="login-container">
    <div class="login-form">
        <h2 class="form-title">Login</h2>

        <form action="{{ route('admin.loginpost') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</div>

<style>
/* Background */
.login-container {
    min-height: 90vh;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', Arial, sans-serif;
}

/* Card */
.login-form {
    background: #ffffff;
    padding: 30px 28px;
    width: 100%;
    max-width: 360px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* Title */
.form-title {
    text-align: center;
    margin-bottom: 24px;
    font-size: 24px;
    font-weight: 700;
    color: #1e3a8a;
}

/* Form */
.form-group {
    margin-bottom: 16px;
}

.form-group label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 6px;
    color: #1f2937;
}

.form-group input {
    width: 100%;
    padding: 10px 12px;
    font-size: 14px;
    border-radius: 6px;
    border: 1px solid #c7d2fe;
}

.form-group input:focus {
    outline: none;
    border-color: #2563eb;
}

/* Button */
.btn-login {
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    background: #2563eb;
    color: #ffffff;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
}

.btn-login:hover {
    background: #1d4ed8;
}
</style>
