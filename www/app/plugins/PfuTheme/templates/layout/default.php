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

use Cake\Core\Configure;

$cakeDescription = 'Ønskeportalen: Din online ønskeliste';

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

    <?= $this->Html->css(['reset', 'vendor/normalize.min', 'vendor/bootstrap/bootstrap.min', 'styles.min', 'vendor/toastr/toastr.min'], ['media' => 'screen']) ?>
    <?= $this->Html->script(['vendor/jquery/jquery-3.6.4.min','vendor/bootstrap/bootstrap.bundle.min', 'vendor/toastr/toastr.min']) ?>

    <script src="https://kit.fontawesome.com/7a26c8da44.js" crossorigin="anonymous"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('vendor') ?>
</head>
<body>
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

