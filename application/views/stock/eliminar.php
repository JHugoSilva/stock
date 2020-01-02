<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 col-12">
            <div class="card p-4 text-center">
            	<h4><?= $produto['designacao']?></h4>
            	<p>Deseja eliminar</p>
            	<div class="pt-3 pb-3">
            		<a href="<?= site_url('adm/home')?>" class="btn btn-primary">Voltar</a>
            		<a href="<?= site_url('adm/delete/'.$produto['id'].'/true')?>" class="btn btn-primary">Deletar</a>
            	</div>
            </div>
        </div>
    </div>
</div>