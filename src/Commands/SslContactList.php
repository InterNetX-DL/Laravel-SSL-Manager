<?php

namespace Ephenodrom\Commands;

use Illuminate\Console\Command;
use Ephenodrom\RestExcecutionException;

class SslContactList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sslcontact:list {body?}';

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
        $view = null;
        $filters = null;
        $order = null;
        if($body != null){
            $body = json_decode($body);
            $view = $body['view'];
            $filters = $body['where'];
            $order = $body['order'];
        }
        $provider = resolve('Ephenodrom\SslManagerProvider');
        try{
            $response = $provider->sslContactList($view, $filters, $order);
        }catch(RestExcecutionException $e){

        }
        $this->info(json_encode($response, JSON_PRETTY_PRINT));
    }
}
