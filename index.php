<?PHP

use Framework\Loader\DirectoryLoader;
use Framework\Loader\FileLoader;
use Framework\Parser\PhpTokenParser;
use Framework\Router\Router;

include "vendor/autoload.php";

$router = new Router(null, null);
$dir = new DirectoryLoader(new PhpTokenParser(), $router);
$fileLoader = new FileLoader(new PhpTokenParser(), $router);
$annot = $fileLoader->load("Framework/Actions/PostShowAction.php");
$files = $dir->getFiles('Framework/Actions');
dd($annot, $router, $files);