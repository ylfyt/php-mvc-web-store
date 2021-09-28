<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>

    <link href="<?= BASEURL ?>/public/css/style_cart.css" rel="stylesheet">

</head>
<body>
    <main>
        <div class="container">
            
            <div class="navbar">
                <a class="back-button" href="<?= BASEURL ?>/book">< Back</a>
                <div class="checkout-form">
                    <div class="total-price">Rp. <?= $data['total-price'] ?></div>
                    <?php if ($data['total-price'] != 0) : ?>
                        <a class="checkout-button" href="#">Checkout</a>
                    <?php else : ?>
                        <a class="checkout-button disabled" href="#">Checkout</a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="item-container">

                <?php if($data['book-items'] != []) : ?>

                    <?php foreach($data['book-items'] as $bookItem) : ?>
                        <div class="item">
                            <div class="item-info">
                                <img src="<?= $bookItem['book']['url'] ?>" alt="">
                                <p class="item-name">
                                    <?= $bookItem['book']['title'] ?>
                                </p>
                            </div>

                            <div class="item-price">
                                <div class="price">Rp. <?= $bookItem['num']*$bookItem['book']['price'] ?></div>

                                <div class="nums">
                                    <form action="<?= BASEURL ?>/cart/remove" method="post">
                                        <input type="hidden" name="item-id" value="<?= $bookItem['book']['id'] ?>">
                                        <input type="submit" name="minus" id="" value="-">
                                    </form>
                                    <div class="num"><?= $bookItem['num'] ?></div>
                                    <form action="<?= BASEURL ?>/cart/add" method="post">
                                        <input type="hidden" name="item-id" value="<?= $bookItem['book']['id'] ?>">
                                        <input type="submit" name="plus" id="" value="+">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                
                <?php else: ?>
                    
                    <h3>Cart is Empty</h3>

                <?php endif; ?>
                
            </div>
        </div>
    </main>
</body>
</html>