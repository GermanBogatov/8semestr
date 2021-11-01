

$(document).ready(function () {

    $('#reg_form').submit(function (event) {
        event.preventDefault();
        let form = $(event.target);
        let form_data = form.serializeArray();
        let data = [];

        for (let item in form_data) {
            data[form_data[item]['name']] = form_data[item]['value'];
        }
//        if (data['password'] != data['password_confirm']) {
//            $(".pass_error").removeClass("d-none");
//            setTimeout(function () {
//                $(".pass_error").addClass("d-none");
//            }, 2500);
//            return false;
//        }
        let obj = {};

        Object.assign(obj, data);

        $.ajax({
            url: "/bogatov/mvc/lk/updatedata/",
            type: "POST",
            data: obj,
            dataType: "json",
            success: function (json) {
                if (json.error.length > 0) {
                    //alert('ппрроо');
                    $(".server_error").text(json.error).removeClass("d-none");
                } else {
                    
                    $(".server_error").text(json.error).removeClass("d-none");
                    let modal = `
<div class="modal" id = "success_reg" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Вы обновили свои данные, ${obj.name}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>обновление прошла успешно.</p>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ок</button>
      </div>
    </div>
  </div>
</div>
                   `;
                    $('body').append(modal);
    
                    let modalObj = new bootstrap.Modal(document.getElementById('success_reg'));
                    $('#success_reg').on('hide.bs.modal', function(event){
                        location.reload();
                    })
                    modalObj.show();
                    
                    
                    
                }
            }
        })
    })
    
    
    $('#password_form').submit(function (event) {
        event.preventDefault();
        let form = $(event.target);
        let form_data = form.serializeArray();
        let data = [];
                //alert('ппрроо');
        for (let item in form_data) {
            data[form_data[item]['name']] = form_data[item]['value'];
        }
        if (data['password'] != data['password_confirm']) {
            $(".pass_error").removeClass("d-none");
            setTimeout(function () {
                $(".pass_error").addClass("d-none");
            }, 2500);
            return false;
        }
        let obj = {};

        Object.assign(obj, data);

        $.ajax({
            url: "/bogatov/mvc/lk/updatepassword/",
            type: "POST",
            data: obj,
            dataType: "json",
            success: function (json) {
                if (json.error.length > 0) {
                    
                    $(".server_error").text(json.error).removeClass("d-none");
                } else {
                    $(".server_error").text(json.error).removeClass("d-none");
                    let modal = `
<div class="modal" id = "success_reg" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Вы обновили свой пароль</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>обновление паролья прошла успешно.</p>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ок</button>
      </div>
    </div>
  </div>
</div>
                   `;
                    $('body').append(modal);
    
                    let modalObj = new bootstrap.Modal(document.getElementById('success_reg'));
                    $('#success_reg').on('hide.bs.modal', function(event){
                        location.reload();
                    })
                    modalObj.show();
                    
                    
                    
                }
            }
        })
    })
    
    
})


