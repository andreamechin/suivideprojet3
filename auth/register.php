<?php
global $prefix, $content, $error;
ob_start();?>
<div class="id-form">
    <div>S'inscrire</div>

    <div>
        <form method="POST" action="<?=$prefix?>/auth/register">
            <div>
                <label for="email">Addresse E-mail</label>

                <div>
                    <input id="email" type="email" name="email" required autocomplete="email">
                    <?php if ($error->email->status): ?>
                    <span role="alert">
                        <strong><?=$error->email->message?></strong>
                    </span>
                    <?php endif;?>
                </div>
            </div>

            <div>
                <label for="password">Mot de passe</label>

                <div>
                    <input id="password" type="password" name="password"
                        required autocomplete="new-password">

                    <?php if ($error->password->status): ?>
                    <span role="alert">
                        <strong><?=$error->password->message?></strong>
                    </span>
                    <?php endif;?>
                </div>
            </div>

            <div>
                <label for="password-confirm">Confirmez le mot
                    de passe</label>

                <div>
                    <input id="password-confirm" type="password" name="password_confirmation" required
                        autocomplete="new-password">
                </div>
            </div>

            <div>
                <div>
                    <label for="policy">En cochant cette case,
                        j'accepte la <a href="#">politique de confidentialité</a></label>

                    <input type="checkbox" name="policy" id="policy">

                    <?php if ($error->policy->status): ?>
                    <span role="alert">
                        <strong><?=$error->policy->message?></strong>
                    </span>
                    <?php endif;?>
                </div>
            </div>

            <div>
                <div>
                    <button type="submit">
                        S'inscrire
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>