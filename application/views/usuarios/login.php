<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 col-8 offset-2">
            <div class="card p-4">
                <h3 class="pb-3">Login</h3>
                <form action="<?= site_url('home/verificarLogin')?>" method="post">
                    <div class="form-group pb-2">
                        <input type="text" name="txt_usuario" class="form-control" placeholder="Usuario" required>
                    </div>
                    <div class="form-group pb-2">
                        <input type="password" name="txt_senha" class="form-control" placeholder="Senha" required>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary p-1">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>