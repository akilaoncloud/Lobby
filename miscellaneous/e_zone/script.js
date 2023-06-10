//DOM Elements
const addCardButtonTop = document.getElementById("add-card-top");
const addCardButtonBottom = document.getElementById("add-card-bottom");

// Function to add event listeners to boxes
function addBoxEventListeners(box) {
  //When a draggable element dragged over a box element
  box.addEventListener("dragover", (e) => {
    e.preventDefault(); //Prevent default behaviour
    box.classList.add("hovered");
  });

  //When a draggable element leaves box element
  box.addEventListener("dragleave", () => {
    box.classList.remove("hovered");
  });

  //When a draggable element is dropped on a box element
  box.addEventListener("drop", () => {
    if (!box.querySelector(".card_img")) {
      box.appendChild(draggedItem);
    }
    box.classList.remove("hovered");
  });
}

// Add event listeners to existing boxes
const boxes = document.querySelectorAll(".card");
boxes.forEach(addBoxEventListeners);

// Event listener for "Add Card" button
addCardButtonTop.addEventListener("click", () => {
  const newCard = document.createElement("div");
  newCard.classList.add("card");
  addBoxEventListeners(newCard); // Add event listeners to the new box
  addCardButtonTop.parentNode.insertBefore(newCard, addCardButtonTop);
});

addCardButtonBottom.addEventListener("click", () => {
  const newCard = document.createElement("div");
  newCard.classList.add("card");
  addBoxEventListeners(newCard); // Add event listeners to the new box
  addCardButtonBottom.parentNode.insertBefore(newCard, addCardButtonBottom);
});

//Loop through each draggable element
const images = document.querySelectorAll(".card_img");
let draggedItem = null;
images.forEach((image) => {
  //When a draggable element starts being dragged
  image.addEventListener("dragstart", () => {
    draggedItem = image;
  });

  //When a draggable element is being dragged
  image.addEventListener("drag", () => {
    // do nothing
  });

  //When a draggable element stops being dragged
  image.addEventListener("dragend", () => {
    draggedItem = null;
  });
});
