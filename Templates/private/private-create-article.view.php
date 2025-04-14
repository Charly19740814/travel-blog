<header class="d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="text-center my-4">
            <h1 class="fw-bolder">Irj egy uj cikket</h1>

        </div>
    </div>
</header>

<div class="d-flex justify-content-center mb-3" style="background-image: url('assets/img/flower.jpg');">
    <div class="card justify-content-center" style="width:50rem;">
        <form  class="m-3" action="<?= BASE_URL ?>/private-store-article.php" enctype="multipart/form-data" method="post">
        <label for="author" class="form-label">Szerző</label>
            <select class="form-select" id="author" name="author">
                <option value="">Válassz szerzőt...</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="mb-3">
                <label for="title" class="form-label">Cim</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Tartalom</label>
                <textarea cols="auto" rows="15" style="width:100%;" name="content" id="content"></textarea>
            </div>
            <label for="image" class="form-label">Kép hozzáadása</label>
            <input class="mb-3" type="file" name="image" accept="image/*">
            <br>
            <button type="submit" class="btn btn-primary">Mentés</button>
            <a href="<?= BASE_URL ?>/private-articles.php" class="btn btn-secondary">Vissza</a>
        </form>
    </div>
</div>