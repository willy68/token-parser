<?PHP

use Framework\Loader\FileLoader;
use Framework\Parser\PhpTokenParser;

include "vendor/autoload.php";

$fileLoader = new FileLoader(new PhpTokenParser());
$annot = $fileLoader->load("Framework/Actions/PostShowAction.php");
var_dump($annot);