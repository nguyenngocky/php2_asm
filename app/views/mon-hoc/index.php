<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Mã môn</th>
                <th>Tên môn</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($subjects as $sub): ?>
            <tr>
                <td><?= $sub->id ?></td>
                <td><?= $sub->name ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>