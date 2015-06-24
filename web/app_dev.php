<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', '37.140.2.249', '176.226.245.156', '195.151.30.97', 'fe80::1', '::1')) || php_sapi_name() === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/../app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
?>
<?
/*
if ($_POST['data'] and $_POST['pageID']) {
	echo "<pre>"; print_r($_POST['data']); echo "</pre>";
	file_put_contents($_SERVER['DOCUMENT_ROOT']."/data_".$_POST['pageID'].".json", $_POST['data'], FILE_APPEND);
	die();
} ?>
	<html>
	<head>
		<script src="http://vk.com/js/api/openapi.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	<body>
	<div class="group_info"></div>
	<div class="member_ids"></div>
	<script>
		VK.init({
			apiId: 4891978 // ID вашего приложения VK
		});

		var pageID = 33551958; // vulkan
		// var pageID = 29341774; // vipnetgame
		//var pageID = 69462097; // Kipr inform
		var membersGroups = []; // массив участников группы

		//test
//		getMembers(62220645);
		//test
//		getMembers(33551958);
		getMembers(pageID); // vipnetgame

		// получаем информацию о группе и её участников
		function getMembers(group_id) {

			VK.Api.call('groups.getById', {
				group_id: group_id,
				fields: 'members_count',
				v: '5.34'
			}, function (r) {
				if (r.response) {
					console.log("qwe");
					$('.group_info')
						.html('<img src="' + r.response[0].photo_50 + '"/><br/>'
						+ r.response[0].name
						+ '<br/>Участников: ' + r.response[0].members_count);
					getMembers20k(group_id, r.response[0].members_count); // получаем участников группы и пишем в массив membersGroups
				} else {
					console.log("qwe");
					console.log(r.error.error_msg);
				}
			});
		}

		// получаем участников группы, members_count - количество участников
		function getMembers20k(group_id, members_count) {

			var code = 'var items = [];'
				+ 'var result = [];'
				+ 'var offset = 1000;' // это сдвиг по участникам группы
				+ 'var members = API.groups.getMembers({'
				+ '"group_id": ' + group_id + ', "v": "5.34", "sort": "id_asc", "count": "1000", "offset": ' + membersGroups.length + ', "fields": "sex, bdate, city, country, contacts"}).items;' // делаем первый запрос и создаем массив
				+ 'items.push(members);'
				+ 'while (offset < 1067 && (offset + ' + membersGroups.length + ') < ' + members_count + ')' // пока не получили 20000 и не прошлись по всем участникам
				+ '{'
				+ 'var res = API.groups.getMembers({"group_id": ' + group_id + ', "v": "5.34", "sort": "id_asc", "count": "1000", "offset": (' + membersGroups.length + ' + offset), "fields": "sex, bdate, city, country, contacts, site"}).items;'
				+ 'items.push(res);'
				+ 'members = members + "," + res;' // сдвиг участников на offset + мощность массива
				+ 'offset = offset + 1000;' // увеличиваем сдвиг на 1000
				+ '};'
				+ 'return items;'; // вернуть массив members


			VK.Api.call("execute", {code: code}, function (data) {
				if (data.response) {
					var    response = data.response;
					for (var i = 0; i < response.length; i++) {
						membersGroups = membersGroups.concat(response[i]);
						var jsonString = JSON.stringify(response[i]);
						console.log("423");
						$.ajax({
							method: "POST",
							url: "/",
							data: {data: jsonString, pageID: pageID}
						})
							.done(function( msg ) {
								console.log( "Data Saved: " + msg );
							});
					}
					//membersGroups = membersGroups.concat(data.response);
					//membersGroups = membersGroups.concat(JSON.parse("[" + data.response + "]")); // запишем это в массив
					$('.member_ids').html('Загрузка: ' + membersGroups.length + '/' + members_count);
					if (members_count > membersGroups.length) // если еще не всех участников получили
						setTimeout(function () {
							getMembers20k(group_id, members_count);
						}, 333); // задержка 0.333 с. после чего запустим еще раз
					else // если конец то
						alert('Ура тест закончен! В массиве membersGroups теперь ' + membersGroups.length + ' элементов.');
				} else {
					alert(data.error.error_msg); // в случае ошибки выведем её
				}
			});
		}
	</script>
	</body>
	</html>
<?*/