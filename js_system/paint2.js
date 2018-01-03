// Copyright 2010 William Malone (www.williammalone.com)
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//   http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

var canvas;
var context;
var canvasWidth = 270;
var canvasHeight = 220;
var padding = 25;
var lineWidth = 8;
var colorPurple = "#cb3594";
var colorGreen = "#659b41";
var colorYellow = "#ffcf33";
var colorBrown = "#986928";
var outlineImage = new Image();
var crayonImage = new Image();
var markerImage = new Image();
var eraserImage = new Image();
var crayonBackgroundImage = new Image();
var markerBackgroundImage = new Image();
var eraserBackgroundImage = new Image();
var crayonTextureImage = new Image();
var clickX = new Array();
var clickY = new Array();
var clickColor = new Array();
var clickTool = new Array();
var clickSize = new Array();
var clickDrag = new Array();
var paint = false;
var curColor = colorPurple;
var curTool = "crayon";
var curSize = "normal";
var mediumStartX = 18;
var mediumStartY = 19;
var mediumImageWidth = 93;
var mediumImageHeight = 46;
var drawingAreaX = 111;
var drawingAreaY = 11;
var drawingAreaWidth = 267;
var drawingAreaHeight = 200;
var toolHotspotStartY = 23;
var toolHotspotHeight = 38;
var sizeHotspotStartY = 157;
var sizeHotspotHeight = 36;
var sizeHotspotWidthObject = new Object();
sizeHotspotWidthObject.huge = 39;
sizeHotspotWidthObject.large = 25;
sizeHotspotWidthObject.normal = 18;
sizeHotspotWidthObject.small = 16;

function executeArticleScript() {
	prepare1Canvas();
	prepare2Canvas();
}

var totalLoadResources = 8
var curLoadResNum = 0;
/**
 * Calls the redraw function after all neccessary resources are loaded.
 */
function resourceLoaded() {
	if (++curLoadResNum >= totalLoadResources - 1) {
		redraw();
	}
}

/****************************************************************************** Canva 2 */

var clickX_2 = new Array();
var clickY_2 = new Array();
var clickDrag_2 = new Array();
var paint_2;
var canvas_2;
var context_2;

/**
 * Creates a canvas element.
 */
