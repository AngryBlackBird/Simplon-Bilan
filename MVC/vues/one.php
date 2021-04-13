<main>
    <section id="insert">
        <form action="?page=insertContent" method="POST" enctype="multipart/form-data">
            <div>
                <label for="name">Titre</label>
                <input placeholder="Titre" type="text" class="form-control" id="InputName" aria-describedby="NameHelp" name="name">
            </div>
            <div>
                <label for="pratique">Pratique</label>
                <input placeholder="Pratique" type="text" class="form-control" id="InputPratique" aria-describedby="PratiqueHelp" name="pratique">
            </div>
            <div>
                <label for="specialite">Spécialité</label>
                <input placeholder="Spécialité" type="text" class="form-control" id="InputSpecialité" aria-describedby="specialiteHelp" name="specialite">
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
                <input type="file" class="form-control" id="InputPhoto" aria-describedby="PhotoHelp" name="Photo">
            </div>
            <div class="description">
                <label for="editor2">Description</label>
                <textarea name="editor2"></textarea>
            </div>
            <div class="contenue">
                <label for="editor1">Contenue</label>
                <textarea name="editor1"></textarea>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <?php
            if (isset($array)) {
                echo "<p>" . $array . "</p>";
            } ?>
        </form>
    </section>
</main>