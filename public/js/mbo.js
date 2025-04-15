function iets() {
    const select = document.getElementById("mbo");
    const output = document.getElementById("iets");
    const selectedValue = select.value;

    if (selectedValue && selectedValue != "start" && !document.getElementById(`month-${selectedValue}`)) {
      const chip = document.createElement("div");
      chip.id = `month-${selectedValue}`;
      chip.className = "inline-flex items-center bg-white border  text-green-700 text-sm rounded px-2 py-1 m-1";
      chip.innerHTML = `
        ${selectedValue}
        <button onclick="this.parentElement.remove()" class="ml-2 text-primary-color hover:text-green-700">×</button>
      `;
      output.appendChild(chip);
    }
  }
  document.getElementById("mbo").addEventListener("change", iets);