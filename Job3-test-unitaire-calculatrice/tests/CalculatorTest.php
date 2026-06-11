<?php

use PHPUnit\Framework\TestCase;

// Inclusion du fichier contenant la classe métier à tester
require_once __DIR__ . '/../calculator.php';

class CalculatorTest extends TestCase
{
    private $calculator;

    // Initialisation avant chaque test
    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    /**
     * @test
     */
    public function testAddition()
    {
        $this->assertEquals(8, $this->calculator->calculate("5+3"));
        $this->assertEquals(0, $this->calculator->calculate("-2+2"));
    }

    /**
     * @test
     */
    public function testSoustraction()
    {
        $this->assertEquals(2, $this->calculator->calculate("5-3"));
        $this->assertEquals(-5, $this->calculator->calculate("0-5"));
    }

    /**
     * @test
     */
    public function testMultiplication()
    {
        $this->assertEquals(15, $this->calculator->calculate("5*2"));
        $this->assertEquals(0, $this->calculator->calculate("5*0"));
    }

    /**
     * @test
     */
    public function testDivision()
    {
        $this->assertEquals(2, $this->calculator->calculate("6/3"));
        $this->assertEquals(2.5, $this->calculator->calculate("5/2"));
    }

    /**
     * @test
     */
    public function testDivisionParZeroLèveException()
    {
        // En PHP, l'évaluation de "5/0" lève une Exception (DivisionByZeroError ou Throwable)
        // Le code de calculator.php attrape tout Throwable et le convertit en RuntimeException ("Erreur de calcul")
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage("Erreur de calcul");

        $this->calculator->calculate("5/0");
    }

    /**
     * @test
     * @group bonus
     */
    public function testChaineVideRenvoieErreurOuNull()
    {
        // Une chaîne vide dans eval("return ;") génère une erreur de syntaxe PHP,
        // interceptée par le catch qui lève une RuntimeException.
        $this->expectException(RuntimeException::class);
        $this->calculator->calculate("");
    }
}