function prepare2Canvas() {
	// Create the canvas (Neccessary for IE because it doesn't know what a canvas element is)
	var canvasDiv2 = document.getElementById('canvas2Div');
	canvas_2 = document.createElement('canvas');
	canvas_2.setAttribute('width', canvasWidth);
	canvas_2.setAttribute('height', canvasHeight);
	canvas_2.setAttribute('id', 'canvas2');
	canvas_2.setAttribute('style', 'border: 1px solid');
	canvasDiv2.appendChild(canvas_2);
	
	if (typeof G_vmlCanvasManager != 'undefined') {
		canvas_2 = G_vmlCanvasManager.initElement(canvas_2);
	}
	
	context_2 = canvas_2.getContext("2d");

// Add mouse events
// ----------------
	$('#canvas2').mousedown(function(e) {
		// Mouse down location
		// var mouseX = e.pageX - this.offsetLeft;
		// var mouseY = e.pageY - this.offsetTop;
		var ClientRect = canvas_2.getBoundingClientRect();
		var mouseX = Math.round(e.clientX - ClientRect.left),
			mouseY = Math.round(e.clientY - ClientRect.top);

		paint_2 = true;
		addClick2(mouseX, mouseY, false);
		redraw2();
	});

	$('#canvas2').mousemove(function(e) {
		if (paint_2) {
			var ClientRect = canvas_2.getBoundingClientRect();
			var mouseX = Math.round(e.clientX - ClientRect.left),
				mouseY = Math.round(e.clientY - ClientRect.top);
				
			addClick2(mouseX, mouseY, true);
		
			// addClick2(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
			redraw2();
		}
	});

	$('#canvas2').mouseup(function(e) {
		paint_2 = false;
		redraw2();
	});

	$('#canvas2').mouseleave(function(e) {
		paint_2 = false;
	});

	$('#clearCanvas2').mousedown(function(e) {
		clickX_2 = new Array();
		clickY_2 = new Array();
		clickDrag_2 = new Array();
		clearCanvas_2();
	});
	
	$('#clearCanvas2').mousedown(function(e) {
		clickX_2 = new Array();
		clickY_2 = new Array();
		clickDrag_2 = new Array();
		clearCanvas_2();
	});

	// Add touch event listeners to canvas element
	canvas_2.addEventListener("touchstart", function(e) {
		// Mouse down location
		var mouseX = (e.changedTouches ? e.changedTouches[0].pageX : e.pageX) - this.offsetLeft,
		    mouseY = (e.changedTouches ? e.changedTouches[0].pageY : e.pageY) - this.offsetTop -120;
		    
		// var ClientRect = canvas_1.getBoundingClientRect();
		// var mouseX = Math.round(e.clientX - ClientRect.left),
			// mouseY = Math.round(e.clientY - ClientRect.top);

		paint_2 = true;
		addClick2(mouseX, mouseY, false);
		redraw2();
	}, false);
	canvas_2.addEventListener("touchmove", function(e) {
		var mouseX = (e.changedTouches ? e.changedTouches[0].pageX : e.pageX) - this.offsetLeft,
		    mouseY = (e.changedTouches ? e.changedTouches[0].pageY : e.pageY) - this.offsetTop -120;
		// var ClientRect = canvas_1.getBoundingClientRect();
		// var mouseX = Math.round(e.clientX - ClientRect.left),
			// mouseY = Math.round(e.clientY - ClientRect.top);

		if (paint_2) {
			addClick2(mouseX, mouseY, true);
			redraw2();
		}
		e.preventDefault()
	}, false);
	canvas_2.addEventListener("touchend", function(e) {
		paint_2 = false;
		redraw2();
	}, false);
	canvas_2.addEventListener("touchcancel", function(e) {
		paint_2 = false;
	}, false);
}

function addClick2(x, y, dragging) {
	clickX_2.push(x);
	clickY_2.push(y);
	clickDrag_2.push(dragging);
}

function clearCanvas_2() {
	context_2.clearRect(0, 0, canvasWidth, canvasHeight);
}

function redraw2() {
	clearCanvas_2();

	var radius = 5;
	context_2.strokeStyle = "#df4b26";
	context_2.lineJoin = "round";
	context_2.lineWidth = radius;

	for (var i = 0; i < clickX_2.length; i++) {
		context_2.beginPath();
		if (clickDrag_2[i] && i) {
			context_2.moveTo(clickX_2[i - 1], clickY_2[i - 1]);
		} else {
			context_2.moveTo(clickX_2[i] - 1, clickY_2[i]);
		}
		context_2.lineTo(clickX_2[i], clickY_2[i]);
		context_2.closePath();
		context_2.stroke();
	}
}

/****************************************************************************** END Canva 2 */


/****************************************************************************** Canva 1 */

var clickX_1 = new Array();
var clickY_1 = new Array();
var clickDrag_1 = new Array();
var paint_1;
var canvas_1;
var context_1;

/**
 * Creates a canvas element.
 */
