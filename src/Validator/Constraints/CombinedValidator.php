<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
// use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class CombinedValidator extends ConstraintValidator
{
    /**
     * validate
     *
     * @param  mixed $combined
     * @param  mixed $constraint
     *
     * @return void
     */
    public function validate($combined, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\Combined */
        
        if (empty($combined->getDescription()) &&  empty($combined->getImage())) {
            // TODO: implement the validation here
            // echo "you did it"; exit;
            $this->context->buildViolation($constraint->message)
            ->setParameter('{{ value }}', "( Description or Image ) should have value!")
            ->atPath('description')
            ->addViolation();
        }        
    }
}
