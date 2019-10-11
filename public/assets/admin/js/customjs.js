$(document).ready(function () {
   setTimeout(function () {
       $('.alert').fadeOut();
   },2000);
   function removeImage(){
       $('.box-image-book .content-box').hide();
       $('.box-image-book').append('<input type="file" name="image" style=" display: none" id="image-choice">\n' +
           '<label class="btn btn-primary  col-md-12 col-sm-12 col-xs-12" for="image-choice"> Chọn Ảnh</label>');
       var name_image=$('#image-book').attr('alt');
       var id_book=$('#image-book').attr('id_book');
       var _token=$('form[name="frmedit"] input[name="_token"]').val();
       $.ajax({
           url:"xoa-anh",
           data:{anhbia:name_image,_token:_token,id_book:id_book},
           method:"POST",
           success:function (data) {
               if (data=="OK"){
               }
           }
       });
   }
    $('#box-load-image .content-box .remove-image').click(function () {
       removeImage();
    });
   $('#image-choice').change(function () {
   $('#box-load-image .update-image').css("display","none");
    $('.remove-image').css("display","block");
    $('#box-load-image .content-box-pre').css("display","block");

   });
    $('#box-load-image .remove-image-pre').click(function () {
        $('#box-load-image .update-image').css("display","block");
        $('#box-load-image .content-box-pre').css('display','none');
        var id_book=$('#preview_image').attr('id_book');
        var _token=$('form[name="frmedit"] input[name="_token"]').val();
        $.ajax({
            url:"xoa-anh",
            data:{_token:_token,id_book:id_book},
            method:"POST",
            success:function (data) {

            }
        });
    });

    $('#box-load-image #image-choice').change(function () {
        var id_book=$('#preview_image').attr('id_book');
        var image=$('#image-choice').val();
        var name_img=$('#image-choice').val().split(/(\\|\/)/g).pop();
        var _token=$('form[name="frmedit"] input[name="_token"]').val();
        $.ajax({
            url:"them-anh",
            data:{image:image,name_img:name_img,_token:_token,id_book:id_book},
            method:"POST",
            success:function (data) {

            }
        });
    });

});
