<?php

namespace App\Handlers;

use http\Env\Response;
use Slim\Handlers\AbstractHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class NotFoundHandler extends AbstractHandler
{
    protected $view;


    public function __construct(Twig $view)
    {
        $this->view = $view;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        $contentType = $this->determineContentType($request);
        switch ($contentType) {
            case 'application/json':
                $output = $this->renderNotFoundJson($response);
                break;

            case 'text/html':
                $output = $this->renderNotFoundHtml($response);
                break;
        }
        return $output->withStatus(404);
    }


    protected function renderNotFoundJson($response)
    {
        return $response->withJson([
            'error' => 'Not Found'
        ]);
    }

    protected function renderNotFoundHtml($response)
    {
        return $this->view->render($response, 'errors/404.twig');
    }

}