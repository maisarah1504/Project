function showmodal() {
    alert("This parking space is not available !!");
}

document.addEventListener('DOMContentLoaded', function() {
    var dropdowns = document.querySelectorAll('.dropdown');

    dropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('mouseover', function() {
            var content = this.querySelector('.dropdown-content');
            if (content) {
                content.style.display = 'flex';
            }
        });

        dropdown.addEventListener('mouseout', function() {
            var content = this.querySelector('.dropdown-content');
            if (content) {
                content.style.display = 'none';
            }
        });
    });
});

