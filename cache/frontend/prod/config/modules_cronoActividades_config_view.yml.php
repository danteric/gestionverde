<?php
// auto-generated by sfViewConfigHandler
// date: 2017/06/11 21:00:05
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('smoothness/jquery-ui-1.8.23.custom.css', '', array ());
  $response->addStylesheet('jquery.tablesorter.pager.css', '', array ());
  $response->addStylesheet('autoCompleteCalles.css', '', array ());
  $response->addStylesheet('jquery.checkboxtree.min.css', '', array ());
  $response->addStylesheet('bootstrap.min.css', '', array ());
  $response->addStylesheet('font-awesome.min.css', '', array ());
  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('chosen.css', '', array ());
  $response->addStylesheet('estilovarios.css', '', array ());
  $response->addStylesheet('dataTables.bootstrap.min.css', '', array ());
  $response->addStylesheet('responsive.dataTables.min.css', '', array ());
  $response->addJavascript('jquery-1.11.3.js', '', array ());
  $response->addJavascript('jquery-ui-1.8.23.custom.min.js', '', array ());
  $response->addJavascript('jquery.tablesorter.min.js', '', array ());
  $response->addJavascript('jquery.tablesorter.pager.js', '', array ());
  $response->addJavascript('jquery.lightbox_me.js', '', array ());
  $response->addJavascript('chosen.jquery.min.js', '', array ());
  $response->addJavascript('jquery.validate.js', '', array ());
  $response->addJavascript('jquery.sticky.js', '', array ());
  $response->addJavascript('base.js', '', array ());
  $response->addJavascript('masks.js', '', array ());
  $response->addJavascript('bootstrap.min.js', '', array ());
  $response->addJavascript('jquery.checkboxtree.min.js', '', array ());
  $response->addJavascript('mustache.js', '', array ());
  $response->addJavascript('buscador/buscador.js', '', array ());
  $response->addJavascript('buscador/elastic.min.js', '', array ());
  $response->addJavascript('buscador/elastic-jquery-client.min.js', '', array ());
  $response->addJavascript('jquery.dataTables.min.js', '', array ());
  $response->addJavascript('dataTables.bootstrap.min.js', '', array ());
  $response->addJavascript('moments.min.js', '', array ());
  $response->addJavascript('datetime_sort.js', '', array ());
  $response->addJavascript('dataTables.responsive.min.js', '', array ());


