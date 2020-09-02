<!DOCTYPE html>
<html lang="en" style="scrollbar-width: none;">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Impressum | Wildlifephotography Andreas Heeb</title>
        <link rel="stylesheet" href="https://heebphotography.ch/public/styles/main.css">
        <script>
            // scrolls to the next id/article of the page when scrolling
            var lastScrollTop = 0;
            var section_ids = ["#contact_address", "#disclaimer", "#exclusion_of_liability_for_links", "#copyright"];
            var execution_time = Date.getTime();
            function scrolling() {
                alert(execution_time);
                if (Date.getTime() - execution_time >= 500) {
                    execution_time = Date.getTime();
                    var current_anchor = window.location.hash;
                    var st = window.pageYOffset || document.documentElement
                        .scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
                    alert(current_anchor);
                    alert(st);
                    alert(lastScrollTop);
                    if (st > lastScrollTop) {
                        // downscroll
                        if (section_ids.indexOf(current_anchor) < 3) {
                            window.location.hash = section_ids[section_ids.indexOf(current_anchor) + 1];
                        }
                    } else {
                        // upscroll
                        if (section_ids.indexOf(current_anchor) > 0) {
                            window.location.hash = section_ids[section_ids.indexOf(current_anchor) - 1];
                        }
                    }
                    lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
                }
            }

            window.addEventListener("scroll", setTimeout(),
                false);
        </script>
    </head>

    <body id="impressum">
        <?php include '../templates/navigationbar.php'?>
        <section id="german" style="display: none;">
            <p><strong>Kontakt-Adresse</strong></p>
            <p>Dominik Schwaiger<br />Hofackerstrasse 3<br />8722 Kaltbrunn<br />Schweiz</p>
            <p>E-Mail:<br />admin@heebphotography.ch</p>
            <p>&nbsp;</p>
            <p><strong>Haftungsausschluss</strong></p>Der Autor &uuml;bernimmt keinerlei Gew&auml;hr hinsichtlich
            der inhaltlichen Richtigkeit, Genauigkeit, Aktualit&auml;t, Zuverl&auml;ssigkeit und
            Vollst&auml;ndigkeit der Informationen.</p>
            <p>Haftungsanspr&uuml;che gegen den Autor wegen Sch&auml;den materieller oder immaterieller Art, welche
                aus dem Zugriff oder der Nutzung bzw. Nichtnutzung der ver&ouml;ffentlichten Informationen, durch
                Missbrauch der Verbindung oder durch technische St&ouml;rungen entstanden sind, werden
                ausgeschlossen.</p>
            <p>Alle Angebote sind unverbindlich. Der Autor beh&auml;lt es sich ausdr&uuml;cklich vor, Teile der
                Seiten oder das gesamte Angebot ohne besondere Ank&uuml;ndigung zu ver&auml;ndern, zu erg&auml;nzen,
                zu l&ouml;schen oder die Ver&ouml;ffentlichung zeitweise oder endg&uuml;ltig einzustellen.</p>
            <p>&nbsp;</p>
            <p><strong>Haftungsausschluss f&uuml;r Links</strong></p>
            <p>Verweise und Links auf Webseiten Dritter liegen ausserhalb unseres Verantwortungsbereichs. Es wird
                jegliche Verantwortung f&uuml;r solche Webseiten abgelehnt. Der Zugriff und die Nutzung solcher
                Webseiten erfolgen auf eigene Gefahr des jeweiligen Nutzers.</p>
            <p>&nbsp;</p>
            <p><strong>Urheberrechte</strong></p>
            <p>Die Urheber- und alle anderen Rechte an Inhalten, Bildern, Fotos oder anderen Dateien auf dieser
                Website, geh&ouml;ren ausschliesslich <strong>Dominik Schwaiger</strong> oder den speziell genannten
                Rechteinhabern. F&uuml;r die Reproduktion jeglicher Elemente ist die schriftliche Zustimmung des
                Urheberrechtstr&auml;gers im Voraus einzuholen.</p>
            <p>&nbsp;</p>
            <!--ACHTUNG: Wenn Sie die Quelle ohne Erlaubnis von SwissAnwalt entfernen, dann begehen Sie eine Urheberrechtsverletzung welche in jedem Fall geahndet wird.--><br />Quelle:
            <a href="https://www.swissanwalt.ch" target="_blank" rel="noopener">SwissAnwalt</a>
            <!--Bitte beachten Sie die AGB von SwissAnwalt betreffend allf&auml;llig anfallenden Kosten bei Weglassen der Quelle!-->
        </section>
        <section id="english">
            <article id="contact_address">
                <p class="title">Contact address</p>
                <p>Dominik Schwaiger<br />Hofackerstrasse 3<br />8722 Kaltbrunn<br />Switzerland</p>
                <p>e-Mail:<br />admin@heebphotography.ch</p>
            </article>
            <article id="disclaimer">
                <p class="title">Disclaimer</p>The author assumes no liability whatsoever with regard
                to the
                correctness, accuracy, topicality, reliability and completeness of the information provided.</p>
                <p>Liability claims against the author for material or immaterial damages resulting from access to or
                    use or non-use of the published information, misuse of the connection or technical faults are
                    excluded.</p>
                <p>All offers are non-binding. Parts of the pages or the complete publication including all offers and
                    information might be extended, changed or partly or completely deleted by the author without
                    separate announcement.</p>
            </article>
            <article id="exclusion_of_liability_for_links">
                <p class="title">Exclusion of liability for links</p>
                <p>References and links to third party websites are outside our area of responsibility. We decline any
                    responsibility for such websites. Access and use of such websites is at the user's own risk.</p>
            </article>
            <article id="copyright">
                <p class="title">Copyright</p>
                <p>The copyrights and all other rights to content, images, photos or other files on this website belong
                    exclusively to Dominik Schwaiger or the specifically named rights holders. For the reproduction of
                    any elements, the written consent of the copyright holder must be obtained in advance.</p>
                <!--ATTENTION: If you remove the source without permission from SwissAnwalt, you are committing a copyright infringement which will be punished in any case.-->
                <br />Source:
                <a href="https://www.swissanwalt.ch" target="_blank" rel="noopener">SwissAnwalt</a>
                <!--Please note the terms and conditions of SwissAnwalt regarding any costs incurred if the source is omitted!-->
            </article>
        </section>
    </body>

</html>