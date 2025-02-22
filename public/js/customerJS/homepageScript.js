        // Example: Show red dot for unread notifications
        const notificationIcon = document.getElementById('notificationIcon');

        // Simulate receiving notifications
        function toggleNotificationStatus(hasUnread) {
            if (hasUnread) {
                notificationIcon.classList.add('unread');
            } else {
                notificationIcon.classList.remove('unread');
            }
        }

        // Simulating unread notification state
        toggleNotificationStatus(true); // Pass false to hide the red dot