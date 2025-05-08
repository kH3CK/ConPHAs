document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('mboDropdownButton');
    const dropdown = document.getElementById('mboDropdown');

    // Toggle dropdown
    dropdownButton.addEventListener('click', function() {
        dropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Update button text when selections change
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

    // Set initial button text
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

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!monthDropdownButton.contains(event.target) && !monthDropdown.contains(event.target)) {
            monthDropdown.classList.add('hidden');
        }
    });

    // Update button text when selections change
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

    // Set initial button text
    const selectedMonths = Array.from(monthCheckboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.nextElementSibling.textContent.trim());
    
    if (selectedMonths.length > 0) {
        monthDropdownButton.querySelector('span').textContent = selectedMonths.join(', ');
    }
});