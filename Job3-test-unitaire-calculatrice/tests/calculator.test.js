// Import de la fonction exportée par calculator.js
const { calculate } = require("../calculator");

describe("Tests Unitaires - Calculatrice JavaScript", () => {
  test("Addition de deux nombres", () => {
    expect(calculate("12+5")).toBe(17);
  });

  test("Soustraction de deux nombres", () => {
    expect(calculate("10-4")).toBe(6);
  });

  test("Multiplication de deux nombres", () => {
    expect(calculate("3*4")).toBe(12);
  });

  test("Division de deux nombres", () => {
    expect(calculate("10/2")).toBe(5);
  });

  test("Priorité des opérations (ex: 2+3*4 = 14)", () => {
    expect(calculate("2+3*4")).toBe(14);
  });

  test("Respect des parenthèses (ex: (2+3)*4 = 20)", () => {
    expect(calculate("(2+3)*4")).toBe(20);
  });

  test("Comportement en cas d'expression invalide (ex: 2+bad)", () => {
    // La regex du code rejette les lettres et lève une erreur "Expression invalide"
    expect(() => {
      calculate("2+bad");
    }).toThrow("Expression invalide");
  });

  // --- BONUS ---
  test("Bonus : Comportement avec une chaîne vide", () => {
    // Une chaîne vide ne valide pas la regex /^[0-9+\-*/().\s]+$/ (car le + impose au moins 1 caractère)
    // Elle lève donc directement l'erreur "Expression invalide"
    expect(() => {
      calculate("");
    }).toThrow("Expression invalide");
  });
});
