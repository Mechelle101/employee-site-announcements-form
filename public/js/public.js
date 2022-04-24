
const IMG = document.querySelector('#one-image');
const IMGES = document.querySelector('#images');

const BTNIN = document.querySelector('#buttonIn');
const BTNOUT = document.querySelector('#buttonOut');


IMGES.addEventListener('click', function(e) {
  const tgt = e.target;
  tgt.classList.toggle('zoomed')
});

