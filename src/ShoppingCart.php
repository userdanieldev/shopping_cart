<?php

declare(strict_types=1);

namespace Src;

class Cart
{
    private array $items = [];
    private array $products;
    private float $discount = 0.0;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function addItem(int $productId, int $quantity): string
    {
        if (!isset($this->products[$productId])) {
            return "Produto não encontrado.";
        }

        $product = $this->products[$productId];

        if ($product->getStock() < $quantity) {
            return "Estoque insuficiente para o produto: {$product->getName()}.";
        }

        $product->decreaseStock($quantity);

        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity'] += $quantity;
            $this->items[$productId]['subtotal'] =
                $this->items[$productId]['quantity'] * $product->getPrice();
        } else {
            $this->items[$productId] = [
                'product'  => $product,
                'quantity' => $quantity,
                'subtotal' => $quantity * $product->getPrice(),
            ];
        }

        return "Produto {$product->getName()} adicionado ao carrinho.";
    }

    public function removeItem(int $productId): string
    {
        if (!isset($this->items[$productId])) {
            return "Produto não encontrado no carrinho.";
        }

        $item = $this->items[$productId];
        $item['product']->increaseStock($item['quantity']);
        unset($this->items[$productId]);

        return "Produto {$item['product']->getName()} removido do carrinho.";
    }

    public function listItems(): string
    {
        if (empty($this->items)) {
            return "Carrinho vazio.";
        }

        $output = "Itens no carrinho:\n";

        foreach ($this->items as $item) {
            $product  = $item['product'];
            $quantity = $item['quantity'];
            $subtotal = number_format($item['subtotal'], 2, ',', '.');

            $output .= "- {$product->getName()} | Quantidade: {$quantity} | Subtotal: R$ {$subtotal}\n";
        }

        return $output;
    }

    public function calculateTotal(): float
    {
        $total = 0.0;

        foreach ($this->items as $item) {
            $total += $item['subtotal'];
        }

        if ($this->discount > 0) {
            $total -= $total * $this->discount;
        }

        return $total;
    }

    public function applyDiscount(string $coupon): string
    {
        if ($coupon === 'DESCONTO10') {
            $this->discount = 0.10;
            return "Cupom aplicado com sucesso. Desconto de 10%.";
        }

        return "Cupom inválido.";
    }
}