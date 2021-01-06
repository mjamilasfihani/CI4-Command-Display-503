<?php namespace App\Commands\Maintenance;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Up extends BaseCommand
{

    /**
     * The group the command is lumped under
     * when listing commands.
     *
     * @var string
     */
    protected $group = 'Maintenance';

    /**
     * The Command's name
     *
     * @var string
     */
    protected $name = 'server:up';

    /**
     * the Command's short description
     *
     * @var string
     */
    protected $description = 'Deactivate the maintenance mode.';

    //--------------------------------------------------------------------

    /**
     * Ensures that all server:up have been run.
     *
     * @param array $params
     */
    public function run(array $params)
    {
        // Location the file
        $path = WRITEPATH . 'uploads/';

        // We need to check the files first
        if (file_exists($path . '503.php') && file_exists($path . '503.html'))
        {
            // Deleting the files
            if (unlink($path . '503.php') && unlink($path . '503.html'))
            {
                CLI::write('Maintenance mode deactivate!', 'green');
                return;
            }
            else
            {
                CLI::error('File 503.php or 503.html can\'t be deleted!');
                return;
            }
        }
        else
        {
            CLI::error('Maintenance mode has deactivated!');
            return;
        }
    }

}
