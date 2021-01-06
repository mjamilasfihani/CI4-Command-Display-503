# CI4-Command-Display-503 | Tested on CI 4.0.4
Clone this repository and copy it into `app/Commands`

Add this script inside `public/index.php`

	// Check if 503 file is available in
	// directory ../writable/uploads/ and without file extension.
	//
	// Open 503.html if you want to edit the interface.
	//
	if (file_exists($paths->writableDirectory . '/uploads/503.php'))
	{
		require $paths->writableDirectory . '/uploads/503.php';
	}

Under

`$paths = new Config\Paths();`

<hr>

Then you can use this command

`php spark server:down` for maintenance mode

`php spark server:up` for disabled maintenance mode
