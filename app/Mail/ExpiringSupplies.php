<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-ext/mail.
 *
 * @link     https://github.com/hyperf-ext/mail
 * @contact  eric@zhu.email
 * @license  https://github.com/hyperf-ext/mail/blob/master/LICENSE
 */
namespace App\Mail;

use App\Model\Supply;
use Hyperf\Database\Model\Collection;
use HyperfExt\Mail\Mailable;

class ExpiringSupplies extends Mailable
{
    /** @var Collection<Supply> */
    private Collection $supplies;

    /**
     * Create a new message instance.
     * @param Collection<Supply> $supplies
     */
    public function __construct(Collection $supplies)
    {
        $this->supplies = $supplies;
    }

    /**
     * Build the message.
     */
    public function build(): void
    {
        $this->subject(trans('messages.expiring_supplies'));
        $this->htmlView('emails.supplies.expiring')
            ->with('supplies', $this->supplies);
    }
}
