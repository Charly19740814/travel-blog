<header class="d-flex flex-column mt-1 justify-content-center align-items-center"
    style="background-image: url('assets/img/bali.jpg');">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Cikkek</h1>

        </div>
    </div>
</header>

<div class="container">
    <div class="row mt-4">

        <div class="col text-end">
            <a href="<?= BASE_URL ?>/private-create-article.php" class="btn btn-primary">Új cikk hozzaadasa</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Cim</th>
                    <th>Szerzö</th>
                    <th>Hozzáadva</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($articles) > 0): ?>

                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= $article['id'] ?></td>
                            <td><?= $article['title'] ?></td>
                            <td><?= $article['author_name'] ?></td>


                            <td><?= date('Y.m.d H:i:s', strtotime($article['created_at'])) ?></td>

                            <td>
                                <a href="<?= BASE_URL ?>/private-edit-article.php?id=<?= $article['id'] ?>"
                                    class="btn btn-warning">Szerkesztés</a>
                                <a href="javascript:;" class="btn btn-danger"
                                    onclick="confirmDelete(<?= $article['id'] ?>)">Törlés</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>

        </table>

    </div>
</div>



<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Biztos vagy benne?',
            text: "A felhasználó törlése visszavonhatatlan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Igen, törlöm!',
            cancelButtonText: 'Mégsem'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= BASE_URL ?>/private-delete-article.php?id=' + id;
            }
        });
    }
</script>