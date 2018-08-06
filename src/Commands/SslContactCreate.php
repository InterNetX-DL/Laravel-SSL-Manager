<?php

namespace Ephenodrom\Commands;

use Illuminate\Console\Command;

class SslContactCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sslcontact:create {body}';

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
        $body = $this->argument('body');
        if($body != null){
            $body = json_decode($body);
        }
        $provider = resolve('Ephenodrom\SslManagerProvider');
        try{
            $response = $provider->sslContactCreate($body);
        }catch(RestExcecutionException $e){

        }
        $this->info(json_encode($response, JSON_PRETTY_PRINT));
    }
}
