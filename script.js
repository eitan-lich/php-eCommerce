let seeMoreBtns = document.querySelectorAll(".see-more-btn");
let itemDescriptions = document.querySelectorAll(".item-description");



itemDescriptions.forEach((description=>description.style.display="none"));

for(let i=0;i<itemDescriptions.length;i++) {
    seeMoreBtns[i].addEventListener("click", () => {
        if(itemDescriptions[i].style.display === "none") {
            seeMoreBtns[i].innerHTML = "Show less";
            itemDescriptions[i].style.display = "block";
        } else {
            seeMoreBtns[i].innerHTML ="Show more";
            itemDescriptions[i].style.display = "none";
        }
    })
};

