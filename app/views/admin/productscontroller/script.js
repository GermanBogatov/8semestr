$(document).ready(function () {
    $('#form_new_product').submit(function (event) {
        event.preventDefault();
       var data = new FormData(this);
       
        $.ajax({
            url: window.BASE_DIR + "/products/add/",
            data: data,
            processData: false,
            contentType: false,
            dataType: "json",
            type: "POST",
            success: function ( json ) {
                if (json.error > 0) {
                    $("#new_product_modal .error_danger").show();
                } else {
                    location.reload();
                }
            }
        })
    })

})


function sectionDelete(id, name) {
    if (confirm("Вы уверены, что хотите удалить категорию \"" + name + "\"c id = " + id)) {
        $.ajax({
            url: window.BASE_DIR + "/products/del/",
            data: {id: id},
            dataType: "json",
            type: "POST",
            success: function (json) {
                if (json.error > 0) {
                    alert('Ошибка');
                } else {
                    location.reload();
                }
            }
        })
    }
}

