<?php

/**
 * The Header for our theme.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/favicon/safari-pinned-tab.svg" color="#D64936">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#F7F4F0">
	<!-- end favicon -->
	<script src="<?php echo get_template_directory_uri() . '/assets/jquery.min.js'?>"></script>



	<!-- <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
			<script>
			hbspt.forms.create({
				region: "na1",
				portalId: "40109439",
				formId: "59e92c80-c392-47d8-9ce4-d66e67239101"
			});
			</script> -->


	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start':

					new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],

				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =

				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);

		})(window, document, 'script', 'dataLayer', 'GTM-WWDLML2C');
	</script>
	<!-- End Google Tag Manager -->

	<!-- GA4 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-CCYND841ET"></script>
	<script>
		if (location.hostname !== "localhost" || location.hostname !== "127.0.0.1") {
			window.dataLayer = window.dataLayer || [];

			function gtag() {
				dataLayer.push(arguments);
			}
			gtag('js', new Date());
			gtag('config', 'G-CCYND841ET');
		}
	</script>

	<!-- linkedin -->
	<script type="text/javascript">
		_linkedin_partner_id = "1927161";
		window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
		window._linkedin_data_partner_ids.push(_linkedin_partner_id);
	</script>
	<script type="text/javascript">
		if (location.hostname !== "localhost" || location.hostname !== "127.0.0.1") {
			(function() {
				var s = document.getElementsByTagName("script")[0];
				var b = document.createElement("script");
				b.type = "text/javascript";
				b.async = true;
				b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
				s.parentNode.insertBefore(b, s);
			})();
		}
	</script>

	<!-- Hotjar Tracking Code for CorSource -->
	<script>
		(function(h, o, t, j, a, r) {
			h.hj = h.hj || function() {
				(h.hj.q = h.hj.q || []).push(arguments)
			};
			h._hjSettings = {
				hjid: 3631324,
				hjsv: 6
			};
			a = o.getElementsByTagName('head')[0];
			r = o.createElement('script');
			r.async = 1;
			r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
			a.appendChild(r);
		})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
	</script>
	<!-- END Tracking scripts -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WWDLML2C" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<noscript>
		<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=1927161&fmt=gif" />
	</noscript>

	<!-- DESKTOP -->
	<div class="background-color-band" style="background-color: <?php the_field('header_background_color') ?>">
		<div class="navigation-menu-wrapper">
			<a class="nav-icon" href="<?php echo site_url('/'); ?>">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/navigation/logo.svg" />
			</a>
			<?php
			wp_nav_menu(array(
				'menu' => 'navigation',
				'theme_location' => 'navigation',
				'menu_class' => 'navigation-menu',
				'sort_order' => 'DESC'
			));
			?>
			<a href="<?php echo home_url() . '/employee-login'; ?>" class="btn_red nav-button">Employee Login</a>
		</div>

	</div>

	<!-- MOBILE -->
	<div class="navigation-menu-wrapper-mobile" style="background-color: <?php the_field('header_background_color') ?>!important">
		<div class="mobile-container">
			<div class="hamburger-and-image-wrapper">
				<a href="<?php echo site_url('/'); ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/navigation/logo.svg" />
				</a>
				<div id="myBtn" class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="navigation-menu">
				<?php
				wp_nav_menu(array(
					'menu' => 'navigation',
					'theme_location' => 'navigation',
					'sort_order' => 'DESC'
				));
				?>
				<a href="<?php echo home_url() . '/employee-login'; ?>" class="btn_red">Employee Login</a>

			</div>
		</div>
	</div>

	<div id="page" class="hfeed site">
		<!-- MODAL -->
		<div class="modal" id="modal-one">
			<div class="modal-bg modal-exit"></div>
			<div class="modal-container">
				<div class="modal-container__top">
					<h3>Contact Us</h3>
					<p class="subtitle">Tell us a little bit about yourself and what you would like to discuss.</p>
				</div>
				<div class="modal-container__body">

					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
					<script>
					hbspt.forms.create({
						region: "na1",
						portalId: "40109439",
						formId: "922f3319-a260-4da5-b3ca-2e9f4b807f3d"
					});
					</script>


					<p class="modal-in-touch minor">We will be in touch within one business day.</p>
				</div>

				<button class="modal-close modal-exit contact-navigation-close">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/modal/modal-x.svg" />
				</button>
			</div>
		</div>
		<!-- END MODAL -->


		<!--Contact Navigation ModalL -->
		<div class="contact-navigation-modal" id="contact-navigation-modal-id">
			<div class="modal-bg modal-exit"></div>
			<div class="modal-container">
				<div class="modal-container__top">
					<h3 class="help-us-desktop">Help us understand<br> what you are interested in:</h3>
					<h3 class="help-us-mobile">Help us understand what you are interested in:</h3>
					<div class="contact-nav-button-wrapper">
						<a href="/clients-contact" class="btn_red" >I am looking for help with a project </a>
						<a href="/consultants-contact" class="btn_red">I am looking for a consulting opportunity</a>
						<a href="/general-contact" class="btn_red">I have a general inquiry</a>
					</div>

				</div>
				<div class="modal-container__body">

				</div>

				<button class="modal-close modal-exit">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/modal/modal-x.svg" />
				</button>
			</div>
		</div>
		<!-- END Contact Navigation -->

		<main id="main" class="site-main wrap" role="main">