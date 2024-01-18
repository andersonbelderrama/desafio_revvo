<div class="form-container">

    <form class="form-content" method="post" action="/curso/<?= $course['id'] ?>" enctype="multipart/form-data"> 
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-4">
            <label for="name" class="form-label">Nome</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-input"
                placeholder="Preencha com o nome do curso"
                value="<?= isset($_POST['name']) ? $_POST['name'] : $course['name'] ?>"
            />
        </div>

        <div class="mb-4">
            <label for="short_description" class="form-label">Descrição Curta(max. 70 carácteres)</label>
            <input
                type="text"
                id="short_description"
                name="short_description"
                class="form-input"
                placeholder="Preencha com uma descrição curta do curso"
                value="<?= isset($_POST['short_description']) ? $_POST['short_description'] : $course['short_description'] ?>"
            />
        </div>

        <div class="mb-4">
            <label for="price" class="form-label">Preço(Ex. 999.99)</label>
            <input
                type="text"
                id="price"
                name="price"
                class="form-input"
                placeholder="Preencha com o preço do curso"
                value="<?= isset($_POST['price']) ? $_POST['price'] : $course['price'] ?>"
            />
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">Descrição</label>
            <textarea
                id="description"
                name="description"
                class="form-textarea"
                placeholder="Preencha com uma descrição do curso"
            ><?= isset($_POST['description']) ? $_POST['description'] : $course['description'] ?></textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label">Imagem</label>
            <input
                type="file"
                id="image"
                name="image"
                class="form-input"
            />
        </div>

        <button class="form-btn" type="submit">Atualizar</button>
</form>

</div>