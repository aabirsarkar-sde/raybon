<?php
// Product discontinued and removed from the catalogue.
// 301 to the products listing so the indexed URL keeps its equity.
header('Location: product.php', true, 301);
exit;
