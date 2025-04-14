<header class="d-flex flex-column justify-content-center align-items-center">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Uj szerzö hozzaadasa</h1>

        </div>
    </div>
</header>


<div class="d-flex justify-content-center" style="background-image: url('assets/img/flower.jpg');">
    <div class="card justify-content-center my-3" style="width:50rem;">
        <form action="<?= BASE_URL ?>/private-store-author.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nev</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nev" required>
            </div>
            <div>
                <label for="email" class="form-label my-1">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div>
                <label for="status" class="form-label">Statusz</label>
                    <select class="form-select" id="status" name="status">
                        <option value="active" <?= isset($form['status']) && $form['status'] == 'active' ? 'selected' : '' ?>>Aktív</option>
                        <option value="inactive" <?= isset($form['status']) && $form['status'] == 'inactive' ? 'selected' : '' ?>>Inaktív</option>
                    </select>
            </div>
            <div>
                <label for="password" class="form-label my-3">Jelszo</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Jelszo" required>
            </div>

            <button type="submit" class="btn btn-primary my-3">Mentés</button>
            <a href="private-articles.php" class="btn btn-secondary">Vissza</a>
        </form>
    </div>
</div>