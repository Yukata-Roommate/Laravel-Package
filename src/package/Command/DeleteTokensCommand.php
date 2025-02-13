<?php

namespace YukataRm\Laravel\Package\Command;

use YukataRm\Laravel\Command\BaseCommand;

use YukataRm\Laravel\Auth\Model\EmailResetToken;
use YukataRm\Laravel\Facade\Db;

/**
 * Delete Tokens Command
 *
 * @package YukataRm\Laravel\Package\Command
 */
class DeleteTokensCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "token:delete";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Delete expired tokens";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void {}

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * run command process
     *
     * @return array<mixed>
     */
    protected function process(): array
    {
        $emailResetTokens = EmailResetToken::all();

        $count = $emailResetTokens->count();

        if ($count === 0) return ["count" => $count];

        Db::execute(function () use ($emailResetTokens) {
            foreach ($emailResetTokens as $emailResetToken) {
                if (!$emailResetToken->isExpired()) continue;

                $emailResetToken->delete();
            }
        });

        return ["count" => $count];
    }
}
