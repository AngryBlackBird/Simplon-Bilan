<main>
    <section id="content">
        <h2>Nos plats</h2>
        <div class="select">
            <div class="filtre">

                <label for="Pratiques-select">Votre pratique allimentaire :</label>
                <select id="selectPractice">
                    <option value="" disabled selected>Pratique allimentaire</option>

                    <?php if (isset($resultType)) :
                        $count2 = count($resultType[1]);
                        for ($i = 0; $i < $count2; $i++) :
                    ?>
                            <option value="<?php

                                            echo $resultType[1][$i]["practice"] ?>"><?php echo $resultType[1][$i]["practice"] ?></option>
                    <?php

                        endfor;
                    endif; ?>
                </select>
            </div>
            <div class="filtre">
                <label for="Pratiques-select">Votre spécialité : </label>

                <select id="selectSpeciality">
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

                <select id="selectType">
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
        <div class="insertPlat">
            <a href="?page=insertContent">Ajouter plat </a>
        </div>
        <div class="contentCard">


            <?php
            if (isset($result)) :
                $count = count($result);
                for ($i = 0; $i < $count; $i++) :
            ?>
                    <div class="card <?php echo $result[$i]["type"] . " " . $result[$i]["speciality"] . " " . $result[$i]["practice"] ?>">
                        <a href="?page=article&vu=<?php echo $result[$i]["id"] ?>">
                            <div class="card1">
                                <img src="<?php echo $result[$i]["picutre"] ?>" alt="">
                            </div>
                            <div class="card2">
                                <div>
                                    <h3><?php echo $result[$i]["name"] ?></h3>
                                    <h4><?php echo $result[$i]["type"] ?></h4>
                                </div>
                                <p><?php echo $result[$i]["description"] ?></p>
                            </div>
                        </a>
                        <div class="adminBtn">
                            <a href="?page=admin&delete=<?php echo $result[$i]["id"] ?>">Supprimer</a>
                            <a href="?page=admin&modify=<?php echo $result[$i]["id"] ?>">Modifier</a>
                            <form action="" method="POST">
                                <label for="check">Publier </label>
                                <input type="text" value="<?php echo $result[$i]["id"] ?>" name="checkId" style="display : none" />
                                <button type="sumbit">
                                    <input type="checkbox" name="check" <?php if ($result[$i]["published"] == "1") {
                                                                            echo "checked";
                                                                        } ?> />
                                </button>
                            </form>
                        </div>
                    </div>

            <?php

                endfor;
            endif; ?>

        </div>


    </section>
</main>