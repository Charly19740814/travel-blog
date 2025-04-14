


    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Charly Webdesign 2024</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    
    <?php $flash = getFlashMessage() ?>
    <?php if(!empty($flash)): ?>
        <script>
            Swal.fire({
                icon: '<?= $flash['type'] ?>',
                title: '<?= $flash['message'] ?>',
                showConfirmButton: true,
            });
        </script>
    <?php endif; ?>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>