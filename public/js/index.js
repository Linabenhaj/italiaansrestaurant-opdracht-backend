document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector("menu");
  if (!container) return;

  const opgeslagen = JSON.parse(localStorage.getItem("customLocaties")) || [];

  opgeslagen.slice(-1).forEach(locatie => {
    const div = document.createElement("div");
    div.className = "informatie";
    div.innerHTML = `
      <img src="${locatie.afbeelding}" alt="${locatie.naam}" />
      <h3>${locatie.naam}</h3>
      <p>${locatie.beschrijving}</p>
      <button onclick="window.location.href='/locatie'">Meer info</button>
    `;
    container.appendChild(div);
  });
});
