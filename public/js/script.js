document.addEventListener('DOMContentLoaded', function () {
  const toggleBtn = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar');
  const icon = document.getElementById('toggleIcon');

  toggleBtn.addEventListener('click', function () {
    sidebar.classList.toggle('sidebar-narrow');

    if (sidebar.classList.contains('sidebar-narrow')) {
      icon.classList.remove('cil-menu');
      icon.classList.add('cil-x');
    } else {
      icon.classList.remove('cil-x');
      icon.classList.add('cil-menu');
    }
  });
});
