<header class="d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Szerzö szerkesztese</h1>

        </div>
    </div>
</header>


<div class="d-flex justify-content-center">
    <div class="card justify-content-center my-3" style="width:50rem;">
        <form action="<?= BASE_URL ?>/private-status-author.php" method="post">
        <input type="hidden" name="id" value="<?= $form['id'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nev</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nev" value="<?=$form['name']?>" required>
            </div>
            <div>
                <label for="email" class="form-label my-1">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value="<?=$form['email']?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Státusz</label>
                <select class="form-select" id="status" name="status">
                    <option value="active" <?= $form['status'] == 'active' ? 'selected' : '' ?>>Aktív</option>
                    <option value="inactive" <?= $form['status'] == 'inactive' ? 'selected' : '' ?>>Inaktív</option>
                </select>
            </div>
            

            <button type="submit" class="btn btn-primary my-3">Mentés</button>
            <a href="private-articles.php" class="btn btn-secondary">Vissza</a>
        </form>
    </div>
</div>