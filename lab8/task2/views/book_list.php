<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Книги</title>
</head>

<body>
    <?php include 'search_form.php'; ?>
    <table>
        <thead>
            <tr>
                <th>Назва</th>
                <th>Опис</th>
                <th>Рік видання</th>
                <th>Кількість сторінок</th>
                <th>Автор</th>
                <th>Фото обкладинки</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= htmlspecialchars($book['title']) ?></td>
                    <td><?= htmlspecialchars($book['description']) ?></td>
                    <td><?= htmlspecialchars($book['year_of_publication']) ?></td>
                    <td><?= htmlspecialchars($book['pages']) ?></td>
                    <td><?= htmlspecialchars($book['first_name'] . ' ' . $book['last_name']) ?></td>
                    <td>
                        <?php if ($book['cover_image']): ?>
                            <img src="assets/images/<?= htmlspecialchars($book['cover_image']) ?>" alt="Обкладинка" width="100">
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>