const { addition } = require("./index.js");

test("Vérifie que l'addition de 1 et 2 donne 3", () => {
  expect(addition(1, 2)).toBe(3);
});
