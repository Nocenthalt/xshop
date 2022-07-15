<?php
$cart = $_SESSION['cart'] ?? null;
var_dump($cart);

?>
<div class="container">
    <div class="title-container">
        <h1 class="title">Thông tin giỏ hàng</h1>
        <a href="?page=home" class="btn btn--primary-o home-redirect">
            <i class="fas fa-chevron-left"></i>&nbsp; Tiếp tục mua hàng
        </a>
    </div>
    <div class="shopping-cart__container">
        <div class="row grid mx-auto">
            <div class="col">
                <main class="cart-display">
                    <table class="table mx-auto">
                        <thead class="border--line">
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($cart) : ?>
                                <?php foreach ($cart as $item) : ?>
                                    <tr>
                                        <td>
                                            <div class="grid item__detail">
                                                <div class="item__detail__image">
                                                    <img src="<?= $item['product_image'] ?>" class="img-fluid" alt="<?= $item['product_name'] ?>">
                                                </div>
                                                <div class="iitem__detail__name">
                                                    <?= $item['product_name'] ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $item['price'] ?></td>
                                        <td><?= $item['amount'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </main>
            </div>
            <div class="col">
                <aside class="border--line">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo unde voluptates quasi, nemo reiciendis, magni praesentium, sit ipsam quidem sint non recusandae dolorum a excepturi modi tenetur deleniti! Asperiores reiciendis accusamus est iste ad delectus veniam vero inventore quas quasi sed, eius aliquid ipsum omnis vitae facere eos quo pariatur!</p>
                </aside>
            </div>
        </div>
    </div>
</div>