<main>
    <section id="insert">
        <!--
        <form action="?page=admin&modify=<?php /*echo $array["id"] ?>" method="POST" enctype="multipart/form-data">
            <div>
                <label for="name">Titre</label>
                <input placeholder="Titre" type="text" class="form-control" id="InputName" aria-describedby="NameHelp" value="<?php echo $array["name"] ?>" name="name">
            </div>
            <div>
                <label for="pratique">Pratique</label>
                <input placeholder="Pratique" type="text" class="form-control" id="InputPratique" aria-describedby="PratiqueHelp" value="<?php echo $array["practice"] ?>" name="pratique">
            </div>
            <div>
                <label for="specialite">Spécialité</label>
                <input placeholder="Spécialité" type="text" class="form-control" id="InputSpecialité" aria-describedby="specialiteHelp" value="<?php echo $array["speciality"] ?>" name="specialite">
            </div>
            <div>
                <label for="type">Type</label>
                <select name="type">
                    <option value="Plat">Plat</option>
                    <option value="Entrée">Entrée</option>
                    <option value="Dessert">Dessert</option>
                </select>
            </div>
            <div>
                <label for="Photo">Photo</label>
                <input type="file" class="form-control" id="InputPhoto" aria-describedby="PhotoHelp" value="<?php echo $array["picutre"] ?>" name="Photo">
            </div>
            <div class="description">
                <label for="editor2">Description</label>
                <textarea name="editor2"> <?php echo $array["description"] ?></textarea>
            </div>
            <div class="contenue">
                <label for="editor1">Contenue</label>
                <textarea name="editor1"> <?php echo $array["content"] ?></textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <?php
            if (isset($message)) {
                echo "<p>" . $message . "</p>";
            } */ ?>
        </form>
        -->

        <form action="?page=admin&modify=<?php echo $array["id"] ?>" method="POST" enctype="multipart/form-data">
            <div class="titleInsert">
                <label for="name">Titre</label>
                <input placeholder="Titre" type="text" class="form-control" id="InputName" aria-describedby="NameHelp" value="<?php echo $array["name"] ?>" name="name">
            </div>
            <div class="contentInsert">

                <div class="leftInsert">
                    <div class="description">
                        <label for="editor2">Description</label>
                        <textarea name="editor2" placeholder="Une briève description"> <?php echo $array["description"] ?></textarea>
                    </div>
                    <div class="contenue">
                        <label for="editor1">Contenue</label>
                        <textarea name="editor1"><?php echo $array["content"] ?></textarea>
                        <script>
                            CKEDITOR.replace('editor1');
                        </script>
                    </div>
                    <div class="btnInsert">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                    <p> <?php
                        if (isset($message)) {
                            echo "<p>" . $message . "</p>";
                        } ?></p>
                </div>

                <div class="rightInsert">
                    <div class="infoInsert">
                        <div>
                            <label for="pratique">Pratique</label>
                            <select name="pratique">
                                <option value="" disabled selected>Pratique allimentaire</option>
                                <option value="Vegan">Vegan</option>
                                <option value="Vegetarien">Vegetarien</option>
                                <option value="Omnivore">Omnivore</option>
                            </select>
                        </div>
                        <div>
                            <label for="specialite">Spécialité</label>
                            <input placeholder="Spécialité" type="text" class="form-control" id="InputSpecialité" aria-describedby="specialiteHelp" value="<?php echo $array["speciality"] ?>" name="specialite">
                        </div>
                        <div>
                            <label for="type">Type</label>
                            <select name="type">
                                <option value="" disabled selected>Type de plat</option>
                                <option value="Plat Principal">Plat Principal</option>
                                <option value="Entrée">Entrée</option>
                                <option value="Dessert">Dessert</option>
                            </select>
                        </div>
                    </div>
                    <div class="pictureInsert">
                        <label for="Photo">Photo</label>
                        <div>
                            <img id="output" src="<?php echo $array["picutre"] ?>" />
                        </div>
                        <input type="file" onchange="loadFile(event)" class="form-control" id="InputPhoto" aria-describedby="PhotoHelp" name="Photo">
                    </div>
                </div>
            </div>


        </form>
    </section>
</main>