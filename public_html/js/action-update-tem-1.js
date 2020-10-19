$(document).ready(function() {
    



    // 更新 應為有
    $('.todo-list')
    .on('dblclick','.content',function(e){//e 代表點擊後的資訊
        //console.log('test-dbclick');驗證有抓到訊息
        $(this).prop('contenteditable', true).focus();// 修改html div 屬性
    })
    .on('blur', '.content',function(e) {
        var isNew = $(this).closest('li').is('.new');
        //console.log(isNew); isNew 驗證OK
        if (isNew) {
            //// 新增 [先預想使用者的使用情形]  --> 先監聽blur 事件
            var todo = $(this).text();
            var source = $('#todo-list-template').html();// 將Source 等於要帶入的handle 代碼
            // 新增
            var todoTemplate = Handlebars.compile(source);// 用handle bar compile 
            todo = todo.trim();
            if (todo.length >0) {
    
                // to list 架構
                var newtodo ={
                    is_complete: false,
                    content:todo,
                };
                var li = todoTemplate(newtodo);
                //console.log(li); li 有讀到        
                $(this).closest('li').before(li);
                        // clear new todo item   
                $(this).empty(); 
            }
        }
        else {
            $(this).prop('contenteditable', false);    
        }   
        
    });

});


