<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="data/styles/style.css">
    <link rel="stylesheet" href="data/styles/main.css">    
    <link rel="stylesheet" href="data/styles/admin.css">
    <link rel="stylesheet" href="data/styles/userPage.css">       
    <link rel="stylesheet" href="data/styles/programs.css">
    <title>Реферальный интегратор</title>
  </head>
    <body>  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark header">
        <div class="container-fluid">
            <a class="navbar-brand" href="?page=1">Реферальный интегратор</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <?php if(strcasecmp($userRole,"Администратор")==0):?>
                  <li class="nav-item <?php if($_GET['page']==2):?>active<?php endif;?>">
                    <a class="nav-link" href="?page=2">Админка</a>
                  </li>
                  <?php endif;?>
                  <?php if(strcasecmp($userRole,"Клиент")==0):?>                                
                  <li class="nav-item">
                    <a class="nav-link" href="?page=5">Программы</a>
                  </li>
                  <?php endif;?>
                  <?php if(strcasecmp($userRole,"Вебмастер")==0):?>    
                  <li class="nav-item">
                    <a class="nav-link" href="?page=5">Программы</a>
                  </li>
                  <?php endif;?>
              </ul>
            </div>
            <?php if(!$authorised):?>
              <div class="nav navbar-nav navbar-right" id="navbarSupportedContent"></div>
                <form id="app-login-form" class="d-flex" method="POST">
                    <input class="form-control me-2" name="login" autocomplete="username" type="text"
                        placeholder="Login" aria-label="Login">
                    <input class="form-control me-2" name="password" autocomplete="current-password" type="password"
                        placeholder="Password" aria-label="Password">
                    <input id="app-login-btn" class="btn btn-outline-info" type="submit" value="Войти">
                </form>
              </div>
            <?php endif;?> 
            <?php if($authorised):?>
              <a class="btn btn-danger navbar-btn" href="?page=4">Выйти</a>    
            <?php endif;?>            
        </div>
      </nav>
      <div class="container aditional_data">
        <div class="row main">
          <div class="col-12">
            <?php include $content_view;?>
          </div>
        <div>
      </div>
      <?php if(strcasecmp($userRole,"Вебмастер")==0):?>    
        <div class="navbar fixed-bottom footer">
        <span class="navbar-text balance">
            Ваш баланс: <?php echo $data['balance'];?>
        </span>
        <span class="navbar-text">
            Константин Марков 2021
        </span>        
    </div>
      <?php endif;?>
      <?php if(strcasecmp($userRole,"Вебмастер")!=0):?>    
        <div class="navbar justify-content-end fixed-bottom footer">      
          <span class="navbar-text">
              Константин Марков 2021
          </span>        
        </div>
      <?php endif;?>
    </body>
</html>