# Projeto Shopping Cart

**Disciplina:** Design Patterns & Clean Code  
**Autores:** Daniel Victor(1989218), Felipe Garcia(1990279)

## Descrição
Este projeto simula um carrinho de compras em PHP puro, aplicando boas práticas de programação como **PSR-12**, **KISS** e **DRY**.  
O objetivo é praticar organização de código e regras de negócio simples, simulando o fluxo de checkout de um e-commerce.  

## Como rodar o projeto
+ Passo 1: Inicialmente deve se ter o XAMPP instalado, caso não tenha baixe e instale usando esse link https://www.apachefriends.org/pt_br/download.html
+ Passo 2: Após instalar acesse a pasta local C:\xampp\htdocs
+ Passo 3: Crie uma pasta para seu projeto nesse diretório
+ Passo 4: Dentro do diretório voce pode extrair o projeto baixado, ou clonar via git pelo cmd
+ Passo 5: Inicie o xampp e clique e na opção do servidor Apache clique no Start
+ Passo 6: Acesse o navegador e insira a url do diretorio do projeto, exemplo "localhost/sua_pasta/shopping_cart/"

## Funcionalidades
+ **addItem:** Valida se produto existe na lista de produtos, e se há quantidade no estoque disponivel, caso sim para ambas as condições adiciona a quantidade de produtos ao carrinho 

+ **removeItem:** Valida a existencia do produto no carrinho e remove o mesmo devolvendo a quantidade para o lista de produtos do estoque

+ **listItems:** Realiza a listagem de todos os items do carrinho exibindo a quantidade de cada item e o subtotal 

+ **calculateTotal:** Calcula o total da compra somando todos os subtotais e caso haja desconto na compra ja realiza a subtração

+ **applyDiscount** Aplica desconto de 10% no total da compra ao inserir o cupom "DESCONTO10"

## Casos de Teste:

