<div class="row header justify-content-left">
    <div class="col-6  headerCol">
            <h1>Список URL вебмастеров на проверку:</h1>
    </div>
    </div>
    <div class="row fileListH ">
        <div class="col-12 justify-content-left">
             <h2>Список URL с подпиской:</h2>
             <hr>
        <div>
    </div>
    <div class="row no-gutters urlRow">
        <!-- генерация галереи из фалов -->
        <?php if (!count($data)): ?>
            <h3>URL для проверки в БД пока что нет</h3>
        <?php endif; ?>
        <?php if (count($data['Urls'])): ?> 
            <?php foreach($data['Urls'] as $URL):?>  
                <div class="col-4  d-flex justify-content-center my-auto imgCol">
                    <a href="<?php echo $URL['link'];?>" title="Перейти по ссылке"><?php echo $URL['link'];?>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif;?>            
    </div>
    <hr>
    <div class="row fileListH ">
        <div class="col-12 justify-content-center">
             <h2>Список URL без подписки:</h2>
             <hr>
        <div>
        <div class="row no-gutters fraudRow">
            <div class="col-4  d-flex justify-content-center my-auto imgCol">
                <a href="/index.php?page=9&webm=11&prg=71&url=http://ya.ru" title="Перейти по ссылке">/index.php?page=9&webm=11&prg=71&url=http://ya.ru
                    </a>
            </div>
        </div>
    </div>
</div>