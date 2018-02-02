<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $login common\models\LoginForm */
/* @var $signup frontend\modules\account\models\SignupForm */

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-sign-in-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin() ?>

        <section class="user">
            <div class="user_options-container">
                <div class="user_options-text">
                    <div class="user_options-unregistered">
                        <h2 class="user_unregistered-title">Нет учетной записи?</h2>
                        <p class="user_unregistered-text">Банджо сумка правам велосипедов, высокой жизни портновский крей крафтовое пиво на любой стрит-арт ФАП.</p>
                        <button class="user_unregistered-signup" id="signup-button">Зарегистрируйтесь</button>
                    </div>
                    <div class="user_options-registered">
                        <h2 class="user_registered-title">Есть аккаунт?</h2>
                        <p class="user_registered-text">Банджо сумка правам велосипедов, высокой жизни портновский крей крафтовое пиво на любой стрит-арт ФАП.</p>
                        <button class="user_registered-login" id="login-button">Логин</button>
                    </div>
                </div>
                <div class="user_options-forms login-click" id="user_options-forms">
                    <div class="user_forms-login">
                        <h2 class="forms_title">Логин</h2>
                        <form class="forms_form">
                            <fieldset class="forms_fieldset">
                                <div class="forms_field">
                                    <?= $form->field($login, 'identity')->textInput(['class' => 'forms_field-input']) ?>
                                </div>
                                <div class="forms_field">
                                    <?= $form->field($login, 'password')->passwordInput(['class' => 'forms_field-input']) ?>
                                </div>
                                <?= $form->field($login, 'rememberMe')->checkbox() ?>
                            </fieldset>
                            <div class="forms_buttons">
                                <?= Html::a(Yii::t('frontend', 'Lost password'), ['sign-in/request-password-reset'], ['class' => 'forms_buttons-forgot']) ?>
                                <?= Html::submitButton(Yii::t('frontend', 'Login'), ['class' => 'forms_buttons-action']) ?>
                            </div>
                        </form>
                    </div>
                    <div class="user_forms-signup">
                        <h2 class="forms_title">Зарегистрируйтесь</h2>
                        <form class="forms_form">
                            <fieldset class="forms_fieldset">
                                <div class="forms_field">
                                    <?= $form->field($signup, 'username')->textInput(['maxlength' => true, 'class' => 'forms_field-input']) ?>
                                </div>
                                <div class="forms_field">
                                    <?= $form->field($signup, 'email')->textInput(['maxlength' => true, 'class' => 'forms_field-input']) ?>
                                </div>
                                <div class="forms_field">
                                    <?= $form->field($signup, 'password')->passwordInput(['maxlength' => true, 'class' => 'forms_field-input']) ?>
                                </div>
                                <div class="forms_field">
                                    <?= $form->field($signup, 'password_confirm')->passwordInput(['maxlength' => true, 'class' => 'forms_field-input']) ?>
                                </div>
                                <?= $form->field($signup, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
                                    'captchaAction' => '/site/captcha',
                                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                                ]) ?>
                            </fieldset>
                            <div class="forms_buttons">
                                <?= Html::submitButton(Yii::t('frontend', 'Signup'), ['class' => 'forms_buttons-action']) ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    <?php ActiveForm::end() ?>
</div>

<?php
    $this->registerCssFile('/static/css/login.css');
    $this->registerJsFile('/static/js/login.js');
?>
