const drawer = document.querySelector('kemet-drawer');
const html = document.querySelector('html');

drawer.addEventListener('kemet-drawer-opened', () => {
  html.style.overflow = 'hidden';
});

drawer.addEventListener('kemet-drawer-closed', () => {
  html.style.overflow = 'auto';
});
