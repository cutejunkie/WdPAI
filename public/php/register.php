<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja - PrezentOwO</title>
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <!-- Kontener logowania -->
    <div class="background">
        <!-- Logo -->
        <div class="logo">
            <img src="/images/zabka.png" alt="Logo PrezentOwO">
        </div>
    </div>

    <!-- Tytuł "ZAREJESTRUJ SIĘ" poniżej różowego prostokąta -->
    <div class="title">ZAREJESTRUJ SIĘ</div>

    <!-- Formularz rejestracji -->
    <form class="form-container">
        <!-- Imię -->
        <div class="input-field">
            <input type="text" id="first-name" placeholder="imię">
        </div>

        <!-- Adres e-mail -->
        <div class="input-field">
            <input type="email" id="email" placeholder="adres e-mail">
        </div>

        <!-- Hasło -->
        <div class="input-field">
            <input type="password" id="password" placeholder="hasło">
        </div>

        <!-- Przycisk "Zarejestruj się" -->
        <div class="button">
            <div class="button-text">ZAREJESTRUJ SIĘ</div>
        </div>

        <!-- Link do logowania -->
        <div class="register-text">masz już konto? zaloguj się</div>

        <!-- Przycisk "Zaloguj się" -->
        <a href="/login" class="register-button">
            <div class="button-text">ZALOGUJ SIĘ</div>
        </a>

    </form>
</body>
</html>