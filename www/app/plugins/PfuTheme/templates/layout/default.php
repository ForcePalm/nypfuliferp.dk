<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 * 
 */

use App\Controller\AppController;
use Cake\Core\Configure;

$cakeDescription = 'PfuLifeRP';

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->meta('description', Configure::read('description'))?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="preload" as="font">

    <?= $this->Html->css(['reset', 'vendor/normalize.min', 'vendor/bootstrap/bootstrap.min', 'vendor/bootstrap4-toggle.min', 'styles.min', 'vendor/toastr/toastr.min'], ['media' => 'screen']) ?>
    <?= $this->Html->script(['vendor/jquery/jquery-3.6.4.min', 'vendor/popper.min', 'vendor/bootstrap/bootstrap.bundle.min', 'vendor/bootstrap4-toggle.min', 'vendor/toastr/toastr.min']) ?>

    <script src="https://kit.fontawesome.com/7a26c8da44.js" crossorigin="anonymous"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('vendor') ?>
</head>
<body class="bg-dark">
    <header class="main-header default-background">
        <nav class="top-nav">
            <div class="top-nav-title">
                <a href="<?= $this->Url->build('/') ?>"><span class="home-link"><img src="<?= $this->Url->image('uploads/Settings/'. Configure::read('logo')) ?>" width="45px" height="45px" alt="Gave"><?= ucfirst(Configure::read('name')) ?></span></a>
            </div>

            <div class="mobile-menu default-text-color">
                <span class="fa-solid fa-bars"></span>
            </div>

            <div class="top-nav-links menu-closed">
                <div>
                    <a href="<?= $this->Url->build('/manual') ?>">Manual</a>
                    <?php if(!$this->request->getAttribute('identity')){ ?>
                    <a href="<?= $this->Url->build('/users/login') ?>"><img src='<?= $this->Url->image('sits_01.webp') ?>'></a>
                    <?php }else{ ?>
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><?=$this->request->getAttribute('identity')->get('name')?> <img class="nav-avatar" src='<?=$this->request->getAttribute('identity')->get('avatar_medium')?>' alt="Avatar" ></a>

                    <div class="dropdown">
                        <div class="dropdown-menu dropdown-menu-end default-background" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item drop-txt" href="Profile"><i class="fas fa-user"></i> Profile</a>
                        <a class="dropdown-item drop-txt" href="<?= $this->Url->build('/users/logout') ?>">Log ud</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
            </div>
        </nav>
    </header>
    
    <main class="main-content">
        <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer class="default-background">
        <a class="default-text-color" href="<?= $this->Url->build('/') ?>"><span><?= ucfirst(Configure::read('name')) ?></span></a>
        <p>Copyright © <?=  date("Y") ?> <?= ucfirst(Configure::read('name')) ?></p>
    </footer>
    
    <!--append scripts-->
    <?= $this->Html->script(['scripts.min']) ?>
</body>
</html>

