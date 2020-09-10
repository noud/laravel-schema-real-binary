# [Laravel](http://laravel.com) [realBinary](http://github.com/noud/laravel-schema-real-binary), [case sensitive](http://en.wikipedia.org/wiki/Case_sensitivity) string, [Schema](http://laravel.com/docs/migrations#tables) [column](http://laravel.com/docs/8.x/migrations#columns) type
```sql
INSERT INTO `country` (`id`, `currency`) VALUES
('demo', 'eur'),
('be', 'EUR'),
('nl', 'EUR');

INSERT INTO `currency` (`code`, `symbol`, `format`) VALUES
('eur', '€', '{VALUE} {SYMBOL}'),
('EUR', '€', '{SYMBOL} {VALUE}'),
('USD', '$', '{SYMBOL} {VALUE}');
```
## [Creating Columns](http://laravel.com/docs/migrations#creating-columns)
This Laravel package gives case sensative string fields with length and also as primary and foreign key
by adding a real binary column to migrations.
### migrations
```php
    Schema::create('currency', function (Blueprint $table) {
        $table->realBinary('code', 3)->unique();
        // works as well
        // $table->char('code', 3)->charset('binary')->unique();
        // more fields
    });

    Schema::create('country', function (Blueprint $table) {
        $table->string('id')->unique();
        $table->realBinary('currency', 3);
        // works as well
        // $table->char('currency', 3)->charset('binary');
        $table->foreign('currency')->references('code')->on('currency');
    });
``` 
### New Column Type
<table>
<thead>
<tr>
<th>Command</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">realBinary</span><span class="token punctuation">(</span><span class="token single-quoted-string string">'fullname'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
<td>BINARY equivalent column with length 255</td>
</tr>
<tr>
<td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">realBinary</span><span class="token punctuation">(</span><span class="token single-quoted-string string">'code'</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
<td>BINARY equivalent with a length</td>
</tr>
</tbody>
</table>

### Available Column Type
<table>
<thead>
<tr>
<th>Command</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">char</span><span class="token punctuation">(</span><span class="token single-quoted-string string">'code'</span><span class="token punctuation">,</span> <span class="token number">3</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code><br><code class=" language-php"><span class="token variable">$table</span><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">char</span><span class="token punctuation">(</span><span class="token single-quoted-string string">'name'</span><span class="token punctuation">,</span> <span class="token number">100</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
<td>CHAR equivalent column with a length.</td>
</tr>
</tbody>
</table>

used together with
<table>
<thead>
<tr>
<th>Modifier</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code class=" language-php"><span class="token operator">-</span><span class="token operator">&gt;</span><span class="token function">charset</span><span class="token punctuation">(</span><span class="token single-quoted-string string">'binary'</span><span class="token punctuation">)</span><span class="token punctuation">;</span></code></td>
<td>Specify a character set for the column (MySQL)<br>make the column equivalent with BINARY.</td>
</tr>
</tbody>
</table>

## inspirations
This Laravel package is inspired by
- [Laravel Doctrine Extensions](http://github.com/laravel-doctrine/extensions)
    - [Doctrine Behavioral Extensions](http://github.com/Atlantic18/DoctrineExtensions)
    - [DoctrineExtensions](http://github.com/beberlei/DoctrineExtensions)
- [Extended Schema builder for Laravel 5](http://github.com/rafis/schema-extended)