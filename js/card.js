let visible = document.querySelector('.visible');
let players = document.querySelector('.players');
let arrow = document.querySelector('.arrow');
let toggle = document.getElementById('toggle');

function show() {
  visible.classList.toggle('active');
  players.classList.toggle('active');
  arrow.classList.toggle('active');
}