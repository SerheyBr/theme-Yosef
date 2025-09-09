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
                <!-- <div class="layout__breadcrumbs"> -->
                    <?php
                    //  my_breadcrumbs();
                     ?>
                     
                <!-- </div> -->
                 <h2 class='page-title'>יצירת קשר</h2>
                <div class="contacts">
                    <img
                    src="<?php the_field('contact_image') ;?>"
                    alt="img"
                    width="300"
                    height="375"
                    class="main-home__img"
                    />
                    <div class="contacts__body">
                        <div class="contacts__title">
                           <?php the_field('contact_text') ;?>
                        </div>
                        <div class="contacts__form">
                            <?php echo do_shortcode('[contact-form-7 id="9eda07a" title="Contact form 1" html_class="my-form" html_dir="rtl]'); ?>
                            <!-- <form
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
                                    />
                                    <input
                                    type="hidden"
                                    name="_wpcf7_locale"
                                    value="ru_RU"
                                    />
                                    <input
                                    type="hidden"
                                    name="_wpcf7_unit_tag"
                                    value="wpcf7-f40-o1"
                                    />
                                    <input
                                    type="hidden"
                                    name="_wpcf7_container_post"
                                    value="0"
                                    />
                                    <input
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
                                    >
                                    <input
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
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>

        <div class="layout__sidebar">
           <?php get_sidebar() ;?>
        </div>
    </div>
    </div>
</main>

<?php get_footer(); ?>