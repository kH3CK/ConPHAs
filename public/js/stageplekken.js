document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('mboDropdownButton');
    const dropdown = document.getElementById('mboDropdown');

    // Toggle dropdown
    dropdownButton.addEventListener('click', function() {
        dropdown.classList.toggle('hidden');
    });

    // dropdown gaat dicht als je buiten de dropdown klikt
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Selecteer alle checkboxes in de dropdown
    const checkboxes = dropdown.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedOptions = Array.from(checkboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.nextElementSibling.textContent.trim());
            
            if (selectedOptions.length > 0) {
                dropdownButton.querySelector('span').textContent = selectedOptions.join(', ');
            } else {
                dropdownButton.querySelector('span').textContent = 'Selecteer opleidingsniveau';
            }
        });
    });

    // zet essentiele tekst in de button
    const selectedOptions = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.nextElementSibling.textContent.trim());
    
    if (selectedOptions.length > 0) {
        dropdownButton.querySelector('span').textContent = selectedOptions.join(', ');
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const monthDropdownButton = document.getElementById('monthDropdownButton');
    const monthDropdown = document.getElementById('monthDropdown');

    // Toggle dropdown
    monthDropdownButton.addEventListener('click', function() {
        monthDropdown.classList.toggle('hidden');
    });

    // dropdown gaat dicht als je buiten de dropdown klikt
    document.addEventListener('click', function(event) {
        if (!monthDropdownButton.contains(event.target) && !monthDropdown.contains(event.target)) {
            monthDropdown.classList.add('hidden');
        }
    });

    // Selecteer alle checkboxes in de dropdown
    const monthCheckboxes = monthDropdown.querySelectorAll('input[type="checkbox"]');
    monthCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const selectedMonths = Array.from(monthCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.nextElementSibling.textContent.trim());
            
            if (selectedMonths.length > 0) {
                monthDropdownButton.querySelector('span').textContent = selectedMonths.join(', ');
            } else {
                monthDropdownButton.querySelector('span').textContent = 'Selecteer startmaand';
            }
        });
    });

    // zet essentiele tekst in de button
    const selectedMonths = Array.from(monthCheckboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.nextElementSibling.textContent.trim());
    
    if (selectedMonths.length > 0) {
        monthDropdownButton.querySelector('span').textContent = selectedMonths.join(', ');
    }
});