<header class="d-flex flex-column mt-1 justify-content-center align-items-center"
    style="background-image: url('assets/img/bali.jpg');">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Szerzök</h1>

        </div>
    </div>
</header>

<div class="container">
    <div class="row mt-4">

        <div class="col text-end">
            <a href="<?= BASE_URL ?>/private-create-author.php" class="btn btn-primary">Uj szerzö</a>

        </div>
    </div>
    <div class="row">
        <table class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Nev</th>
                    <th>Email</th>
                    <th>Statusz</th>
                    <th>Hozzáadva</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($authors) > 0): ?>

                    <?php foreach ($authors as $author): ?>
                        <tr>
                            <td><?= $author['id'] ?></td>
                            <td><?= $author['name'] ?></td>
                            <td><?= $author['email'] ?></td>
                            <td><?= $author['status'] ?></td>


                            <td><?= date('Y.m.d H:i:s', strtotime($author['created_at'])) ?></td>

                            <td>
                                <a href="<?= BASE_URL ?>/private-edit-author.php?id=<?= $author['id'] ?>"
                                    class="btn btn-warning">Szerkesztés</a>
                                <a href="javascript:;" class="btn btn-danger"
                                    onclick="confirmDelete(<?= $author['id'] ?>)">Törlés</a>
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
            text: "A cikk törlese visszavonhatatlan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Igen, törlöm!',
            cancelButtonText: 'Mégsem'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= BASE_URL ?>/private-delete-author.php?id=' + id;
            }
        });
    }
</script>