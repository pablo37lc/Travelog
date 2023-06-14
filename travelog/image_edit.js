
// Get the source image to be edited
let image = document.getElementById('sourceImage');

// Get the canvas for the edited image
let canvas = document.getElementById('canvas');

// Get the 2D context of the image
let context = canvas.getContext('2d');

// Get all the sliders of the image
let brightnessSlider = document.getElementById("brightnessSlider");
let contrastSlider = document.getElementById("contrastSlider");
let grayscaleSlider = document.getElementById("grayscaleSlider");
let hueRotateSlider = document.getElementById("hueRotateSlider");
let saturateSlider = document.getElementById("saturationSlider");
let sepiaSlider = document.getElementById("sepiaSlider");

function changeScale() {
	
	// Set the canvas the same width and height of the image
	var scale = Math.max(canvas.width / image.width, canvas.height / image.height);
	var x = (canvas.width / 2) - (image.width / 2) * scale;
	var y = (canvas.height / 2) - (image.height / 2) * scale;
	
	// Clear the canvas
	context.clearRect(0, 0, canvas.width, canvas.height);
	
	// Draw the image onto the canvas with the calculated scale and position
	context.drawImage(image, x, y, image.width * scale, image.height * scale);

	context = canvas.getContext('2d');
}

function uploadImage(event) {

	// Set the source of the image from the uploaded file
	image.src = URL.createObjectURL(event.target.files[0]);

	image.onload = function () {

		canvas.crossOrigin = "anonymous";
		applyFilter();

	};

	// Show the image editor controls and hide the help text
	document.querySelector('.help-text').style.display = "none";
	document.querySelector('.image-controls').style.display = "block";
	document.querySelector('.preset-filters').style.display = "block";
};

function loadImage(imgsrc) {

	if(imgsrc != "") {
		image.src = imgsrc;

		image.onload = function () {

			canvas.crossOrigin = "anonymous";
			applyFilter();

		};

		// Show the image editor controls and hide the help text
		document.querySelector('.help-text').style.display = "none";	
		document.querySelector('.image-controls').style.display = "block";
		document.querySelector('.preset-filters').style.display = "block";
	}
	
};

// This function is used to update the image
// along with all the filter values
function applyFilter() {

	// Create a string that will contain all the filters
	// to be used for the image
	let filterString =
		"brightness(" + brightnessSlider.value + "%" +
		") contrast(" + contrastSlider.value + "%" +
		") grayscale(" + grayscaleSlider.value + "%" +
		") saturate(" + saturateSlider.value + "%" +
		") sepia(" + sepiaSlider.value + "%" +
		") hue-rotate(" + hueRotateSlider.value + "deg" + ")";

	// Apply the filter to the image
	context.filter = filterString;

	// Draw the edited image to canvas
	changeScale();
}

// A series of functions that handle the preset filters
// Each of these will first reset the image
// and then apply a certain parameter before
// redrawing the image
function brightenFilter() {
	resetImage();
	brightnessSlider.value = 130;
	contrastSlider.value = 120;
	saturateSlider.value = 120;
	applyFilter();
}

function bwFilter() {
	resetImage();
	grayscaleSlider.value = 100;
	brightnessSlider.value = 120;
	contrastSlider.value = 120;
	applyFilter();
}

function funkyFilter() {
	resetImage();

	// Set a random hue rotation everytime
	hueRotateSlider.value =
		Math.floor(Math.random() * 360) + 1;
	contrastSlider.value = 120;
	applyFilter();
}

function vintageFilter() {
	resetImage();
	brightnessSlider.value = 120;
	saturateSlider.value = 120;
	sepiaSlider.value = 150;
	applyFilter();
}

// Reset all the slider values to there default values
function resetImage() {
	brightnessSlider.value = 100;
	contrastSlider.value = 100;
	grayscaleSlider.value = 0;
	hueRotateSlider.value = 0;
	saturateSlider.value = 100;
	sepiaSlider.value = 0;
	applyFilter();
}

function saveImage() {

	// Convert the canvas data to a image data URL with base64
	let canvasData = canvas.toDataURL("image/png")
	const login_id = "<? php session_start();
						$login_id = $_SESSION['id'];
						echo $login_id; ?>";
	let file_name = login_id + "/" + today() + ".png"

    $.ajax({
        url : 'test.php',
        data : {img : canvasData,
                name : "test/edited_image.png"},
        type : 'POST'
    }).done(function(){
    });
}

function pad2(n) { return n < 10 ? '0' + n : n }

var date = new Date();
	
function today() {
	var date = new Date();
	return date.getFullYear().toString() + pad2(date.getMonth() + 1) + pad2( date.getDate()) + pad2( date.getHours() ) + pad2( date.getMinutes() ) + pad2( date.getSeconds() );
}
		

