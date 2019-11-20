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

    <div class="card">
        <div class="card-header"><h3>Комментарии</h3></div>
        <div class="card-body">
            <!-- Если таблица с комментарими не пуста -->
            <?php if (!empty($comments)): ?>
                <!-- Вывод данных каждого комментария -->
                <?php foreach ($comments as $comment): ?>
                    <div class="media">
                        <img src="images/<?= $comment['image'] ?>" class="mr-3" alt="..." width="64" height="64">
                        <div class="media-body">
                            <h5 class="mt-0"><?= $comment['name'] ?></h5> 
                            <span><small><?= prettyDate($comment['date']) ?></small></span>
                            <p>
                                <?= $comment['text'] ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <!-- Если комментарии в таблице отсутствуют -->
            <?php else: ?>
                <span id="no-comments">Комментариев пока нет.</span>
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

<div class="col-md-12">
    <?php if (isset($_SESSION['user']) || isset($_COOKIE['user'])): ?>
    <div class="card">
        <div class="card-header"><h3>Оставить комментарий</h3></div>
        
        <div class="card-body">
            <form action="/store" method="POST">
                <div class="form-group">
                    <input type="hidden" name="user_id" class="form-control" value="<?= isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : $_COOKIE['user']['id'] ?>">
                </div>
                <div class="form-group has-error">
                    <label for="exampleFormControlTextarea2">Сообщение</label>
                    <textarea name="text" id="exampleFormControlTextarea2" rows="3" class="form-control <?php if (isset($_SESSION['errors']['text'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?>></textarea>
                    <!-- Вывод флеш-сообщения -->
                    <?php if (isset($_SESSION['errors']['text'])): ?>
                        <span class="invalid-feedback">
                            <strong><?= $_SESSION['errors']['text'][0] ?></strong>
                        </span>
                    <?php endif; ?>
                </div>
              <button type="submit" class="btn btn-success">Отправить</button>
            </form>
        </div>
    </div>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            Чтобы оставить комментарий, <a href="/user/login" class="alert-link">авторизуйтесь</a>.
        </div>
    <?php endif; ?>
</div>

<?php if (isset($_SESSION['errors'])) unset($_SESSION['errors']); ?>
<?php if (isset($_SESSION['success'])) unset($_SESSION['success']); ?>
<?php if (isset($_SESSION['fields_data'])) unset($_SESSION['fields_data']); ?>

