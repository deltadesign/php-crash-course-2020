<?php
// Magic constants - are constants which change their value based on execution context

echo __DIR__  . "</br>"; // current directory where the file is
echo __FILE__ . "</br>"; // current file in operation
echo __LINE__ . "</br>"; // line number of the code being executed

// Create directory - you can create a directory using mkdir('dir_name);

// mkdir('test');

// Rename directory - to rename a directory use rename('target', 'new_name');

// rename('test', 'new_dir');

// Delete directory - to remove a directory use rmdir('Target');

// rmdir('new_dir');

// Read files and folders inside directory

$files = scandir('./'); // scan the directory './' for current. '../' for parent

echo '<pre>';
var_dump($files);
echo '<pre>';


// file_get_contents, file_put_contents
echo file_get_contents("lorem.txt") . "</br>"; // read the contents of a file using file_get_contents("target");

file_put_contents("new_file.txt", "Hello Iam a new file, I was created in PHP by Dan Thomas."); // creates a new file and adds content

echo file_get_contents('new_file.txt') . '</br>';

// unlink('new_file'); // USE unlink to delete files with PHP

// file_get_contents from URL

$users = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/users')); // use json_decode too turn json data into an object add second argument of true to convert to an array.

echo '<pre>';
var_dump($users[0]->name);
echo '<pre>';


// https://www.php.net/manual/en/book.filesystem.php
// file_exists

if (file_exists('new_file.txt')) {
    echo "There is a file" . "</br>";
}


// is_dir

echo is_dir("test");
// filemtime
// filesize
// disk_free_space
// file