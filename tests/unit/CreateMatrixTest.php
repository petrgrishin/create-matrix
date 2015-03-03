<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

use \PetrGrishin\CreateMatrix\CreateMatrix;

class CreateMatrixTest extends \PHPUnit_Framework_TestCase {

    public function testSquareMatrix() {
        $params = array(
            'a' => array(1, 2, null),
            'b' => array(10, 20, null),
            'c' => array(100, 200, null),
        );
        $matrix = CreateMatrix::byVariants($params)->getArray();
        $this->assertCount(pow(3, 3), $matrix);
    }

    public function testNotSquareMatrix() {
        $params = array(
            'a' => array(1, 2, null),
            'b' => array(10, 20, null),
            'c' => array(100, 200, 300, null),
        );
        $matrix = CreateMatrix::byVariants($params)->getArray();
        $this->assertCount(pow(3, 2) * pow(4, 1), $matrix);
    }

    public function testNotSquare4xMatrix() {
        $params = array(
            'a' => array(1, 2, null),
            'b' => array(10, 20, null),
            'c' => array(100, 200, 300, null),
            'd' => array(1000, 2000, 3000, 4000),
        );
        $matrix = CreateMatrix::byVariants($params)->getArray();
        $this->assertCount(pow(3, 2) * pow(4, 2), $matrix);
    }
}