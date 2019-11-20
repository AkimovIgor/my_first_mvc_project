<div class="col-md-12">
    
    <!-- Вывод флеш-сообщения в случае успеха -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success'] ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['errors']) && !is_array($_SESSION['errors'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['errors'] ?>
    </div>
    <?php endif; ?>

    <div class="card" style="margin-bottom: 20px;">
        <div class="card-header"><h3>Админ панель</h3></div>

        <div class="card-body" style="overflow-x: auto;">
            <!-- Если массив с комментариями не пуст -->
            <?php if (!empty($comments)): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя</th>
                        <th>Дата</th>
                        <th>Комментарий</th>
                        <th>Действия</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Вывод комментариев с пагинацией -->
                    <?php foreach ($comments as $comment): ?>
                        <tr>
                            <td>
                                <img src="images/<?= $comment['image'] ?>" alt="" class="img-fluid" width="64" height="64">
                            </td>
                            <td><?= $comment['name'] ?></td>
                            <td><?= prettyDate($comment['date']) ?></td>
                            <td><?= $comment['text'] ?></td>
                            <td>
                                <?php if ($comment['status']): ?>
                                    <a href="/admin/disallow?id=<?= $comment['id'] ?>" class="update btn btn-warning">Запретить</a>
                                <?php else: ?>
                                    <a href="/admin/allow?id=<?= $comment['id'] ?>" class="update btn btn-success">Разрешить</a>
                                <?php endif; ?>
                        
                                <a href="/admin/delete?id=<?= $comment['id'] ?>" onclick="return confirm('Вы точно хотите удалить этот комментарий?')" class="delete btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Если комментарии в таблице отсутствуют -->
            <?php else: ?>
                <span>Комментариев пока нет.</span>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Пагинация -->
<?php if ($pagination->countPages > 1): ?>
<div class="col-md-12 mt-3" id="comments-pagination">
    <?= $pagination ?>
</div>
<?php endif; ?>

<?php if (isset($_SESSION['errors'])) unset($_SESSION['errors']); ?>
<?php if (isset($_SESSION['success'])) unset($_SESSION['success']); ?>
<?php if (isset($_SESSION['fields_data'])) unset($_SESSION['fields_data']); ?>