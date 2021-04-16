<main id="mainArticle">
    <section id="article">
        <div class="imageArticle">
            <img src="<?php echo $array["picutre"] ?>" alt="">
        </div>

        <div class="titreArticle">
            <h1><?php echo $array["name"] ?></h1>
            <div class="pratiqueArticle">
                <p>Pratrique allimentaire : <strong> <?php echo $array["practice"] ?> </strong></p>
                <p>Spécialité : <strong><?php echo $array["speciality"] ?> </strong></p>
                <p>Type de plat : <strong><?php echo $array["type"] ?></strong> </p>
            </div>
            <p class="descriptionArticle"><?php echo $array["description"] ?></p>
        </div>
        <div class="contentArticle">
            <?php echo $array["content"] ?>
        </div>
        <div class="timeArticle">
            <p>date de parution : <?php echo $array["time"] ?></p>
        </div>

    </section>

</main>