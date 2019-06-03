<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Combined extends Constraint
{
    /*
     * Any public properties become valid options for the annotation.
     * Then, use these in your validator class.
     */
    public $message = '{{ value }}';

    /**
     * getTargets
     *
     * @return self::CLASS_CONSTRAINT
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }   
}
