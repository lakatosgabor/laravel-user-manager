<?php

namespace App\Console\Commands {
    use Illuminate\Console\Command;

    class MakeViewPage extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'make:page {name}';


        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Generates a view at `views/pages/**/*`';


        /**
         * Execute the console command.
         */
        public function handle(): void
        {
            $this->call('make:view', [
                'name' => 'pages.' . $this->argument('name')
            ]);
        }
    }
}
