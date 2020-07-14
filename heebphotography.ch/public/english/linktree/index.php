<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linktree | Wildlifephotography Andreas Heeb</title>
    <link rel="stylesheet" href="stylesheet.css">
    <?php
    echo "<link rel=\"stylesheet\" href=\"https://" . $_SERVER['HTTP_HOST'] . "/templates/navigationbar.css" . "\">";
    ?>
    <!-- for mdi icons -->
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">  
</head>


<body>
    <header></header>
    <?php include '../templates/navigationbar.php'?>


    <!-- the linktree (using php for eliminating white space bc fuck u html) -->
    <?php
    $html = $text = <<<EOT
    <section id="linktree_container">
    <article class="item" id="instagram">
        <iconify-icon data-icon="logos:instagram-icon" class="icon" id="instagram_icon"></iconify-icon>
        <a href="https://www.instagram.com/heebphotography/" target="_blank" class="link"
            id="instagram_link">@heebphotography</a>
    </article>
    <article class="item" id="phone">
        <iconify-icon data-icon="carbon:phone" class="icon" id="phone_icon"></iconify-icon>
        <a href="./contacts.vcf" download="Andreas Heeb" class="link" id="phone_link">+41 12 345 67 78</a>
    </article>
    <article class="item" id="mail">
        <iconify-icon data-icon="feather:mail" class="icon" id="mail_icon"></iconify-icon>
        <a href="mailto:andreas.heeb@heebphotography.ch" target="_blank" class="link"
            id="mail_link">andreas.heeb@heebphotography.ch</a>
    </article>
    </section>
    EOT;

    $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', $html);

    echo $html;
    ?>

</body>

</html>
