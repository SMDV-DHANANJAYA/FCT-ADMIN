<a class="btn btn-info btn-lg" id="alert-target">Click me!</a>

$("#alert-target").click(function () {
toastr["info"]("I was launched via jQuery!")
});