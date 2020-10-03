<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linktree | Wildlifephotography Andreas Heeb</title>
    <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head>


<body id="linktree">
    <?php require __DIR__ . "/../templates/navigationbar.php"?>
    <!-- wip bar -->
    <?php require __DIR__ . "/../templates/work_in_progress.php"?>


    <!-- the linktree (using php for eliminating white space bc fuck u html) -->
    <?php
    $html = $text = <<<EOT
    <div class="linktree">
        <ul>
            <li>
                <a href="https://www.instagram.com/heebphotography/" target="_blank">
                    <iconify-icon data-icon="logos:instagram-icon" class="icon" id="instagram_icon"></iconify-icon>
                    <p>@heebphotography</p>
                </a>
            </li>
            <li>
                <a href="mailto:andreas.heeb@heebphotography.ch" target="_blank">
                    <iconify-icon data-icon="feather:mail" class="icon" id="mail_icon"></iconify-icon>
                    <p>andreas.heeb@heebphotography.ch</p>
                </a>
            </li>
        </ul>
    </div>
    EOT;

    $html = preg_replace('/(\>)\s*(\<)/m', '$1$2', $html);

    echo $html;
    ?>

    <?php require  __DIR__ . "/../templates/footer.php"?>
</body>

</html>