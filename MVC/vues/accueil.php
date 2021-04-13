<?php

?>
<main>
    <section id="home">
        <div class="homePict">
            <img src="ASSET/img/home1" alt="home1">
            <img src="ASSET/img/home2" alt="home2">
            <img src="ASSET/img/home3" alt="home3">
            <img src="ASSET/img/home4" alt="home4">
            <img src="ASSET/img/home5" alt="home5">
        </div>
        <h1>TRICATEL</h1>
        <a href="#content">Voir les plats</a>
    </section>


    <section id="about">
        <img src="ASSET/img/chef" alt="chef">
        <div>
            <h2>Qui suis je ?</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
        </div>
    </section>

    <section id="content">
        <h2>Nos plats</h2>
        <div class="select">
            <div class="filtre">
                <label for="Pratiques-select">Votre pratique allimentaire :</label>
                <select id="selectPractice">
                    <?php if (isset($resultType)) :
                        $count2 = count($resultType);
                        for ($i = 0; $i < $count2; $i++) :
                    ?>
                            <option value="<?php echo $resultType[1][$i]["practice"] ?>"><?php echo $resultType[1][$i]["practice"] ?></option>
                    <?php

                        endfor;
                    endif; ?>
                </select>
            </div>
            <div class="filtre">
                <label for="Pratiques-select">Votre spécialité : </label>

                <select id="selectSpeciality">
                    <?php if (isset($resultType)) :
                        $count2 = count($resultType);
                        for ($i = 0; $i < $count2; $i++) :
                    ?>
                            <option value="<?php echo $resultType[2][$i]["speciality"] ?>"><?php echo $resultType[2][$i]["speciality"] ?></option>
                    <?php

                        endfor;
                    endif; ?>
                </select>

            </div>
            <div class="filtre">
                <label for="Pratiques-select">Votre type de plat :</label>

                <select id="selectType">
                    <?php if (isset($resultType)) :
                        $count2 = count($resultType);
                        for ($i = 0; $i < $count2; $i++) :
                    ?>
                            <option value="<?php echo $resultType[0][$i]["type"] ?>"><?php echo  $resultType[0][$i]["type"] ?></option>
                    <?php

                        endfor;
                    endif; ?>
                </select>
            </div>
        </div>

        <div class="contentCard">

            <?php

            if (isset($data)) :
                $count = count($data);
                for ($i = 0; $i < $count; $i++) :

            ?>
                    <div class="card <?php echo $data[$i]["type"] . " " . $data[$i]["speciality"] . " " . $data[$i]["practice"] ?>">
                        <a href="#">
                            <img src="<?php echo $data[$i]["picutre"] ?>" alt="">
                            <div>
                                <h3><?php echo $data[$i]["name"] ?></h3>
                                <h4><?php echo $data[$i]["type"] ?></h4>
                                <p><?php echo $data[$i]["description"] ?></p>
                            </div>
                        </a>
                    </div>

            <?php

                endfor;
            endif; ?>

        </div>
    </section>
</main>