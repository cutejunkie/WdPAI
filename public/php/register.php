<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja - PrezentOwO</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <!-- Kontener rejestracji -->
    <div class="background">
        <!-- Logo -->
        <div class="logo">
            <img src="/images/zabka.png" alt="Logo PrezentOwO">
        </div>
    </div>

    <!-- Tytuł "ZAREJESTRUJ SIĘ" poniżej różowego prostokąta -->
    <div class="title">ZAREJESTRUJ SIĘ</div>

    <!-- Formularz rejestracji -->
    <form method="POST" class="form-container" onsubmit="return false;">
        <div class="input-field">
            <input type="text" id="user_name" placeholder="nazwa użytkownika">
        </div>

        <div class="input-field">
            <input type="email" id="email" placeholder="adres e-mail">
        </div>

        <div class="input-field">
            <input type="password" id="password" placeholder="hasło">
        </div>

        <!-- Przycisk "Zarejestruj się" -->
        <button class="button" id="register_button">
            <span class="button-text">ZAREJESTRUJ SIĘ</span>
        </button>

        <div class="register-text">masz już konto? zaloguj się</div>

        <!-- Przycisk "Zaloguj się" -->
        <a href="/login" class="register-button">
            <div class="button-text">ZALOGUJ SIĘ</div>
        </a>
    </form>

    <script>
        document.getElementById("register_button").addEventListener("click", () => {
            const userName = document.getElementById("user_name").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            const payload = {
                "user_name": userName,
                "email": email,
                "password": password
            };

            fetch("/api/register", {
                method : "POST",
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(payload)
            }).then(res => {
                if (res.redirected){
                    window.location.assign(res.url);
                }        
            });
        });
    </script>
</body>
</html>
