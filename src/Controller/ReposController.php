<?php

namespace Src\Controller;

class ReposController 
{

    public function dados(){
     
        
        $url = "http://api.github.com/users/Felipe118/repos";
        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => [
                        'User-Agent: PHP',
                ]
            ]
        ];
        
        $json = file_get_contents($url, false, stream_context_create($opts));
        $dados = json_decode($json);

        return $dados;



    }

    public function allRepos(){
        header('Content-type: application/json;');
        $repos = $this->dados();

        return print_r(json_encode($repos));
    }
    
    public function allReposName(){
        header('Content-type: application/json;');

        $repos = [];
        foreach($this->dados() as $dado){
            $repos[] = $dado->name;
        }

        return print_r(json_encode($repos));
        //return json_encode($repos);
    }

    public function repos(){
        header('Content-type: application/json;');
        
        $urlRepo = $this->getUrl();

        $repo = $this->filterRepo($urlRepo);

        return print_r(json_encode($repo));

    }

    public function getUrl(){
        $repo = explode( '/',$_SERVER['REQUEST_URI']);
        return $repo[2];
    }

    public function filterRepo($repo){
        $url = "https://api.github.com/repos/Felipe118/".$repo;
        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => [
                        'User-Agent: PHP',
                ]
            ]
        ];
        //header('Content-type: application/json;');
        
        $json = file_get_contents($url, false, stream_context_create($opts));
        $repoFilter = json_decode($json);

        return $repoFilter;
    }

    public function filterCommitDateRepo($repo){
        $url = "https://api.github.com/repos/Felipe118/".$repo."/commits";
        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => [
                        'User-Agent: PHP',
                ]
            ]
        ];
        //header('Content-type: application/json;');
        
        $json = file_get_contents($url, false, stream_context_create($opts));
        $repoFilter = json_decode($json);

        return $repoFilter;
    }

    public function repoCommitDate(){
       header('Content-type: application/json;');
        
        $urlRepo = $this->getUrl();

        $repo = $this->filterCommitDateRepo($urlRepo);
        
      
         return print_r(json_encode($repo));
      


    }

    public function repoCommitAlphabetic(){
        header('Content-type: application/json;');

        $urlRepo = $this->getUrl();

        $repo = $this->allCommitsRepo($urlRepo);

        $messages = $this->messagesAlphabetic();
        
        $messAlphabetic = [];

        foreach($messages as $m){
          foreach($repo as $r){
            if($m == ucfirst($r->message)){
                $messAlphabetic[] = $r;
            }
          }
           
        }

        return print_r(json_encode($messAlphabetic));

    }

    public function allCommitsRepo($repo){
        $url = "https://api.github.com/repos/Felipe118/".$repo."/commits";
        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => [
                        'User-Agent: PHP',
                ]
            ]
        ];
      
        $json = file_get_contents($url, false, stream_context_create($opts));
        $repoFilter = json_decode($json);

        $commit = [];

        foreach($repoFilter as $r){
            $commit[] = $r->commit;
        }

        return $commit;
    }

    public function messagesAlphabetic(){
        $urlRepo = $this->getUrl();

        $repo = $this->allCommitsRepo($urlRepo);

        $messages = [];

        foreach($repo as $r){
            $messages[] = ucfirst($r->message);
           
        }
        sort($messages);

        return $messages;
    }

    public function repoSearchWords(){
        $urlRepo = $this->getUrl();
        
        header('Content-type: application/json;');
        
        $repos = $this->filterWord($urlRepo);

        return print_r(json_encode($repos));

    }

    public function filterWord($word){
        $url = "https://api.github.com/search/repositories?q=".$word;
        $opts = [
            'http' => [
                'method' => 'GET',
                'header' => [
                        'User-Agent: PHP',
                ]
            ]
        ];

        
        $json = file_get_contents($url, false, stream_context_create($opts));
        $repoFilter = json_decode($json);

        return $repoFilter;
    }

}

   