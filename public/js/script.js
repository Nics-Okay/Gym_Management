document.addEventListener("DOMContentLoaded", function () {
    function updateClockAndDate() {
        const clockElement = document.getElementById('clock');
        const dateElement = document.getElementById('date');

        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes();
        const seconds = now.getSeconds();
        const ampm = hours >= 12 ? 'PM' : 'AM';

        const formattedTime = `${String(hours % 12 || 12).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')} ${ampm}`;
        const formattedDate = now.toLocaleDateString('en-US', {
            weekday: 'long',
            month: 'long',
            day: 'numeric',
            year: 'numeric'
        });

        clockElement.textContent = formattedTime;
        dateElement.textContent = formattedDate;
    }

    setInterval(updateClockAndDate, 1000); // Update every second
    updateClockAndDate(); // Initialize immediately
});