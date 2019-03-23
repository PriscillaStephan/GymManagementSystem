
<!DOCTYPE html>
<html>
  <head>
    <title> Home</title> 
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/scripts.js"></script> 
      <?php include 'globalExternals/components.php'; ?>
    </head>
    <style>
      /**************************** home PAGE - to do list ******************************************************/
      body {
        font-family: "Lato", sans-serif;
        color: #2c3338;
        background: #2c3338; /* fallback for old browsers */
      }

      #container {
        margin: 100px auto;
        width: 360px;
        background-color: #e5ce48;
        box-shadow: 0px 0px 20px rgba(0,0,0,.3);
        border-radius: 2px;
      }

      h1 {
        text-transform: uppercase;
        margin: 0;
        padding: 10px 20px;
      }

      input {
        outline: none;
        font-family: "Lato", sans-serif;
        color: #333333;
        background-color: #e5ce48;
        font-size: 16px;
        border: none;
      }

      #new-todo {
        box-sizing: border-box;
        width: 100%;
        padding: 10px 20px;
      }

      #new-todo:hover {
        border: 1px solid #E3DAAE;
      }

      .fa-square-o, .fa-check-square-o {
        margin-right: 8px;
        font-size: 16px;
      }

      .completed {
        color: gray;
        text-decoration: line-through;
      }

      ul {
        padding: 0;
        margin: 0;
        list-style: none;
      }

      li {
        height: 40px;
        line-height: 40px;
        padding: 0 10px;
      }

      li:hover{
        border: 1px solid #E3DAAE;
      }

      .todo {
        width: 80%;
      }

      #first {
        display: none;
        float: right;
      }

      li:hover #first {
        display: inline-block;

      }

      .fa-times {
        font-size: 14px;
        color: gray;
      }

      .fa-times:hover {
        color: #333333;
      }

    </style>


  <body>
    <?php include 'navigations/NavigationBar.php'; ?>

      <!--*************************to do list ***************************************-->
      <div></div>
        <div id="container">
          <h1>To do List:</h1>
          <input id="new-todo" type="text" placeholder="Add new todo">
          <ul>
            <li>
              <span id="first">
                <i class="fa fa-times" aria-hidden="true"></i>
              </span>
              <span id="last">
              <i class="fa fa-square-o"></i>
              </span>
              <input class="todo" type="text" value="Check Payments">
            </li>
            <li>
              <span id="first">
                <i class="fa fa-times" aria-hidden="true"></i>
              </span>
              <span id="last">
              <i class="fa fa-square-o"></i>
              </span>
              <input class="todo" type="text" value="Follow up with this member">
            </li>
            <li>
              <span id="first">
                <i class="fa fa-times" aria-hidden="true"></i>
              </span>
              <span id="last">
              <i class="fa fa-square-o"></i>
              </span>
              <input class="todo" type="text" value="Check Schedule Reservation">
            </li>
          </ul>
        </div>

        <script>
            //check checkbox to complete todo
          $("ul").on("click", "#last", function() {
            $(this).parent().find("input:text").toggleClass("completed");
            $(this).find("i:last").toggleClass("fa-square-o fa-check-square-o");
          });

          //delete todos via x icon
          $("ul").on("click", "#first", function(event) {
            $(this).parent().fadeOut('500',function(){
              $(this).remove();
            });
            event.stopPropagation();
          });

          //delete empty todos via backspace
          $("ul").on("keyup", ".todo", function(event) {
            //if backspace on empty text input
            if(event.which === 8 && $(this).val() === "") {
              $(this).parent().fadeOut('.5',function(){
                $(this).remove();
              }); 
            } 
              event.stopPropagation();
          });

          //add new todo
          $("#new-todo").on("keypress", function(event) {
            if(event.which === 13) {
              var newTodo = $(this).val();
              $(this).val(""); 
              $("ul").append("<li><span id='first'><i class='fa fa-times' aria-hidden='true'></i></span><span id='last'><i class='fa fa-square-o'></i></span><input class='todo' type='text' value='" +newTodo+ "'></li>");
            }
          });
        </script>
  </body>
</html>
