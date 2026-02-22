<?php
/**
 * Template Name: Terms of Use Page
 *
 * Website Terms of Use.
 * Matches CONTENT.md Section 8B.
 *
 * @package BMG_Theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Dynamic variables.
$effective_date = get_theme_mod( 'bmg_privacy_effective_date', '[Effective Date]' );
$address_street = get_theme_mod( 'bmg_address_street', '[Street Address]' );
$address_city   = get_theme_mod( 'bmg_address_city', 'Yuma, AZ [ZIP]' );
$phone_display  = get_theme_mod( 'bmg_phone', '(000) 000-0000' );
$phone_link     = preg_replace( '/[^0-9+]/', '', $phone_display );
$email          = get_theme_mod( 'bmg_email', 'info@baigmedicalgroup.com' );

get_header();
?>

<main id="main" class="site-main">

	<!-- Page Header -->
	<section class="section section-dark page-header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h1 class="display-text display-4 mb-3">
						<?php esc_html_e( 'Terms of Use', 'bmg-theme' ); ?>
					</h1>
					<p class="text-muted small mb-0">
						<?php
						printf(
							/* translators: %s: effective date */
							esc_html__( 'Effective: %s', 'bmg-theme' ),
							esc_html( $effective_date )
						);
						?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Terms of Use -->
	<section class="section section-light reveal-on-scroll">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<article class="legal-content">

						<h2><?php esc_html_e( 'Agreement to Terms', 'bmg-theme' ); ?></h2>

						<p><?php esc_html_e( 'By accessing or using the Baig Medical Group website (baigmedicalgroup.com), you agree to be bound by these Terms of Use. If you do not agree, please do not use this website.', 'bmg-theme' ); ?></p>

						<h2><?php esc_html_e( 'Website Purpose and Medical Disclaimer', 'bmg-theme' ); ?></h2>

						<p><?php esc_html_e( 'This website is published by Baig Medical Group for informational purposes only. The content on this site, including text, graphics, and other material, is not intended as a substitute for professional medical advice, diagnosis, or treatment. Always seek the advice of your physician or other qualified health provider with any questions you may have regarding a medical condition.', 'bmg-theme' ); ?></p>

						<p><?php esc_html_e( 'No information on this website establishes a physician-patient relationship. A physician-patient relationship is created only through a signed membership agreement and an in-person or telehealth consultation with Dr. Adil Baig.', 'bmg-theme' ); ?></p>

						<p><?php esc_html_e( 'If you are experiencing a medical emergency, call 911 or go to the nearest emergency room immediately. Do not rely on this website for emergency medical needs.', 'bmg-theme' ); ?></p>

						<h2><?php esc_html_e( 'Intellectual Property', 'bmg-theme' ); ?></h2>

						<p><?php esc_html_e( 'All content on this website, including text, images, graphics, logos, page layout, and design, is the property of Baig Medical Group and is protected by United States copyright and trademark laws. You may not reproduce, distribute, modify, or create derivative works from any content on this site without prior written consent from Baig Medical Group.', 'bmg-theme' ); ?></p>

						<p><?php esc_html_e( 'The BMG name, BMG logo, and Baig Medical Group are trademarks of Baig Medical Group. Use of these marks without written permission is prohibited.', 'bmg-theme' ); ?></p>

						<h2><?php esc_html_e( 'Use of This Website', 'bmg-theme' ); ?></h2>

						<p><?php esc_html_e( 'You agree to use this website only for lawful purposes and in a manner that does not infringe the rights of, restrict, or inhibit anyone else\'s use of the site. You may not use this website to transmit any material that is unlawful, threatening, abusive, defamatory, or otherwise objectionable.', 'bmg-theme' ); ?></p>

						<h2><?php esc_html_e( 'Third-Party Links', 'bmg-theme' ); ?></h2>

						<p><?php esc_html_e( 'This website may contain links to external websites that are not operated by Baig Medical Group. We have no control over the content or practices of these sites and accept no responsibility for them. Inclusion of any link does not imply endorsement by Baig Medical Group.', 'bmg-theme' ); ?></p>

						<h2><?php esc_html_e( 'Limitation of Liability', 'bmg-theme' ); ?></h2>

						<p><?php esc_html_e( 'Baig Medical Group makes reasonable efforts to ensure the information on this website is accurate and current. However, we make no warranties or representations regarding the completeness, accuracy, or reliability of any content. To the fullest extent permitted by law, Baig Medical Group shall not be liable for any direct, indirect, incidental, or consequential damages arising from your use of or inability to use this website.', 'bmg-theme' ); ?></p>

						<h2><?php esc_html_e( 'Governing Law', 'bmg-theme' ); ?></h2>

						<p><?php esc_html_e( 'These Terms of Use are governed by and construed in accordance with the laws of the State of Arizona, without regard to its conflict of law provisions. Any disputes arising under these terms shall be subject to the exclusive jurisdiction of the courts located in Yuma County, Arizona.', 'bmg-theme' ); ?></p>

						<h2><?php esc_html_e( 'Changes to These Terms', 'bmg-theme' ); ?></h2>

						<p><?php esc_html_e( 'Baig Medical Group reserves the right to modify these Terms of Use at any time. Changes take effect immediately upon posting to this page. The effective date at the top of this page reflects the most recent revision. Your continued use of the website after changes are posted constitutes your acceptance of the revised terms.', 'bmg-theme' ); ?></p>

						<h2><?php esc_html_e( 'Contact', 'bmg-theme' ); ?></h2>

						<p><?php esc_html_e( 'If you have questions about these Terms of Use, contact:', 'bmg-theme' ); ?></p>

						<address class="privacy-contact-block">
							<strong><?php esc_html_e( 'Baig Medical Group', 'bmg-theme' ); ?></strong><br>
							<?php echo esc_html( $address_street ); ?><br>
							<?php echo esc_html( $address_city ); ?><br>
							<a href="tel:<?php echo esc_attr( $phone_link ); ?>"><?php echo esc_html( $phone_display ); ?></a><br>
							<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
						</address>

					</article>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
