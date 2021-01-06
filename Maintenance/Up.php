<?php namespace App\Commands\Maintenance;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Up extends BaseCommand
{
    protected $group       = 'Maintenance';
    protected $name        = 'server:up';
    protected $description = 'Deactivate the maintenance mode.';

    public function run(array $params)
    {
        // Location 503.php file
        $path = WRITEPATH . 'uploads/503.php';

        // We need to check the file first
        if (file_exists($path) === false)
        {
            CLI::error('Maintenance mode has deactivated!');
            return;
        }

        // Delete 503.php file
        if (! unlink($path))
        {
            CLI::error('File 503.php can\'t be deleted!');
            return;
        }

        CLI::write('Maintenance mode deactivate!', 'green');
    }
}
