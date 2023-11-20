<html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gestionnaire d'écoute</title>
        <link href="../../ressources/css/style.css" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>
    <body>
        <div id="container">
            <header>
                <div id="haut">
                    <h1>Liste de Course</h1>
                </div>
            </header>
            <main>
                <nav>
                    <!-- <a href="index.php" class="lienMenuActuel">Home</a>
                    <a href="albums/index.php" class="lienMenu">Albums</a>
                    <a href="artists/index.php" class="lienMenu">Artistes</a>
                    <a href="genres/index.php" class="lienMenu">Genres</a> -->
                </nav>
                <p>Bienvenu sur votre liste de course.</p>

                <h2>Ajouter un Nouvel élément</h2>
                <form id="formulaire" action="../../ressources/php/add_element.php" method="post">
                    <label for="eleElement">Element:</label>
                    <input type="text" id="eleElement" name="eleElement"><br><br>
                    <input type="submit" value="Submit">
                </form>

                <?php
                    // Inclure le fichier get_element.php pour afficher tous les groupes à la suite
	                require_once('../../ressources/php/get_element.php');
                ?>

                <form id="formulaire" action="../../ressources/php/reset.php" method="post">
                <input type="submit" value="nettoyer la liste">
                </form>

            </main>
    
            <footer>
                
            </footer>
        </div>
    </body>
    </html>
</html>