<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container pt-3 pb-3">
    <div class="row">
        <div class="col-sm-8 col-12 text-left">
            <a href="<?= site_url('adm')?>" class="btn btn-primary">Voltar</a>
        <a href="<?= site_url('adm/clearmov')?>" class="btn btn-primary">Movimentos</a>
        </div>
        </div>
    </div>
    <hr>
    <div class="mt-3 mb-3">
        <?php if(count($movimentos)==0):?>
            <p class="text-center">Não existe movimentos    </p>
        <?php else:?>
            <table class="table table-strip">
                <thead class="thead-dark">
                    <th class="text-left">Data</th>
                    <th class="text-left">Produto</th>
                    <th class="text-center">Quantidade</th>
                    <th></th>
                </thead>
                <?php foreach($movimentos as $m):?>
                    <tr>
                        <td><?= $m['data_hora']?></td>
                        <td><?= $m['des']?></td>
                        <td><?= $m['quantidade']?></td>
                    </tr>
                <?php endforeach;?>
            </table>
            <hr>
            <p>Total de movimentos: <b><?= count($movimentos)?></b></p>
        <?php endif;?>
    </div>
</div>