<div class="form-container">

    <form class="form-content" method="post" action="/curso/store">

        <div class="mb-4">
            <label for="name" class="form-label">Nome</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-input"
                placeholder="Preencha com o nome do curso"
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
            />
        </div>

        <div class="mb-4">
            <label for="price" class="form-label">Preço</label>
            <input
                type="text"
                id="price"
                name="price"
                class="form-input"
                placeholder="Preencha com o preço do curso"
            />
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">Descrição</label>
            <textarea
                id="description"
                name="description"
                class="form-textarea"
                placeholder="Preencha com uma descrição do curso"
            ></textarea>
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

        <button class="form-btn">Criar</button>
</form>

</div>
