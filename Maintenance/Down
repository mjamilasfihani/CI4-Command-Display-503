<?php namespace App\Commands\Maintenance;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Down extends BaseCommand
{
    protected $group       = 'Maintenance';
    protected $name        = 'server:down';
    protected $description = 'Activate the maintenance mode.';

    public function run(array $params)
    {
        // Location 503.php file
        $path = WRITEPATH . 'uploads/503.php';

        // We need to check the file first
        if (file_exists($path) === true)
        {
            CLI::error('Maintenance mode has activated!');
            return;
        }
        
        // Create the PHP template        
        $template  = '<?php ';
        $template .= 'header($_SERVER["SERVER_PROTOCOL"] . " 503 Service Temporarily Unavailable", true, 503); ';
        $template .= 'header(\'Retry-After: \' . 3600); ';
        $template .= 'die(include "' . str_replace('\\', '\\\\', APPPATH) . 'Commands/Maintenance/503.html"); ';
        
        // Load the helper
        helper('filesystem');

        // Time to create 503.php file
        if (! write_file($path, $template))
        {
            CLI::error('Can not set to the maintenance mode!');
            return;
        }

        // Return success
        CLI::write('Maintenance mode activate!', 'green');
    }
}
