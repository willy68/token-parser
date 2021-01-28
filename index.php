<?PHP

include "vendor/autoload.php";

use Framework\Actions\PostShowAction;
use Framework\Loader\DirectoryLoader;
use Framework\Router\Router;

$router = new Router(null, null);
$dir = new DirectoryLoader($router);
$dirAnnot = $dir->load('src/Actions');
$files = $dir->getFiles('src/Actions');
$group = $router->crud('blog', PostShowAction::class, 'blog');
$router->generateUri('blog.index');
dd($router, $files, $group);