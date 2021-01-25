<?PHP

use Framework\Parser\PhpTokenParser;

include "vendor/autoload.php";

$parser = new PhpTokenParser();
$class = $parser->findClass("PostShowAction.php");
echo $class;