function prepare1Canvas() {
	// Create the canvas (Neccessary for IE because it doesn't know what a canvas element is)
	var canvasDiv = document.getElementById('canvas1Div');
	canvas_1 = document.createElement('canvas');
	canvas_1.setAttribute('width', canvasWidth);
	canvas_1.setAttribute('height', canvasHeight);
	canvas_1.setAttribute('id', 'canvas1');
	canvas_1.setAttribute('style', 'border: 1px solid');
	canvasDiv.appendChild(canvas_1);
	if ( typeof G_vmlCanvasManager != 'undefined') {
		canvas_1 = G_vmlCanvasManager.initElement(canvas_1);
	}
	context_1 = canvas_1.getContext("2d");

	// Add mouse events
	// ----------------
	$('#canvas1').mousedown(function(e) {
		// Mouse down location
		// var mouseX = e.pageX - this.offsetLeft;
		// var mouseY = e.pageY - this.offsetTop;
		var ClientRect = canvas_1.getBoundingClientRect();
		var mouseX = Math.round(e.clientX - ClientRect.left),
			mouseY = Math.round(e.clientY - ClientRect.top);
		
		paint_1 = true;
		addClick1(mouseX, mouseY, false);
		redraw1();
	});

	$('#canvas1').mousemove(function(e) {
		if (paint_1) {
			var ClientRect = canvas_1.getBoundingClientRect();
			var mouseX = Math.round(e.clientX - ClientRect.left),
				mouseY = Math.round(e.clientY - ClientRect.top);
			
			// addClick1(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
			addClick1(mouseX, mouseY, true);
			redraw1();
		}
	});

	$('#canvas1').mouseup(function(e) {
		paint_1 = false;
		redraw1();
	});

	$('#canvas1').mouseleave(function(e) {
		paint_1 = false;
	});

	$('#clearCanvas1').mousedown(function(e) {
		clickX_1 = new Array();
		clickY_1 = new Array();
		clickDrag_1 = new Array();
		clearCanvas_1();
	});

	// Add touch event listeners to canvas element
	canvas_1.addEventListener("touchstart", function(e) {
		// Mouse down location
		var mouseX = (e.changedTouches ? e.changedTouches[0].pageX : e.pageX) - this.offsetLeft,
		    mouseY = (e.changedTouches ? e.changedTouches[0].pageY : e.pageY) - this.offsetTop -120;
		
		// var ClientRect = canvas_1.getBoundingClientRect();
		// var mouseX = Math.round(e.clientX - ClientRect.left),
			// mouseY = Math.round(e.clientY - ClientRect.top);
				
		paint_1 = true;
		addClick1(mouseX, mouseY, false);
		redraw1();
	}, false);
	canvas_1.addEventListener("touchmove", function(e) {
		var mouseX = (e.changedTouches ? e.changedTouches[0].pageX : e.pageX) - this.offsetLeft,
		    mouseY = (e.changedTouches ? e.changedTouches[0].pageY : e.pageY) - this.offsetTop -120;
		
		// var ClientRect = canvas_1.getBoundingClientRect();
		// var mouseX = Math.round(e.clientX - ClientRect.left),
			// mouseY = Math.round(e.clientY - ClientRect.top);
				
		if (paint_1) {
			addClick1(mouseX, mouseY, true);
			redraw1();
		}
		e.preventDefault()
	}, false);
	canvas_1.addEventListener("touchend", function(e) {
		paint_1 = false;
		redraw1();
	}, false);
	canvas_1.addEventListener("touchcancel", function(e) {
		paint_1 = false;
	}, false);
}

function addClick1(x, y, dragging) {
	clickX_1.push(x);
	clickY_1.push(y);
	clickDrag_1.push(dragging);
}

function clearCanvas_1() {
	context_1.clearRect(0, 0, canvasWidth, canvasHeight);
}

function redraw1() {
	clearCanvas_1();

	var radius = 5;
	context_1.strokeStyle = "#df4b26";
	context_1.lineJoin = "round";
	context_1.lineWidth = radius;

	for (var i = 0; i < clickX_1.length; i++) {
		context_1.beginPath();
		if (clickDrag_1[i] && i) {
			context_1.moveTo(clickX_1[i - 1], clickY_1[i - 1]);
		} else {
			context_1.moveTo(clickX_1[i] - 1, clickY_1[i]);
		}
		context_1.lineTo(clickX_1[i], clickY_1[i]);
		context_1.closePath();
		context_1.stroke();
	}
}

/****************************************************************************** END Canva 1 */

executeArticleScript();

/**/