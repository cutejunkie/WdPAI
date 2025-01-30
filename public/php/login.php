<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie - PrezentOwO</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <!-- Kontener logowania -->
    <div class="background">
        <!-- Logo -->
        <div class="logo">
            <img src="/images/zabka.png" alt="Logo PrezentOwO">
        </div>
    </div>

    <!-- Tytuł "ZALOGUJ SIĘ" poniżej różowego prostokąta -->
    <div class="title">ZALOGUJ SIĘ</div>

    <!-- Formularz logowania -->
    <form method="POST" class="form-container" onsubmit="return false;">
        <div class="input-field">
            <input type="email" id="email" placeholder="adres e-mail">
        </div>

        <div class="input-field">
            <input type="password" id="password" placeholder="hasło">
        </div>

        <!-- Przycisk "Zaloguj się" -->
        <button class="button" id="login_button">
            <span class="button-text">ZALOGUJ SIĘ</span>
        </button>

        <div class="register-text">nie masz konta? zarejestruj się</div>

        <!-- Przycisk "Zarejestruj się" -->
        <a href="/register" class="register-button">
            <div class="button-text">ZAREJESTRUJ SIĘ</div>
        </a>
    </form>

    <script>
        document.getElementById("login_button").addEventListener("click", () =>{
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;
            
            const payload = {
                "email" : email,
                "password" : password
            }

            fetch("/api/login", {
                method : "POST",
                headers: {"Content-type": "application/x-www-form-urlencoded; charset=UTF-8"},
                body: Object.entries(payload).map(([k,v])=>{return k+'='+v}).join('&')
            }).then(res => {
                if (res.redirected){
                    window.location.assign(res.url);
                }        
            })
        });
    </script>

</body>
</html>