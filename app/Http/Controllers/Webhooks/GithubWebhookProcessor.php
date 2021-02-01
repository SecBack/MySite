<?php

namespace App\Http\Controllers\Webhooks;

use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\Process\Process;

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

        $root_path = base_path();
        $process = new Process(['cd', $root_path]);
        $process = new Process(['git', 'pull', 'origin', 'master']);
        $process->run(function ($type, $buffer) {
            echo $buffer;
            $this->logger->info($buffer);
        });

        $this->logger->info('Repo has been pulled');
        $this->logger->info($request->getContent());
    }
}
