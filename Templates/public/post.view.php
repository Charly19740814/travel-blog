<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <div class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?= $post['title'] ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2"><?= $post['created_at'] ?></div>
                    <div class="small text-muted"><?= $post['author_name'] ?></div>
                </div>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded"
                        src="<?= BASE_URL ?>/uploads/<?= $post['image_name'] . '.' . $post['image_extension'] ?>" alt="<?= $post['image_name'] ?>" /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?=$post['content'] ?></p>
                    <a class="btn btn-primary" href="<?= BASE_URL ?>/posts.php?id=<?= $post['id'] ?>">Vissza</a>
                </section>
            </article>

        </div>


    </div>

</div>