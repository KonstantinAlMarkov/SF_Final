<div class="container justify-content-center h-100 d-flex">
    <div class="jumbotron my-auto jumbo">
        <form id="app-login-form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="programNameField">НАЗВАНИЕ ПРОГРАММЫ:</label>
                <input type="text" class="form-control" name="program_name" id="programNameField" placeholder="Название программы" required>
            </div>
            <div class="form-group">
                <label for="programReview">ОПИСАНИЕ:</label>
                <textarea class="form-control" rows="3" id="programReview" name="program_description" placeholder="Описание"></textarea>
            </div>
            <div class="form-group">
                <label for="programPrice">СТОИМОСТЬ ПЕРЕХОДА, руб:</label>
                <input type="text" class="form-control" id="programPrice" name="program_price" placeholder="Стоимость перехода" required>
            </div>
            <div class="form-group">
            <label for="programURL">URL:</label>
            <input type="text" class="form-control" id="programURL" name="program_url" placeholder="Ссылка" required>
            </div>
            Загрузите вашу картинку: <br /><input name="program_image" type="file">
            <div class="row justify-content-center" id="buttonsRow">
                <a class="btn btn-danger navbar-btn cancel" href="?page=5">Отмена</a>       
                <input type="submit" class="btn btn-success save"  value="Сохранить">
            </div>
        </form>
    </div>
</div>