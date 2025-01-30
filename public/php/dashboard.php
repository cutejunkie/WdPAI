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
            <section class="notes">
                <div class="note">
                    <button class="delete-button">X</button>
                    <h3>PERSON</h3>
                    <p>NAME</p>
                    <p>notesnotesnotesnotesnotes notesnotes</p>
                </div>
                <div class="note">
                    <button class="delete-button">X</button>
                    <h3>PERSON</h3>
                    <p>NAME</p>
                    <p>notesnotesnotesnotesnotes</p>
                </div>
                <div class="note">
                    <button class="delete-button">X</button>
                    <h3>PERSON</h3>
                    <p>NAME</p>
                    <p>notesnotesnotesnotesnotes</p>
                </div>
                <div class="note">
                    <button class="delete-button">X</button>
                    <h3>PERSON</h3>
                    <p>NAME</p>
                    <p>notesnotesnotesnotesnotes notesnotes</p>
                </div>
            </section>

            <section class="notes">
                <div class="note">
                    <button class="delete-button">X</button>
                    <h3>PERSON</h3>
                    <p>NAME</p>
                    <p>notesnotesnotesnotesnotes notesnotes</p>
                </div>
                <div class="note">
                    <button class="delete-button">X</button>
                    <h3>PERSON</h3>
                    <p>NAME</p>
                    <p>notesnotesnotesnotesnotes</p>
                </div>
            </section>            
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
