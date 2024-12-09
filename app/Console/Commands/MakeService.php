<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Str;
use File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service';
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $className = Str::studly($name);
        $filePath = app_path("Services/{$className}.php");
        if (file_exists($filePath)) {
            $this->error("Service $className already Exists");
            return;
        }
        $filecontent = $this->getServiceClassContent($className);
        file_put_contents($filePath, $filecontent);
    }
    private function getServiceClassContent($className)
    {
        return "<?php
namespace App\\Services;

class {$className}
{
    // Your service logic goes here
}
";
    }
}
