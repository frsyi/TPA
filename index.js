// console.log('Beatrix');

// const a = 9;
// const b = 4;

// console.log(a+b);
// console.log(Math.pow(a,2)+b);
// console.log(Math.pow(a,1/2)+b);

// const c = 9.34;

// console.log(parseFloat(c.toFixed(1)));

// for (var i = 0; i < 5; i++) {
//     console.log(i+1);
// };

// for (var i = 2; i <= 8; i+=2) {
//     console.log(i);
// };

// for (var i = 1; i <= 8; i++) {
//     if (i % 2 == 0) {
//         console.log(i);
//     }
// };

// for (var i = 2; i <= 8; i+=2) {
//     let sc = i.toString();
//     sc = sc + " ";
//     console.log(sc);
// };


// let sc;
// let buffer = "";

// for (var c = 1; c < 8; c++) {
//     if (c % 2 == 1) {
//         sc = c.toString();
//     buffer = buffer + sc + " ";
//
// }
// console.log(buffer);


let json = {
    "nama":"Beatrix", "status":"available"
}
console.log(json.status);

function test() {
    let v = document.getElementById("view");
    v.innerHTML = "Test OK";
}

function ijin() {
    let i = document.getElementById("surat");
    i.innerHTML = "Ortu OK";
}

async function delay() {
    await ijin();
    setTimeout(test, 2000);
}

// function setup() {
//     createCanvas(400, 400);
//     setInterval(setWarna, 2000);
//   }

//   let r = 0;
//   let g = 0;
//   let b = 0;

//   function setWarna() {
//     r = Math.floor(Math.random() * 256);
//     g = Math.floor(Math.random() * 256);
//     b = Math.floor(Math.random() * 256);
//     console.log(r, g, b);
//   }

//   function draw() {
//     background(r, g, b);
//     fill(0);
//     textSize(24);
//     textAlign(CENTER, CENTER);
//     text(r + " " + g + " " + b, width/2, height/2);
//   }
// {}
