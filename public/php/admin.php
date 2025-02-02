<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrezentOwO ADMIN</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="container">
        <!-- sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <img src="/images/logo.png" alt="Logo PrezentOwO">
                <h1>PrezentOwO</h1>
            </div>
            <div class="logout">
                <a href="/api/logout">⬅️ Wyloguj się</a>
            </div>
        </aside>

        <!-- główna zawartość -->
        <main class="main-content">
            <header>
                <h2>PANEL ADMINA - LISTA UŻYTKOWNIKÓW</h2>
            </header>
            <?php
            $count_users = count($users);
            echo '<p>Liczba użytkowników w serwisie: ' . $count_users . '</p><br>';
            
            if (isset($users) && !empty($users)) {

                foreach ($users as $index => $user) {
                    if ($index % 4 == 0) {
                        echo '<section class="notes">';
                    }

                    echo '<div class="note">
                            <h3>' . $user->get_name() . '</h3>
                            <p><b>id: </b>: ' . $user->get_id() . '</p>
                            <p><b>adres e-mail: </b>' . $user->get_email() . '</p>
                            <p><b>rola: </b>' . $user->get_role() . '</p>
                            <p><b>data założenia konta: </b>' . $user->get_creation_date() . '</p>
                          </div>';

                    if ($index % 4 == 3) {
                        echo '</section>';
                    }
                }

                if ($index % 4 != 3) {
                    echo '</section>';
                }
            } else {
                echo '<p>Brak użytkowników do wyświetlenia.</p>';
            }
            ?>
        </main>
    </div>  

</body>
</html>
