<?php

require_once("inc/config.inc.php");
require_once("inc/Entities/User.class.php");
require_once("inc/Entities/Album.class.php");
require_once("inc/Entities/Post.class.php");
require_once("inc/Utilities/Page.class.php");
require_once("inc/Utilities/PDOAgent.class.php");
require_once("inc/Utilities/UserDAO.class.php");
require_once("inc/Utilities/AlbumDAO.class.php");
require_once("inc/Utilities/PostDAO.class.php");
require_once("inc/Utilities/TrendyPost.class.php");
require_once("inc/Utilities/RestClient.class.php");

 //Start the session
session_start();

//Check if the form was posted
if (isset($_POST["logout"])) {
	session_destroy();
	//Send the user to the user managment page The two.php
	header("location:The two.php");
	return;
}

if (!isset($_SESSION) || !$_SESSION["loggedin"]) {
	session_destroy();
	header("location:The two.php");
	return;
}

if(isset($_POST["viewTrendyPost"])) {
	header("location:Trendy.php");
	return;
}

//Initialize the DAO
AlbumDAO::init();
UserDAO::init();

//Get the current user 
$userid = UserDAO::getUser($_SESSION["username"])->getUserID();
$_SESSION["userid"] = $userid;

		if (isset($_POST["createbtn"])) {
			if (!empty($_POST["newalbumname"])) {
				$newalbum = new Album();
				$newalbum->setAlbumName($_POST["newalbumname"]);
				$newalbum->setUserID($userid);
				AlbumDAO::createAlbum($newalbum);
			}
		}

		if (isset($_POST["deletebtn"])) {
			if (isset($_POST["deleteradio"])) {
				AlbumDAO::deleteAlbum($_POST["deleteradio"]);
			}
		}

		if (isset($_POST["updatebtn"])) {
			if (isset($_POST["editradio"]) && isset($_POST["newname"])) {
				$albumname = $_POST["newname"];
				$a = new Album();
				$a->setAlbumName($albumname);
				$a->setUserID($userid);
				$a->setAlbumID($_POST["editradio"]);
				AlbumDAO::updateAlbum($a);
			}
		}

		Page::header();
		Page::mainpage();

		if (isset($_POST["showAlbum"])) {
			header("location:Album.php");
			return;
		} else {
			$albums = AlbumDAO::getAlbums($userid);

			if (isset($_POST["addtoAlbum"])) {
				Page::addimageform($albums);
			}
			if (isset($_POST["createAlbum"])) {
				Page::createalbum();
			}
			if (isset($_POST["deleteAlbum"])) {
				Page::deletealbum($albums);
			}
			if (isset($_POST["updateAlbum"])) {
				Page::updatealbum($albums);
			}
		}

		Page::footer();
