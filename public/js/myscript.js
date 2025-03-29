
$(document).ready(function() {
    $('#productToggle').click(function(e) {
        e.stopPropagation();
        $('#productDropdown').collapse('toggle');
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('#productToggle, #productDropdown').length) {
            $('#productDropdown').collapse('hide');
        }
    });

    $('#logoutButton').click(function() {
        if (confirm('Are you sure you want to log out?')) {
            $('#logoutForm').submit();
        }
    });
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Week of Sales',
                data: [12, 19, 3, 5, 2, 3],
                borderWidth: 1,
                backgroundColor: '#FFDD55',
            }]
        },
        
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

