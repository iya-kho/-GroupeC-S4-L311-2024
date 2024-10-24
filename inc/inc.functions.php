<?php
    session_start();

    define('TL_ROOT', dirname(__DIR__));
    define('LOGIN', 'UEL311');
    define('PASSWORD', 'U31311');
    // Correction : /dbal/articles.json=> /db/articles.json
    define('DB_ARTICLES', TL_ROOT.'/db/articles.json');  

    function connectUser($login = null, $password = null){
        if(!is_null($login) && !is_null($password)){
            if($login === LOGIN && $password === PASSWORD){
                return array(
                    'login'    => LOGIN,
                    'password' => PASSWORD
                );
            }
        }
        return null;
    }

    function setDisconnectUser(){
         unset($_SESSION['User']);
         // Correction : sessions_destroy() => session_destroy()
         // La fonction correcte pour detruire la session est session_destroy()
         session_destroy();
    }

    function isConnected(){
        if(array_key_exists('User', $_SESSION) 
                && !is_null($_SESSION['User'])
                    && !empty($_SESSION['User'])){
            return true;
        }
        return false;
    }

    function getPageTemplate($page = null){
        $fichier = TL_ROOT.'/pages/'.(is_null($page) ? 'index.php' : $page.'.php');

        if(!file_exists($fichier)){
            // Correction : inclde => include
            // Erreur de frappe dans le mot "include"
            include TL_ROOT.'/pages/index.php';
        }else{
            include $fichier;
        }
    }

    function getArticlesFromJson(){
        // Correction : file_exist => file_exists
        // La fonction correcte est file_exists avec un 's'
        if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES);
            return json_decode($contenu_json, true);
        }

        return null;
    }

    // Correction : $id_article == null => $id_article = null
    // Correction dans la declaration du parametre avec un seul "=" pour la valeur par defaut
    function getArticleById($id_article = null){
       if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES);
            $_articles    = json_decode($contenu_json, true);

            foreach($_articles as $article){
                if($article['id'] == $id_article){
                    return $article;
                }
            }
        }

        return null;
    }
?>
