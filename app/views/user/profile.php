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
        <div class="card-header" id="profile"><h3>Профиль пользователя</h3></div>

        <div class="card-body">
            

            <form id="user_form" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInputname">Имя</label>
                            <input type="text" class="form-control<?php if (isset($_SESSION['errors']['name'])): ?> is-invalid" autofocus <?php else: ?>" <?php endif; ?>name="name" id="exampleFormControlInputname" placeholder="<?= $currentUser['name'] ?>" maxlength="15">
                            <?php if (isset($_SESSION['errors']['name'])): ?> 
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $_SESSION['errors']['name'][0] ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInputemail">Email</label>
                            <input type="email" class="form-control <?php if (isset($_SESSION['errors']['email'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> name="email" id="exampleFormControlInputemail" placeholder="<?= $currentUser['email'] ?>" maxlength="40">
                            
                                <?php if (isset($_SESSION['errors']['email'])): ?> 
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?= $_SESSION['errors']['email'][0] ?></strong>
                                    </span>
                                <?php endif; ?>
                            
                        </div>

                        <div class="form-group">
                            
                                <label for="exampleFormControlInputfile">Аватар</label>
                                
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input<?php if (isset($_SESSION['errors']['file'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> name="file" id="exampleFormControlInputfile">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                            
                            
                                <?php if (isset($_SESSION['errors']['file'])): ?> 
                                    <span class="invalid-feedback" role="alert" <?php if (isset($_SESSION['errors']['file'])): ?>style="display: block !important;"<?php endif; ?>>
                                        <strong><?= $_SESSION['errors']['file'][0] ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img id="user-image" src="/images/<?= $currentUser['image'] ?>" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-12">
                        <button  id="edit" name="edit" class="btn btn-warning">Редактировать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header" id="password"><h3>Безопасность</h3></div>

        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInputcurrent">Текущий пароль</label>
                            <input type="password" name="current" class="form-control<?php if (isset($_SESSION['errors']['current'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="exampleFormControlInputcurrent" value="<?= isset($_SESSION['fields_data']['current']) ? $_SESSION['fields_data']['current'] : '' ?>">
                            
                            <?php if (isset($_SESSION['errors']['current'])): ?> 
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $_SESSION['errors']['current'][0] ?></strong>
                                </span>
                            <?php endif; ?>
                            
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInputpassword">Новый пароль</label>
                            <input type="password" name="new_password" class="form-control<?php if (isset($_SESSION['errors']['new_password'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="exampleFormControlInputpassword" value="<?= isset($_SESSION['fields_data']['new_password']) ? $_SESSION['fields_data']['new_password'] : '' ?>">
                            
                            <?php if (isset($_SESSION['errors']['new_password'])): ?> 
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $_SESSION['errors']['new_password'][0] ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInputpassword_confirmation">Новый пароль еще раз</label>
                            <input type="password" name="new_password_confirmation" class="form-control<?php if (isset($_SESSION['errors']['new_password_confirmation'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> id="exampleFormControlInputpassword_confirmation" value="<?= isset($_SESSION['fields_data']['new_password_confirmation']) ? $_SESSION['fields_data']['new_password_confirmation'] : '' ?>">
                            
                            <?php if (isset($_SESSION['errors']['new_password_confirmation'])): ?> 
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $_SESSION['errors']['new_password_confirmation'][0] ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>

                        <button type="submit" id="edit-passw" name="edit-passw" class="btn btn-success">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['errors'])) unset($_SESSION['errors']); ?>
<?php if (isset($_SESSION['success'])) unset($_SESSION['success']); ?>
<?php if (isset($_SESSION['fields_data'])) unset($_SESSION['fields_data']); ?>