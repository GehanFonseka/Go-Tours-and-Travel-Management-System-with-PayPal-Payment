const toggleButton = document.getElementById('toggleTheme');
const body = document.body;

// Check if dark mode is already set in localStorage
if(localStorage.getItem('darkMode') === 'true') {
    body.classList.add('dark-mode');
}

// Toggle the dark mode when the button is clicked
toggleButton.addEventListener('click', () => {
    body.classList.toggle('dark-mode');

    // Save user's preference to localStorage
    if(body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'true');
    } else {
        localStorage.setItem('darkMode', 'false');
    }
});