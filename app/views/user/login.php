<div class="col-md-8">
    
    <?php if (isset($_SESSION['errors']) && !is_array($_SESSION['errors'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['errors'] ?>
    </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">Вход</div>

        <div class="card-body">
            <form method="POST" action="/user/login">

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control <?php if (isset($_SESSION['errors']['email'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> name="email"  autocomplete="email" value="<?= isset($_SESSION['fields_data']['email']) ? $_SESSION['fields_data']['email'] : '' ?>">
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
                        <input id="password" type="password" class="form-control <?php if (isset($_SESSION['errors']['password'])): ?> is-invalid" autofocus<?php else: ?> " <?php endif; ?> name="password"  autocomplete="current-password" value="">
                        <?php if (isset($_SESSION['errors']['password'])): ?> 
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $_SESSION['errors']['password'][0] ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember" id="exampleFormControlInputremember">
                            <label class="custom-control-label" for="exampleFormControlInputremember">Запомнить меня</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                           Войти
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['errors'])) unset($_SESSION['errors']); ?>
<?php if (isset($_SESSION['fields_data'])) unset($_SESSION['fields_data']); ?>