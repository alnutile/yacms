<?php

namespace App\Console\Commands;

use Facades\App\Domain\Importers\StatamicImporter;
use Illuminate\Console\Command;
use League\Csv\Reader;

class StatamicImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statamic-import-command {file_path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Statamic Import';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $path = $this->argument('file_path');
        $this->info('Starting import');
        $reader = Reader::createFromPath($path, 'r');
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();

        /** @phpstan-ignore-next-line */
        StatamicImporter::handle($records);
    }
}
