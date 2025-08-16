import './bootstrap';
// script.js

// Abrir/cerrar sidebar en móvil (menú hamburguesa)

const sidebar = document.querySelector('.sidebar');
const menuBtn = document.querySelector('.sidebar-menu-button');
const toggler = document.querySelector('.sidebar-toggler');

if (menuBtn) {
  menuBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
  });
}

// Abrir/cerrar sidebar usando la flechita (toggler dentro del sidebar)
if (toggler) {
  toggler.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    document.querySelector('.main-content')?.classList.toggle('expanded');
    document.querySelector('footer')?.classList.toggle('expanded');
  });
}

// Manejo de dropdowns
document.querySelectorAll('.dropdown-toggle').forEach(item => {
  item.addEventListener('click', e => {
    e.preventDefault();
    const parent = item.closest('.dropdown-container');
    parent.classList.toggle('open');
  });
});
document.addEventListener("DOMContentLoaded", () => {
  const themeToggle = document.querySelector(".theme-toggle");

  themeToggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-theme");

    // Guardar preferencia en localStorage
    if (document.body.classList.contains("dark-theme")) {
      localStorage.setItem("theme", "dark");
    } else {
      localStorage.setItem("theme", "light");
    }
  });

  // Cargar tema guardado al iniciar
  if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark-theme");
  }
});

