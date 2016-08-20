<?php
return [
  'search' => [
    'case_insensitive' => true,
    'use_wildcards' => false,
  ],
  'lengthMenu' => [[15, 25, 50, 100, -1], [15, 25, 50, 100, "All"]],
  'iDisplayLength' => 50,
  'pageLength' => 50,

  'fractal' => [
  'serializer' => 'League\Fractal\Serializer\DataArraySerializer',
],
  'script_template' => 'datatables::script',
];
