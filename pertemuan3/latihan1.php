<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
    <style>
        .warna-baris {
            background-color: red;
        }
    </style>
    <title>Latihan 1</title>
</head>

<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <?php if ($i % 2 == 1) : ?>
                <tr class="warna-baris">
                <?php else : ?>
                <tr>
                    <?php  ?>
                <?php endif ?>
                <tr>
                    <?php for ($j = 1; $j < 5; $j++) : ?>
                        <td><?= "$i, $j" ?></td>
                    <?php endfor ?>
                </tr>
            <?php endfor ?>
    </table>
</body>

</html>