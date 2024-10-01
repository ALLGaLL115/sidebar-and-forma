<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
    
    <link rel="stylesheet" href="../css/cblocks/sidebar.css">
    <link rel="stylesheet" href="../css/pages/cabinet.css">
    <?php 
        if (isset($css_path)) {
            echo "<link rel='stylesheet' type='text/css' href={$css_path}>";
        }
    ?>
</head>
<body>
    <div class="cabinet__page">
        <h1>Мой кабинет</h1>
        
        <div class="cabinet__body">

            <div class="sidebar">
        
                <div class="sidebar__header">
                        <p>Алихан Галачиев</p>
                        <p>Покупатель</p>
                </div>  
                <div class="sidebar__item sidebar__item--active">Мой профиль</div>
                <div class="sidebar__item">Status Club</div>
                <div class="sidebar__item">Заказы</div><div class="sidebar__item">Избранные товары</div>  
                <div class="sidebar__item">Отзывы о товарах</div>
                <div class="sidebar__item">Выход</div>
                
            </div>


        <?php include 'app/views/'.$content_view?>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        
        <?php
            if (isset($js_path)) {
                echo "<script type='module' src={$js_path}></script>";
            }
        ?>
    </div>

</body>

</html>