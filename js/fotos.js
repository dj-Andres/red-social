
$(window).load(function () {
    $(function () {
        $('#file-input').change(function (e) {
            addImage(e);
        });

        function addImage(e) {
            var file = e.target.files[0],
                imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#imgSalida').attr("src", result);
        }
    });
});
function capturar() {
    var resultado = "";

    var porNombre = document.getElementsByName("filter");
    for (var i = 0; i < porNombre.length; i++) {
        if (porNombre[i].checked)
            resultado = porNombre[i].value;
    }

    var elemento = document.getElementById("resultado");
    if (elemento.className == "") {
        elemento.className = resultado;
        elemento.width = "600";
    } else {
        elemento.className = resultado;
        elemento.width = "600";
    }
}