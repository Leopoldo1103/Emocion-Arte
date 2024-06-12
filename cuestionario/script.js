let formData = {};

function checkEdadInput() { /* NO TOCAR */
  const edadInput = document.getElementById("edadInput");
  const nextButton = document.getElementById("nextButton");
  if (edadInput.value.trim() === "") {
    nextButton.disabled = true;
  } else {
    nextButton.disabled = false;
    formData.edad = edadInput.value.trim();
  }
}

function goToNextPage() { /* NO TOCAR */
  checkEdadInput();
  if (Object.values(formData).some(val => val === "")) {
    alert("Por favor, rellena todos los campos.");
  } else {
    const dali = new Dali();
    dali.text(JSON.stringify(formData), { font: "Arial", size: 24, color: "black" })
      .lineWidth(2)
      .background("white")
      .generate(image => {
        const imgElement = document.createElement("img");
        imgElement.src = image;
        document.body.appendChild(imgElement);
      });
  }
}

function obtenerEstadoEmocional() {
  // Leer las categorías del localStorage
  const categorias = JSON.parse(localStorage.getItem('categorias'));

  // Contar las respuestas para cada categoría
  const respuestas = obtenerEmociones();
  const recuento = {};
  for (const respuesta of respuestas) {
    recuento[respuesta] = (recuento[respuesta] || 0) + 1;
  }

  // Si todas las respuestas son de la misma categoría, el estado emocional es simple
  if (Object.keys(recuento).length === 1) {
    return Object.keys(recuento)[0];
  }

  // Si hay más de una categoría con la mayor cantidad de respuestas, el estado emocional es complejo
  if (Object.keys(recuento).filter(categoria => recuento[categoria] === Math.max(...Object.values(recuento))).length > 1) {
    return 'complejo';
  }

  // Si no hay respuestas, el estado emocional es neutro
  if (repuestas.length === 0) {
    return 'neutro';
  }

  // Si solo hay una respuesta, el estado emocional es la categoría de esa respuesta
  if (repuestas.length === 1) {
    return respuestas[0];
  }

  // Considera todas las emociones seleccionadas sin dar prioridad al neutro
  // (incluso si hay respuestas por defecto con neutro)
  return respuestas.join(', ');
}
