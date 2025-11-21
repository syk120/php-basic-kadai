<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>
    <p>
        <?php
            $array = [15, 4, 18, 23, 10];

            function sort_2way($array, $order) {
                if ($order === true) {
                    echo '昇順にソートします。<br>';
                    sort($array); // 
                } else if ($order === false) {
                    echo '降順にソートします。<br>';
                    rsort($array); 
                }
                return $array; 
            }

            // 昇順
            $asc_array = sort_2way($array, true);
            foreach ($asc_array as $value) {
                echo $value . '<br>';
            }

            // 降順
            $desc_array = sort_2way($array, false);
            foreach ($desc_array as $value) {
                echo $value . '<br>';
            }
            ?>
    </p>
</body>

</html>