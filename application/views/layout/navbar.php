<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary " data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand ms-3 " href="#">Kongfield</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse me-3" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#hero">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#fields">Fields</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link active" aria-current="page" href="#footer">Contacts</a>
                </li>
                <?php if (current_url() != base_url('lapangan/admin')) : ?>
                    <li class="nav-item">
                        <a class="nav-link active btn btn-secondary btn-sm" href="<?= base_url('lapangan/admin'); ?>"><span class="mx-3">Login</span></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>