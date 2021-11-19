<?php
declare(strict_types = 1);
namespace EmagGame\Characters\Builder;

use EmagGame\Characters\Base\BaseCharacter;
use EmagGame\Characters\Builder\Interfaces\BuilderInterface;
use ErrorException;


class CharacterBuilder implements BuilderInterface
{

    public function build(BaseCharacter $character, array $abilities): void 
    {
        foreach($abilities as $ability => $value)
        {
            if(empty($value[0]) || empty($value[1]))
            {
                throw new ErrorException("For this {$ability} ability minimum or maximum value is missing");
            }
            if($value[0] > $value[1])
            {
                throw new ErrorException("For this {$ability} ability minumum value be greater than maximum value");
            }

            $method = 'set' . ucfirst(strtolower($ability));

            if (!method_exists($character, $method)) {
                throw new ErrorException(sprintf('Setter [%s] for this  property does not exist', $method));
            }

            $abilityValue = (int) mt_rand($value[0], $value[1]);

            $character->$method($abilityValue);
        }
    }


}

