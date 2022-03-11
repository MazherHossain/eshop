(function($){
  $(document).ready(function(){

    //create a alert function
    function setAlert(msg, type='danger'){
      return '<p class="alert alert-${type} d-flex justify-content-between">${msg} <button type="button" class="btn-alert" data-bs-dismiss="alert" aria-lebel="Close"></button></p>';
    }

    $(document).on('submit','#role_add_form', function(e){
      e.preventDefault();
      let name =$('#role_add_form input[name="name"]').val();
      if(name ==''){
        $('#role_add_form .msg').html(setAlert('Name field must not be empty!'));
      }else{
        $.ajax({
          url:'role',
          method: 'POST',
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function(data){
            console.log(data);
            $('##role_add_form')[0].reset();
          }
        });
      }
    });
  });
})(jQuery)