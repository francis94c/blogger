# blogger
A Blog application for Code Igniter.

Easily integrate blogging functionality within your Code Igniter Projects with this application package.



### Installation ###
Download and Install Splint from https://splint.cynobit.com/downloads/splint and run the below from the root of your Code Igniter project.
```bash
splint install francis94c/blogger
```
### Dependencies ###

#### PHP Version ####

5.4

#### Packages ####

* ```francis94c/blog```
* ```francis94c/ci-toast```
* ```francis94c/cdn-helper```

### Usage ###

Top load the app, use
```php
$params = array(
    "name" => "blog_name"
); // name is the name of the blog to use internally as a table. A table per blog.

$this->load->app("francis94c/blogger", $params); // Done.
```

You can manage multiple blogs with the library. To use another blog, you must have installed the blog (This simply means creating the table for the blog contents with the given name of a blog) with the ```install()``` function of the ```francis94c/blog``` package as the package comes as a dependency.

To install a blog named ```my_visits```, without admin posting restrictions, do the below from a test or reserved controller as this shouldn't necessarily be production code.

```php
// Load the blog library
$this->load->splint("francis94c/blog", "+Blogger", null, "blogger");

// Install a blog
$this->blogger->install("my_visits", null, null, null);
```

See the full description of the install function below.

```php
/**
   * install [creates a table for a given blog name]
   * --------------------------------------------------------------------------------------------------------------------------------------------------------------------
   * @param  string $blogName                The name of the blog
   * --------------------------------------------------------------------------------------------------------------------------------------------------------------------
   * @param  string $adminTableName          the name of the table containing admins (this is required if you have an admins section and you wan to keep track of who 
   *                                         creates/edits what). This is basically used to add a foreign key constraint on the blog table's column of admin if provided.
   * --------------------------------------------------------------------------------------------------------------------------------------------------------------------
   * @param  string $adminIdColumnName       The name of the column in the given admin table that has the  id of each admin. this is usuall an AUTO_INCREMENT field 
   *                                         called 'id'.
   * --------------------------------------------------------------------------------------------------------------------------------------------------------------------
   * @param  int    $adminIdColumnConstraint The costrint of the id column in the admins table. e.g 7 for id INT(7), etc.
   * --------------------------------------------------------------------------------------------------------------------------------------------------------------------
   * @return bool                            true if successfull, false if not.
*/

$this->blogger->install([$blogName], [$adminTableName], [$adminColumnName], [$adminIdColumnConstraint]);
// All parameters are optional.

// If no blog name is given, it attempts to create a table called 'blogger_posts' by default.
```