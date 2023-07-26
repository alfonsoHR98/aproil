function intensify(intense) {
  intense
  .addClass("animated shakeit")
  .delay(6000)
  .queue(function() {
    intense.removeClass("animated shakeit")
    .dequeue()
  })
}

function clicked() {
  $("button")
  .addClass("clicked")
  .delay(200)
  .queue(function () {
    $("button").removeClass("clicked").dequeue()
  })
}

var submit = document.getElementById("submit")

submit.addEventListener("click", clicked)