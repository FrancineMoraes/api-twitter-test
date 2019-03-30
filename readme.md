## Para executar o projeto

<code>composer install</code>
<code>php artisan key:generate</code>
<code>php artisan migrate</code>
<code>php artisan import:tweetes</code>
<code>php artisan serve</code>

## Filtros

*Rota: /tweets/7dias/{order?}/{order_by?}*
 1. Retorne todos os tweets que tenham sido criados de 7 dias antes da data do
seu teste até 2 dias antes da data do seu teste, em ordem dos mais recentes aos
mais antigos.

*Rota: /tweets/likes/rt/{order?}/{order_by?}*
 2. Retorne todos os tweets que possuam mais de 3000 likes mas menos de 2500RTs.

*Rota: /tweets/rt/{order?}/{order_by?*
 3. Retorne todas as localidades únicas dos tweets que estejam disponíveis na
sua extração. Se houverem tweets sem localização, o termo "Sem Localização" é o
termo que deve ser retornado.

*Rota: /tweets/locale/{order?}/{order_by?}*
 4. Retorne o content do tweet com mais RTs.
