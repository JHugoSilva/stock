<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 col-12">
            <div class="card p-4">
            <h3><?= $produto['designacao']?></h3>
            <p>Quantidade atual : <?= $produto['quantidade']?></p>
            <hr>
                <form action="<?= site_url('adm/sub/'.$produto['id'])?>" method="post">
                    <div class="form-group">
                        <div class="col-sm-2 offset-sm-5 col-4 offset-4">
                            <input type="number" name="count_qtd" class="form-control" value="1" min="1" max="1000">
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?= site_url('home')?>" class="btn btn-primary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
