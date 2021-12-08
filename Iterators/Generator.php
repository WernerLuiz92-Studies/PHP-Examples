<?php

/**
 * Aqui vamos ver o funcionamento do Generator
 * 
 * O Generator é um tipo de função que retorna um objeto iterável.
 * Muito útil para iterar sobre um conjunto de dados de grande proporção, por exemplo,
 * pois utiliza menos memória.
 * 
 * Informações sobre o Generator: https://josephsilber.com/posts/2020/07/29/lazy-collections-in-laravel#table-of-contents
 * 
 * Function: Generator
 * Documentation: 
 *      https://www.php.net/manual/en/language.generators.overview.php
 *      https://www.php.net/manual/en/language.generators.syntax.php
 *      https://www.php.net/manual/en/language.generators.comparison.php
 */

function run()
{
    yield [
        'name' => 'John Doe', 
        'age' => 30,
        'email' =>  'johndoe@gmail.com'
    ];
    yield [
        'name' => 'Anne Doe', 
        'age' => 20,
        'email' =>  'annedoe@gmail.com'
    ];
    yield [
        'name' => 'Marry Doe', 
        'age' => 32,
        'email' =>  'marrydoe@gmail.com'
    ];
}

function generate_numbers()
{
    $number = 1;

    while (true) {
        yield $number;

        $number++;
    }
}

function take($generator, $limit) 
{
    foreach ($generator as $index => $value) {
        if ($index == $limit) break;

        yield $value;
    }
}

$numberGenerator = generate_numbers();

$twenty = take($numberGenerator, 20);

foreach ($twenty as $number) {
    var_dump($number);
}