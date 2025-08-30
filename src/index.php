<?php

declare(strict_types=1);

require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/ShoppingCart.php';

use Src\Product;
use Src\Cart;

$products = [
    1 => new Product(1, 'Camiseta', 59.90, 10),
    2 => new Product(2, 'Calça Jeans', 129.90, 5),
    3 => new Product(3, 'Tênis', 199.90, 3),
];

$cart = new Cart($products);

echo "<h3>Caso 1 — Adicionar produto válido</h3>";
echo $cart->addItem(1, 2) . "<br>";
echo nl2br($cart->listItems()) . "<br>";
echo "Total do carrinho: R$ " . number_format($cart->calculateTotal(), 2, ',', '.') . "<br><br>";

echo "<h3>Caso 2 — Tentar adicionar além do estoque</h3>";
echo $cart->addItem(3, 10) . "<br><br>";

echo "<h3>Caso 3 — Remover produto do carrinho</h3>";
echo $cart->removeItem(1) . "<br>";
echo nl2br($cart->listItems()) . "<br><br>";

echo "<h3>Caso 4 — Aplicação de cupom de desconto</h3>";
$cart->addItem(2, 1);
echo $cart->applyDiscount('DESCONTO10') . "<br>";
echo nl2br($cart->listItems()) . "<br>";
echo "Total com desconto: R$ " . number_format($cart->calculateTotal(), 2, ',', '.') . "<br><br>";