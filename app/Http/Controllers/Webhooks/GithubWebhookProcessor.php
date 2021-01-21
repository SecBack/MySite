<?php

namespace App\Http\Controllers\Webhooks;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class GithubWebhookProcessor
{
    /** @var \Psr\Log\LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Validate an incoming github webhook
     *
     * @param string $knownToken Our known token that we've defined
     * @param \Illuminate\Http\Request $request
     *
     * @throws \BadRequestHttpException, \UnauthorizedException
     * @return void
     */
    protected function validateGithubWebhook($knownToken, Request $request)
    {
        if (($signature = $request->headers->get('X-Hub-Signature')) == null) {
            throw new BadRequestHttpException('Header not set');
        }

        $signatureParts = explode('=', $signature);

        if (count($signatureParts) != 2) {
            throw new BadRequestHttpException('signature has invalid format');
        }

        $knownSignature = hash_hmac('sha1', $request->getContent(), $knownToken);

        if (! hash_equals($knownSignature, $signatureParts[1])) {
            throw new UnauthorizedException('Could not verify request signature ' . $signatureParts[1]);
        }
    }


    /**
     * Entry point to our webhook handler
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        $this->validateGithubWebhook(config('app.github_webhook_secret'), $request);
        $this->logger->info('The GitHub webhook is validated');

        // Set Variables
        $LOCAL_ROOT         = "/var/www/MySite";
        $LOCAL_REPO_NAME    = "MySite";
        $LOCAL_REPO         = "{$LOCAL_ROOT}/{$LOCAL_REPO_NAME}";
        $REMOTE_REPO        = "git@github.com:SecBack/MySite.git";
        $BRANCH             = "master";

        if( file_exists($LOCAL_REPO)) {
            // If there is already a repo, just run a git pull to grab the latest changes
            shell_exec("cd {$LOCAL_REPO} && git pull");

            die("done " . mktime());
        } else {
            // If the repo does not exist, then clone it into the parent directory
            shell_exec("cd {$LOCAL_ROOT} && git clone {$REMOTE_REPO}");

            die("done " . mktime());
        }

        $this->logger->info('Repo has been pulled');
        $this->logger->info($request->getContent());
    }
}
