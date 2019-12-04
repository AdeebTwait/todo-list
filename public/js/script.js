
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }    
});

//check off specific todos by clicking
$('.list-items').on('click', '.list-item', function(e) {
    let task_id = e.target.dataset.id
    $.ajax({
        type:'POST',
        url:`/tasks/${task_id}/toggle`,

        success:function(data){
          console.log(data)
        },
    });
    $(this).toggleClass('completed');
});

//click on X to delete todo
$('.list-items').on('click', '.item-span', function(event) {
  let task_id = event.target.parentNode.dataset.id

  $.ajax({
        type:'POST',
        url:`/tasks/${task_id}/delete`,

        success:function(data){
          console.log(data)
        },
  });
  $(this).parent().fadeOut(1000, function() {
    $(this).remove();
  }); 
  event.stopPropagation();

});

//add new todo
$(".insert-item").keypress(function(event) {
  if (event.which === 13) {
    var newTodoText = $(this).val();
    let user_id = window.user_id
    $(this).val('');
    $.ajax({
        type:'POST',
        url:`/users/${user_id}/tasks`,
        data:{title:newTodoText},

        success:function(data){
          console.log(data)
          //create a new li and add to ul
          $('.list-items').append(`<li data-id='${data.id}' class='list-item'><span data-id='${data.id}' class='item-span'><i class='fa fa-trash'></i></span>${newTodoText}</li>`);
        },
    });
    
  }
});

$('.fa-plus').on('click', function() {
  $(".insert-item").fadeToggle();
});



