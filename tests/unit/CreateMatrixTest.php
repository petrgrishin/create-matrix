<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

use \PetrGrishin\CreateMatrix\CreateMatrix;

class CreateMatrixTest extends \PHPUnit_Framework_TestCase {

    public function testSquareMatrix() {
        $params = [
            'a' => [1, 2, null],
            'b' => [10, 20, null],
            'c' => [100, 200, null],
        ];
        $matrix = CreateMatrix::byVariants($params)->getArray();
        $this->assertCount(pow(3, 3), $matrix);
    }

    public function testNotSquareMatrix() {
        $params = [
            'a' => [1, 2, null],
            'b' => [10, 20, null],
            'c' => [100, 200, 300, null],
        ];
        $matrix = CreateMatrix::byVariants($params)->getArray();
        $this->assertCount(pow(3, 2) * pow(4, 1), $matrix);
    }

    public function testNotSquare4xMatrix() {
        $params = [
            'a' => [1, 2, null],
            'b' => [10, 20, null],
            'c' => [100, 200, 300, null],
            'd' => [1000, 2000, 3000, 4000],
        ];
        $matrix = CreateMatrix::byVariants($params)->getArray();
        $this->assertCount(pow(3, 2) * pow(4, 2), $matrix);
    }
}