document.addEventListener("DOMContentLoaded", () => {

    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");

    if (!imageInput || !imagePreview) return;

    imageInput.addEventListener("change", function () {

        const file = this.files[0];

        if (!file) return;

        const reader = new FileReader();

        reader.onload = function (e) {

            imagePreview.src = e.target.result;

        };

        reader.readAsDataURL(file);

    });

});