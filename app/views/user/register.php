

<div class="col-md-8">

    <?php if (isset($_SESSION['errors']) && !is_array($_SESSION['errors'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['errors'] ?>
    </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">Регистрация</div>

        <div class="card-body">
            <form method="POST" action="/user/register">

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control <?php if (isset($_SESSION['errors']['name'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> name="name" value="<?= isset($_SESSION['fields_data']['name']) ? $_SESSION['fields_data']['name'] : '' ?>">
                            <?php if (isset($_SESSION['errors']['name'])): ?> 
                                <span class="invalid-feedback" role="alert">
                                    <strong><?= $_SESSION['errors']['name'][0] ?></strong>
                                </span>
                            <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control <?php if (isset($_SESSION['errors']['email'])): ?>is-invalid" autofocus<?php else: ?> " <?php endif; ?> name="email" value="<?= isset($_SESSION['fields_data']['email']) ? $_SESSION['fields_data']['email'] : '' ?>">
                        <?php if (isset($_SESSION['errors']['email'])): ?> 
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $_SESSION['errors']['email'][0] ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control <?php if (isset($_SESSION['errors']['password'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> name="password"  autocomplete="new-password" value="<?= isset($_SESSION['fields_data']['password']) ? $_SESSION['fields_data']['password'] : '' ?>">
                        <?php if (isset($_SESSION['errors']['password'])): ?> 
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $_SESSION['errors']['password'][0] ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Пароль ещё раз</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control <?php if (isset($_SESSION['errors']['password_confirmation'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> name="password_confirmation"  autocomplete="new-password" value="<?= isset($_SESSION['fields_data']['password_confirmation']) ? $_SESSION['fields_data']['password_confirmation'] : '' ?>">
                        <?php if (isset($_SESSION['errors']['password_confirmation'])): ?> 
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $_SESSION['errors']['password_confirmation'][0] ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Зарегистрироваться
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['errors'])) unset($_SESSION['errors']); ?>
<?php if (isset($_SESSION['fields_data'])) unset($_SESSION['fields_data']); ?>