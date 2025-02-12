<?php // {"autorun":true, "persist":true, "single-expression": false, "render-as": "text"}
$window = new Vrzno;
$import = vrzno_import('https://cdn.jsdelivr.net/npm/@observablehq/plot@0.6/+esm');

$import->then(function($Plot) use($window) {

$plot = $Plot->rectY(
  (object)['length' => 1000],
  $Plot->binX(
    (object)['y'=> $window->Math->random],
    (object)['x'=> $window->Math->random]
  )
)->plot();

$renderTo = $window->document->body->querySelector('#example');
$renderTo->innerHTML = '';

$renderTo->append($plot);

})->catch(fn($error) => $window->console->error($error->message));
