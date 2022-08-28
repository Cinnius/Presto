let link = document.querySelectorAll('.link-dot');

const activepage = window.location.href;

console.log(activepage);

const dot = document.createElement("div");
dot.classList.add("dot");
console.log(dot);
link.forEach(el => {
        if (el.href === `${activepage}`) {
                el.appendChild(dot);
        } 
});

