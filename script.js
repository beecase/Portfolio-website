document.addEventListener('DOMContentLoaded', () => {
  const pageName = window.location.pathname.split('/').pop() || 'index.html';

  document.querySelectorAll('nav a').forEach((link) => {
    if (link.getAttribute('href') === pageName) {
      link.classList.add('active');
    }
  });

  const navToggle = document.querySelector('.menu-toggle');
  const navMenu = document.querySelector('nav ul');

  if (navToggle && navMenu) {
    navToggle.addEventListener('click', () => {
      navMenu.classList.toggle('nav-open');
      navToggle.classList.toggle('active');
    });
  }

  const yearText = document.querySelector('[data-year]');
  if (yearText) {
    yearText.textContent = new Date().getFullYear();
  }

  document.querySelectorAll('.project-toggle').forEach((button) => {
    button.addEventListener('click', () => {
      const projectBox = button.parentElement.querySelector('.project-details');
      const isVisible = projectBox.classList.contains('show');

      document.querySelectorAll('.project-details').forEach((box) => box.classList.remove('show'));
      if (!isVisible) {
        projectBox.classList.add('show');
      }
    });
  });

  const contactForm = document.querySelector('.contact-form form');
  if (contactForm) {
    const statusBox = document.createElement('div');
    statusBox.className = 'form-status';
    contactForm.prepend(statusBox);

    contactForm.addEventListener('submit', (event) => {
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const subject = document.getElementById('subject').value.trim();
      const message = document.getElementById('message').value.trim();

      if (!name || !email || !subject || !message) {
        event.preventDefault();
        statusBox.textContent = 'Please fill in all fields.';
        statusBox.className = 'form-status error';
        return;
      }

      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(email)) {
        event.preventDefault();
        statusBox.textContent = 'Please enter a valid email address.';
        statusBox.className = 'form-status error';
        return;
      }

      statusBox.textContent = 'Message sent successfully!';
      statusBox.className = 'form-status success';
    });
  }
});
