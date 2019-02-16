<?php

header('Content-Type: application/pdf');
header('Cache-Control: public, max-age=3600');

readfile(__DIR__ . '/source/kristopher.pdf');

