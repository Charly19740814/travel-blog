<header class="d-flex flex-column mt-1 justify-content-center align-items-center" style="background-image: url('assets/img/bali.jpg');">
    <div class="container">
        <div class="text-center my-5">
            <!-- kep -->
            <h1 class="fw-bolder">Charly's travel blog</h1>
            <p class="fw-semibold">Here you will find my latest travel and useful advice articles.</p>

        </div>
    </div>
</header>


<div class="container-fluid">
    <?php if (!empty($posts)): ?>

        <?php foreach ($posts as $post): ?>


            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card my-4">
                        <div class="d-flex">
                        <img class="img-fluid me-3" style="max-width: 250px; max-height: auto; object-fit: cover;"
                               src="<?= BASE_URL ?>/uploads/<?= $post['image_name'] . '.' . $post['image_extension'] ?>"
                               class="card-img-top" alt="<?= $post['image_name'] ?>">

                        <div class="card-body">
                            
                            <h2 class="card-title h4"><?= $post['title'] ?></h2>
                            <p class="card-text"><?= substr($post['content'], 0, 100) . '...' ?></p>
                            <div class="small text-muted"><?= $post['created_at'] ?></div>
                            <div class="small text-muted"><?= $post['author_name'] ?></div>
                            <a class="btn btn-primary" href="<?= BASE_URL ?>/post.php?id=<?= $post['id'] ?>">Elolvasom →</a>
                        </div>
                        </div>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>
    <?php endif; ?>
</div>