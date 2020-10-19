<?php include('header.php') ?>
<?php include('data.php') ?>



<div id="panel">
    <h1>todo list</h1>
    <div class="todo-list">
        <ul>

 
       

            <li class="new">
                <div class="checkbox"></div>
                <div class="content" contenteditable="true"></div>                              
            </li>
        </ul>

    </div>
</div>

</li>

<script id="todo-list-template" type="text/x-handlebars-template">
    <li data-id="{{id}}" class="{{#if is_complete}}complete{{/if}}">
        <div class="checkbox"></div>
        <div class="content">{{content}}</div>
        <div class="action">
            <div class="edit">edit</div>
            <div class="delete">x</div>
        </div>
</script>

<? include('footer.php')?>
