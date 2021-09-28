<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="<?= BASEURL ?>/public/css/style_index.css" rel="stylesheet">
    
    <title><?= $data['title']; ?></title>
</head>
<body>
    <main>
        <div class="section">
            <div class="navbar">
                <a href="#">< Sign Out</a>
                <div class="menu">
                    <a class="cart-button" href="#">Cart</a>
                </div>
            </div>
            <div class="container" id="card-container">
                <?php foreach($data['books'] as $book) : ?>
                    <div class="wrapper">
                        <a href="<?= BASEURL ?>/book/detail/<?= $book['id']; ?>">
                            <div class="card" id="<?php echo $book['id']; ?>">
                                <img src="<?= $book['url'] ?>" alt="">
                                <div class="info">
                                    <p class="price">Rp. <?= $book['price'] ?></p>
                                    <p class="title"><?= $book['title'] ?></p>
                                </div>
                            </div>
                        </a>
                    </div>            
                <?php endforeach; ?>
            </div>
        </div>
    </main>

</body>
</html>