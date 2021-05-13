<?php

namespace WPMailSMTP\Pro\Emails\Logs\Providers;

use WPMailSMTP\MailCatcherInterface;
use WPMailSMTP\Options;
use WPMailSMTP\Pro\Emails\Logs\Email;

/**
 * Class SMTP to handle saving to log emails sent by "Other SMTP" mailer.
 *
 * @since 1.5.0
 */
class SMTP {

	/**
	 * Our own implementation of the PhpMailer class.
	 *
	 * @since 1.5.0
	 *
	 * @var MailCatcherInterface
	 */
	private $mailcatcher;

	/**
	 * Preserve the cloned instance of the MailCatcher class.
	 *
	 * @since 1.5.0
	 *
	 * @param MailCatcherInterface $mailcatcher Our own implementation of the PhpMailer class.
	 *
	 * @return \WPMailSMTP\Pro\Emails\Logs\Providers\SMTP
	 */
	public function set_source( MailCatcherInterface $mailcatcher ) {

		$this->mailcatcher = clone $mailcatcher;

		return $this;
	}

	/**
	 * Save the actual email data before we got response from SMTP server about its status.
	 *
	 * @since 1.5.0
	 *
	 * @return int
	 */
	public function save_before() {

		$headers     = explode( $this->mailcatcher->get_line_ending(), $this->mailcatcher->createHeader() );
		$attachments = count( $this->mailcatcher->getAttachments() );
		$people      = $this->get_people();
		$email_id    = 0;

		try {
			$email = new Email();
			$email
				->set_subject( $this->mailcatcher->Subject )
				->set_people( $people )
				->set_headers( array_filter( $headers ) )
				->set_attachments( $attachments )
				->set_mailer( Options::init()->get( 'mail', 'mailer' ) )
				->set_status( Email::STATUS_UNSENT );

			if ( wp_mail_smtp()->pro->get_logs()->is_enabled_content() ) {
				$email
					->set_content_plain( $this->mailcatcher->ContentType === 'text/plain' ? $this->mailcatcher->Body : $this->mailcatcher->AltBody )
					->set_content_html( $this->mailcatcher->ContentType !== 'text/plain' ? $this->mailcatcher->Body : '' );
			}

			$email_id = $email->save()->get_id();
		} catch ( \Exception $e ) { // phpcs:ignore Generic.CodeAnalysis.EmptyStatement.DetectedCatch
			// Do nothing for now.
		}

		// Return the state.
		return $email_id;
	}

	/**
	 * Update the actual email data with current MailCatcher data before we got response from
	 * SMTP server about its status.
	 *
	 * @since 2.1.2
	 *
	 * @param int $email_id The ID of the email to update.
	 */
	public function update_before( $email_id ) {

		if ( empty( $email_id ) ) {
			return;
		}

		$headers     = explode( $this->mailcatcher->get_line_ending(), $this->mailcatcher->createHeader() );
		$attachments = count( $this->mailcatcher->getAttachments() );
		$people      = $this->get_people();

		try {
			$email = new Email( $email_id );
			$email
				->set_subject( $this->mailcatcher->Subject )
				->set_people( $people )
				->set_headers( array_filter( $headers ) )
				->set_attachments( $attachments );

			if ( wp_mail_smtp()->pro->get_logs()->is_enabled_content() ) {
				$email
					->set_content_plain( $this->mailcatcher->ContentType === 'text/plain' ? $this->mailcatcher->Body : $this->mailcatcher->AltBody )
					->set_content_html( $this->mailcatcher->ContentType !== 'text/plain' ? $this->mailcatcher->Body : '' );
			}

			$email->save();
		} catch ( \Exception $e ) { // phpcs:ignore Generic.CodeAnalysis.EmptyStatement.DetectedCatch
			// Do nothing for now.
		}
	}

	/**
	 * Update the status of the currently sent email.
	 *
	 * @since 1.5.0
	 *
	 * @param int  $email_id Email ID to process.
	 * @param bool $is_sent  Whether email is sent or not.
	 */
	public function save_after( $email_id, $is_sent ) {

		if ( empty( $email_id ) ) {
			return;
		}

		try {
			$email = new Email( $email_id );
			$email
				->set_status( (bool) $is_sent ? Email::STATUS_SENT : Email::STATUS_UNSENT )
				->save();
		} catch ( \Exception $e ) { // phpcs:ignore Generic.CodeAnalysis.EmptyStatement.DetectedCatch
			// Do nothing for now.
		}
	}

	/**
	 * Process the failed email sending.
	 *
	 * @since 2.1.0
	 *
	 * @param int       $email_id The Email ID.
	 * @param \WP_Error $error    The WP Error thrown in WP core: `wp_mail_failed` hook.
	 */
	public function failed( $email_id, $error ) {

		if ( empty( $email_id ) || empty( $error ) || ! is_wp_error( $error ) ) {
			return;
		}

		try {
			$email = new Email( $email_id );
			$email
				->set_error_text( $error->get_error_message() )
				->set_status( Email::STATUS_UNSENT )
				->save();
		} catch ( \Exception $e ) { //phpcs:ignore
			// Do nothing for now.
		}
	}

	/**
	 * Get the people data from the MailCatcher object.
	 *
	 * @since 2.1.2
	 *
	 * @return array
	 */
	private function get_people() {

		$people = [];

		foreach ( $this->mailcatcher->getToAddresses() as $to ) {
			$people['to'][] = $to[0];
		}
		foreach ( $this->mailcatcher->getCcAddresses() as $cc ) {
			$people['cc'][] = $cc[0];
		}
		foreach ( $this->mailcatcher->getBccAddresses() as $bcc ) {
			$people['bcc'][] = $bcc[0];
		}

		$people['from'] = $this->mailcatcher->From;

		return $people;
	}
}
