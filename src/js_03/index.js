function hideTitle() {
  const titleElem = document.getElementById('mainTitle');
  titleElem.setAttribute('hidden', true);
}

function showTitle() {
  const titleElem = document.getElementById('mainTitle');
  titleElem.removeAttribute('hidden');
}

function changeBackground() {
  const contentElem = document.getElementById('main-content');
  contentElem.classList.toggle('bg');
}

function changeBanner() {
  const imgElem = document.getElementById('banner');
  imgElem.classList.toggle('banner2');
}