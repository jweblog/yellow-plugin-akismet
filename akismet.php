<?php
// Akismet plugin
// Copyright (c) 2017 Steffen Schultz and Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowAkismet
{
	const VERSION = "0.0.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
		$this->yellow->config->setDefault("akismetKey", "");
		
		// Include Akismet class
		require_once($this->yellow->config->get("pluginDir")."Akismet.class.php");
		
		// Inicialize
		$WordPressAPIKey = $this->yellow->config->get("akismetKey");
		if(empty($WordPressAPIKey)) die("Akismet API key is empty!");
		$MyBlogURL = $this->yellow->page->base."/";
		$akismet = new Akismet($MyBlogURL ,$WordPressAPIKey);
		$akismet->setCommentAuthor(htmlspecialchars($_REQUEST["name"]));
		$akismet->setCommentAuthorEmail(htmlspecialchars($_REQUEST["from"]));
		$akismet->setCommentAuthorURL(htmlspecialchars($_REQUEST["url"]));
		$akismet->setCommentContent(htmlspecialchars($_REQUEST["message"]));
		$akismet->setPermalink($this->yellow->page->getUrl());
		
		if($akismet->isCommentSpam()) die("Spam detected!");
	}
}

$yellow->plugins->register("akismet", "YellowAkismet", YellowAkismet::VERSION);
?>