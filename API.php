<?php
require_once('Database.php');

$db = new DatabaseObject();

$app->get('/records', function($request, $response, $args) {
   $records = $db->retrieveFromDatabase();
   return $response->withJson($records);
});

$app->get('/records/{id}', function($request, $response, $args) {
   $id = $args['id'];
   $record = $db->retrieveFromDatabase($id);
   return $response->withJson($record);
});

$app->get('/records/type/{type}', function($request, $response, $args) {
   $type = $args['type'];
   $records = $db->retrieveFromDatabase($type);
   return $response->withJson($records);
});

$app->post('/records', function($request, $response, $args) {
   $record = $request->getParsedBody();
   $db->saveToDatabase($record);
   return $response->withJson($record);
});
?>
