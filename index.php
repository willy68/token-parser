<?PHP

use Framework\Loader\FileLoader;
use Framework\Parser\PhpTokenParser;
use Framework\Router\Router;

include "vendor/autoload.php";

$fileLoader = new FileLoader(new PhpTokenParser(), new Router(null, null));
$annot = $fileLoader->load("Framework/Actions/PostShowAction.php");
dd($annot);