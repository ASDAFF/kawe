<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$bMicro = $_REQUEST["microblog"] === "Y";
if($bMicro)
	$pageId = "group_microblog";
else
	$pageId = "group_blog";
include("util_group_menu.php");
include("util_group_profile.php");

if(strpos($arResult["PATH_TO_GROUP_BLOG_POST_EDIT"], "?") === false)
	$arResult["PATH_TO_GROUP_MICROBLOG_POST_EDIT"] = $arResult["PATH_TO_GROUP_BLOG_POST_EDIT"]."?microblog=Y";
else
	$arResult["PATH_TO_GROUP_MICROBLOG_POST_EDIT"] = $arResult["PATH_TO_GROUP_BLOG_POST_EDIT"]."&microblog=Y";
?>

<?
$APPLICATION->IncludeComponent(
	"bitrix:socialnetwork.blog.menu",
	"",
	Array(
		"PATH_TO_USER" => $arResult["PATH_TO_USER"],
		"PATH_TO_POST_EDIT" => ($bMicro) ? $arResult["PATH_TO_GROUP_MICROBLOG_POST_EDIT"] : $arResult["PATH_TO_GROUP_BLOG_POST_EDIT"],
		"PATH_TO_DRAFT" => $arResult["PATH_TO_GROUP_BLOG_DRAFT"],
		"USER_ID" => $arResult["VARIABLES"]["user_id"],
		"USER_VAR" => $arResult["ALIASES"]["user_id"],
		"PAGE_VAR" => $arResult["ALIASES"]["blog_page"],
		"POST_VAR" => $arResult["ALIASES"]["post_id"],
		"SOCNET_GROUP_ID" => $arResult["VARIABLES"]["group_id"],
		"PATH_TO_GROUP_BLOG" => $arResult["PATH_TO_GROUP_BLOG"],
		"PATH_TO_GROUP" => $arResult["PATH_TO_GROUP"],
		"SET_NAV_CHAIN" => $arResult["SET_NAV_CHAIN"],
		"GROUP_ID" => $arParams["BLOG_GROUP_ID"],
		"PATH_TO_MODERATION" => $arResult["PATH_TO_GROUP_BLOG_MODERATION"],
		"MICROBLOG" => ($bMicro) ? "Y" : "N",
	),
	$component
);
$APPLICATION->IncludeComponent(
	"bitrix:blog.post.edit",
	($bMicro) ? "micro" : "",
	Array(
		"ID"						=> $arResult["VARIABLES"]["post_id"],
		"PATH_TO_BLOG" 				=> $arResult["PATH_TO_USER_BLOG"], 
		"PATH_TO_GROUP_BLOG" 		=> ($bMicro) ? $arResult["PATH_TO_GROUP_MICROBLOG"] : $arResult["PATH_TO_GROUP_BLOG"], 
		"PATH_TO_POST"				=> ($bMicro) ? $arResult["PATH_TO_GROUP_MICROBLOG_POST"] : $arResult["PATH_TO_GROUP_BLOG_POST"],
		"PATH_TO_POST_EDIT"			=> ($bMicro) ? $arResult["PATH_TO_GROUP_MICROBLOG_POST_EDIT"] : $arResult["PATH_TO_GROUP_BLOG_POST_EDIT"],
		"PATH_TO_USER" 				=> $arResult["PATH_TO_USER"],
		"PATH_TO_DRAFT"				=> $arResult["PATH_TO_GROUP_BLOG_DRAFT"], 
		"PATH_TO_SMILE" 			=> $arParams["PATH_TO_BLOG_SMILE"], 
		"SET_TITLE"					=> $arResult["SET_TITLE"],
		"SET_NAV_CHAIN" 			=> "N",
		"POST_PROPERTY" 			=> $arParams["POST_PROPERTY"],
		"DATE_TIME_FORMAT" 			=> $arResult["DATE_TIME_FORMAT"],
		"USER_ID"					=> $arResult["VARIABLES"]["user_id"],
		"USER_VAR" 					=> $arResult["ALIASES"]["user_id"],
		"PAGE_VAR" 					=> $arResult["ALIASES"]["blog_page"],
		"POST_VAR" 					=> $arResult["ALIASES"]["post_id"],
		"SOCNET_GROUP_ID" 			=> $arResult["VARIABLES"]["group_id"],
		"GROUP_ID" 					=> $arParams["BLOG_GROUP_ID"],
		"USE_SOCNET" 				=> "Y",
		"ALLOW_POST_MOVE" 			=> $arParams["ALLOW_POST_MOVE"],
		"PATH_TO_BLOG_POST" 		=> $arParams["PATH_TO_BLOG_POST"],
		"PATH_TO_BLOG_POST_EDIT" 	=> $arParams["PATH_TO_BLOG_POST_EDIT"],
		"PATH_TO_BLOG_DRAFT" 		=> $arParams["PATH_TO_BLOG_DRAFT"],
		"PATH_TO_BLOG_BLOG" 		=> $arParams["PATH_TO_BLOG_BLOG"],
		"PATH_TO_USER_POST"			=> $arResult["PATH_TO_USER_BLOG_POST"],
		"PATH_TO_USER_POST_EDIT" 	=> $arResult["PATH_TO_USER_BLOG_POST_EDIT"],
		"PATH_TO_USER_DRAFT" 		=> $arResult["PATH_TO_USER_BLOG_DRAFT"],
		"PATH_TO_USER_BLOG" 		=> $arResult["PATH_TO_USER_BLOG"],
		"PATH_TO_GROUP_POST" 		=> $arResult["PATH_TO_GROUP_BLOG_POST"],
		"PATH_TO_GROUP_POST_EDIT" 	=> $arResult["PATH_TO_GROUP_BLOG_POST_EDIT"],
		"PATH_TO_GROUP_DRAFT" 		=> $arResult["PATH_TO_GROUP_BLOG_DRAFT"],
		"PATH_TO_GROUP_BLOG" 		=> $arResult["PATH_TO_GROUP_BLOG"],
		"NAME_TEMPLATE" 			=> $arParams["NAME_TEMPLATE"],
		"SHOW_LOGIN" 				=> $arParams["SHOW_LOGIN"],
		"IMAGE_MAX_WIDTH" => $arParams["BLOG_IMAGE_MAX_WIDTH"],
		"IMAGE_MAX_HEIGHT" => $arParams["BLOG_IMAGE_MAX_HEIGHT"],
		"ALLOW_POST_CODE" => $arParams["BLOG_ALLOW_POST_CODE"],
		"USE_GOOGLE_CODE" => $arParams["BLOG_USE_GOOGLE_CODE"],		
		"MICROBLOG" => ($bMicro) ? "Y" : "N",
	),
	$component
);
?>