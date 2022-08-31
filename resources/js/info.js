let infoButton = document.querySelector('#infoButton');
let counter = 0;
let  infoSection= document.createElement("div");
let infoSectionAttachement = document.querySelector('#infoSectionAttachement');
let click = 0;

infoSection.classList.add("container");
infoSection.innerHTML = `
<div class="row bg-danger">
<div class="col-12">
<p>dicci cosa ne pensi!</p>
</div>
</div>
`
console.log(infoSection);
window.addEventListener("scroll", () =>{
        counter = counter +1;
        if(counter == 35){
                infoButton.classList.remove('d-none');
                
        }
        if(counter == 200){
                infoSectionAttachement.removeChild(infoSection);
        }
});

infoButton.addEventListener("click", () => {
        if(click == 0){
        infoSectionAttachement.appendChild(infoSection);
        
        click = 1;
        } else if(click == 1) {
                infoSectionAttachement.removeChild(infoSection);
                click = 0;
        }
})

