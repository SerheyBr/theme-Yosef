<?php
/*
Template Name: contacts Page
*/
get_header();
?>
<?php get_header();?>


<main class="layout">
    <div class="container">
    <div class="layout__wrapper">
        <div class="layout__content">
        <div class="layout__breadcrumbs">
            <ul class="breadcrumbs">
            <li><a href="#">עשייה משפטית</a></li>
            <li>
                <svg
                width="10"
                height="19"
                viewBox="0 0 10 19"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    d="M7 7L3 10.5L7 14"
                    stroke="#032169"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                </svg>
            </li>
            <li><a href="#">דף הבית</a></li>
            </ul>
        </div>
        <div class="contacts">
            <img
            src="assets/images/contacts-img.png"
            alt="img"
            width="300"
            height="375"
            class="main-home__img"
            />
            <div class="contacts__body">
            <div class="contacts__title">
                <p>מבקר.ת יקר.ה</p>
                <p>
                תודה על התעניינותך באתר ובתכניו. אם יש ברצונך להעביר פנייה
                כלשהיא בנושא האתר, אנא רשום את פרטיך האישיים ואת מהות הפניה,
                אשר יועברו אל מנהל האתר.
                </p>
            </div>
            <div class="contacts__form">
                <form
                action="/testwp/#wpcf7-f40-o1"
                method="post"
                class="wpcf7-form init my-form"
                aria-label="Контактная форма"
                novalidate="novalidate"
                data-status="init"
                >
                <fieldset class="hidden-fields-container">
                    <input type="hidden" name="_wpcf7" value="40" /><input
                    type="hidden"
                    name="_wpcf7_version"
                    value="6.1"
                    /><input
                    type="hidden"
                    name="_wpcf7_locale"
                    value="ru_RU"
                    /><input
                    type="hidden"
                    name="_wpcf7_unit_tag"
                    value="wpcf7-f40-o1"
                    /><input
                    type="hidden"
                    name="_wpcf7_container_post"
                    value="0"
                    /><input
                    type="hidden"
                    name="_wpcf7_posted_data_hash"
                    value=""
                    />
                </fieldset>
                <p>
                    <label>
                    Ваше имя<br />
                    <span
                        class="wpcf7-form-control-wrap"
                        data-name="your-name"
                        ><input
                        size="40"
                        maxlength="400"
                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                        aria-required="true"
                        aria-invalid="false"
                        placeholder="name"
                        value=""
                        type="text"
                        name="your-name"
                    /></span>
                    </label>
                </p>
                <p>
                    <label>
                    Ваш e-mail<br />
                    <span
                        class="wpcf7-form-control-wrap"
                        data-name="your-email"
                        ><input
                        size="40"
                        maxlength="400"
                        class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email"
                        aria-required="true"
                        aria-invalid="false"
                        placeholder="email"
                        value=""
                        type="email"
                        name="your-email"
                    /></span>
                    </label>
                </p>
                <p>
                    <label>
                    Ваше сообщение (не обязательно)<br />
                    <span
                        class="wpcf7-form-control-wrap"
                        data-name="your-message"
                    >
                        <textarea
                        cols="40"
                        rows="10"
                        maxlength="2000"
                        class="wpcf7-form-control wpcf7-textarea"
                        aria-invalid="false"
                        placeholder="your message"
                        name="your-message"
                        ></textarea>
                    </span>
                    </label>
                </p>

                <p>
                    <input
                    class="wpcf7-form-control wpcf7-submit has-spinner"
                    type="submit"
                    value="Отправить"
                    /><span class="wpcf7-spinner"></span>
                </p>
                <div class="wpcf7-response-output" aria-hidden="true"></div>
                </form>
            </div>
            </div>
        </div>
        </div>

        <div class="layout__sidebar">
        <div class="sidebar-featured-topics">
            <p class="sidebar-featured-topics__title">
            נושאים נבחרים מתוך האתר
            </p>
            <ul>
            <li>
                <a href="#"><p>חקירת סיבת המוות</p> </a>
            </li>
            <li>
                <a href="#"><p>יו”ר הוועדה הבוחנת</p> </a>
            </li>
            <li>
                <a href="#"><p>עברות המתה - מאמר</p> </a>
            </li>
            <li>
                <a href="#"><p>כנסי לשכת עורכי הדין</p> </a>
            </li>
            <li>
                <a href="#"><p>שיח זכויות מול שיח ראיות</p> </a>
            </li>
            <li>
                <a href="#"><p>המשפט הפלילי</p> </a>
            </li>
            <li class="sidebar-featured-topics__book">
                <a href="#">
                <p>עברות המתה - הספר</p>
                <img
                    src="assets/images/book.png"
                    class="sidebar-featured-topics__img"
                    alt="book"
                    width="274"
                    height="156"
                />
                </a>
            </li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</main>

<?php get_footer(); ?>