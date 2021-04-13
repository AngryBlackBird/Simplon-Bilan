<main>
    <section id="content">
        <h2>Nos plats</h2>
        <div class="select">
            <div class="filtre">
                <label for="Pratiques-select">Votre pratique allimentaire :</label>
                <select>
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

                <select>
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

                <select>
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

        <div>
            <a href="?page=insertContent">Ajouter plat </a>
        </div>
        <div class="contentCard">

            <?php
            if (isset($result)) :
                $count = count($result);
                for ($i = 0; $i < $count; $i++) :
            ?>
                    <div class="card">
                        <a href="#">
                            <img src="<?php echo $result[$i]["picutre"] ?>" alt="">
                            <div>
                                <h3><?php echo $result[$i]["name"] ?></h3>
                                <h4><?php echo $result[$i]["type"] ?></h4>
                                <p><?php echo $result[$i]["description"] ?></p>
                            </div>
                        </a>
                        <div class="adminBtn">
                            <a href="#">Supprimer</a>
                            <a href="#">Modifier</a>
                            <div>
                                <label for="check">Publier </label>
                                <input type="checkbox" value="None" name="check" />
                            </div>
                        </div>
                    </div>
            <?php

                endfor;
            endif; ?>
        </div>
    </section>
</main>