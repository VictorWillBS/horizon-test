<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    public function handle()
    {
        $name = $this->argument('name') . "Service";
        $servicePath = app_path("Http/Services/{$name}.php");

        if (File::exists($servicePath)) {
            $this->error('Service already exists!');
            return;
        }

        $this->createService($servicePath, $name);

        $this->info('Service created successfully.');
    }

    protected function createService($path, $name)
    {
        $content = "<?php\n\n";
        $content .= "namespace App\Http\Services;\n\n";
        $content .= "class {$name}\n";
        $content .= "{\n";
        $content .= "    // Your service logic here\n";
        $content .= "}\n";

        File::put($path, $content);
    }
}
