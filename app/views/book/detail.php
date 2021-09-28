<?php 

// session_start();

// if (isset($_GET['id'])){

//     $id = $_GET['id'];

//     require '../db/book_model.php';
//     $bookModel = new BookModel();

//     $book = $bookModel->getBookById($id);
// }

// if (isset($_POST['add-to-cart'])){
//     $bookId = $_POST['book-id'];
//     $userId = $_SESSION['user-id'];

//     require '../db/cart_model.php';
//     $cartsModel = new CartModel();

//     $success = $cartsModel->addItemByUserId($userId, $bookId);
// }

// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'] ?></title>
    
    <link href="<?= BASEURL ?>/public/css/style_detail.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container">
            <div class="glass">
                <div class="appbar">
                    <a href="<?= BASEURL ?>/book"> < Back</a>
                </div>
                <div class="content">
                    <div class="book-image">
                        <img id="book-img" src="<?= $data['book']['url'] ?>" alt="">
                    </div>
                    <div class="book-detail">
                        <ul id="field-container">
                            <li> 
                                <div class="info">
                                    <div class="title-info">Title</div>
                                    <div class="value-info" id="title"><?= $data['book']['title'] ?></div>
                                </div>
                            </li>

                            <?php if (isset($data['book']['real_title'])) : ?>
                            <li> 
                                <div class="info">
                                    <div class="title-info">Real Title</div>
                                    <div class="value-info" id=""><?= $data['book']['real_title'] ?></div>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if (isset($data['book']['author'])) : ?>
                            <li> 
                                <div class="info">
                                    <div class="title-info">Author</div>
                                    <div class="value-info" id=""><?= $data['book']['author'] ?></div>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if (isset($data['book']['translator'])) : ?>
                            <li> 
                                <div class="info">
                                    <div class="title-info">Translator</div>
                                    <div class="value-info" id=""><?= $data['book']['translator'] ?></div>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if (isset($data['book']['editor'])) : ?>
                            <li> 
                                <div class="info">
                                    <div class="title-info">Editor</div>
                                    <div class="value-info" id=""><?= $data['book']['editor'] ?></div>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if (isset($data['book']['publisher'])) : ?>
                            <li> 
                                <div class="info">
                                    <div class="title-info">Publisher</div>
                                    <div class="value-info" id=""><?= $data['book']['publisher'] ?></div>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if (isset($data['book']['real_publisher'])) : ?>
                            <li> 
                                <div class="info">
                                    <div class="title-info">Real Publisher</div>
                                    <div class="value-info" id=""><?= $data['book']['real_publisher'] ?></div>
                                </div>
                            </li>
                            <?php endif; ?>

                            <li> 
                                <div class="info">
                                    <div class="title-info">Price</div>
                                    <div class="value-info" id="price">Rp. <?= $data['book']['price'] ?></div>
                                </div>
                            </li>

                            <li>
                                <form action="" method="post">
                                    <input type="hidden" name="book-id" value="<?= $data['book']['id'] ?>">
                                    <input type="submit" name="add-to-cart" value="Add to Cart">
                                </form>
                            </li>
                            <?php if (isset($success)) : ?>
                                <?php if ($success == 1) : ?>
                                    <p style="color:green;">Added to cart</p>
                                <?php endif; ?>
                                <?php if ($success != 1) : ?>
                                    <p style="color:red;">Something wrong</p>
                                <?php endif; ?>    
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- <script src="script/books.js"></script> -->
    <!-- <script src="script/detail.js"></script> -->
</body>
</html>