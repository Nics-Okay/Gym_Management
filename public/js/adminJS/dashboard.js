const menuIcon = document.getElementById('menu-icon');
const menu = document.getElementById('menu');
const closeMenu = document.getElementById('close-menu');
/*
const pageHeader = document.querySelector('.page-header'); // Select .page-header
const headerLeft = document.querySelector('.header-left'); // Select .header-left */

// Opening Menu
menuIcon.addEventListener('click', () => {
    menu.classList.add('active');
    /*
    pageHeader.style.marginLeft = '200px'; // Set margin-left of .page-header
    headerLeft.style.display = 'none'; // Hide .header-left */
}); //add .active in menu (menu.active)

// Close menu through menu button X
closeMenu.addEventListener('click', () => {
    menu.classList.remove('active');
    /*
    pageHeader.style.marginLeft = '0'; // Reset margin-left of .page-header
    headerLeft.style.display = ''; // Reset display of .header-left (default) */
});

// Close menu by clicking outside
document.addEventListener('click', (event) => {
    if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
        menu.classList.remove('active');
        /*
        pageHeader.style.marginLeft = '0'; // Reset margin-left of .page-header
        headerLeft.style.display = ''; // Reset display of .header-left (default) */
    }
});

// TIME AND DATE
function updateClockAndDate() {
    const clockElement = document.getElementById('clock');
    const dateElement = document.getElementById('date');
    const timeInput = document.getElementById('time'); // Hidden input for time

    const now = new Date();

    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
    const day = String(now.getDate()).padStart(2, '0');


    // Format time as 00:00:00 AM/PM
    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const amPm = hours >= 12 ? 'PM' : 'AM';

    // Convert to 12-hour format
    hours = hours % 12 || 12;
    
    // Update visible clock
    if (clockElement) {
        clockElement.textContent = `${String(hours).padStart(2, '0')}:${minutes}:${seconds} ${amPm}`;
    }

    // Update visible date
    if (dateElement) {
        // Format date as Month Day, Year
        const options = { month: 'long', day: 'numeric', year: 'numeric' };
        const formattedDate = now.toLocaleDateString(undefined, options);
        dateElement.textContent = formattedDate;
    }

    // Update hidden input with current time in database format
    if (timeInput) {
        timeInput.value = `${year}-${month}-${day} ${now.getHours()}:${minutes}:${seconds}`;
    }
}

// Update clock and date every second
setInterval(updateClockAndDate, 1000);

// Initialize the clock and date on page load
updateClockAndDate();

/*
document.addEventListener("DOMContentLoaded", function () {
});
*/
