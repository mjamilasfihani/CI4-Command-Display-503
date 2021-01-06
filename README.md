# CI4-Command-Display-503
Add this script
`
// Check if 503 file is available in
// directory ../writable/uploads/ and without file extension.
//
// Open 503.html if you want to edit the interface.
//
if (file_exists($paths->writableDirectory . '/uploads/503.php'))
{
	require $paths->writableDirectory . '/uploads/503.php';
}
`
Under
`$paths = new Config\Paths();`
