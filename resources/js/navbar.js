let link = document.querySelectorAll('.link-dot');

const activepage = window.location.href;

const dot = document.createElement("div");
dot.classList.add("dot");

link.forEach(el => {
        if (el.href === `${activepage}`) {
                el.appendChild(dot);
        } 
});

