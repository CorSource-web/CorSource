<?php

/**
 * Block Name: General
 *
 * This is the template that displays the general block.
 */

// create id attribute for specific styling
$id = 'general-' . $block['id'];
?>

<section id="<?php echo $id; ?>" class="general">
    <div class="container">
        <div class="general__top">
            <div class="top-left">
                <h1>Tell us a little bit about yourself and what you would like to discuss.</h1>
            </div>
            <div class="top-right">
                <p class="bold">Headquarters</p>
                <a class="address-wrapper" target="_blank" href="http://maps.google.com/?q=9115 SW Oleson Rd, Ste 100, Portland, OR 97223">
                    <p>9115 SW Oleson Rd, Ste 100</p>
                    <p>Portland, OR 97223</p>
                </a>
                <a class="phone" href="tel:5037264545">503.726.4545</a>
            </div>
        </div>
        <div class="general__body">
            <!-- <p class="we-will-be-in-touch-desktop">We will be in touch within one business day.</p> -->


            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
            <script>
            hbspt.forms.create({
                region: "na1",
                portalId: "40109439",
                formId: "59e92c80-c392-47d8-9ce4-d66e67239101"
            });
            </script>
            <p class="we-will-be-in-touch">We will be in touch within one business day.</p>

        </div>
    </div>

</section>