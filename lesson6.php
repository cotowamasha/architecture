<?php
/**
 * task1: как я думаю, шаблонный метод используется в app/framework/BaseController - это сам шаблон,
 * а файлах src/Controller - шаблоны render и redirect применяются
 */

/**
 * task2
 */

interface IComparator
{
    public function compare(array $product);
}

class PriceComparator implements IComparator
{
    public function compare(array $product)
    {
        echo 'Сортируем по Цене';
    }
}

class NameComparator implements IComparator
{
    public function compare(array $product)
    {
        echo 'Сортируем по Названию';
    }
}

class ProductCollection
{
    public function sort(IComparator $comparator, array $product): array
    {
        echo 'Некоторая бизнес-логика';

        return $comparator->compare($product);
    }
}

/**
 * task3: см в файлах
 */

