<?php
/**
 * Template Name: Privacy Policy Page
 *
 * HIPAA Notice of Privacy Practices + Website Privacy Policy.
 * Matches CONTENT.md Sections 8.1–8.3.
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
						<?php esc_html_e( 'Privacy Policy & HIPAA Notice', 'bmg-theme' ); ?>
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

	<!-- HIPAA Notice of Privacy Practices -->
	<section class="section section-light reveal-on-scroll">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<article class="legal-content">

						<h2><?php esc_html_e( 'Notice of Privacy Practices — Baig Medical Group', 'bmg-theme' ); ?></h2>

						<p><em><?php esc_html_e( 'This notice describes how medical information about you may be used and disclosed, and how you can access this information. Please review it carefully.', 'bmg-theme' ); ?></em></p>

						<h3><?php esc_html_e( 'Our Responsibilities', 'bmg-theme' ); ?></h3>

						<p><?php esc_html_e( 'We are required by law to maintain the privacy of your protected health information (PHI), provide you with this notice of our legal duties and privacy practices, and follow the terms of the notice currently in effect.', 'bmg-theme' ); ?></p>

						<h3><?php esc_html_e( 'How We Use and Disclose Your Health Information', 'bmg-theme' ); ?></h3>

						<p><?php esc_html_e( 'We may use and disclose your PHI for the following purposes:', 'bmg-theme' ); ?></p>

						<p><strong><?php esc_html_e( 'Treatment', 'bmg-theme' ); ?></strong> — <?php esc_html_e( 'To provide, coordinate, and manage your medical care. This includes sharing information with specialists, laboratories, and other providers involved in your care.', 'bmg-theme' ); ?></p>

						<p><strong><?php esc_html_e( 'Payment', 'bmg-theme' ); ?></strong> — <?php esc_html_e( 'To obtain reimbursement for services provided, including billing your insurance carrier and communicating with third-party payers.', 'bmg-theme' ); ?></p>

						<p><strong><?php esc_html_e( 'Healthcare Operations', 'bmg-theme' ); ?></strong> — <?php esc_html_e( 'To support the business activities of the practice, including quality improvement, staff training, compliance auditing, and business management.', 'bmg-theme' ); ?></p>

						<p><strong><?php esc_html_e( 'With Your Authorization', 'bmg-theme' ); ?></strong> — <?php esc_html_e( 'For purposes not described above, we will obtain your written authorization before using or disclosing your PHI. You may revoke authorization at any time in writing.', 'bmg-theme' ); ?></p>

						<h3><?php esc_html_e( 'Your Rights', 'bmg-theme' ); ?></h3>

						<ul>
							<li><?php esc_html_e( 'Access and obtain a copy of your health records', 'bmg-theme' ); ?></li>
							<li><?php esc_html_e( 'Request corrections to your health information', 'bmg-theme' ); ?></li>
							<li><?php esc_html_e( 'Request restrictions on certain uses and disclosures', 'bmg-theme' ); ?></li>
							<li><?php esc_html_e( 'Request confidential communications (e.g., contact at an alternate address or phone number)', 'bmg-theme' ); ?></li>
							<li><?php esc_html_e( 'Receive an accounting of disclosures made for purposes other than treatment, payment, or operations', 'bmg-theme' ); ?></li>
							<li><?php esc_html_e( 'Receive a paper copy of this notice upon request', 'bmg-theme' ); ?></li>
						</ul>

						<h3><?php esc_html_e( 'Breach Notification', 'bmg-theme' ); ?></h3>

						<p><?php esc_html_e( 'We will notify you promptly if a breach of your unsecured PHI occurs, as required by federal law.', 'bmg-theme' ); ?></p>

						<h3><?php esc_html_e( 'Contact', 'bmg-theme' ); ?></h3>

						<p><?php esc_html_e( 'To exercise any of these rights or to file a complaint, contact:', 'bmg-theme' ); ?></p>

						<address class="privacy-contact-block">
							<strong><?php esc_html_e( 'Privacy Officer', 'bmg-theme' ); ?></strong><br>
							<?php esc_html_e( 'Baig Medical Group', 'bmg-theme' ); ?><br>
							<?php echo esc_html( $address_street ); ?><br>
							<?php echo esc_html( $address_city ); ?><br>
							<a href="tel:<?php echo esc_attr( $phone_link ); ?>"><?php echo esc_html( $phone_display ); ?></a><br>
							<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
						</address>

						<p><?php esc_html_e( 'You may also file a complaint with the U.S. Department of Health and Human Services Office for Civil Rights.', 'bmg-theme' ); ?></p>

					</article>
				</div>
			</div>
		</div>
	</section>

	<!-- Website Privacy Policy -->
	<section class="section section-light reveal-on-scroll">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<article class="legal-content">

						<h2><?php esc_html_e( 'Website Privacy Policy', 'bmg-theme' ); ?></h2>

						<h3><?php esc_html_e( 'Information We Collect', 'bmg-theme' ); ?></h3>

						<p><?php esc_html_e( 'When you use this website, we may collect: your name, email address, phone number, and other information you voluntarily provide through forms. We also collect standard technical data such as browser type, IP address, and pages visited through cookies and server logs.', 'bmg-theme' ); ?></p>

						<h3><?php esc_html_e( 'How We Use This Information', 'bmg-theme' ); ?></h3>

						<p><?php esc_html_e( 'Information submitted through website forms is used to respond to your inquiry or process your enrollment application. Technical data is used to maintain site security, improve performance, and understand usage patterns.', 'bmg-theme' ); ?></p>

						<h3><?php esc_html_e( 'Third-Party Services', 'bmg-theme' ); ?></h3>

						<p><?php esc_html_e( 'This website uses the following third-party services that may collect data in accordance with their own privacy policies:', 'bmg-theme' ); ?></p>

						<ul>
							<li><?php esc_html_e( 'Payment processing: Authorize.net (PCI-DSS compliant)', 'bmg-theme' ); ?></li>
							<li><?php esc_html_e( 'Form handling: Gravity Forms (data stored on-site)', 'bmg-theme' ); ?></li>
						</ul>

						<h3><?php esc_html_e( 'Data Security', 'bmg-theme' ); ?></h3>

						<p><?php esc_html_e( 'All data transmitted through this website is encrypted via TLS (HTTPS). Form submissions containing personal information are stored in encrypted databases with access restricted to authorized personnel.', 'bmg-theme' ); ?></p>

						<h3><?php esc_html_e( 'Your Choices', 'bmg-theme' ); ?></h3>

						<p>
							<?php
							printf(
								/* translators: 1: email address, 2: phone number */
								esc_html__( 'You may decline to submit information through this website. If you have questions about data we have collected, contact us at %1$s or %2$s.', 'bmg-theme' ),
								'<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>',
								'<a href="tel:' . esc_attr( $phone_link ) . '">' . esc_html( $phone_display ) . '</a>'
							);
							?>
						</p>

						<h3><?php esc_html_e( 'Changes to This Policy', 'bmg-theme' ); ?></h3>

						<p><?php esc_html_e( 'We may update this policy from time to time. The effective date at the top of this page reflects the most recent revision.', 'bmg-theme' ); ?></p>

					</article>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
