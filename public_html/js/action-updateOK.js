$(document).ready(function() {

    var source = $('#todo-list-template').html();// 將Source 等於要帶入的handle 代碼
    var todoTemplate = Handlebars.compile(source);// 用handle bar compile 

    // prepare all todos
    var todolistUI='';
        $.each(todos, function(index, todo) {

            todolistUI =todolistUI + todoTemplate(todo);
            });//jquery 的each
        $('.todo-list').find('li.new').before(todolistUI);
        

        

    // 更新 應為有
    $('.todo-list')
    .on('dblclick','.content',function(e){//e 代表點擊後的資訊
        //console.log('test-dbclick');驗證有抓到訊息
        //更新
        $(this).prop('contenteditable', true).focus();// 修改html div 屬性
    })
    .on('blur', '.content',function(e) {
        var isNew = $(this).closest('li').is('.new');
        //console.log(isNew); isNew 驗證OK
        //create
        if (isNew) {
            //// 新增 [先預想使用者的使用情形]  --> 先監聽blur 事件
            var todo = $(this).text();
   
            todo = todo.trim();
            if (todo.length >0) {
                var order= $('.todo-list').find('li:not(.new)').length +1;
                //console.log("test"); test OK
                //AJAX create API 
               $.post('todo/create.php',{content:todo,order:order},function(data ,textStatus, xhr){
                   // 這邊是
                   todo = {
                       id: data.id,
                       is_complete: false,
                       content:todo,
                   };
                                   // to list 架構
                   var li = todoTemplate(todo);
                   //console.log(this);
                   //console.log(li); li 有讀到        
                   $(this).closest('li').before(li);

               });
                
                        // clear new todo item   
                $(this).empty(); 
            }
        }
        else {//update
            //AJAX call
            var id = $(this).closest('li').data('id');
            var content =$(this).text();
            $.post('todo/update.php',{id:id,content:content});
            $(this).prop('contenteditable', false);    
        }   
        
    })
    .on('click','.delete',function(e){//刪除製作開始
        var result =confirm('do you want to delete?');
        if (result) {
            $(this).closest('li').remove();
        }

    }).on('click','.checkbox',function(e){
        $(this).closest('li').toggleClass('complete');
    });

    //製作排序功能
    $('.todo-list').find('ul').sortable({
        items:'li:not(.new)',
    });

});


