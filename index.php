<?php
require('init.php');
$app = new Application;
$resp = $app->generateResponse();
$resp->send();

//require('bootstrap.php');
//
//$em = createEntityManager();
//
//if ('POST' === $_SERVER['REQUEST_METHOD']) {
//    $title = $_POST['title'];
//    $content = $_POST['content'];
//
//    $a = new Article();
//    $a->setTitle($title);
//    $a->setContent($content);
//
//    $em->persist($a);
//    $em->flush();
//
//    return header('location: /');
//}
//
//$r = $em->getRepository('Article');
//
//if (isset($_GET['filter'])) {
//    $filter = $_GET['filter'];
//    $result = $r->findByTitle($filter);
//
// } else {
//    $result = $r->findAll();
//}
//find
//findAll
//findBy
//findOneBy


//
//    foreach($articles as $a) {
//        echo '<li>';
//        echo $a->getId() . '#';
//        echo $a->getTitle() .'.';
//        echo $a->getContent();
//        echo '</li>';
//    }
//}
//
//require ('htmlDirectory/articleForm.php');



