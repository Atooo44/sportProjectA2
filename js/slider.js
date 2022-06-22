var slider = document.getElementById("price_list");
var test = document.getElementById("demo");
test.innerHTML = slider.value;
console.log(slider.value);
slider.oninput = function() {
  test.innerHTML = this.value;
}