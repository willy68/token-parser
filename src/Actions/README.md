# pgframework-app
application skelton

## Test composer create-project
**ligne de commande**  
<code>
composer create-project --repository-url=../pgframework-app/packages.json --remove-vcs willy68/pgframework-app .
</code>

**Fichier packages.json**  
```json
{
    "package": {
        "name": "willy68/pgframework-app",
        "version": "0.0.1",
        "source": {
          "url": "https://github.com/willy68/pgframework-app.git",
          "type": "git",
          "reference": "master"
        }
    }
 }
 ```
