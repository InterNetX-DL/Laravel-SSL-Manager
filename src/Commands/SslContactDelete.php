<?php

namespace Ephenodrom\Commands;

use Illuminate\Console\Command;

class SslContactDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sslcontact:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displays the information contained in an existing contact.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = trim($this->argument('id'));
        $provider = resolve('Ephenodrom\SslManagerProvider');
        try{
            $response = $provider->sslContactDelete($id);
        }catch(RestExcecutionException $e){

        }
        $this->info(json_encode($response, JSON_PRETTY_PRINT));
    }
}
