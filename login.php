rstylesheet" href="style.css">
</head>
<body class="login-page">
    <div class="login-box">
        <h2>Admin Login</h2>
        <?php if($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Нэвтрэх нэр" required>
            <input type="password" name="password" placeholder="Нууц үг" required>
            <button type="submit">Нэвтрэх</button>
        </form>
        <p><b>Жишээ:</b> admin / 1234</p>
    </div>
</body>
</html>