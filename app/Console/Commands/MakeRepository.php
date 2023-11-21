<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Repository class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name') . "Repository";
        $repositoryPath = app_path("Http/Repositories/{$name}.php");
        if (file_exists($repositoryPath)) {
            $this->error('Repository already exists!');
            return;
        }
        $this->createRepository($name, $repositoryPath);
        $this->info("Repository [" . $repositoryPath . "] created successfully.");
    }

    protected function createRepository(string $name, string $path)
    {
        $content = "<?php\n\n";
        $content .= "namespace App\Http\Repositories;\n\n";
        $content .= "class {$name}\n";
        $content .= "{\n";
        $content .= "    // Your service logic here\n";
        $content .= "}\n";
        File::put($path, $content);
    }
}
