let w = window.innerWidth, // Initialize w before using it
  h = window.innerHeight,
  canvas = document.getElementById("animation-canvas"),
  ctx = init(canvas, w, h);
canvas.width = w; // Set canvas width
canvas.height = h; // Set canvas height

//initiation

class firefly {
    constructor() {
        this.x = Math.random() * w;
        this.y = Math.random() * h;
        this.s = Math.random() * 2;
        this.ang = Math.random() * 2 * Math.PI;
        this.v = this.s * this.s / 4;
    }
    move() {
        this.x += this.v * Math.cos(this.ang);
        this.y += this.v * Math.sin(this.ang);
        this.ang += Math.random() * 20 * Math.PI / 180 - 10 * Math.PI / 180;
    }
    show() {
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.s, 0, 2 * Math.PI);
        ctx.fillStyle = "#fddba3";
        ctx.fill();
    }
}

let f = [];

function draw() {
    if (f.length < 100) {
        for (let j = 0; j < 10; j++) {
            f.push(new firefly());
        }
    }
    //animation
    for (let i = 0; i < f.length; i++) {
        f[i].move();
        f[i].show();
        if (f[i].x < 0 || f[i].x > w || f[i].y < 0 || f[i].y > h) {
            f.splice(i, 1);
        }
    }
}

let mouse = {};
let last_mouse = {};

canvas.addEventListener(
    "mousemove",
    function (e) {
        last_mouse.x = mouse.x;
        last_mouse.y = mouse.y;

        mouse.x = e.pageX - this.offsetLeft;
        mouse.y = e.pageY - this.offsetTop;
    },
    false
);

function init(canvas, width, height) {
  let ctx = canvas.getContext("2d");
  canvas.width = width; // Set canvas width
  canvas.height = height; // Set canvas height
  ctx.fillStyle = "rgba(30,30,30,1)";
  ctx.fillRect(0, 0, width, height);
  return ctx;
}


window.requestAnimFrame = (function () {
    return (
        window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (callback) {
            window.setTimeout(callback);
        }
    );
});

function loop() {
    window.requestAnimFrame(loop);
    ctx.clearRect(0, 0, w, h);
    draw();
}

window.addEventListener("resize", function () {
    (w = canvas.width = window.innerWidth),
    (h = canvas.height = window.innerHeight);
    loop();
});

loop();
setInterval(loop, 1000 / 60);
