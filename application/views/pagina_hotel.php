<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>   

<div class="container text-center p-4">
    <a href="<?= site_url('home')?>" class="btn btn-primary">Voltar</a>

    <h3 class="p-3"><?= $hoteis['nome']?></h3>

    <p><?= $hoteis['descricao']?></p>

    <img src="<?= base_url('public/assets/images/').$hoteis['imagem']?>" alt="">
</div>