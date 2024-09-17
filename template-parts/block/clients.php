<?php

/**
 * Block Name: Clients
 *
 * This is the template that displays the clients block.
 */

// create id attribute for specific styling
$id = 'clients-' . $block['id'];
?>

<section id="<?php echo $id; ?>" class="clients">
    <div class="container">
        <div class="clients__top">
            <div class="top-left">
                <h1>CorSource is your next step to project success.</h1>
                <p>Tell us a little bit about yourself and let’s schedule time to speak about how we can make your vision a reality.</p>
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
        <div class="clients__body">
            <p class="tell-us">Tell us a little bit about yourself and what you would like to discuss.</p>

            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
            <script>
            hbspt.forms.create({
                region: "na1",
                portalId: "40109439",
                formId: "922f3319-a260-4da5-b3ca-2e9f4b807f3d"
            });
            </script>

            <p class="we-will-be-in-touch">
                We will be in touch within one business day
            </p>
        </div>
    </div>

</section>