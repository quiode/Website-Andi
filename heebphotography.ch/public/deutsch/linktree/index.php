<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- metatags -->
        <?php include __DIR__ . "/../../templates/general_metatags.php"?>
        <meta name="keywords" content="deutsch, andreas, heeb, andreas heeb, verlinkungen, heebphotography, soziale medien">
        <meta name="description" content="Verschiedene Links zu Andreas Heeb's Social Media">
        <!-- rest -->
        <title>Linktree | Wildlifephotography Andreas Heeb</title>
        <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
        <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
        <link rel="shortcut icon" type="image/x-icon" href="https://heebphotography.ch/public/images/favicon/favicon.ico"/>
    </head>


    <body id="linktree">
        <!-- wip bar -->
        <?php require __DIR__ . "/../../templates/work_in_progress.php"?>
        <?php require __DIR__ . "/../../templates/header.php"?>


        <!-- the linktree (using php for eliminating white space bc fuck u html) -->
        <?php
        $html = $text = <<<EOT
    <div class="linktree">
        <ul>
            <li>
                <a href="https://www.instagram.com/heebphotography/" target="_blank">
                    <section>
                        <iconify-icon data-icon="logos:instagram-icon" class="icon" id="instagram_icon"></iconify-icon>
                        <p>@heebphotography</p>
                    </section>
                </a>
            </li>
            <li>
                <a href="mailto:andreas.heeb@heebphotography.ch" target="_blank">
                    <section>
                        <iconify-icon data-icon="feather:mail" class="icon" id="mail_icon"></iconify-icon>
                        <p>andreas.heeb@heebphotography.ch</p>
                    </section>
                </a>
            </li>
        </ul>
    </div>
    EOT;

        $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', $html);

        echo $html;
        ?>

        <?php require  __DIR__ . "/../../templates/footer.php"?>
    </body>

</html>
