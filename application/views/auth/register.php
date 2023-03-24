<div class="container-fluid">
    <div class="position-absolute top-0 bottom-0 end-0 start-0" style="background-image: linear-gradient(to bottom right, #FAF8F1, #FAF8F1);">
        <div style="margin-top: 20vh;">
            <div class="d-flex justify-content-center">
                <div class="card shadow border-0 rounded-4">
                    <form action="<?= base_url('onRegister') ?>" method="post">
                        <div class="card-body px-5 pb-5">
                            <div class="mb-4">
                                <div class="py-3 text-center">
                                    <h4>Daftar Akun</h4>
                                    <div>
                                        Selamat Datang Di Aplikasi <b>Rak Persuratan</b>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="fw-semibold">Nama Lengkap</label>
                                <div class="input-group flex-nowrap">
                                    <input type="text" name="nama" class="form-control border border-top border-start border-bottom" placeholder="Isi nama lengkap dengan benar" aria-label="Isi nama lengkap dengan benar" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="fw-semibold">Username</label>
                                <div class="input-group flex-nowrap">
                                    <input type="text" name="username" class="form-control border-0 border-top border-start border-bottom" placeholder="Isi username dengan benar" aria-label="Isi username dengan benar" aria-describedby="addon-wrapping">
                                    <span class="input-group-text bg-white border-0 border-top border-end border-bottom" id="addon-wrapping">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="fw-semibold">Password</label>
                                <div class="input-group flex-nowrap">
                                    <input type="password" name="password" class="form-control border-0 border-top border-start border-bottom" placeholder="Isi password dengan benar" aria-label="Isi password dengan benar" aria-describedby="addon-wrapping">
                                    <span class="input-group-text bg-white border-0 border-top border-end border-bottom" id="addon-wrapping">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M5 11m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                                            <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <button type="submit" class="btn btn-warning fw-semibold px-3">
                                    Daftar
                                </button>
                            </div>
                            <div>
                                Sudah punya akun ?<a href="<?= base_url('login') ?>"> Masuk</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>