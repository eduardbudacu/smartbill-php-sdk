<?php

namespace SmartBill\Entity;

/**
 * Description of AbstractEntity
 *
 * @author eduard.budacu
 */
class AbstractEntity {
    public function toArray() {
        $out = array();
        foreach(get_object_vars($this) as $key => $value) {
            if(!empty($value) || $value === FALSE) {
                $out[$key] = $value;
            }
        }
        return $out;
    }
}
