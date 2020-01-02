<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 col-12">
            <div class="card p-4">
                <h3>Novo Produto</h3><hr>
                <form action="<?= site_url('adm/insert')?>" method="post">
                    <div class="form-group">
                        <label for="">Designação</label>
                        <input type="text" name="txt_designacao" value="<?= set_value('txt_designacao','')?>" class="form-control" placeholder="Nova Designação">
                    </div>
                    <?php if(isset($msg)):?>
                        <div class="alert alert-danger">
                            <?= $msg ?>
                        </div>
                    <?php endif;?>
                    <div class="text-center">
                        <a href="<?= site_url('home')?>" class="btn btn-primary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>