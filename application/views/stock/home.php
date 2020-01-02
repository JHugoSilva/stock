<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-sm-8 col-12 text-left">
            <a href="<?= site_url('adm/new')?>" class="btn btn-primary">Novo Produto</a>
            <a href="<?= site_url('adm/movimentos')?>" class="btn btn-primary">Movimentos</a>
        </div>
        <div class="col-sm-4 col-12 text-right">
            <a href="<?= site_url('home/logout')?>" class="btn btn-primary">Sair</a>
        </div>
    </div>
    <hr>
    <div class="mt-3 mb-3">
        <?php if(count($produtos)==0):?>
            <p class="text-center">Não existe produtos</p>
        <?php else:?>
            <table class="table table-strip">
                <thead class="thead-dark">
                    <th class="text-left">Produto</th>
                    <th class="text-center">Quantidade</th>
                    <th></th>
                </thead>
                <?php foreach($produtos as $p):?>
                    <tr>
                        <td class="text-left">
                            <a href="<?= site_url('adm/editar/'.$p['id'])?>"><i class="fa fa-pencil"></i></a>
                            <?= $p['designacao']?>
                        </td>
                        <td class="text-center">
                            <?= $p['quantidade']?>
                        </td>
                        <td class="text-right">
                            <a href="<?= site_url('adm/add/'.$p['id'])?>" class="mr-3"><i class="fa fa-plus-square"></i></a>
                            <a href="<?= site_url('adm/sub/'.$p['id'])?>" class="mr-3"><i class="fa fa-minus-square"></i></a>
                            <a href="<?= site_url('adm/delete/'.$p['id'])?>" class="mr-3"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
            <hr>
            <p>Total de produtos: <b><?= count($produtos)?></b></p>
        <?php endif;?>
    </div>
</div>