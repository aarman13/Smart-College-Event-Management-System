document.addEventListener('DOMContentLoaded', function() {
    // 1. INITIALIZE FULLCALENDAR
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: false, // Uses your custom HTML header
        height: 'auto',
        // Styling to match your Sage Green theme
        eventBackgroundColor: '#d1dbd2', 
        eventTextColor: '#405d4b',
        eventBorderColor: 'transparent',
        displayEventTime: false,
        
        // Data Source
        events: 'fetch_events.php',

        // 2. CALENDAR CLICK LOGIC (Opens Modal)
        eventClick: function(info) {
            // Pulls extended data from your fetch_events.php
            const title = info.event.title;
            const description = info.event.extendedProps.description || "No description available.";
            const category = info.event.extendedProps.category || "General";
            const date = info.event.start.toDateString();
            
            // Handle image: Use default if database image is empty
            const imageName = info.event.extendedProps.image;
            const imagePath = (imageName && imageName !== 'default.jpg') 
                              ? 'uploads/' + imageName 
                              : 'uploads/default.jpg';

            openEventModal(title, imagePath, description, date, category);
        }
    });
    calendar.render();

    // 3. SEARCH LOGIC (Corrected for PHP)
    const searchBtn = document.querySelector('.btn-success');
    const searchInput = document.querySelector('input[placeholder="Search events..."]');

    if (searchBtn && searchInput) {
        searchBtn.addEventListener('click', (e) => {
            e.preventDefault(); 
            const query = searchInput.value.trim();
            if (query) {
                // Redirects to your dynamic events.php page
                window.location.href = `events.php?search=${encodeURIComponent(query)}`;
            }
        });
    }
});

// 4. MODAL DISPLAY FUNCTIONS
function openEventModal(title, image, description, date, category) {
    // Fill the modal IDs (Must match your HTML exactly)
    document.getElementById('eventTitle').innerText = title;
    document.getElementById('eventImage').src = image;
    document.getElementById('eventDescription').innerText = description;
    document.getElementById('eventDate').innerText = date;
    document.getElementById('eventCategory').innerText = category;

    // Trigger Bootstrap Modal
    var modalElement = document.getElementById('eventModal');
    var myModal = new bootstrap.Modal(modalElement);
    myModal.show();
}

function openAnnouncementsModal() {
    var announceModal = new bootstrap.Modal(document.getElementById('announcementsModal'));
    announceModal.show();
}
// --- NEW STUDENT DASHBOARD LOGIC ---

const studentEvents = [
    { id: 1, name: "French Learning Workshop", date: "2026-05-14", category: "Academic", registered: false },
    { id: 2, name: "Annual Tech Fest 2026", date: "2026-06-20", category: "Cultural", registered: true }
];

function renderStudentTable() {
    const tableBody = document.getElementById('eventTableBody');
    if (!tableBody) return; // Only runs if the table exists on the page

    tableBody.innerHTML = ''; 
    studentEvents.forEach(event => {
        const row = document.createElement('tr');
        row.className = "align-middle"; 
        row.innerHTML = `
            <td><div class="fw-bold text-dark">${event.name}</div></td>
            <td><div class="text-secondary small">${event.date}</div></td>
            <td><span class="badge rounded-pill bg-light text-dark border fw-normal">${event.category}</span></td>
            <td class="text-end">
                ${event.registered 
                    ? '<span class="badge bg-success px-3 py-2 rounded-pill" style="font-size: 0.7rem;">REGISTERED</span>' 
                    : `<button class="btn btn-sm btn-outline-success px-3 rounded-pill fw-bold" 
                        style="font-size: 0.7rem;"
                        onclick="handleRegistration(${event.id})">REGISTER NOW</button>`
                }
            </td>
        `;
        tableBody.appendChild(row);
    });
}

function handleRegistration(eventId) {
    const eventIndex = studentEvents.findIndex(e => e.id === eventId);
    if (eventIndex !== -1) {
        studentEvents[eventIndex].registered = true;
        alert(`Successfully registered for: ${studentEvents[eventIndex].name}`);
        renderStudentTable(); // Refresh the table UI immediately
    }
}
document.addEventListener('DOMContentLoaded', function() {
    // 1. Initial Your Calendar Logic (From your existing code)
    if (typeof calendar !== 'undefined') {
        calendar.render();
    }
    
    // 2. Fill the Student Table
    renderStudentTable();
});


