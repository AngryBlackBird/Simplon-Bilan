<main>
    <section id="home">
        <div class="bgColor"></div>
        <div class="contentHome">
            <div class="homePict">
                <img class="imgHome" src="ASSET/img/home1.png" alt="home1">
                <img class="imgHome" src="ASSET/img/home2.png" alt="home2">
                <img class="imgHome" src="ASSET/img/home3.png" alt="home3">
                <img class="imgHome" src="ASSET/img/home4.png" alt="home4">
                <img class="imgHome" src="ASSET/img/home5.png" alt="home5">
            </div>

            <h1>TRICATEL</h1>
            <a href="#content">Voir les plats</a>
        </div>
    </section>
    <section class="svgSection">
        <?php include_once("MVC/vues/svg.php") ?>
    </section>
    <section id="about">
        <div>
            <img src="ASSET/img/chef.jpg" alt="chef">
        </div>
        <div>
            <h2>Qui suis je ?</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
        </div>
    </section>

    <section id="content">
        <h2>Nos plats</h2>

        <div class="topnav" id="myTopnav2">
            <a href="#home" class="active">FILTRE</a>

            <a>
                <div class="filtre">
                    <label for="Pratiques-select">Votre pratique allimentaire :</label>
                    <select class="selectPractice">
                        <option value="" disabled selected>Pratique</option>

                        <?php if (isset($resultType)) :
                            $count2 = count($resultType[1]);
                            for ($i = 0; $i < $count2; $i++) :
                        ?>
                                <option value="<?php echo $resultType[1][$i]["practice"] ?>"><?php echo $resultType[1][$i]["practice"] ?></option>
                        <?php

                            endfor;
                        endif; ?>
                    </select>
                </div>
            </a>
            <a>
                <div class="filtre">
                    <label for="Pratiques-select">Votre spécialité : </label>

                    <select class="selectSpeciality">
                        <option value="" disabled selected>Votre specialité</option>
                        <?php if (isset($resultType)) :
                            $count2 = count($resultType[2]);
                            for ($i = 0; $i < $count2; $i++) :
                        ?>
                                <option value="<?php echo $resultType[2][$i]["speciality"] ?>"><?php echo $resultType[2][$i]["speciality"] ?></option>
                        <?php
                            endfor;
                        endif; ?>
                    </select>

                </div>
            </a>
            <a>
                <div class="filtre">
                    <label for="Pratiques-select">Votre type de plat :</label>

                    <select class="selectType">
                        <option value="" disabled selected>Type de plat</option>

                        <?php if (isset($resultType)) :
                            $count2 = count($resultType[0]);
                            for ($i = 0; $i < $count2; $i++) :
                        ?>
                                <option value="<?php echo $resultType[0][$i]["type"] ?>"><?php echo  $resultType[0][$i]["type"] ?></option>
                        <?php

                            endfor;
                        endif; ?>
                    </select>
                </div>
            </a>


            <a href="javascript:void(0);" class="icon" onclick="myFunction2()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="select">
            <div class="filtre">
                <label for="Pratiques-select">Votre pratique allimentaire :</label>
                <select class="selectPractice">
                    <option value="" disabled selected>Pratiqueallimentaire</option>

                    <?php if (isset($resultType)) :
                        $count2 = count($resultType[1]);
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

                <select class="selectSpeciality">
                    <option value="" disabled selected>Votre specialité</option>
                    <?php if (isset($resultType)) :
                        $count2 = count($resultType[2]);
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

                <select class="selectType">
                    <option value="" disabled selected>Type de plat</option>

                    <?php if (isset($resultType)) :
                        $count2 = count($resultType[0]);
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
                    if ($data[$i]["published"] == "1") :
            ?>
                        <div class="card <?php echo $data[$i]["type"] . " " . $data[$i]["speciality"] . " " . $data[$i]["practice"] ?>">
                            <a href="?page=article&vu=<?php echo $data[$i]["id"] ?>">
                                <div class="card1">
                                    <img src="<?php echo $data[$i]["picutre"] ?>" alt="">
                                </div>
                                <div class="card2">
                                    <h3><?php echo $data[$i]["name"] ?></h3>
                                    <h4><?php echo $data[$i]["type"] ?></h4>
                                    <p><?php echo $data[$i]["description"] ?></p>
                                </div>
                            </a>
                        </div>

            <?php
                    endif;
                endfor;
            endif; ?>

        </div>
    </section>
</main>