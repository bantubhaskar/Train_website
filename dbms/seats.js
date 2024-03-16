// Add this script tag in your HTML file, or include it as an external JavaScript file

document.addEventListener('DOMContentLoaded', function () {
    const trainDropdown = document.getElementById('train');
    const seatDropdownContainer = document.getElementById('seat-dropdown-container');

    trainDropdown.addEventListener('change', function () {
        const selectedTrain = trainDropdown.value;

        // Fetch seats for the selected train using AJAX
        fetch(`reserve.php?train_id=${selectedTrain}`)
            .then(response => response.json())
            .then(data => {
                updateSeatDropdown(data);
            })
            .catch(error => {
                console.error('Error fetching seats:', error);
            });
    });

    function updateSeatDropdown(seats) {
        const seatDropdown = document.createElement('select');
        seatDropdown.name = 'seat';
        seatDropdown.required = true;

        seats.forEach(seat => {
            const option = document.createElement('option');
            option.value = seat;
            option.textContent = `Seat ${seat}`;
            seatDropdown.appendChild(option);
        });

        // Replace the existing seat dropdown with the updated one
        seatDropdownContainer.innerHTML = '';
        seatDropdownContainer.appendChild(seatDropdown);
    }
});
