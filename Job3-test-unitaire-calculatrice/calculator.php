<?php
class Calculator
{
    public function calculate($expression)
    {
        $expression = str_replace(['×', '÷', '−', '–', '—'], ['*', '/', '-', '-', '-'], $expression);
        $expression = trim($expression);

        // 🔥 CORRECTION : Si la chaîne est vide après le trim, on lève volontairement l'erreur
        if ($expression === '') {
            throw new RuntimeException("Erreur de calcul");
        }

        try {
            $result = eval("return $expression;");
        } catch (Throwable $e) {
            throw new RuntimeException("Erreur de calcul");
        }

        if ($result === false) {
            throw new RuntimeException("Erreur de calcul");
        }

        return $result;
    }
}
