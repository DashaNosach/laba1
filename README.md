#Задачи на PHP

В консоле необходимо перейти в директорию проекта `cd domains\localhost` и выполнить команду `composer install`

В файлах *task1.php*, *task2.php*, *task3.php* и *task4.php* необходимо реализовать функции, не измененяя их сигнатуры.

Для прогона всех тестов задания используйте команду `vendor\bin\phpunit .`

Чтобы прогнать тесты для конкретной функции используйте опцию фильтр `--filter methodName`. 
Например для прогона тестов функции *reverseString* можно выполнить команду `vendor/bin/phpunit --filter testReverseString .`.

Редактировать разрешается только файлы *task1.php*, *task2.php*, *task3.php* и *task4.php*.

Задание считается выполненым, если все модульные тесты прошли успешно. Это выглядит примерно так:
```
PHPUnit 9.5.2 by Sebastian Bergmann and contributors.

.......................                                           23 / 23 (100%)

Time: ..., Memory: ... MB

OK (23 tests, ... assertions)

```