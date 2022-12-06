<?php

include 'simple_html_dom.php';

function checkUrl($urlBooks)
{
   if (isset($urlBooks) && strlen($urlBooks) > 10) {
      $html = new simple_html_dom();
      $html->load_file($urlBooks);

      $h1 = implode($html->find('h1'));
      $scripts = $html->find('[text/javascript]');

      $arr = []; // Массив всех скриптов с сайта
      foreach ($scripts as $item) {
         array_push($arr, $item);
      }
      $strArr = implode($arr);

      preg_match_all('/\{"title":"[0-9]+","file":"[a-z0-9A-Z.\/:\-_\%"]+"\}/', $strArr, $match);
      $resultArrayBooks = []; // Готовый массив с файлами

      foreach ($match[0] as $item) {
         $resultSplite = explode('"', $item);
         array_push($resultArrayBooks, ['name' => $h1, 'title' => $resultSplite[3], 'file' => $resultSplite[7]]);
      }
      return $resultArrayBooks;
   } else {
      echo 'Какая-то ошибка';
   }
}

function isCheckbox($arrCheckbox, $mainArrayUrl)
{
   foreach ($arrCheckbox as $c) {
      foreach ($mainArrayUrl as $m) {
         if ($c == $m['title']) {
            downloadBooks($m['title'], $m['file']);
         }
      }
   }
}

function downloadBooks($title, $receivedFile)
{
   $fileUrl = $receivedFile; // ссылка на файл 'file'
   $savePath = 'book/' . $title . '.mp3'; // 'title'
   $file = file_get_contents($fileUrl);
   file_put_contents($savePath, $file);
}
