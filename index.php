<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/reset.css">
   <link rel="stylesheet" href="./css/css.css">
   <title>Скачать книгу.ру</title>
   <script src="./js/app.js" defer></script>
</head>
<?php
include 'function.php';

$lengthGet = strlen(htmlspecialchars($_GET['url-books']));

if ($lengthGet > 20) {
   $urlBooks = htmlspecialchars($_GET['url-books']);
   $arrBooks = checkUrl($urlBooks);
} else {
   function asd($lengthGet)
   {
      echo "Строка равна: qwe  " . $lengthGet;
   }
}

if (isset($_POST['checkbox123'])) {
   mkdir('book', 0777);
   isCheckbox($_POST['checkbox123'], $arrBooks);
}

?>


<body>
   <div class="wrapper">
      <header class="header">
         <a href='/' class="header__text">Скачать книгу.ру</a>
      </header>
      <div class="block-underline"></div>
      <main class="main">
         <div class="container">
            <div class="main__left-sect">
               <form class="input-url" action="">
                  <div class="input-url__text">Введите ссылку для скачавания</div>
                  <input class="input-url__url" value="https://fantworld.org/2580-igra-topa-pavel-vjach.html" type="text" name='url-books' autocomplete="off" placeholder="https://fantworld.org/2633-korm-2-fastfud-artem-kamenistyj.html">
                  <?php
                  if ($lengthGet < 20 && $lengthGet != 0) {
                     echo " <span class='warning-text'>Введите корректную ссылку</span>";
                  }
                  ?>

                  <button type="submit" class="btn">Поиск</button>
               </form>
               <button id='download-btn-file' class="btn" name="searchedResultBtn" form="searchedResult">Скачать выбранные файлы</button>
            </div>
            <div class="main__right-sect">
               <div class="searched-text">Найденные файлы</div>
               <button id='btnChoiseAllCheckboxJS' class="btn btn--small">Выбрать всё</button>
               <form id='searchedResult' class="searched-file" action="" method="POST">
                  <?php
                  if ($arrBooks) {
                     foreach ($arrBooks as $item) {
                        echo '<span class="searched-file-item">
                           <input name="checkbox123[]" data="' . $item['file'] . '" id="' . $item['title'] . '" type="checkbox" value ="' . $item['title'] . '">
                           <label for="' . $item['title'] . '">' . $item['title'] . ': &nbsp;' . $item['name'] . '' . '</label>
                        </span>';
                     }
                  } elseif (!$arrBooks && $lengthGet > 20) {
                     echo "<span class='search-text'>По данной ссылке ничего не найдено</span>";
                  } else {
                     echo "Тут будут результаты)";
                  }
                  ?>
               </form>
            </div>
         </div>
      </main>
   </div>
</body>

</html>