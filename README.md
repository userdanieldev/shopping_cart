# 🛒 Projeto Shopping Cart

**Disciplina:** Design Patterns & Clean Code  
**Autores:** Daniel Victor (1989218), Felipe Garcia (1990279)  

---

## 📌 Descrição
O projeto **Shopping Cart** é uma simulação de carrinho de compras desenvolvida em **PHP puro**, aplicando boas práticas de programação como:  

- **PSR-12** → Padrão de codificação para garantir legibilidade e consistência.  
- **KISS** → Código simples e direto, sem complexidades desnecessárias.  
- **DRY** → Evita duplicação de lógica, centralizando regras de negócio.  

O objetivo é praticar **organização de código, clean code e design patterns básicos**, simulando o fluxo de checkout de um e-commerce.  

---

## 🚀 Como rodar o projeto
1. Instalar o **XAMPP** → [Baixar aqui](https://www.apachefriends.org/pt_br/download.html).  
2. Acessar a pasta local:  
   ```bash
   C:\xampp\htdocs
   ```  
3. Criar uma pasta para o projeto dentro desse diretório.  
4. Copiar o código do projeto (ou clonar via Git):  
   ```bash
   git clone https://github.com/userdanieldev/shopping_cart.git
   ```  
5. Abrir o **XAMPP** e iniciar o servidor **Apache**.  
6. No navegador, acessar a URL do projeto, exemplo:  
   ```
   http://localhost/sua_pasta/shopping_cart/
   ```  

---

## ⚙️ Funcionalidades
- **addItem** → Adiciona produto ao carrinho, validando se existe e se há estoque suficiente.  
- **removeItem** → Remove produto do carrinho e devolve a quantidade ao estoque.  
- **listItems** → Lista os itens do carrinho, mostrando quantidade e subtotal de cada um.  
- **calculateTotal** → Calcula o valor total da compra, aplicando desconto se houver.  
- **applyDiscount** → Aplica desconto de **10%** no valor total quando o cupom `"DESCONTO10"` é utilizado.  

---

## 🧪 Casos de Teste

| Caso | Entrada | Resultado Esperado |
|------|---------|--------------------|
| **1 - Adicionar produto válido** | `productId = 1, quantity = 2` | Produto adicionado ao carrinho e estoque atualizado |
| **2 - Adicionar além do estoque** | `productId = 3, quantity = 10` | Mensagem de erro → `Estoque insuficiente` |
| **3 - Remover produto do carrinho** | `remove productId = 2` | Produto removido e estoque restaurado |
| **4 - Aplicar cupom de desconto** | `coupon = DESCONTO10` | Valor total reduzido em **10%** |

---

## 🧹 Boas Práticas Aplicadas
- **PSR-12**  
  - Declaração `strict_types=1` no topo.  
  - Uso de *namespaces* (`namespace Src;`).  
  - Classes e métodos organizados com identação padronizada.  

- **KISS** (Keep It Simple, Stupid)  
  - Métodos curtos e objetivos (`getId`, `getName`, `decreaseStock`, etc).  
  - Nenhuma lógica desnecessária ou repetida.  

- **DRY** (Don’t Repeat Yourself)  
  - Lógica de manipulação de estoque centralizada em métodos (`increaseStock` e `decreaseStock`).  
  - Reuso dos mesmos métodos em operações de adicionar e remover itens.  

---

## 📊 Estrutura do Projeto

```
shopping_cart/
│── src/
│   ├── Product.php   # Classe responsável por representar produtos
│   ├── Cart.php      # Classe responsável pelo carrinho
│   └── index.php     # Arquivo principal para rodar os casos de teste
│
└── README.md         # Documentação do projeto
```

---

## 📈 Diagrama Simplificado (ASCII)

```
+-------------------+        1..*       +-------------------+
|     Product       |<------------------|       Cart        |
+-------------------+                   +-------------------+
| - id: int         |                   | - items: array    |
| - name: string    |                   | - products: array |
| - price: float    |                   | - discount: float |
| - stock: int      |                   +-------------------+
+-------------------+                   | + addItem()       |
| + getId()         |                   | + removeItem()    |
| + getName()       |                   | + listItems()     |
| + getPrice()      |                   | + calculateTotal()|
| + getStock()      |                   | + applyDiscount() |
| + increaseStock() |                   +-------------------+
| + decreaseStock() |
+-------------------+
```
