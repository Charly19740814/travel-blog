<div class="d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Cikk szerkesztese</h1>

        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
        <div class="card justify-content-center" style="width:50rem;">
            <form action="<?= BASE_URL ?>/private-update-article.php" method="post">
            <input type="hidden" name="id" value="<?= $form['id'] ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Cim</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?=$form ['title']?>">
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">Tartalom</label>
                    <textarea cols="auto" rows="15" style="width:100%;" name="content" id="content"><?=$form ['content']?></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Mentés</button>
                <a href="private-articles.php" class="btn btn-secondary">Vissza</a>
            </form>
        </div>
    </div>

    