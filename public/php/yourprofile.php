<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrezentOwO</title>
    <link rel="stylesheet" href="../css/yourprofile.css">
</head>
<body>
    <div class="container">
        <!-- Panel boczny -->
        <aside class="sidebar">
            <div class="logo">
                <img src="/images/logo.png" alt="Logo PrezentOwO">
                <h1>PrezentOwO</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="/dashboard">🏠 Strona główna</a></li>
                    <li><a href="/yourprofile">🙍‍♂️ Twój profil</a></li>
                    <li><a href="/addperson">➕ Dodaj osobę</a></li>
                </ul>
            </nav>
            <div class="logout">
                <a href="/login">⬅️ Wyloguj się</a>
            </div>
        </aside>

        <!-- Główna zawartość -->
        <main class="main-content">
            <header>
                <h2>Twój Profil</h2>
            </header>
                <?php
                if (!isset($_SESSION['user'])) {
                    header("Location: /login");
                    exit();
                }

                $user_name = $_SESSION['user']['user_name'];
                $creationDate = $_SESSION['user']['creation_date'];
                ?>

                <div class="profile">
                    <img src="/images/profilepic.png" alt="Profilowe" class="profile-image">
                    <p class="profile-text">JESTEŚ Z NAMI JUŻ OD <?php echo $creationDate;?>!</p>
                </div>

</body>
</html>
