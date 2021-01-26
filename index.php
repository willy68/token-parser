<?PHP

include "vendor/autoload.php";

use Framework\Actions\PostShowAction;
use Framework\Loader\DirectoryLoader;
use Framework\Parser\PhpTokenParser;
use Framework\Router\Router;

$router = new Router(null, null);
$dir = new DirectoryLoader(new PhpTokenParser(), $router);
$dirAnnot = $dir->load('src/Actions');
$files = $dir->getFiles('src/Actions');
$group = $router->crud('blog', PostShowAction::class, 'blog');
$group();
dd($router, $files, $group);