window.addEventListener('DOMContentLoaded', (e)=>{
const icons = document.querySelectorAll('.animated-icon');
const title = document.querySelector('.animated-text');

const observerOptions = {
  root: null,
  rootMargin: '0px',
  threshold: 0.1
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // Animate text first
      title.classList.add('visible');

      // Then animate icons after a delay
      setTimeout(() => {
        icons.forEach((icon, index) => {
          setTimeout(() => {
            icon.classList.add('visible');
            icon.classList.remove('disappear');
          }, index * 250);
        });
      }, 700); // Delay icons by 700ms (adjust to taste)
    } else {
      // Remove both text and icons on scroll out

    }
  });
}, observerOptions);

observer.observe(document.querySelector('#intro'));

const cards = document.querySelectorAll('.card');

const cardObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const target = entry.target;
      setTimeout(() => {
        target.classList.add('visible');
      }, target.dataset.delay || 0); // custom delay if you want
    }
  });
}, {
  threshold: 0.1
});

// Optional: add stagger delay
cards.forEach((card, index) => {
  card.dataset.delay = index * 150; // 150ms stagger
  cardObserver.observe(card);
});

const slideElements = document.querySelectorAll('.animate-slide-left, .animate-slide-right');

const slideObserver = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target); // only animate once
    }
  });
}, {
  threshold: 0.2
});

slideElements.forEach(el => slideObserver.observe(el));

const navLinks = document.querySelectorAll('.nav-link');
const pageSections = document.querySelectorAll('section[id]');

const sectionObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const id = entry.target.id;

      navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${id}`) {
          link.classList.add('active');
        }
      });
    }
  });
}, {
  threshold: 0.5
});

pageSections.forEach(section => sectionObserver.observe(section));

document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', function (e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});
})