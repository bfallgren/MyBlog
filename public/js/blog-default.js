$(document).ready(function(){
  // For A Delete Record Popup
  console.log("found blog-default");
  alert("hello");


  $('.remove-record').click(function() {
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');
    var token = CSRF_TOKEN;
    $(".product-delete-record-model").attr("action",url);
    $('body').find('.product-delete-record-model').append('<input name="_token" type="hidden" value="'+ token +'">');
    $('body').find('.product-delete-record-model').append('<input name="_method" type="hidden" value="DELETE">');
    $('body').find('.product-delete-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
  });
  $('.remove-data-from-delete-form').click(function() {
    $('body').find('.product-delete-record-model').find( "input" ).remove();
  });
  $('.modal').click(function() {
     $('body').find('.product-delete-record-model').find( "input" ).remove();
  });
});