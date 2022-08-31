let infoButton = document.querySelector('#infoButton');
let counter = 0;
let infoSectionAttachement = document.querySelector('#infoSectionAttachement');
let click = 0;

window.addEventListener("scroll", () => {
        counter = counter + 1;
        if (counter == 40) {
                infoButton.classList.remove('d-none');

        }
});

infoButton.addEventListener("click", () => {

                infoSectionAttachement.classList.toggle('d-none')
})

