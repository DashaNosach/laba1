<?php

use PHPUnit\Framework\TestCase;

class TasksTest extends TestCase
{
    /**
     * @dataProvider getCasesForReverseString
     * @param string $expected
     * @param mixed $str
     */
    public function testReverseString(string $expected, $str): void
    {
        self::assertEquals($expected, reverseString($str));
    }

    public function testSuccessCreateFileWithSum(): void
    {
        createFileWithSum(__DIR__ . '/fixtures');

        self::assertFileExists(__DIR__ . '/fixtures/3.txt');

        self::assertEquals(
            [2, 4, 7, 14, 14, 14, 14, 14, 8, 14, 12, 14, 15],
            explode(PHP_EOL, file_get_contents(__DIR__ . '/fixtures/3.txt'))
        );
    }

    public function testFailureCreateFileWithSum(): void
    {
        createFileWithSum(__DIR__ . '/nonexistent');

        self::assertFileDoesNotExist(__DIR__ . '/fixtures/3.txt');
    }

    /**
     * @dataProvider getCasesForRewriteJsonFile
     * @param string $expected
     * @param string $key
     * @param mixed $value
     */
    public function testRewriteJsonFile(string $expected, string $key, $value): void
    {
        copy(__DIR__ . '/fixtures/file.json', $newFile = __DIR__ . '/fixtures/copy-file.json');

        rewriteJsonFile($newFile, $key, $value);

        self::assertEquals($expected, file_get_contents($newFile));
    }

    /**
     * @dataProvider getCasesForCreateDeepArrayOfNumbers
     * @param int $deep
     */
    public function testCreateDeepArrayOfNumbers(int $deep): void
    {
        $arr = createDeepArrayOfNumbers($deep);

        self::assertGreaterThan(
            5,
            count($arr),
            
        );
        self::assertLessThan(
            10,
            count($arr),
        );

        foreach ($arr as $item) {
            $this->checkRandomStructureItem($item, $deep);
        }
    }

    /**
     * @dataProvider getCasesForCalculateSum
     * @param int $expected
     * @param array $structure
     */
    public function testCalculateSum(int $expected, array $structure): void
    {
        self::assertEquals($expected, calculateSum($structure));
    }

    public function getCasesForReverseString(): array
    {
        return [
            ['fdsa7654321fdsa', 'asdf1234567asdf'],
            ['123', '321'],
            ['0@', '@0'],
            ['1', 1],
            ['', null],
            ['', ''],
            ['333.1', 1.333],
            ['тевирп', 'привет'],
        ];
    }

    public function getCasesForRewriteJsonFile(): array
    {
        return [
            ['{"hello":"world","foo":"bar","test":"value"}', 'test', 'value'],
            ['{"hello":"world","foo":"bar","b":false}', 'b', false],
            ['{"hello":"world","foo":"bar","i":123.1}', 'i', 123.1],
            ['{"hello":"world","foo":"bar","n":null}', 'n', null],
            ['{"hello":"world","foo":"bar","arr":{"hello":"world"}}', 'arr', ['hello' => 'world']],
        ];
    }

    public function getCasesForCreateDeepArrayOfNumbers(): array
    {
        return [[1],[3],[4],[5],[7]];
    }

    public function getCasesForCalculateSum(): array
    {
        return [
            [42, [14, [1, 2, 4, [2, 4], 3, [3, [3, [3, 3]]]]]],
            [1, [1]],
            [2, [0, 1, 2, [-1]]],
        ];
    }

    protected function tearDown(): void
    {
        @ unlink(__DIR__ . '/fixtures/3.txt');
        @ unlink(__DIR__ . '/fixtures/copy-file.json');
    }

    private function checkRandomStructureItem($item, int $deep)
    {
        if (1 === $deep) {
            self::assertTrue(
                is_numeric($item),
                
            );

            return;
        }

        self::assertTrue(
            is_numeric($item) || is_array($item),
            
        );

        if (is_array($item)) {
            self::assertGreaterThan(
                5,
                count($item),
                
            );
            self::assertLessThan(
                10,
                count($item),
                
            );

            foreach ($item as $subItem) {
                $this->checkRandomStructureItem($subItem, $deep - 1);
            }
        }
    }
}
