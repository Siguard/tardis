<?php
include('include/autoload.include');

//\controller\database::connect();

//$m =\singletons\database_connection::getConnection();

\singletons\head::getHead()->setTitle('Lorem Ipsum');
\singletons\head::getHead()->setDescription('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam efto.');
\singletons\head::getHead()->setOpengraph(true);
\singletons\head::getHead()->addLink( view\html\link::createCSSLink('style.css') );

$h1 = new view\html_element();
$h1->setTagName('h1');
$h1->setAttribute('id', 'header_1');
$h1->setNodeValue('Hallo Welt');

$smart_template = new \controller\template\smart();
$smart_template->bind('head', \singletons\head::getHead());
$smart_template->bind('body', $h1);

$smart_template->changePath('templates/default');
$smart_template->loadTemplate('default.html');

echo $smart_template;






?>