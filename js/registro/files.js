const dropArea = document.querySelector(".drag-area");
const dragText = dropArea.querySelector(".drag-area__title");
const button = document.querySelector(".drag-area__btn");
const input = dropArea.querySelector(".drag-area__file");

let files;
button.addEventListener('click',(e) =>{
    input.click();
});
input.addEventListener('change',(e)=>{
    files = this.files;
    dropArea.classList.add("active");
    showFiles(files);
    dropArea.classList.remove("active");
});
//elementos para drop area
dropArea.addEventListener("dragover",(e)=>{
    e.preventDefault();
    dropArea.classList.add("active");
    dragText.textContent =  "suelta para subir los archivos";
});
dropArea.addEventListener("dragleave",(e)=>{
    e.preventDefault();
    dropArea.classList.remove("active");
    dragText.textContent = "arras y suelta imagen";
});
dropArea.addEventListener("drop",(e)=>{
    e.preventDefault();
    files = e.dataTransfer.files;
    showFiles(files);
    dropArea.classList.remove("active");
    dragText.textContent = "arras y suelta imagen";
});
function showFiles(){
    if(files.length === undefined){
        processFile(files);
    }else{
        for(const file of files){
            processFile(file);
        }
    }
}
function processFile(file) {
    const docType =  file.type;
    const validExtentions = ['image/jpg','image/png','image/jpeg'];

    if(validExtentions.includes(docType)){
        //valido
        const fileReader = new FileReader();
        const id = `file-${Math.random().toString(32).substring(7)}`;

        fileReader.addEventListener('load',(e)=>{
            const fileUrl = fileReader.result;
            const image = `
                <div id="${id}" class ="file-container">
                    <img src="${fileUrl}" alt ="${file.name}" width="50">
                    <div class="status">
                        <span>${file.name}</span>
                        <span class="status-text">
                            cargando...
                        </span>
                    </div>
                </div>
            `;
            const html =document.querySelector(".preview").innerHTML;
            document.querySelector(".preview").innerHTML = image+html;
        });
        fileReader.readAsDataURL(file);
        uploadFile(file,id);
    }else{
        //caso error
        alert("error archivo no valido");
    }
}

async function  uploadFile(file,id){
    const formData =  new FormData();
    formData.append("file",file);

    try {
        const response = await fetch('http://localhost:3000/upload',{
            method:'POST',
            body:formData
        });
        const responseText = await response.text();
        document.querySelector(`#${id} .status-text`).innerHTML = `<span class="success">cargado!</span>`;
    } catch (error) {
        document.querySelector(`#${id} .status-text`).innerHTML = `<span class="failure">ocurrio un error</span>`;
    }
}