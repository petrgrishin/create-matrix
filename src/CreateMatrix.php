<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */
 

namespace PetrGrishin\CreateMatrix;


use PetrGrishin\MatrixObject\BaseMatrixObject;

class CreateMatrix extends BaseMatrixObject {

    private function __construct($variants) {
        $matrix = $this->createByVariants($variants);
        $this->setArray($matrix);
    }

    public static function byVariants($variants) {
        return new static($variants);
    }

    protected function createByVariants($variants, $variant = null, $level = null, $result = null, $sizeArr = null, $arKeys = null) {
        $variant = $variant ?: array();
        $level = is_null($level) ? -1 : $level;
        $result = $result ?: array();
        $sizeArr = $sizeArr ?: count($variants);
        $arKeys = $arKeys ?: array_keys($variants);
        $level++;
        if ($level < $sizeArr){
            foreach ($variants[$arKeys[$level]] as $val){
                $variant[$arKeys[$level]] = $val;
                $result = $this->createByVariants($variants, $variant, $level, $result, $sizeArr, $arKeys);
            }
        } else {
            $result[] = $variant;
        }
        return $result;
    }
}