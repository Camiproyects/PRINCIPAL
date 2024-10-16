function previewImage() {
    const file = document.getElementById('imagen').files[0];
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';  // Limpiar previsualización previa

    const reader = new FileReader();
    reader.onload = function(e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        preview.appendChild(img);
    }
    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '<span>Previsualización</span>';
    }
}
