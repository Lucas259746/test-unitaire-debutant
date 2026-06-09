<?php

namespace Dell\Job2TestUnitairePhp\Tests;

use PHPUnit\Framework\TestCase;
use Dell\Job2TestUnitairePhp\Math;

class MathTest extends TestCase
{
    public function testAdditionFonctionneCorrectement(): void
    {
        $math = new Math();
        $resultat = $math->addition(2, 3);

        // On vérifie que 2 + 3 est bien égal à 5
        $this->assertEquals(5, $resultat);
    }
}
