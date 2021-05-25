<div class="container justify-content-center h-100 d-flex">
    <div class="jumbotron my-auto jumbo">
        <form id="app-login-form" method="POST">
            <div class="form-group">
                <label for="usrSurNameField">ФАМИЛИЯ:</label>
                <input type="text" name="user_surname" class="form-control" id="usrSurNameField" placeholder="Фамилия пользователя">
            </div>
            <div class="form-group">
                <label for="usrNameField">ИМЯ:</label>
                <input type="text" name="user_name" class="form-control" id="usrNameField" placeholder="Имя пользователя">
            </div>
            <div class="form-group">
                <label for="usrLoginField">ЛОГИН:</label>
                <input type="text" name="user_login" class="form-control" id="usrLoginField" placeholder="Логин">
            </div>
            <div class="form-group">
            <label for="usrPassword">ПАРОЛЬ:</label>
            <input type="password" name="user_password" class="form-control" id="usrPassword" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="userRole">РОЛЬ</label>
                <select class="form-control" name="user_role" id="userRole">
                <option>Администратор</option>
                <option>Вебмастер</option>
                <option>Клиент</option>
                </select>
            </div>   
            <div class="form-group">
                <label for="userStatus">СТАТУС</label>
                <select class="form-control" name="user_status" id="userStatus">
                <option>Активный</option>
                <option>Отключен</option>
                </select>
            </div>
            <div class="row justify-content-center" id="buttonsRow">
                <a class="btn btn-danger navbar-btn cancel" href="?page=2">Отмена</a>         
                <input type="submit" class="btn btn-success save"  value="Сохранить">
            </div>
        </form>
    </div>
</div>
