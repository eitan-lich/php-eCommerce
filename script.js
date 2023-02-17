let seeMoreBtns = document.querySelectorAll("see-more-btn");
let test = document.getElementById('test');

console.log(test);

console.log(seeMoreBtns);


for(let i=0;i<seeMoreBtns.length;i++) {
    seeMoreBtns[i].addEventListener("click", ()=> {
        alert("JS Working");
    })
}


console.log('test');