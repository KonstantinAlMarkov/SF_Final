<div class="container justify-content-center h-100 d-flex">
    <div class="jumbotron my-auto jumbo">
        <div class="form" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="program_id" value="<?php echo $data['program']['program_id'];?>">
            <div class="form-group">
                <label for="programNameField">НАЗВАНИЕ ПРОГРАММЫ:</label>
                <input type="text" class="form-control" name="program_name" id="programNameField" placeholder="Название программы" value="<?php echo $data['program']['program_name'];?>" <?php if(strcasecmp($userRole,"Вебмастер")==0){ echo 'readonly';} ?> required>
            </div>
            <div class="form-group">
                <label for="programReview">ОПИСАНИЕ:</label>
                <textarea class="form-control" rows="3" name="program_description" id="programReview" placeholder="Описание" value="<?php echo $data['program']['description'];?>" <?php if(strcasecmp($userRole,"Вебмастер")==0){ echo 'readonly';} ?> ></textarea>
            </div>
            <div class="form-group">
                <label for="programPrice">СТОИМОСТЬ ПЕРЕХОДА, руб:</label>
                <input type="text" class="form-control" id="programPrice" name="program_price" placeholder="Стоимость перехода" value="<?php echo $data['program']['price'];?>" <?php if(strcasecmp($userRole,"Вебмастер")==0){ echo 'readonly';} ?> required>
            </div>
            <div class="form-group">
            <label for="programURL">URL:</label>
            <input type="text" class="form-control" id="programURL" name="program_url" placeholder="Ссылка" value="<?php echo $data['program']['url'];?>" <?php if(strcasecmp($userRole,"Вебмастер")==0){ echo 'readonly';} ?> required>
            </div>           
            <?php if(strcasecmp($userRole,"Вебмастер")==0 && $data['isGetted']): ?> 
                <div class="form-group">
                    <label>ВАШ URL:<?php echo $data['URL'];?></label>
                <div>
            <?php endif;?>            
            <div class="row justify-content-center" id="programImageRow">
                <img src="./data/uploads/<?php echo $data['program']['image'];?>" class="img-fluid rounded-circle" alt="userImage" id="programImage">
            </div>
            Загрузите вашу картинку: <br /><input name="program_image" type="file" <?php if(strcasecmp($userRole,"Вебмастер")==0){ echo 'disabled';} ?> disabled>
            <?php if(strcasecmp($userRole,"Вебмастер")==0): ?> 
                <div class="row justify-content-center" id="buttonsRow">
                    <a class="btn btn-danger navbar-btn cancel" href="?page=5" >Назад</a>   
                    <?php if($data['isGetted']): ?>     
                        <button type="submit" class="btn btn-success save" disabled>Отписаться</button>
                    <?php endif;?> 
                    <?php if(!$data['isGetted']): ?>
                        <a class="btn btn-success navbar-btn" href="?page=8&program_id=<?php echo $data['program']['program_id'];?>">Подписаться</a>  
                    <?php endif;?>                
                </div>
            <?php endif;?>
            <?php if(strcasecmp($userRole,"Клиент")==0): ?> 
                <div class="row justify-content-center" id="buttonsRow">
                    <a class="btn btn-danger navbar-btn cancel" href="?page=5">Отмена</a>    
                    <input type="submit" class="btn btn-success save"  value="Сохранить" disabled> 
                </div>
            <?php endif;?> 
        </div>
    </div>
</div>

 
