<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrezentOwO</title>
    <link rel="stylesheet" href="../css/main.css">
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
                <a href="/api/logout">⬅️ Wyloguj się</a>
            </div>
        </aside>

        <!-- Główna zawartość -->
        <main class="main-content">
            <header>
                <h2>Strona Główna</h2>
            </header>
            <?php
            if(isset($notes) && !empty($notes)){
                $notes_length = count($notes);

                for($i=0; $i<$notes_length; $i++){
                    if($i%4==0){
                        echo '<section class="notes">';
                    }

                    echo '<div class="note">
                        <button class="delete-button">X</button>
                        <h3>'. $notes[$i]->get_gifted_name() .'</h3>
                        <p>'. $notes[$i]->get_date_of_birth() .'</p>
                        <p>'. $notes[$i]->get_ideas() .'</p>
                    </div>';

                    if($i%4==3){
                        echo '</section>';
                    }
                }

                if($i%4!=3){
                    echo '</section>';
                }
            }
            ?>
            <!-- <section class="notes">
                <div class="note">
                    <button class="delete-button">X</button>
                    <h3>PERSON</h3>
                    <p>DATE</p>
                    <p>notesnotesnotesnotesnotes notesnotes</p>
                </div>
            </section> -->
                    
        </main>
    </div>


    <!-- JAVASCRIPT DO USUWANIA NOTATEK -->
    <script>
        // Nasłuchiwanie na kliknięcia w przyciski "X"
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('delete-button')) {
                const note = event.target.closest('.note'); // Znajdź rodzica (notatkę)
                note.remove(); // Usuń notatkę
            }
        });
    </script>    

</body>
</html>
