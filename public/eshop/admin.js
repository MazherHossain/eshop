(function($){
  $(document).ready(function(){

    //create a alert function
    function setAlert(msg, type='danger'){
      return `<p class="alert alert-${type} d-flex justify-content-between"> ${msg} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></p>`;
    }
    /**Get all roles*/
    getAllRoles();
    function getAllRoles(){
      $.ajax({
        url : "all-roles",
        success : function(data){
          $('#role_list').html(data);
        }
      });
    }
/**Role add*/
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
            getAllRoles();
            $('#role_add_form')[0].reset();
            $('#role_add_modal').modal('hide');
          }
        });
      }
    });

    /**Role Delete*/
    $(document).on('click','.delete-btn',function(e){
      e.preventDefault();
      let id= $(this).attr('delete_id');
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: 'del-role/'+id,
            success:function(){
              getAllRoles();
              swal('Data Deleted');
            }
          });
        } else {
          swal("Your data file is safe!");
        }
      });
      
    });

    /*modal edit
    */
   $(document).on('click','.edit-btn', function(e){
     e.preventDefault();
     let id=$(this).attr('edit_id');
     
     $.ajax({
       url:'role/'+id,
       success:function(data){
        $('#role_edit_modal [name="name"]').val(data.name);
        $('#role_edit_modal [name="edit_id"]').val(data.id);
        $('#per_list_edit').html(data.permission);
        $('#role_edit_modal').modal('show');
       }
     });
   });

   /*Role Edit form*/
   $(document).on('submit','#role_edit_form',function(e){
    e.preventDefault();
    let id=$('[name="edit_id"]').val();
    $.ajax({
          url:'role/'+id,
          method: "POST",
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function(data){
            //console.log(data);
            getAllRoles();
            $('#role_edit_modal').modal('hide');
            
          }
    });
   });

   /*Status update*/
   $(document).on('change','#role_status',function(){
    
    $.ajax({
      url:'status-update/'+ this.value,
      success:function(data){
        swal('Status update successful!');
      }
    });

   });

   /*Permission script*/
   $(document).on('submit','#permission_add_form',function(e){
    e.preventDefault();
    let name= $('#permission_add_form input[name="name"]').val();
    if( name==''){
      $('.msg').html(setAlert('All fields are required!'));
    }
    else{
      $.ajax({
        url:'permission',
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(data){
          if(data){
          swal(`${name} Permission Added`);
          $('#permission_add_form')[0].reset();
          $('#permission_add_modal').modal('hide');
          getAllPermission();
          }
          else{
            swal(`${name} already exists!`);
          }
          
        }
      });
    }
   });

   /*Get All Permission*/
   getAllPermission();
   function getAllPermission(){
     $.ajax({
       url:'all-permissions',
       success:function(data){
        $('#permission_list').html(data);
       }
     });
   }

  });
})(jQuery)