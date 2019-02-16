<?php

header('Content-Type: application/pdf');
header('Cache-Control: public, max-age=3600');
header('Content-Disposition: attachment; filename="kristopher-windsor.pdf"');

readfile(__DIR__ . '/source/kristopher.pdf');

