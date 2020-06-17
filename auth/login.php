<?php
global $prefix;
global $content;
global $error;
ob_start();?>
    <div class="id-form">
        <div>Connexion</div>
        <div>
            <form method="POST" action="<?=$prefix?>/auth/login">
                <div>
                    <label for="email">Addresse e-mail</label>

                    <div>
                        <input id="email" type="email" name="email" required autocomplete="email" autofocus>
                        <br>
                        <?php if ($error->email->status) :?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?= $error->email->message ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <div>
                        <input id="password" type="password" name="password" required autocomplete="current-password">
                        <br>
                        <?php if ($error->password->status) :?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?= $error->password->message ?></strong>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <input type="checkbox" name="remember" id="remember">

                            <label for="remember">
                                Rester connecté
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <div>
                        <button type="submit">
                            Connexion
                        </button>
                        <br>
                        <a href="<?=$prefix?>/auth/reset">
                            Mot de passe oublié ?
                        </a>
                        <br>
                        <a href="<?=$prefix?>/auth/register">
                            S'inscrire
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>