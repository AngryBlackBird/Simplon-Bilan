<main>
    <section id="insert">


        <form action="?page=insertContent" method="POST" enctype="multipart/form-data">
            <div class="titleInsert">
                <label for="name">Titre</label>
                <input placeholder="Titre" type="text" class="form-control" id="InputName" aria-describedby="NameHelp" name="name">
            </div>
            <div class="contentInsert">

                <div class="leftInsert">
                    <div class="description">
                        <label for="editor2">Description</label>
                        <textarea name="editor2" placeholder="Une briève description"></textarea>
                    </div>
                    <div class="contenue">
                        <label for="editor1">Contenue</label>
                        <textarea name="editor1"></textarea>
                        <script>
                            CKEDITOR.replace('editor1');
                        </script>
                    </div>
                    <div class="btnInsert">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                    <p> <?php
                        if (isset($array)) {
                            echo "<p>" . $array . "</p>";
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
                            <input placeholder="Spécialité" type="text" class="form-control" id="InputSpecialité" aria-describedby="specialiteHelp" name="specialite">
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
                            <img id="output" />
                        </div>
                        <input type="file" onchange="loadFile(event)" class="form-control" id="InputPhoto" aria-describedby="PhotoHelp" name="Photo">
                    </div>
                </div>
            </div>


        </form>
    </section>
</main>