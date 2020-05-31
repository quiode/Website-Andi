<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wildlifephotography Andreas Heeb</title>
    <?php
<<<<<<< HEAD
    echo "<link rel=\"stylesheet\" href=\"stylesheet.css\" href=\"" . $_SERVER['DOCUMENT_ROOT'] . "/templates/navigationbar.css" . ">";
=======
    echo "<link rel=\"stylesheet\" href=\"stylesheet.css\" href=\"https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.css" . ">";
>>>>>>> parent of 2082392... Update index.php
    ?>
    <script src="code.js"></script>
</head>

<body>
    <header></header>
    <?php 
    $navigationbar_file = "https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.php";
    echo $navigationbar_file;
    include $navigationbar_file;
    ?>
    <section>
        <article></article>
    </section>

    <aside>

    </aside>

    <footer>

    </footer>
</body>

</html>