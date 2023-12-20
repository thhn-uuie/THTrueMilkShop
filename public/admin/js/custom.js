
const wrapper = document.querySelector(".wrapp");
const fileName = document.querySelector(".file-name");
const defaultBtn = document.querySelector("#l_image");
const customBtn = document.querySelector("#custom-btn");
const img = document.querySelector("#img");
const regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_]+$/
function defaultBtnActive() {
    defaultBtn.click();
}

defaultBtn.addEventListener("change", function () {
    const file = this.files[0];
    // console.log(file);
    if (file) {
        const reader = new FileReader();
        reader.onload = function () {
            const result = reader.result;
            img.src = result;
            wrapper.classList.add("active");
        }
        reader.readAsDataURL(file);
    }
    if (this.value) {
        let valueStore = this.value.match(regExp);
        fileName.textContent = valueStore;
    }
});

$('.summernote').summernote({
    height: '100px'
});
