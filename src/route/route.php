<?php

namespace Src\route;

use MF\Init\Bootstrap;

class Route extends Bootstrap
{

    protected function initRoutes(){
        $routes['allRepos'] = [
            'route' => '/all-repos',
            'controller' => 'ReposController',
            'action' => 'allRepos'
        ];

        $routes['allReposName'] = [
            'route' => '/all-repos-name',
            'controller' => 'ReposController',
            'action' => 'allReposName'
        ];

        $routes['repos'] = [
            'route' => '/repo/{nome-do-repo}',
            'controller' => 'ReposController',
            'action' => 'repos'
        ];

        $routes['repo-data'] = [ 
            'route' => '/repo-commit-date/{nome-do-repo}',
            'controller' => 'ReposController',
            'action' => 'repoCommitDate'
        ];

        $routes['repo-alphabetic'] = [
            'route' => '/repo-commit-alphabetic/{nome-do-repo}',
            'controller' => 'ReposController',
            'action' => 'repoCommitAlphabetic'
        ];

        $routes['repo-words'] = [
            'route' => '/repo-words/{word-search}',
            'controller' => 'ReposController',
            'action' => 'repoSearchWords'
        ];

        $this->setRoutes($routes);
    }

   

   
}