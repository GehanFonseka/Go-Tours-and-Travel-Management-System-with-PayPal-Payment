document.addEventListener("DOMContentLoaded", () => {
    const toggleButton = document.getElementById("toggleTheme");
    const currentTheme = localStorage.getItem("theme") || "light";
  
    // Apply the saved theme
    document.body.classList.add(`${currentTheme}-mode`);
    toggleButton.textContent = currentTheme === "dark" ? "Light Mode" : "Dark Mode";
  
    toggleButton.addEventListener("click", () => {
      if (document.body.classList.contains("dark-mode")) {
        document.body.classList.replace("dark-mode", "light-mode");
        toggleButton.textContent = "Dark Mode";
        localStorage.setItem("theme", "light");
      } else {
        document.body.classList.replace("light-mode", "dark-mode");
        toggleButton.textContent = "Light Mode";
        localStorage.setItem("theme", "dark");
      }
    });
  });
  